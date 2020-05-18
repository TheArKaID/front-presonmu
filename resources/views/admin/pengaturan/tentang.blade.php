@extends('admin.layouts.master')

@section('header')
    <link href="{{asset('/front/vendor/fontawesome-free/css/all.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/adminres/dist/css/fontawesome-iconpicker.min.css')}}" rel="stylesheet">
@endsection

@section('title')
    Tentang | Presonmu
@endsection

@section('content')
<div class="analytics-sparkle-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline12-list mg-b-30 mg-t-30">
                    <div class="sparkline12-hd">
                        <div class="main-sparkline12-hd">
                            <h1>Tentang Mubaligh Hijrah</h1>
                        </div>
                    </div>
                    <div class="sparkline12-graph">
                        <div class="panel-body">
                            {!! Form::open(['url' => '/dashboard/setting/tentang/simpan']) !!}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Info 1</label>
                                    </div>
                                    <div class="form-group">
                                        <div class="btn-group" style="text-align: center">
                                            <button type="button" class="btn btn-primary iconpicker-component"><i
                                                    class="{{$tentang->icon1}}"></i></button>
                                            <button type="button" class="icp icinfo1 btn btn-primary dropdown-toggle"
                                                    data-selected="fa-car" data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu"></div>
                                        </div> 
                                        <span class="fa-stack fa-4x" style="float: right">
                                            <i class="fas fa-circle fa-stack-2x text-warning"></i>
                                            <i class="{{$tentang->icon1}} fa-stack-1x fa-inverse picker-target1"></i>
                                        </span>
                                        {!! Form::text('judul1', $tentang->judul1, ['class' => 'form-control', 'placeholder' => 'Judul']) !!}
                                        {!! Form::textarea('deskripsi1', $tentang->deskripsi1, ['class' => 'form-control', 'placeholder' => 'Deskripsi']) !!}
                                        {!! Form::hidden('icon1', $tentang->icon1) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Info 2</label>
                                    </div>
                                    <div class="form-group">
                                        <div class="btn-group" style="text-align: center">
                                            <button type="button" class="btn btn-primary iconpicker-component"><i
                                                    class="{{$tentang->icon2}}"></i></button>
                                            <button type="button" class="icp icinfo2 btn btn-primary dropdown-toggle"
                                                    data-selected="fa-car" data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu"></div>
                                        </div> 
                                        <span class="fa-stack fa-4x" style="float: right">
                                            <i class="fas fa-circle fa-stack-2x text-warning"></i>
                                            <i class="{{$tentang->icon2}} fa-stack-1x fa-inverse picker-target2"></i>
                                        </span>
                                        {!! Form::text('judul2', $tentang->judul2, ['class' => 'form-control', 'placeholder' => 'Judul']) !!}
                                        {!! Form::textarea('deskripsi2', $tentang->deskripsi2, ['class' => 'form-control', 'placeholder' => 'Deskripsi']) !!}
                                        {!! Form::hidden('icon2', $tentang->icon2) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Info 3</label>
                                    </div>
                                    <div class="form-group">
                                        <div class="btn-group" style="text-align: center">
                                            <button type="button" class="btn btn-primary iconpicker-component"><i
                                                    class="{{$tentang->icon3}}"></i></button>
                                            <button type="button" class="icp icinfo3 btn btn-primary dropdown-toggle"
                                                    data-selected="fa-car" data-toggle="dropdown">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu"></div>
                                        </div> 
                                        <span class="fa-stack fa-4x" style="float: right">
                                            <i class="fas fa-circle fa-stack-2x text-warning"></i>
                                            <i class="{{$tentang->icon3}} fa-stack-1x fa-inverse picker-target3"></i>
                                        </span>
                                        {!! Form::text('judul3', $tentang->judul3, ['class' => 'form-control', 'placeholder' => 'Judul']) !!}
                                        {!! Form::textarea('deskripsi3', $tentang->deskripsi3, ['class' => 'form-control', 'placeholder' => 'Deskripsi']) !!}
                                        {!! Form::hidden('icon3', $tentang->icon3) !!}
                                    </div>
                                </div>
                            </div>
                            {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                            {!! Form::close() !!}
                        </div>
                        <div style="display: none" class="panel-footer">
                            <button type="hidden" class="btn btn-default action-create"></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script src="//code.jquery.com/jquery-2.2.1.min.js"></script>
<script src="{{asset('/adminres/dist/js/fontawesome-iconpicker.js')}}"></script>
<script>
    $(function () {
        $('.action-create').on('click', function () {
            $('.icp').iconpicker();
            $('.icinfo1').on('iconpickerSelected', function(event){
                $('.picker-target1').get(0).className = 'picker-target1 fa-stack-1x fa-inverse ' +
                event.iconpickerInstance.options.fullClassFormatter(event.iconpickerValue);
                $('[name="icon1"]').get(0).value =
                event.iconpickerInstance.options.fullClassFormatter(event.iconpickerValue);
            });
            $('.icinfo2').on('iconpickerSelected', function(event){
                $('.picker-target2').get(0).className = 'picker-target2 fa-stack-1x fa-inverse ' +
                event.iconpickerInstance.options.fullClassFormatter(event.iconpickerValue);
                $('[name="icon2"]').get(0).value =
                event.iconpickerInstance.options.fullClassFormatter(event.iconpickerValue);
            });
            $('.icinfo3').on('iconpickerSelected', function(event){
                $('.picker-target3').get(0).className = 'picker-target3 fa-stack-1x fa-inverse ' +
                event.iconpickerInstance.options.fullClassFormatter(event.iconpickerValue);
                $('[name="icon3"]').get(0).value =
                event.iconpickerInstance.options.fullClassFormatter(event.iconpickerValue);
            });
        }).trigger('click');
    });
</script>
@endsection