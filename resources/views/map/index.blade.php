<x-header></x-header>
<!-- Wrapper Start -->
<style>
    #info-panel {
        position: absolute !important;
        bottom: 20px !important;
        left: 20px !important;
        width: 300px;
        max-height: 50%;
        overflow-y: auto;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        padding: 10px;
        display: none;
        z-index: 1000;
    }

    #info-panel.active {
        display: block;
        transform: translateX(0);
        opacity: 1;
    }

    #info-panel .info-content h4 {
        margin-top: 0;
    }

    #info-panel .info-content img {
        max-width: 100%;
        border-radius: 5px;
    }

    #close-panel {
        background: none;
        border: none;
        font-size: 24px;
        color: #333;
        cursor: pointer;
        padding: 10px;
    }

    .search-container {
        position: relative;
        z-index: 1000;
    }

    .search-container input,
    .search-container select,
    .search-container button {
        font-size: 14px;
        margin: 5px 0;
    }

    .search-container button:hover {
        background-color: #0056b3;
    }
</style>
<div class="wrapper">
    <x-navbar></x-navbar>
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="mb-3">GIS Public Facilities</h4>
                    <!-- Div untuk Leaflet Map -->
                    <div class="map-container" style="position: relative; height: 100vh;">
                        <!-- Peta -->
                        <div id="map" style="width: 100%; height: 100%;"></div>

                        <!-- Panel Info -->
                        <div id="info-panel"
                            style="position: absolute; top: 50%; left: 20px; transform: translateY(-50%); width: 300px; max-height: 50%; overflow-y: auto; background-color: white; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3); padding: 10px; display: none; z-index: 1000;">
                        </div>

                        <!-- Form Search & Filter -->
                        <div id="search-filter"
                            style="position: absolute; top: 20px; left: 50%; transform: translateX(-50%); z-index: 1000; background-color: white; padding: 10px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3); display: flex; gap: 10px; align-items: center;">
                            <input type="text" id="search-name" placeholder="Cari fasilitas..."
                                style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; flex: 2;">
                            <select id="filter-kecamatan"
                                style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; flex: 1;">
                                <option value="">Semua Kecamatan</option>
                                @foreach ($kecamatan as $kec)
                                    <option value="{{ $kec->id }}">{{ $kec->name }}</option>
                                @endforeach
                            </select>
                            <select id="filter-tipe"
                                style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; flex: 1;">
                                <option value="">Semua Tipe Fasilitas</option>
                                @foreach ($tipeFasilitas as $tipe)
                                    <option value="{{ $tipe->id }}">{{ $tipe->name }}</option>
                                @endforeach
                            </select>
                            <button id="apply-filter"
                                style="padding: 8px 12px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;">
                                Terapkan
                            </button>
                            <button id="clear-filter"
                                style="padding: 8px 12px; background-color: #dc3545; color: white; border: none; border-radius: 5px; cursor: pointer;">
                                Bersihkan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page end -->
        </div>
    </div>
</div>
<!-- Wrapper End -->
<x-footer></x-footer>

<!-- Leaflet CSS & JS -->

<script>
    const map = L.map('map').setView([-6.917464, 107.619123], 12); // Koordinat Bandung
    L.tileLayer.provider('CartoDB.Positron').addTo(map);

    // Warna marker berdasarkan tipe fasilitas
    const markerColors = {
        'Kantor Kecamatan': 'blue',
        'Bank': 'green',
        'Puskesmas': 'red',
        'Posyandu': 'orange',
        'Stasiun': 'purple'
    };

    // Variabel untuk menyimpan data marker
    let markers = [];
    let allFacilities = @json($fasilitas); // Data fasilitas dari server

    // Fungsi untuk menambahkan marker ke peta
    function addMarkers(data) {
        // Hapus semua marker sebelumnya
        markers.forEach(marker => map.removeLayer(marker));
        markers = [];

        data.forEach(function(item) {
            if (item.latitude && item.longitude) {
                const color = markerColors[item.tipe_fasilitas?.name] || 'gray';

                const marker = L.marker([item.latitude, item.longitude], {
                    icon: L.AwesomeMarkers.icon({
                        icon: 'info-sign',
                        markerColor: color,
                        prefix: 'glyphicon'
                    })
                }).addTo(map);

                // Event klik marker untuk menampilkan info panel
                marker.on('click', function() {
                    showInfoPanel(item);
                });

                markers.push(marker);
            }
        });
    }

    // Fungsi untuk menampilkan info panel
    function showInfoPanel(item) {
        const infoPanel = document.getElementById('info-panel');
        const imageUrl = `/storage/${item.gambar}`; // Tambahkan prefix '/storage/'

        infoPanel.innerHTML = `
        <button id="close-info-panel" 
                style="position: absolute; top: 10px; right: 10px; background: none; border: none; font-size: 20px; cursor: pointer;">
            ×
        </button>
        <h4>${item.name}</h4>
        <p><strong>Alamat:</strong> ${item.alamat}</p>
        <p><strong>Kecamatan:</strong> ${item.kecamatan?.name}</p>
        <p><strong>Tipe:</strong> ${item.tipe_fasilitas?.name}</p>
        <p><strong>No. Telp:</strong> ${item.no_telp || '-'}</p>
        <img src="${imageUrl}" alt="${item.name}" 
             style="max-width: 100%; height: auto; border-radius: 8px; margin-top: 10px;"
             onerror="this.src='/images/default-placeholder.png';">
        `;
        infoPanel.style.display = 'block';

        // Event untuk menutup info panel
        document.getElementById('close-info-panel').addEventListener('click', function() {
            infoPanel.style.display = 'none';
        });
    }

    // Tambahkan marker awal
    addMarkers(allFacilities);

    // Fungsi filter data
    function filterData() {
        const searchName = document.getElementById('search-name').value.toLowerCase();
        const selectedKecamatan = document.getElementById('filter-kecamatan').value;
        const selectedTipe = document.getElementById('filter-tipe').value;

        // Filter data berdasarkan input pengguna
        const filteredData = allFacilities.filter(item => {
            const matchNameOrType =
                item.name.toLowerCase().includes(searchName) ||
                item.tipe_fasilitas?.name.toLowerCase().includes(searchName);

            const matchKecamatan = selectedKecamatan ? item.kecamatan_id == selectedKecamatan : true;
            const matchTipe = selectedTipe ? item.tipe_id == selectedTipe : true;

            return matchNameOrType && matchKecamatan && matchTipe;
        });

        return filteredData;
    }

    // Event klik tombol "Terapkan"
    document.getElementById('apply-filter').addEventListener('click', function() {
        const filteredData = filterData();
        addMarkers(filteredData);
    });

    // Event klik tombol "Bersihkan"
    document.getElementById('clear-filter').addEventListener('click', function() {
        // Reset input dan filter
        document.getElementById('search-name').value = '';
        document.getElementById('filter-kecamatan').value = '';
        document.getElementById('filter-tipe').value = '';

        // Tampilkan semua marker
        addMarkers(allFacilities);
    });
</script>
