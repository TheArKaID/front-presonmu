@extends('admin.layouts.master')

@section('header')
    <link rel="stylesheet" href="{{asset('/adminres/css/modals.css')}}">
@endsection

@section('title')
    Pendaftar | Presonmu
@endsection

@section('content')
<div class="analytics-sparkle-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline12-list mg-b-30 mg-t-30">
                    <div class="sparkline12-hd">
                        <div class="main-sparkline12-hd">
                            <h1>Pendaftar</h1>
                        </div>
                    </div>
                    <div class="sparkline12-graph">
                        <div class="static-table-list">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Email</th>
                                        <th>No HP</th>
                                        <th>Alasan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1
                                    @endphp
                                    @foreach ($pendaftar as $p)
                                    <tr>
                                        <td>{{$no}}</td>
                                        <td>{{$p->nama}}</td>
                                        <td>{{$p->jenis_kelamin=='L' ? 'Laki-laki' : 'Perempuan'}}</td>
                                        <td>{{$p->email}}</td>
                                        <td>{{$p->telpon}}</td>
                                        {{-- <td>{{$p->alasan}}</td> --}}
                                        <td><a class="btn btn-primary" style="background: #1e732f;border-radius: 3px;" href="#" data-toggle="modal" data-target="#PrimaryModalhdbgcl" onclick="showAlasan('{{$p->alasan}}')">Alasan</a></td>
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

<script>
    function showAlasan(message) {
        var p = document.getElementById('pMessage');
        p.innerHTML = message;
    }
</script>
@endsection