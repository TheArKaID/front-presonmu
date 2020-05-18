<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Kegiatan;
use App\Kesan;

class AdminController extends Controller
{
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
            return redirect('/dashboard/setting/tahun')->withErrors(['tahunbeda'=>'The different should be 1 year'])->with(['tahunmulai' => $request->tahunmulai, 'tahunselesai' => $request->tahunselesai]);
        }

        $ajaran = new \App\Tahun;
        $ajaran->ajaran = $request->tahunmulai .'/'. $request->tahunselesai;
        $ajaran->save();

        return redirect('/dashboard/setting/tahun')->with('sukses', 'Tahun Ajaran Berhasil Ditambahkan');
    }

    public function simpanTahun(Request $request)
    {
        $informasi = \App\Informasi::all()->first();
        $informasi->tahun_aktif = $request->tahun;
        $informasi->save();
        // dd($informasi->tahun_aktif);
        return redirect('/dashboard/setting/tahun')->with('sukses', 'Tahun Aktif Telah Diubah');
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

        return redirect('/dashboard/setting/tentang')->with('sukses', 'Data Tentang telah diubah');
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
        
        if(!$request->hasFile('images')){
            return redirect('/dashboard/setting/kegiatan')->withErrors(['Gagal'=>'Harap Masukkan Gambar']);
        }

        $files=$request->file('images');
        if(sizeof($files)!=3){
            return redirect('/dashboard/setting/kegiatan')->withErrors(['Gagal'=>'Gambar harus berjumlah 3']);
        }
        
        $kegiatan = new Kegiatan;
        $kegiatan->judul = $input['judul'];
        $kegiatan->deskripsi = $input['deskripsi'];
        $kegiatan->gambar = "";
        $kegiatan->save();
        $no = 1;

        foreach($files as $file){
            $ext = $file->getClientOriginalExtension();
            $name = 'K'. $kegiatan->id .'-'. $no++ .'.'. $ext;
            $file->storeAs('public/kegiatan', $name);
            $images[]=$name;
        }

        $kegiatan->gambar = implode("|",$images);
        $kegiatan->save();

        return redirect('/dashboard/setting/kegiatan')->with('sukses', 'Kegiatan Berhasil Ditambah');
 
    }

    public function hapusKegiatan(Request $request)
    {
        $kegiatan = Kegiatan::find($request->id);
        $images = explode('|', $kegiatan->gambar);
        foreach ($images as $image) {
            Storage::delete('public/kegiatan/'.$image);
        }

        $kegiatan->delete();

        return redirect('/dashboard/setting/kegiatan')->with('sukses', 'Kegiatan Berhasil Dihapus'); 
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

        return redirect('/dashboard/setting/alur')->with('sukses', 'Alur Berhasil Ditambah');
 
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

        return redirect('/dashboard/setting/alur')->with('sukses', 'Alur Berhasil Diubah'); 
    }

    public function hapusAlur(Request $request)
    {
        $input = $request->all();
        $alur = \App\Alur::find($input['id']);
        $alur->delete();

        return redirect('/dashboard/setting/alur')->with('sukses', 'Alur Berhasil Dihapus'); 
    }

    public function tambahKesan(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'status' => 'required',
            'kesan' => 'required',
            'gambar' => 'required|mimes:jpeg,png,jpg|max:2048'
        ]);
        
        $gambar="";
        
        // Input data terlebih dahulu
        $kesan = new Kesan;
        $kesan->nama = $request->nama;
        $kesan->status = $request->status;
        $kesan->kesan = $request->kesan;
        $kesan->gambar = $gambar;
        $kesan->save();

        // Pindahkan Gambar
        $ext = $request->file('gambar')->getClientOriginalExtension();
        $name = 'K'. $kesan->id .'.'. $ext;
        $request->file('gambar')->storeAs('public/kesan', $name);
        $gambar=$name;

        //Update data kesan dengan nama gambar
        $kesan->gambar = $gambar;
        $kesan->save();

        // Alihkan dengan sukses
        return redirect('/dashboard/setting/kesan')->with('sukses', 'Kesan Berhasil Ditambah');
    }

    public function hapusKesan(Request $request)
    {
        // Cari kesan berdasarkan ID
        $Kesan = Kesan::find($request->id);
        
        //Hapus Kesan di Storage
        Storage::delete('public/kesan/'.$Kesan->gambar);

        // Hapus kesan di DB
        $Kesan->delete();

        // Alihkan dengan sukses
        return redirect('/dashboard/setting/kesan')->with('sukses', 'Kesan Berhasil Dihapus'); 
    }
}
