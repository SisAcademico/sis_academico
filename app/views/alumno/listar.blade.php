@extends('_layouts.app')
@section('titulo')
    @lang('Crear alumno')
@stop
@section ('estilos')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/btn.css')}}">
@stop
@section('titulo_cabecera')
    @lang('Alumnos')<small>@lang('')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.alumno')</a></li>
    <li class="active">@lang('sistema.listar_alumno')</li>
@stop


@section('contenido')
    <!-- Main row -->
    <div class="negro">
    </div>
    <div class="google-expando--wrap">
      <div class="google-expando">

        <div class="google-expando__icon">    
          <a href="#"><span class='dada' style="font-size: 29px;color: rgba(255, 255, 255, 0.8);"> + </span></a>

        </div>
        <div class="google-expando__card" aria-hidden="true">
              {{ Form::open(array('url' => 'alumno', 'files' => true, 'class' => 'form-horizontal')) }}
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
                            {{ Form::label('nombres', Lang::get('DNI'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-10">
                                {{ Form::text('dni',null,array('class'=>'form-control','id'=>'dni','placeholder'=>Lang::get('DNI'))) }}
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
                                <input name='fecha' type="text" id="theInput" placeholder="Seleccione Fecha" />
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('foto', Lang::get('foto'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-10">
                                {{ Form::file('photo') }}
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        {{ Form::submit(Lang::get('Crear Alumno'), array('class' => 'btn btn-info pull-right')) }}
                    </div>
                </div>
                {{ Form::close() }}
        </div>

      </div>
    </div>
    <a href="nota/PDFA">Prueba PDF</a>

    <div class="row">
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Listado de Alumnos</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 20px">Id</th>
                            <th >Nombres</th>
                            <th >Correo</th>
                            <th >DNI</th>
                            <th >Estado</th>
                        </tr>
                        <!-- LISTAR ALUMNOS-->
                        @foreach($alumnos as $alu)
                        <tr>
                            <td>{{$alu->idalumno}}</td>
                            <td>{{$alu->nombres}} {{$alu->apellidos}}</td>
                            <td>{{$alu->correo}}</td>
                            <td>{{$alu->dni}}</td>
                            <td>{{$alu->estado}}</td>
                            <td>
                                <!--<a href="/sis_academico/public/alumno/{{ $alu->idalumno }}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                -->
                                <a href="/sis_academico/public/alumno/{{ $alu->idalumno }}/edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        
                    </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix text-center">
                    <ul class="pagination pagination-sm no-margin">
                        <li><a href="#">&laquo;</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div><!-- /.box -->
        </div>
        <!-- INICIO: BOX PANEL -->
    </div><!-- /.box -->
    @section ('scrips_n')
        <script src="{{asset('/js/ja1.js')}}" type="text/javascript"></script>
    @stop
@endsection
