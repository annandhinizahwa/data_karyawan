<style>
    .table {
        border-collapse: collapse;
    }

    td,
    th {
        font-size: 10.5pt;
        border: 1px solid black;
        padding: 5px;
    }
</style>

<h3>
    <center><b>{{ $judul }}</b></center>
</h3>
<br>

<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Jumlah Hari</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($karyawans as $karyawan)
            <tr>
                <td> {{ $loop->iteration }}</td>
                <td>{{ $karyawan->nik }}</td>
                <td>{{ $karyawan->nama }}</td>
                <td>{{ $karyawan->alamat }}</td>
                @php
                    $today = Carbon\Carbon::today();
                    $tanggalMasuk = Carbon\Carbon::parse($karyawan->tanggal_masuk);
                    $selisihHari = $tanggalMasuk->diffInDays($today);
                @endphp

                <td>{{ $selisihHari }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
