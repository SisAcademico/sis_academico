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
            {{ Form::open(array('url' => 'formulario2/'.$asistenciaaeditar[0]->idadministrador,'autocomplete' => 'off','class' => 'form-horizontal', 'role' => 'form')) }}
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
                        {{ Form::label('idasistencia_docente', Lang::get('idasistencia_docente'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('idasistencia_docente',Lang::get(''.$asistenciaaeditar[0]->idasistencia_docente),array('class'=>'form-control','id'=>'idasistencia_docente','placeholder'=>Lang::get('idasistencia_docente'))) }}
                        </div>
                    </div>


                  <div class="form-group">
                        {{ Form::label('fecha', Lang::get('fecha'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input type="text" name = "fecha" value="<?php echo $asistenciaaeditar[0]->fecha_asist_doc?>" id="theInput" placeholder="Seleccione Fecha" />
                        </div>
                    </div>

                

                    <div class="form-group">
                        {{ Form::label('observacion', Lang::get('observacion'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('observacion',Lang::get(''.$asistenciaaeditar[0]->observacion),array('class'=>'form-control','id'=>'observacion','placeholder'=>Lang::get('observacion'))) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('tema', Lang::get('tema'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('tema',Lang::get(''.$asistenciaaeditar[0]->tema),array('class'=>'form-control','id'=>'tema','placeholder'=>Lang::get('tema'))) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('idcarga_academica', Lang::get('idcarga_academica'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('idcarga_academica',Lang::get(''.$asistenciaaeditar[0]->idcarga_academica),array('class'=>'form-control','id'=>'idcarga_academica','placeholder'=>Lang::get('idcarga_academica'))) }}
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