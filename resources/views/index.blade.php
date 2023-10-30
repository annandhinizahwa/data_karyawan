@extends('layout.master')

@push('plugin-styles')
    <link href="{{ asset('assets/plugins/datatables-net-bs5/dataTables.bootstrap5.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="#">Index Berita</a></li>
            {{-- <li class="breadcrumb-item active" aria-current="page">Sebelum Bencana</li> --}}
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('karyawan.create') }}" class="btn btn-primary">Tambah Data</a>
                    <br>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-hover" id="dataTableExample">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Tanggal Masuk</th>
                                    <th>Jumlah Hari</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($karyawans as $karyawan)
                                    <tr>
                                        <td> {{ $loop->iteration }}</td>
                                        <td>{{ $karyawan->nik }}</td>
                                        <td>{{ $karyawan->nama }}</td>
                                        <td>{{ $karyawan->alamat }}</td>
                                        <td>{{ $karyawan->jenis_kelamin }}</td>
                                        <td>{{ $karyawan->tanggal_lahir }}</td>
                                        <td>{{ $karyawan->tanggal_masuk }}</td>
                                        @php
                                            $today = Carbon\Carbon::today();
                                            $tanggalMasuk = Carbon\Carbon::parse($karyawan->tanggal_masuk);
                                            $selisihHari = $tanggalMasuk->diffInDays($today);
                                        @endphp

                                        <td>{{ $selisihHari }}</td>
                                        <td>
                                            <a class="btn icon btn-sm btn-warning"
                                                href="{{ route('karyawan.edit', $karyawan->id) }}" title="Edit karyawan">
                                                <i data-feather="edit"></i>
                                            </a>
                                            <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="POST"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn icon btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure?')" title="Hapus karyawan">
                                                    <i data-feather="trash-2"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
