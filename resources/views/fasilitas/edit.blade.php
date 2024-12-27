<x-header></x-header>

<style>
    #file-upload-container {
        position: relative;
        display: inline-block;
    }

    #cancel-upload {
        position: absolute;
        top: 5px;
        right: 5px;
        background: #ff4d4d;
        color: white;
        border: none;
        border-radius: 50%;
        width: 24px;
        height: 24px;
        text-align: center;
        line-height: 24px;
        cursor: pointer;
        z-index: 10;
    }

    #cancel-upload.hidden {
        display: none;
    }

    #file-image {
        display: block;
        max-width: 100%;
        max-height: 150px;
        margin: 10px auto;
    }
</style>

<!-- Wrapper Start -->
<div class="wrapper">
    <x-navbar></x-navbar>
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Edit Data Fasilitas</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('fasilitas.update', $fasilitas->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <!-- Bagian Kiri -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Nama Fasilitas</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                value="{{ $fasilitas->name }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" name="alamat" class="form-control" id="alamat"
                                                value="{{ $fasilitas->alamat }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="kecamatan_id">Kecamatan</label>
                                            <select name="kecamatan_id" class="form-control" id="kecamatan_id" required>
                                                <option selected disabled value="">Pilih Kecamatan...</option>
                                                @foreach ($kecamatan as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $item->id == $fasilitas->kecamatan_id ? 'selected' : '' }}>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="tipe_id">Tipe Fasilitas</label>
                                            <select name="tipe_id" class="form-control" id="tipe_id" required>
                                                <option selected disabled value="">Pilih Tipe Fasilitas...
                                                </option>
                                                @foreach ($tipeFasilitas as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $item->id == $fasilitas->tipe_id ? 'selected' : '' }}>
                                                        {{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_telp">No. Telepon</label>
                                            <input type="text" name="no_telp" class="form-control" id="no_telp"
                                                value="{{ $fasilitas->no_telp }}">
                                        </div>
                                    </div>

                                    <!-- Bagian Kanan -->
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="latitude">Latitude</label>
                                                <input type="text" name="latitude" class="form-control"
                                                    id="latitude" value="{{ $fasilitas->latitude }}" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="longitude">Longitude</label>
                                                <input type="text" name="longitude" class="form-control"
                                                    id="longitude" value="{{ $fasilitas->longitude }}" required>
                                            </div>
                                        </div>
                                        <div id="map" style="height: 300px; width: 100%; margin-bottom: 15px;">
                                        </div>
                                        <div class="form-group">
                                            <label for="gambar">Gambar</label>
                                            <div id="file-upload-form" class="uploader-file">
                                                <input id="file-upload" type="file" name="gambar" accept="image/*"
                                                    onchange="handleFileUpload(event)" />
                                                <label id="file-drag" for="file-upload" class="mb-0">
                                                    <div id="file-upload-container">
                                                        <button id="cancel-upload" class="hidden"
                                                            onclick="cancelFileUpload(event)">✖</button>
                                                        <img id="file-image"
                                                            src="{{ $fasilitas->gambar ? asset('storage/fasilitas/' . $fasilitas->gambar) : '' }}"
                                                            alt="Preview"
                                                            class="{{ $fasilitas->gambar ? '' : 'hidden' }}">
                                                    </div>
                                                    <span id="start-one">
                                                        <svg width="80" height="80" viewBox="0 0 24 24"
                                                            fill="black" xmlns="http://www.w3.org/2000/svg">
                                                            <g>
                                                                <g>
                                                                    <path d="M12 13V2" stroke="black" stroke-width="2"
                                                                        stroke-linecap="round" />
                                                                    <path d="M8 10L12 14L16 10" stroke="black"
                                                                        stroke-width="2" stroke-linecap="round" />
                                                                </g>
                                                                <g>
                                                                    <g>
                                                                        <path
                                                                            d="M17 14L21 14C22.1046 14 23 14.8954 23 16V20C23 21.1046 22.1046 22 21 22L3 22C1.89543 22 1 21.1046 1 20V16C1 14.8954 1.89543 14 3 14H7"
                                                                            stroke="black" stroke-width="2"
                                                                            stroke-linecap="round" />
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <span class="d-block">Select a file or drag here</span>
                                                        <span id="notimage" class="hidden d-block">Please select
                                                            image</span>
                                                        <span id="file-upload-btn" class="btn btn-primary">Select a
                                                            file</span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Page end -->
            </div>
        </div>
    </div>
    <!-- Wrapper End -->
    <x-footer></x-footer>

    <!-- LeafletJS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-providers/1.13.0/leaflet-providers.min.js"></script>
    <script>
        const map = L.map('map').setView([{{ $fasilitas->latitude }}, {{ $fasilitas->longitude }}], 12);
        L.tileLayer.provider('CartoDB.Positron').addTo(map);

        let marker = L.marker([{{ $fasilitas->latitude }}, {{ $fasilitas->longitude }}]).addTo(map);

        function updateMarker(lat, lng) {
            if (marker) {
                marker.setLatLng([lat, lng]);
            } else {
                marker = L.marker([lat, lng]).addTo(map);
            }
            map.setView([lat, lng], 13);
        }

        document.getElementById('latitude').addEventListener('input', function() {
            const lat = parseFloat(this.value);
            const lng = parseFloat(document.getElementById('longitude').value || 0);
            if (!isNaN(lat) && !isNaN(lng)) {
                updateMarker(lat, lng);
            }
        });

        document.getElementById('longitude').addEventListener('input', function() {
            const lat = parseFloat(document.getElementById('latitude').value || 0);
            const lng = parseFloat(this.value);
            if (!isNaN(lat) && !isNaN(lng)) {
                updateMarker(lat, lng);
            }
        });

        map.on('click', function(e) {
            const {
                lat,
                lng
            } = e.latlng;
            document.getElementById('latitude').value = lat.toFixed(6);
            document.getElementById('longitude').value = lng.toFixed(6);
            updateMarker(lat, lng);
        });
    </script>

    <script>
        const fileInput = document.getElementById('file-upload');
        const fileDrag = document.getElementById('file-drag');
        const fileImage = document.getElementById('file-image');

        // Handle file upload through button
        function handleFileUpload(event) {
            const file = event.target.files[0];
            showPreview(file);
        }

        function showPreview(file) {
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    fileImage.src = e.target.result; // Tampilkan file yang baru dipilih
                    fileImage.classList.remove('hidden');
                    document.getElementById('cancel-upload').classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                alert('Please select a valid image file.');
            }
        }

        function cancelFileUpload(event) {
            event.preventDefault();
            fileImage.classList.add('hidden');
            document.getElementById('cancel-upload').classList.add('hidden');
            fileInput.value = ''; // Kosongkan input file
            fileImage.src = "{{ asset('storage/fasilitas/' . $fasilitas->gambar) }}"; // Kembali ke gambar awal
        }


        // Drag-and-Drop events
        fileDrag.addEventListener('dragover', function(e) {
            e.preventDefault();
            e.stopPropagation();
            fileDrag.classList.add('dragover');
        });

        fileDrag.addEventListener('dragleave', function(e) {
            e.preventDefault();
            e.stopPropagation();
            fileDrag.classList.remove('dragover');
        });

        fileDrag.addEventListener('drop', function(e) {
            e.preventDefault();
            e.stopPropagation();
            fileDrag.classList.remove('dragover');

            const file = e.dataTransfer.files[0];
            fileInput.files = e.dataTransfer.files; // Update the input value
            showPreview(file);
        });
    </script>
