@extends('_layouts.app')
@section('titulo')
    @lang('Crear Carrera')
@stop
@section ('estilos')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/pru.css')}}">
@stop
@section('titulo_cabecera')
    @lang('Carreras')<small>@lang('')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.carrera')</a></li>
    <li class="active">@lang('sistema.carrera')es</li>
@stop

@section('contenido')
    <!-- Main row -->
    <div class="row">
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
        {{ Form::open(array('url' => 'formulario','autocomplete' => 'off','class' => 'form-horizontal', 'role' => 'form')) }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Insertar Carrera</h3>
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
                        {{ Form::label('idcarrera', Lang::get('Codigo Carrera'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('idcarrera',null,array('class'=>'form-control','id'=>'idcarrera','placeholder'=>Lang::get('Codigo Carrera'))) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('nombre_carrera', Lang::get('Nombre de la Carrera'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('nombre_carrera',null,array('class'=>'form-control','id'=>'nombre_carrera','placeholder'=>Lang::get('Nombre de la Carrera'))) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('nro_modulos', Lang::get('Nro. Modulos'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('nro_modulos',null,array('class'=>'form-control','id'=>'nro_modulos','placeholder'=>Lang::get('Nro. Modulos'))) }}
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
                    {{ Form::submit(Lang::get('Crear Carrera'), array('class' => 'btn btn-info pull-right')) }}
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