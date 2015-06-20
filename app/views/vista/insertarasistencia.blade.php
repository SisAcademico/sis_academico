@extends('_layouts.app')
@section('titulo')
    @lang('Asistencia de Docentes')
@stop
@section ('estilos')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/pru.css')}}">
@stop
@section('titulo_cabecera')
    @lang('Asistencia Docentes')<small>@lang('')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.administrador')</a></li>
    <li class="active">@lang('sistema.administrador')es</li>
@stop

@section('contenido')
    <!-- Main row -->
    <div class="row">
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
        {{ Form::open(array('url' => 'formulario2','autocomplete' => 'off','class' => 'form-horizontal', 'role' => 'form')) }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Insertar administrador</h3>
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
                        {{ Form::label('idasistencia_docente', Lang::get('idasistencia'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('idasistencia_docente',null,array('class'=>'form-control','id'=>'idasistencia_docente','placeholder'=>Lang::get('idasistencia_docente'))) }}
                        </div>
                    </div>

                  <div class="form-group">
                        {{ Form::label('fecha', Lang::get('fecha'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input type="text" name = "fecha" id="theInput" placeholder="Seleccione Fecha" />
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('observacion', Lang::get('observacion'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('observacion',null,array('class'=>'form-control','id'=>'observacion','placeholder'=>Lang::get('observacion'))) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('tema', Lang::get('tema'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('tema',null,array('class'=>'form-control','id'=>'tema','placeholder'=>Lang::get('tema'))) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('idcarga_academica', Lang::get('idcarga_academica'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('idcarga_academica',null,array('class'=>'form-control','id'=>'idcarga_academica','placeholder'=>Lang::get('idcarga_academica'))) }}
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
                    {{ Form::submit(Lang::get('Guardar Asistencia'), array('class' => 'btn btn-info pull-right')) }}
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