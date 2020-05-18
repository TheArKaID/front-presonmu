<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function tahunAktif()
    {
        return \App\Informasi::all()->first()->tahun_aktif;    
    }
    
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

        $tahunajaran = $this->tahunAktif();
        $pendaftar = \App\Pendaftar::where('tahun', $tahunajaran);
        $peserta = \App\User::where('tahun', $tahunajaran);
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
        $tahun = \App\Tahun::pluck('ajaran', 'ajaran');
        // dd($tahunaktif);
        // dd($tahun);
        return view('admin.pengaturan.tahun', ['tahun' => $tahun, 'tahunaktif' => $this->tahunAktif()]);
    }

    public function tentang()
    {
        $tentang = \App\Tentang::all()->first();

        return view('admin.pengaturan.tentang', ['tentang' => $tentang]);
    }

    public function kegiatan()
    {
        $kegiatan = \App\Kegiatan::all();
        return view('admin.pengaturan.kegiatan', ['kegiatan' => $kegiatan]);
    }

    public function alur()
    {
        $alur = \App\Alur::all();
        return view('admin.pengaturan.alur', ['alur' => $alur]);
    }

    public function kesan()
    {
        $kesan = \App\Kesan::all();
        return view('admin.pengaturan.kesan', ['kesan' => $kesan]);
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

        return redirect('/dashboard/tahun')->with('sukses', 'Tahun Ajaran Berhasil Ditambahkan');
    }

    public function simpanTahun(Request $request)
    {
        $informasi = \App\Informasi::all()->first();
        $informasi->tahun_aktif = $request->tahun;
        $informasi->save();
        // dd($informasi->tahun_aktif);
        return redirect('/dashboard/tahun')->with('sukses', 'Tahun Aktif Telah Diubah');
    }

    public function pendaftar()
    {
        $pendaftar = \App\Pendaftar::where('tahun', $this->tahunAktif())->get();
        
        return view('admin.pendaftar', ['pendaftar' => $pendaftar]);
    }

    public function simpanTentang(Request $request)
    {
        $tentang = \App\Tentang::all()->first();
        $tentang->update($request->all());
        $tentang->save();

        return redirect('/dashboard/tentang/')->with('sukses', 'Data Tentang telah diubah');
    }

    public function tambahKegiatan(Request $request)
    {
        $this->validate($request,[
            'judul' => 'required',
            'deskripsi' => 'required',
            'images' => 'required',
            'images.*' => 'required|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        $input=$request->all();
        $images=array();
        if($files=$request->file('images')){
            if(sizeof($files)!=3){
                return redirect('/dashboard/kegiatan')->withErrors(['Gagal'=>'Gambar harus berjumlah 3']);
            }
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move('front/img/kegiatan',$name);
                $images[]=$name;
            }
        }

        \App\Kegiatan::insert( [
            'judul' => $input['judul'],
            'deskripsi' =>$input['deskripsi'],
            'gambar'=>  implode("|",$images),
        ]);

        return redirect('/dashboard/kegiatan')->with('sukses', 'Kegiatan Berhasil Ditambah');
 
    }

    public function tambahAlur(Request $request)
    {
        $this->validate($request,[
            'judul' => 'required',
            'tanggal' => 'required',
            'deskripsi' => 'required',
        ]);
        
        $input=$request->all();

        \App\Alur::insert( [
            'judul' => $input['judul'],
            'tanggal' =>$input['tanggal'],
            'deskripsi' =>$input['deskripsi']
        ]);

        return redirect('/dashboard/alur')->with('sukses', 'Alur Berhasil Ditambah');
 
    }

    public function simpanAlur(Request $request)
    {
        $this->validate($request,[
            'judul' => 'required',
            'tanggal' => 'required',
            'deskripsi' => 'required',
        ]);
        
        $input=$request->all();

        $alur = \App\Alur::find($input['id']);
        $alur->update($input);

        return redirect('/dashboard/alur')->with('sukses', 'Alur Berhasil Diubah'); 
    }

    public function hapusAlur(Request $request)
    {
        $input = $request->all();
        $alur = \App\Alur::find($input['id']);
        $alur->delete();

        return redirect('/dashboard/alur')->with('sukses', 'Alur Berhasil Dihapus'); 
    }

    public function tambahKesan(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'status' => 'required',
            'kesan' => 'required',
            'gambar' => 'required'
        ]);
        
        $input=$request->all();
        $gambar="";
        if($file=$request->file('gambar')){
                $name=$file->getClientOriginalName();
                $file->move('front/img/kesan',$name);
                $gambar=$name;
        }

        \App\Kesan::insert( [
            'nama' => $input['nama'],
            'status' =>$input['status'],
            'kesan' =>$input['kesan'],
            'gambar'=>  $gambar
        ]);

        return redirect('/dashboard/kesan')->with('sukses', 'Kesan Berhasil Ditambah');
    }

    public function hapusKesan(Request $request)
    {
        $input = $request->all();
        $Kesan = \App\Kesan::find($input['id']);
        $Kesan->delete();

        return redirect('/dashboard/kesan')->with('sukses', 'Kesan Berhasil Dihapus'); 
    }
}
