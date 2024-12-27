<x-header></x-header>
<!-- Wrapper Start -->
<div class="wrapper">
    <x-navbar></x-navbar>
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Kelola Data Fasilitas</h4>
                            </div>
                            <div class="header-action">
                                <i data-toggle="collapse" data-target="#datatable-1" aria-expanded="false">
                                    <svg width="20" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                    </svg>
                                </i>
                            </div>
                        </div>
                        <div class="card-body">
                            <span class="table-add float-right mb-3 mr-2">
                                <a href="{{ route('fasilitas.create') }}" class="btn btn-sm bg-primary">
                                    <span class="pl-1">Tambah Fasilitas</span>
                                </a>
                            </span>
                            <div class="table-responsive">
                                <table id="datatable-1" class="table data-table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nama Fasilitas</th>
                                            <th>Alamat</th>
                                            <th>Kecamatan</th>
                                            <th>Tipe Fasilitas</th>
                                            <th>No Telepon</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($fasilitas as $item)
                                            <tr>
                                                <td>{{ $item->tipeFasilitas->name }} {{ $item->name }}</td>
                                                <td>{{ $item->alamat }}</td>
                                                <td>{{ $item->kecamatan->name }}</td>
                                                <td>{{ $item->tipeFasilitas->name }}</td>
                                                <td>{{ $item->no_telp }}</td>
                                                <td>
                                                    <a href="{{ route('fasilitas.edit', $item->id) }}"
                                                        class="btn btn-info btn-sm">Edit</a>
                                                    <form action="{{ route('fasilitas.destroy', $item->id) }}"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('Hapus fasilitas ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-danger btn-sm">Hapus</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Nama Fasilitas</th>
                                            <th>Alamat</th>
                                            <th>Kecamatan</th>
                                            <th>Tipe Fasilitas</th>
                                            <th>No Telepon</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
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
