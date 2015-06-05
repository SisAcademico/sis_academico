@extends('_layouts.app')
@section('titulo')
    @lang('Crear alumno')
@stop
@section ('estilos')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/pru.css')}}">
@stop
@section('titulo_cabecera')
    @lang('Alumnos')<small>@lang('')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.alumno')</a></li>
    <li class="active">@lang('sistema.insertar_alumno')s</li>
@stop

@section('contenido')
    <!-- Main row -->
    <div class="row">
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
            {{ Form::open(array('url' => 'pago','autocomplete' => 'off','class' => 'form-horizontal', 'role' => 'form')) }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Insertar Alumno</h3>
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
                        {{ Form::label('id_alumno', Lang::get('idalumno'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('id_alumno',null,array('class'=>'form-control','id'=>'id_alumno','placeholder'=>Lang::get('IdAlumno'))) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('nombres', Lang::get('nombres'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('nombres',null,array('class'=>'form-control','id'=>'nombres','placeholder'=>Lang::get('nombres'))) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('apellidos', Lang::get('apellidos'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('apellidos',null,array('class'=>'form-control','id'=>'apellidos','placeholder'=>Lang::get('apellidos'))) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('direccion', Lang::get('direccion'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('direccion',null,array('class'=>'form-control','id'=>'direccion','placeholder'=>Lang::get('direccion'))) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('telefono', Lang::get('telefono'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('telefono',null,array('class'=>'form-control','id'=>'telefono','placeholder'=>Lang::get('telefono'))) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('correo', Lang::get('correo'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('correo',null,array('class'=>'form-control','id'=>'correo','placeholder'=>Lang::get('correo'))) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('fecha_ingreso', Lang::get('fecha de ingreso'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input type="text" id="theInput" placeholder="Seleccione Fecha" />
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('foto', Lang::get('foto'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input type="file" id="foto">
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
                    {{ Form::submit(Lang::get('Crear Alumno'), array('class' => 'btn btn-info pull-right')) }}
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
