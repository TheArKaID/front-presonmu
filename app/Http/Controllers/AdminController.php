<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function prosesLogin(Request $request)
    {
        // dd($request->all());
        // if(Auth::guard('admin')->attempt($request->only('email', 'password'))){
        //     // return redirect('/dashboard');
        //     $details = Auth::guard('admin')->user();
        //     $user = $details->all();
        //     echo "a<br>";
        //     dd($details);
        //     return redirect('dashboard');
        // }
        if(Auth::attempt($request->only('email', 'password'))){
            return redirect('/dashboard');
        }
        return redirect('/admin');
    }

    public function dashboard()
    {
        $start1 = Carbon::create(Carbon::now('America/Detroit')->format('Y-m-d').' 15:00:00');
        $end1 = Carbon::create(Carbon::now('America/Detroit')->format('Y-m-d').' 17:59:59');
        $start2 = Carbon::create(Carbon::now('America/Detroit')->format('Y-m-d').' 18:00:00');
        $end2 = Carbon::create(Carbon::now('America/Detroit')->format('Y-m-d').' 21:00:00');

        $pendaftar = \App\Pendaftar::all();
        $peserta = \App\User::all();
        $presensi1 = \App\Riwayat::whereBetween('created_at', [$start1, $end1])->get();
        $presensi2 = \App\Riwayat::whereBetween('created_at', [$start2, $end2])->get();
        // dd(Carbon::now('Asia/Jakarta'));
        return view('admin.dashboard', [
            'pendaftar' => $pendaftar,
            'peserta' => $peserta,
            'sesi1' => $presensi1,
            'sesi2' => $presensi2
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/admin');
    }

    public function tahun()
    {
        return view('admin.settings.tahun');
    }

    public function apaItu()
    {
        return view('admin.settings.apaitu');
    }

    public function kegiatan()
    {
        return view('admin.settings.kegiatan');
    }

    public function alur()
    {
        return view('admin.settings.alur');
    }

    public function kesan()
    {
        return view('admin.settings.kesan');
    }

    public function tambahTahun(Request $request)
    {
        $request->request->add(['ajaran' => $request->tahunmulai .'/'. $request->tahunselesai]);

        $this->validate($request,[
            'tahunmulai' => 'required|max:4',
            'tahunselesai' => 'required|max:4',
            'ajaran' => 'unique:tahun'
        ]);

        if(($request->tahunselesai-$request->tahunmulai)!=1){
            return redirect('/dashboard/tahun')->withErrors(['tahunbeda'=>'The different should be 1 year'])->with(['tahunmulai' => $request->tahunmulai, 'tahunselesai' => $request->tahunselesai]);
        }

        $ajaran = new \App\Tahun;
        $ajaran->ajaran = $request->tahunmulai .'/'. $request->tahunselesai;
        $ajaran->save();

        return redirect('/dashboard/tahun')->with('sukses', 'Tahun Ajaran Berhasil ditambahkan');
    }
}
