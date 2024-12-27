<x-header></x-header>
<div class="wrapper">
    <x-navbar></x-navbar>
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tambah Data Kecamatan</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('kecamatan.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nama Kecamatan</label>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Masukkan nama kecamatan" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('kecamatan.index') }}" class="btn btn-secondary">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<x-footer></x-footer>
