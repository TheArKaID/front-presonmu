<?php

namespace App\Http\Controllers;

use \App\Pendaftar;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home()
    {
        $tentang = \App\Tentang::all()->first();
        $kegiatan = \App\Kegiatan::all();

        return view('home', [
            'tentang' => $tentang,
            'kegiatan' => $kegiatan
        ]);
    }

    public function daftar(Request $request)
    {
        // dd($request->all());

        $pendaftar = new Pendaftar;

        $pendaftar->nama = $request->nama;
        $pendaftar->email = $request->email;
        $pendaftar->telpon = $request->telpon;
        $pendaftar->tahun = \App\Informasi::all()->first()->tahun_aktif;
        $pendaftar->jenis_kelamin = $request->jenis_kelamin;
        $pendaftar->alasan = $request->alasan===null ? '' : $request->alasan;
        $pendaftar->save();

        return redirect('/')->with('berhasil', 'Pendaftaran Berhasil. Silahkan tunggu info selanjutnya.');
    }

    // public function masadi()
    // {
    //     return view('masadi');
    // }
}
