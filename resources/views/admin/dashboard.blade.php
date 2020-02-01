@extends('admin.layouts.master')

@section('content')
<div class="analytics-sparkle-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="analytics-sparkle-line reso-mg-b-30">
                    <div class="analytics-content">
                        <h5>Pendaftar</h5>
                        <h2><span class="counter">{{$pendaftar->count()}}</span> <span class="tuition-fees">Orang</span></h2>
                        <span class="text-success">{{$pendaftar->count()}}%</span>
                        <div class="progress m-b-0">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:{{$pendaftar->count()}}%;"> <span class="sr-only">{{$pendaftar->count()}}% Complete</span> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="analytics-sparkle-line reso-mg-b-30">
                    <div class="analytics-content">
                        <h5>Peserta</h5>
                        <h2><span class="counter">{{$peserta->count()}}</span> <span class="tuition-fees">Orang</span></h2>
                        <span class="text-danger">{{$peserta->count()}}%</span>
                        <div class="progress m-b-0">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:{{$peserta->count()}}%;"> <span class="sr-only">{{$peserta->count()}}% Complete</span> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="analytics-sparkle-line reso-mg-b-30 table-mg-t-pro dk-res-t-pro-30">
                    <div class="analytics-content">
                        <h5>Presensi Sesi 1</h5>
                        @php
                            $a = $sesi1->count();
                            $b = $peserta->count();
                            if($a!=0 || $b!=0)
                                $presensi1 = round(($a/$b)*100);
                            else
                                $presensi1 = 0;
                        @endphp
                        <h2><span class="counter">{{$sesi1->count()}}</span> <span class="tuition-fees">Orang</span></h2>
                        <span class="text-info">{{$presensi1}}%</span>
                        <div class="progress m-b-0">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:{{$presensi1}}%;"> <span class="sr-only">{{$sesi1->count()}}% Complete</span> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="analytics-sparkle-line table-mg-t-pro dk-res-t-pro-30">
                    <div class="analytics-content">
                        <h5>Presensi Sesi 2</h5>
                        @php
                            $a = $sesi2->count();
                            $b = $peserta->count();
                            if($a!=0 || $b!=0)
                                $presensi2 = round(($a/$b)*100);
                            else
                                $presensi2 = 0;
                        @endphp
                        <h2><span class="counter">{{$sesi2->count()}}</span> <span class="tuition-fees">Orang</span></h2>
                        <span class="text-inverse">{{$presensi2}}%</span>
                        <div class="progress m-b-0">
                            <div class="progress-bar progress-bar-inverse" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:{{$presensi2}}%;"> <span class="sr-only">{{$sesi2->count()}}% Complete</span> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="float: right"><span style="margin-right: 10px;font-size: 14px;float: right;margin-top: 8px;color:#999;font-weight: 300;">*Data Presensi Perharinya akan di reset pukul 12.00+-(WIB)</span></div>
    </div>
</div>
@endsection