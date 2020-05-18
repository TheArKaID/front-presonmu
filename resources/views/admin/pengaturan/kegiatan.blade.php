@extends('admin.layouts.master')

@section('header')
    <link rel="stylesheet" href="{{asset('/adminres/css/modals.css')}}">
@endsection
@section('title')
    Kegiatan | Presonmu
@endsection
@section('content')
<div class="analytics-sparkle-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <div class="sparkline12-list mg-b-30 mg-t-30">
                    <div class="sparkline12-hd">
                        <div class="main-sparkline12-hd">
                            <h1>Kegiatan Mubaligh Hijrah</h1>
                        </div>
                    </div>
                    <div class="sparkline12-graph">
                        <div>
                            <div class="static-table-list">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th style="word-wrap: break-word; max-width: 200px;">Deskripsi</th>
                                            <th>Gambar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1
                                        @endphp
                                        @foreach ($kegiatan as $k)
                                        <tr>
                                            <td>{{$no}}</td>
                                            <td>{{$k->judul}}</td>
                                            <td style="word-wrap: break-word; max-width: 200px;">{{$k->deskripsi}}</td>
                                            <td><a class="btn btn-warning" style="border-radius: 3px" href="#" data-toggle="modal" data-target="#ModalLihatGambar" onclick="showGambar('{{$k->gambar}}', '{{$k->judul}}')">Lihat</a></td>
                                            <td><a class="btn btn-danger" style="border-radius: 3px" href="#" data-toggle="modal" data-target="#PrimaryModalhdbgcl" onclick="hapus('{{$k->id}}', '{{$k->judul}}')">Hapus</a></td>
                                        </tr>
                                        @php
                                            $no++;
                                        @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="sparkline12-list mg-b-30 mg-t-30">
                    <div class="sparkline12-hd">
                        <div class="main-sparkline12-hd">
                            <h1>Tambah Kegiatan Mubaligh Hijrah</h1>
                        </div>
                    </div>
                    <div class="sparkline12-graph">
                        <div class="panel-body">
                                {!! Form::open(['url' => '/dashboard/kegiatan/tambah', 'class' => 'uploader', 'accept-charset' => 'utf-8', 'enctype' => 'multipart/form-data']) !!}
                                {!! Form::text('judul', '', ['class' => 'form-control', 'placeholder' => 'Judul']) !!}
                                {!! Form::textarea('deskripsi', '', ['class' => 'form-control', 'placeholder' => 'Deskripsi']) !!}
                                <div class="row" style="float: right"><p style="margin-right: 10px;font-size: 14px;color:#999;font-weight: 300;">*Anda harus memasukkan 3 Gambar</p></div>
                                {!! Form::file('images[]', ['multiple' => '', 'id' => 'file-input']) !!}
                                {!! Form::submit('Tambah', ['class' => 'btn btn-primary']) !!}
                                {!! Form::close() !!}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="ModalLihatGambar" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-1">
                <h4 id="ModalTitleGambar" class="modal-title">Gambar</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">

                {{-- CAROUSEL --}}
                {{-- ====== --}}
                <div id="myCarousel" class="carousel slide carousel-fit" data-ride="carousel" data-interval="60000" style="margin-top: 0px; height: 400px;">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class=""></li>
                    <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="2" class=""></li>
                </ol>
                
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active" style="">
                        <img id="imgCarousel1" data-src="holder.js/900x500/auto/#777:#555/text:First slide" alt="First slide" src="">
                        <div class="carousel-caption" style="left: 48.75px; right: 48.75px;">
                        </div>
                    </div>
                    <div class="item" style="">
                        <img id="imgCarousel2" data-src="holder.js/750x400/auto/#666:#444/text:Second slide" alt="Second slide" src="">
                        <div class="carousel-caption" style="left: 48.75px; right: 48.75px;">
                        </div>
                    </div>
                    <div class="item" style="">
                        <img id="imgCarousel3" data-src="holder.js/600x300/auto/#555:#333/text:Third slide" alt="Third slide" src="">
                        <div class="carousel-caption" style="left: 48.75px; right: 48.75px;">
                        </div>
                    </div>
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
                {{-- ===== --}}
                {{-- END CAROUSEL --}}

            </div>
            <div class="modal-footer">
                <a data-dismiss="modal" href="#">Tutup</a>
            </div>
        </div>
    </div>
</div>

<div id="PrimaryModalhdbgcl" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-4">
                <h4 class="modal-title">Hapus Kegiatan</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close bg-color-4" data-dismiss="modal" style="background: #F45846;" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                {{-- <i class="educate-icon educate-checked modal-check-pro"></i>
                <h2></h2> --}}
                <p id="hapusnama">Hapus Pesan</p>
                <p>Semua gambar terkait akan dihapus.</p>
            </div>
            <div class="modal-footer">
                {{-- <a data-dismiss="modal" href="#">Tutup</a> --}}
                {!! Form::open(['url' => '/dashboard/kegiatan/hapus', 'style' => 'float: right']) !!}
                {!! Form::hidden('id', '', ['id' => 'hapusid']) !!}
                {{-- <a href="#" data-dismiss="modal" class="btn btn-primary">Tutup</a> --}}
                {!! Form::submit('Hapus', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script>
    function showGambar(Image, title) {
        var t = document.getElementById('ModalTitleGambar');
        var img1 = document.getElementById('imgCarousel1');
        var img2 = document.getElementById('imgCarousel2');
        var img3 = document.getElementById('imgCarousel3');

        var srcimg = Image.split("|");
        var srcimg1 = srcimg[0];
        var srcimg2 = srcimg[1];
        var srcimg3 = srcimg[2];

        img1.src = "{{asset('storage/kegiatan/')}}/"+srcimg1;
        img2.src = "{{asset('storage/kegiatan/')}}/"+srcimg2;
        img3.src = "{{asset('storage/kegiatan/')}}/"+srcimg3;

        t.innerHTML = 'Gambar untuk '+title;
    }
    
    function hapus(id, nama) {
        var idhapusid = document.getElementById('hapusid');
        var idhapusnama = document.getElementById('hapusnama');
        console.log(nama);
        idhapusid.value = id;
        idhapusnama.innerHTML = "Anda yakin ingin menghapus Kegiatan  " +nama+ " ini ?";
    }
</script>
@endsection