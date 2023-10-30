@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('karyawan.index') }}">Index</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Karyawan</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Karyawan</h4>
                    <form class="form form-horizontal needs-validation" novalidate method="POST"
                        enctype="multipart/form-data" action="{{ route('karyawan.update', $karyawans->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-body">
                            <div class="row">
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <label>Nama</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="text" class="form-control" placeholder="Nama" autofocus
                                            id="nama" name="nama" required value="{{ old('nama', $karyawans->nama) }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <label>Alamat</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <textarea id="alamat" name="alamat" class="form-control"  maxlength="100" rows="8" placeholder="Alamat...">{{ $karyawans->alamat }}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <label>Jenis Kelamin</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <select class="form-select"
                                            id="jenis_kelamin" autocomplete="off" name="jenis_kelamin" required>
                                            <option value="{{ old('jenis_kelamin', $karyawans->jenis_kelamin) }}">
                                                {{ $karyawans->jenis_kelamin }}</option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <label>Tanggal Lahir</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="date" class="form-control"
                                            id="tanggal_lahir" name="tanggal_lahir" required value="{{ old('tanggal_lahir', $karyawans->tanggal_lahir) }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <label>Tanggal Masuk</label>
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <input type="date" class="form-control"
                                            id="tanggal_masuk" name="tanggal_masuk" required value="{{ old('tanggal_masuk', $karyawans->tanggal_masuk) }}">
                                    </div>
                                </div>
                                <div class="col-sm-12 d-flex justify-content-end mt-3">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.js') }}"></script>
@endpush

@push('custom-scripts')
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush
