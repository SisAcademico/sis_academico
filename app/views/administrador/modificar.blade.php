@extends('_layouts.app')
@section('titulo')
    @lang('Modificar administrador')
@stop
@section ('estilos')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/pru.css')}}">
@stop
@section('titulo_cabecera')
    @lang('docentes')<small>@lang('')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.administrador')</a></li>
    <li class="active">@lang('sistema.modificar_administrador')es</li>
@stop

@section('contenido')
    <!-- Main row -->
    <div class="row">
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
            {{ Form::open(array('url' => 'formulario/'.$administradoraeditar[0]->idadministrador,'autocomplete' => 'off','class' => 'form-horizontal', 'role' => 'form')) }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">modificar administrador</h3>
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
                        {{ Form::label('id_administrador', Lang::get('idadministrador'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('IDADMINISTRADOR',Lang::get(''.$administradoraeditar[0]->idadministrador),array('class'=>'form-control','id'=>'id_administrador','placeholder'=>Lang::get('Idadministrador'))) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('dni', Lang::get('dni'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('DNI',Lang::get(''.$administradoraeditar[0]->dni),array('class'=>'form-control','id'=>'dni','placeholder'=>Lang::get('Iddocente'))) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('nombres', Lang::get('nombres'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('NOMBRES',Lang::get(''.$administradoraeditar[0]->nombres),array('class'=>'form-control','id'=>'nombres','placeholder'=>Lang::get('nombres'))) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('apellidos', Lang::get('apellidos'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('APELLIDOS',Lang::get(''.$administradoraeditar[0]->apellidos),array('class'=>'form-control','id'=>'apellidos','placeholder'=>Lang::get('apellidos'))) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('direccion', Lang::get('direccion'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('DIRECCION',Lang::get(''.$administradoraeditar[0]->direccion),array('class'=>'form-control','id'=>'direccion','placeholder'=>Lang::get('direccion'))) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('telefono', Lang::get('telefono'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('TELEFONO',Lang::get(''.$administradoraeditar[0]->telefono),array('class'=>'form-control','id'=>'telefono','placeholder'=>Lang::get('telefono'))) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('correo', Lang::get('correo'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('CORREO',Lang::get(''.$administradoraeditar[0]->correo),array('class'=>'form-control','id'=>'correo','placeholder'=>Lang::get('correo'))) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('foto', Lang::get('foto'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">                         
                            <input type="file" id="foto" value="c:/HOLA.jpg">
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('estado', Lang::get('estado'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('ESTADO',Lang::get(''.$administradoraeditar[0]->estado),array('class'=>'form-control','id'=>'estado','placeholder'=>Lang::get('estado'))) }}
                        </div>
                    </div>

                   
                </div>
                <div class="box-footer">
                <!-- 
                -->
                    {{ Form::submit(Lang::get('Guardar cambios'), array('class' => 'btn btn-info pull-right')) }}
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