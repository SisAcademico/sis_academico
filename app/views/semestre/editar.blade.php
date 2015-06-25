@extends('_layouts.app')
@section('titulo')
	{{Lang::get('sistema.semestre')}}
@stop
@section ('estilos')
    <link rel="stylesheet" type="text/css" href="{{asset('/adminlte/plugins/datepicker/css/bootstrap-datepicker3.standalone.css')}}">
@stop
@section('titulo_cabecera')
    @lang('sistema.semestre')<small>@lang('sistema.agregar_semestre')</small>
@stop
@section('ruta_navegacion')
    <li><a href="{{ URL::to( '/semestre') }}"><i class="fa fa-list"></i> @lang('sistema.semestre')</a></li>
    <li class="active">@lang('sistema.agregar_semestre')s</li>
@stop

@section('contenido')
    <!-- Main row -->
	<div class="row">
		<!-- INICIO: BOX PANEL -->
		<div class="col-md-12 col-sm-8">
		@foreach($semestre as $sem)
            {{ Form::open(array('url' => 'semestre/'.$sem->idsemestre,'autocomplete' => 'off','method' => 'put','class' => 'form-horizontal', 'role' => 'form')) }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Agregar semestre</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <ul class="error_list">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                {{ Form::label('idsemestre', Lang::get('sistema.semestre'),array('class'=>'col-sm-2 control-label')) }}
                <div class="col-sm-3">
                     {{ Form::text('idsemestre',$sem->idsemestre,array('class'=>'form-control','id'=>'idsemestre','placeholder'=>Lang::get('sistema.ejemplo').': 2015-I')) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('fecha_inicio', Lang::get('sistema.fecha_inicio'),array('class'=>'col-sm-2 control-label')) }}
                <div class="col-sm-3">
                    <div class="input-group input-group-sm">
                        {{ Form::text('fecha_inicio',$sem->fecha_inicio,array('class'=>'form-control fecha_cal required','id'=>'fecha_inicio','placeholder'=>Lang::get('sistema.formato_fecha'),'readonly'=>'readonly')) }}
                        <span class="input-group-btn">
                          <button class="btn bg-purple btn-flat btn_calen" type="button"><i class="fa fa-calendar"></i></button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('fecha_fin', Lang::get('sistema.fecha_fin'),array('class'=>'col-sm-2 control-label')) }}
                <div class="col-sm-3">
                    <div class="input-group input-group-sm">
                        {{ Form::text('fecha_fin',$sem->fecha_fin,array('class'=>'form-control fecha_cal','id'=>'fecha_fin','placeholder'=>Lang::get('sistema.formato_fecha'),'readonly'=>'readonly')) }}
                        <span class="input-group-btn">
                          <button class="btn bg-purple btn-flat btn_calen" type="button"><i class="fa fa-calendar"></i></button>
                        </span>
                    </div>
                </div>
            </div>

                </div>
                <div class="box-footer">
                    {{ Form::submit(Lang::get('sistema.actualizar_semestre'), array('class' => 'btn btn-info pull-right')) }}
                </div>
            </div>
            {{ Form::close() }}
			@endforeach
		</div>
	  <!-- INICIO: BOX PANEL -->
	</div><!-- /.box -->
@endsection
@section ('scrips_n')
    <script src="{{asset('/adminlte/plugins/datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/adminlte/plugins/datepicker/locales/bootstrap-datepicker.es.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('/js/sis_academico.js')}}" type="text/javascript"></script>
@stop
