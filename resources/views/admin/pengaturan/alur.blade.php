@extends('admin.layouts.master')

@section('header')
    <link rel="stylesheet" href="{{asset('/adminres/css/modals.css')}}">
@endsection
@section('title')
    Alur | Presonmu
@endsection
@section('content')
<div class="analytics-sparkle-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <div class="sparkline12-list mg-b-30 mg-t-30">
                    <div class="sparkline12-hd">
                        <div class="main-sparkline12-hd">
                            <h1>Alur Mubaligh Hijrah</h1>
                        </div>
                    </div>
                    <div class="sparkline12-graph">
                        <div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Tanggal</th>
                                            <th>Deskripsi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1
                                        @endphp
                                        @foreach ($alur as $a)
                                        <tr>
                                            <td>{{$no}}</td>
                                            <td>{{$a->judul}}</td>
                                            <td>{{$a->tanggal}}</td>
                                            <td>{{$a->deskripsi}}</td>
                                            <td>
                                                <a class="btn btn-danger" style="border-radius: 3px;" href="#" data-toggle="modal" data-target="#ModalDelete" onclick="hapus('{{$a->id}}', '{{$a->judul}}')">Hapus</a>
                                                <a class="btn btn-warning" style="border-radius: 3px;" href="#" data-toggle="modal" data-target="#ModalEdit" onclick="edit('{{$a->id}}', '{{$a->judul}}', '{{$a->tanggal}}', '{{$a->deskripsi}}')">Edit</a>
                                            </td>
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
                            <h1>Tambah Alur Mubaligh Hijrah</h1>
                        </div>
                    </div>
                    <div class="sparkline12-graph">
                        <div class="panel-body">
                                {!! Form::open(['url' => '/dashboard/setting/alur/tambah', 'class' => 'uploader', 'accept-charset' => 'utf-8', 'enctype' => 'multipart/form-data']) !!}
                                {!! Form::text('judul', '', ['class' => 'form-control', 'placeholder' => 'Judul']) !!}
                                {!! Form::text('tanggal', '', ['class' => 'form-control', 'placeholder' => 'Tanggal']) !!}
                                {!! Form::textarea('deskripsi', '', ['class' => 'form-control', 'placeholder' => 'Deskripsi']) !!}
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

<div id="PrimaryModalhdbgcl" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-1">
                <h4 class="modal-title">Alasan Pendaftar</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                {{-- <i class="educate-icon educate-checked modal-check-pro"></i>
                <h2></h2> --}}
                <p id="pMessage">The Modal plugin is a dialog box/popup window that is displayed on top of the current page</p>
            </div>
            <div class="modal-footer">
                <a data-dismiss="modal" href="#">Tutup</a>
            </div>
        </div>
    </div>
</div>

<div id="ModalEdit" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-3">
                <h4 class="modal-title">Edit Alur</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#" style="background: #f39c12;"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                {{-- <i class="educate-icon educate-checked modal-check-pro"></i>
                <h2></h2> --}}
                <p id="pMessage">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline12-list">
                            {{-- <div class="sparkline12-hd">
                                <div class="main-sparkline12-hd">
                                    <h1>All Form Element</h1>
                                </div>
                            </div> --}}
                            <div class="sparkline12-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="all-form-element-inner">
                                                <form action="/dashboard/setting/alur/simpan" method="POST">
                                                    {{ csrf_field() }}
                                                    <input id="editid" type="hidden" name="id">
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Judul</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input id="editJudul" type="text" class="form-control" name="judul" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Tanggal</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <input id="editTanggal" type="text" class="form-control" name="tanggal" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <label class="login2 pull-right pull-right-pro">Deskripsi</label>
                                                            </div>
                                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                                <textarea id="editDeskripsi" class="form-control" name="deskripsi" required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group-inner">
                                                        <div class="row" style="float: right">
                                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                                <input type="submit" value="Simpan" class="btn btn-success">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </p>
            </div>
            <div class="modal-footer">
                <a data-dismiss="modal" href="#" style="background: #f39c12">Batal</a>
                {{-- <a data-dismiss="modal" href="#" style="background: #1e732f">Simpan</a> --}}
            </div>
        </div>
    </div>
</div>

<div id="ModalDelete" class="modal modal-edu-general FullColor-popup-DangerModal fade in" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-4">
                <h4 class="modal-title">Hapus Alur</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <span class="educate-icon educate-danger modal-check-pro information-icon-pro"></span>
                <h2 id="hapusjudul">Danger!</h2>
                <p>Anda akan menghapus Alur ini</p>
            </div>
            <div class="modal-footer danger-md">
                <button data-dismiss="modal" href="#" class="btn btn-success">Cancel</button>
                {{-- <a href="#">Process</a> --}}
                {!! Form::open(['url' => '/dashboard/setting/alur/hapus', 'style' => 'float: right']) !!}
                {!! Form::hidden('id', '', ['id' => 'hapusid']) !!}
                {!! Form::submit('Hapus', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script>
    function edit(id, judul, tanggal, deskripsi) {
        var idid = document.getElementById('editid');
        var idjudul = document.getElementById('editJudul');
        var idtanggal = document.getElementById('editTanggal');
        var iddeskripsi = document.getElementById('editDeskripsi');

        idid.value = id;
        idjudul.value = judul;
        idtanggal.value = tanggal;
        iddeskripsi.value = deskripsi;
    };

    function hapus(id, judul) {
        var idhapusid = document.getElementById('hapusid');
        var idhapusjudul = document.getElementById('hapusjudul');
        console.log(judul);
        idhapusid.value = id;
        idhapusjudul.innerHTML = judul;
    }
</script>
@endsection