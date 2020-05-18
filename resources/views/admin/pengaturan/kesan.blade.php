@extends('admin.layouts.master')

@section('header')
    <link rel="stylesheet" href="{{asset('/adminres/css/modals.css')}}">
@endsection
@section('title')
    Kesan | Presonmu
@endsection
@section('content')
<div class="analytics-sparkle-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <div class="sparkline12-list mg-b-30 mg-t-30">
                    <div class="sparkline12-hd">
                        <div class="main-sparkline12-hd">
                            <h1>Kesan Mubaligh Hijrah</h1>
                        </div>
                    </div>
                    <div class="sparkline12-graph">
                        <div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Status</th>
                                            <th>Kesan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1
                                        @endphp
                                        @foreach ($kesan as $k)
                                        <tr>
                                            <td>{{$no}}</td>
                                            <td>{{$k->nama}}</td>
                                            <td>{{$k->status}}</td>
                                            <td>{{$k->kesan}}</td>
                                            <td><a class="btn btn-warning" style="border-radius: 3px;" href="#" data-toggle="modal" data-target="#ModalLihatGambar" onclick="showGambar('{{$k->gambar}}', '{{$k->nama}}')">Lihat Foto</a></td>
                                            <td><a class="btn btn-danger" style="border-radius: 3px;" href="#" data-toggle="modal" data-target="#ModalHapus" onclick="hapus('{{$k->id}}', '{{$k->nama}}')">Hapus</a></td>
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
                            <h1>Tambah Kesan Mubaligh Hijrah</h1>
                        </div>
                    </div>
                    <div class="sparkline12-graph">
                        <div class="panel-body">
                                {!! Form::open(['url' => '/dashboard/kesan/tambah', 'class' => 'uploader', 'accept-charset' => 'utf-8', 'enctype' => 'multipart/form-data']) !!}
                                {!! Form::text('nama', '', ['class' => 'form-control', 'placeholder' => 'Nama']) !!}
                                {!! Form::text('status', '', ['class' => 'form-control', 'placeholder' => 'Status']) !!}
                                {!! Form::textarea('kesan', '', ['class' => 'form-control', 'placeholder' => 'Kesan']) !!}
                                {!! Form::file('gambar', ['id' => 'file-input']) !!}
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
                </ol>
                
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active" style="">
                        <img id="imgCarousel1" data-src="holder.js/900x500/auto/#777:#555/text:First slide" alt="First slide" src="">
                        <div class="carousel-caption" style="left: 48.75px; right: 48.75px;">
                        </div>
                    </div>
                </div>
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

<div id="ModalHapus" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-4">
                <h4 class="modal-title">Hapus Kesan</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#" style="background: #F45846;"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                {{-- <i class="educate-icon educate-checked modal-check-pro"></i>
                <h2></h2> --}}
                <p id="hapusnama">Hapus Nama</p>
            </div>
            <div class="modal-footer">
                {{-- <a data-dismiss="modal" href="#">Tutup</a> --}}
                {!! Form::open(['url' => '/dashboard/kesan/hapus', 'style' => 'float: right']) !!}
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

        img1.src = "{{asset('storage/kesan')}}/"+Image;

        t.innerHTML = 'Foto '+title;
    }

    function hapus(id, nama) {
        var idhapusid = document.getElementById('hapusid');
        var idhapusnama = document.getElementById('hapusnama');
        
        idhapusid.value = id;
        idhapusnama.innerHTML = "Anda akan menghapus kesan dari "+nama;
    }
</script>
@endsection