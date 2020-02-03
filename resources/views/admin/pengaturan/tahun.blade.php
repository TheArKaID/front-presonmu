@extends('admin.layouts.master')

@section('title')
    Tahun Ajaran | Presonmu
@endsection

@section('content')
{{-- {{dd($tahun)}} --}}
<div class="analytics-sparkle-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline10-list mt-b-30">
                    <div class="sparkline10-hd">
                        <div class="main-sparkline10-hd">
                            <h1><span class="basic-ds-n">Tambah Tahun Ajaran</span></h1>
                        </div>
                    </div>
                    <div class="sparkline10-graph">
                        <div class="basic-login-form-ad">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="basic-login-inner inline-basic-form">
                                        @php
                                            $tahunmulai = session('tahunmulai');
                                            $tahunselesai = session('tahunselesai');
                                        @endphp
                                        {!! Form::open(['url' => '/dashboard/tahun/tambah']) !!}
                                            <div class="form-group-inner">
                                                <div class="row">
                                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                        {!! Form::number('tahunmulai', '', ['placeholder' => 'Tahun Mulai', 'maxlength' => '4', 'class' => 'form-control basic-ele-mg-b-10 responsive-mg-b-10', 'value' => '']) !!}
                                                    </div>
                                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                        {!! Form::number('tahunselesai', '', ['placeholder' => 'Tahun Selesai', 'maxlength' => '4', 'class' => 'form-control basic-ele-mg-b-10 responsive-mg-b-10', 'value' => '']) !!}
                                                    </div>
                                                    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                                                        <div class="login-btn-inner">
                                                            <div class="row">
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="login-horizental lg-hz-mg">
                                                                        {!! Form::submit('Tambah', ['class' => 'btn btn-sm btn-primary login-submit-cs']) !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline10-list mt-b-30">
                    <div class="sparkline10-hd">
                        <div class="main-sparkline10-hd">
                            <h1><span class="basic-ds-n">Pilih Tahun Aktif</span></h1>
                        </div>
                    </div>
                    <div class="sparkline10-graph">
                        <div class="basic-login-form-ad">
                            <div class="row">
                                {!! Form::open(['url' => '/dashboard/tahun/simpan']) !!}
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-select-list">
                                        {!! Form::select('tahun', [$tahun], $tahunaktif, ['class' => 'form-control custom-select-value']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                                    <div class="login-btn-inner">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <div class="login-horizental lg-hz-mg">
                                                    {!! Form::submit('Simpan', ['class' => 'btn btn-sm btn-primary login-submit-cs']) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection