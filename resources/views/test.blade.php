<x-header></x-header>
<!-- Wrapper Start -->
<div class="wrapper">
    <x-navbar></x-navbar>
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="mb-3">GIS Public Facilities</h4>
                    <!-- Div untuk Leaflet Map -->
                    <div id="map" style="width: 100%; height: 500px;"></div>
                </div>
            </div>
            <!-- Page end -->
        </div>
    </div>
</div>
<!-- Wrapper End -->
<x-footer></x-footer>

<!-- Leaflet CSS & JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.awesome-markers/2.0.4/leaflet.awesome-markers.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.awesome-markers/2.0.4/leaflet.awesome-markers.min.js">
</script>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-providers/1.13.0/leaflet-providers.min.js"></script>


<script>
    // Inisialisasi Map
    const map = L.map('map').setView([-6.917464, 107.619123], 12); // Koordinat Bandung
    L.tileLayer.provider('CartoDB.Positron').addTo(map);

    // Warna Marker Berdasarkan Tipe
    const markerColors = {
        'Kantor Kecamatan': 'red',
        'Puskesmas': 'blue',
        'Posyandu': 'green',
        'Bank': 'orange',
        'Stasiun': 'brown',
        'Lainnya': 'purple' // Default untuk tipe yang tidak dikenali
    };

    // Fungsi untuk Membuat Marker
    function createMarker(lat, lng, type, popupContent) {
        const color = markerColors[type] || 'gray'; // Default warna jika tipe tidak ditemukan
        const icon = L.AwesomeMarkers.icon({
            icon: 'info-sign', // Anda bisa mengganti dengan ikon lain
            markerColor: color,
            prefix: 'glyphicon' // Anda juga bisa menggunakan 'fa' untuk font-awesome
        });

        L.marker([lat, lng], {
                icon: icon
            })
            .addTo(map)
            .bindPopup(popupContent);
    }

    // Ambil Data dari Endpoint
    fetch('/api/fasilitas')
        .then(response => response.json())
        .then(data => {
            data.forEach(function(item) {
                if (item.latitude && item.longitude) {
                    const type = item.tipe_fasilitas?.name || 'Lainnya'; // Pastikan tipe ada
                    const popupContent = `
                    <strong>${item.tipe_fasilitas?.name} ${item.name}</strong><br>
                    ${item.alamat}<br>
                `;
                    createMarker(item.latitude, item.longitude, type, popupContent);
                }
            });
        })
        .catch(error => console.error('Error:', error));
</script>
