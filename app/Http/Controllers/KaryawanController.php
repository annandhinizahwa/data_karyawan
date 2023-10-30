<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawans = Karyawan::get();
        return view('index', compact('karyawans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_masuk' => 'required',
            'tanggal_lahir' => 'required',
        ]);

        $tanggal_lahir = $request->tanggal_lahir;
        $tahun_lahir = date('Y', strtotime($tanggal_lahir));

        $tanggal_masuk = $request->tanggal_masuk;
        $tahun_masuk = date('Y', strtotime($tanggal_masuk));

        $urutan_masuk_terakhir = Karyawan::whereYear('tanggal_masuk', $tahun_masuk)->max('urutan_masuk');
        $urutan_masuk_terakhir = str_pad($urutan_masuk_terakhir + 1, 4, '0', STR_PAD_LEFT);

        $nik = $tahun_lahir . "." . $tahun_masuk . "." . $urutan_masuk_terakhir;

        Karyawan::create([
            'nik' => $nik,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_lahir' => $request->tanggal_lahir,
            'urutan_masuk' => $urutan_masuk_terakhir, // menyimpan urutan masuk karyawan
        ]);

        return redirect()->route('karyawan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Karyawan $karyawan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $karyawans = Karyawan::where('id', $id)->first();
        return view('edit', compact('karyawans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_masuk' => 'required',
            'tanggal_lahir' => 'required',
        ]);

        Karyawan::where('id', $id)->update([
            // 'nik' => $nik,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        return redirect()->route('karyawan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Karyawan::where('id', $id)->delete();

        return redirect(route('karyawan.index'));
    }
}
