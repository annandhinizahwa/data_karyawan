<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFDownloadController extends Controller
{
    public function laporan()
    {
        $judul = 'LAPORAN';
        $karyawans = Karyawan::get();

        $pdf = PDF::loadView('laporan', compact('karyawans','judul'))
            ->setPaper(array(0, 0, 609.4488, 935.433), 'portrait');

        return $pdf->download('Laporan.pdf');
    }
}
