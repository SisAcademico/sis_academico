@extends('_layouts.app')
@section('titulo')
    @lang('Crear Aula_Carga')
@stop
@section ('estilos')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/pru.css')}}">
@stop
@section('titulo_cabecera')
    @lang('Aula Carga')<small>@lang('')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.aula_carga')</a></li>
    <li class="active">@lang('sistema.insertar_aula_carga')s</li>
@stop

@section('contenido')
    <!-- Main row -->
    <div class="row">
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
            {{ Form::open(array('url' => 'wilson','autocomplete' => 'off','class' => 'form-horizontal', 'role' => 'form')) }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Ingrese Datos De Aula Carga</h3>
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
                        {{ Form::label('id_carga_academica', Lang::get('Idcarga_Academica:'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('id_carga_academica',null,array('class'=>'form-control','id'=>'id_carga_academica','placeholder'=>Lang::get('idcarga_academica'))) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('idaula', Lang::get('IdAula:'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('idaula',null,array('class'=>'form-control','id'=>'idaula','placeholder'=>Lang::get('idaula'))) }}
                        </div>
                    </div>
                    
                </div>
                <div class="box-footer">
                <!-- 
                    Se debe insertar en talumno,
                    tfoto(auto_increment, fotoElegida),
                    en tusuario: idusuario = DNI, passwors =DNI //valores por defecto
                    el alumno y usuario tiene por defecto el estado "activo"
                -->
                    {{ Form::submit(Lang::get('Crear Aula_Carga'), array('class' => 'btn btn-info pull-right')) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
        <!-- INICIO: BOX PANEL -->
    </div><!-- /.box -->
    @section ('scrips_n')
        <script src="{{asset('/js/ja.js')}}" type="text/javascript"></script>
    @stop
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
@endsection