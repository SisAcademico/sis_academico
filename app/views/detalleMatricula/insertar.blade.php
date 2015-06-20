@extends('_layouts.app')
@section('titulo')
    @lang('Matricula')
@stop
@section ('estilos')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/pru.css')}}">
@stop
@section('titulo_cabecera')
    @lang('Detalle Matricula')<small>@lang('')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('Matricula')</a></li>
    <li class="active">@lang('Detalle Matricula')s</li>
@stop

@section('contenido')
    <!-- Main row -->
    <div class="row">
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
            {{ Form::open(array('url' => 'matricula', 'files' => true, 'class' => 'form-horizontal')) }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Detalle Matricula</h3>
                </div><!-- /.box-header -->
                <div class="box-header with-border">
                    <center><h3 class="box-title">Elegir Cursos</h3></center>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 20px">Id</th>
                            <th >Nombre Asignatura</th>
                            <th >Horas Semanales</th>
                            <th ></th>
                        </tr>
                        <!-- LISTAR Matriculas-->

                        @foreach($detalleMatricula as $matri)
                            <tr>
                                <td>{{$matri->idasignatura}}</td>
                                <td>{{$matri->nombre_asignatura}} </td>
                                <td>{{$matri->horas_semanales}}</td>
                                <td><input type='radio' ></td>
                            </tr>
                        @endforeach

                    </table>
                </div><!-- /.box-body -->

                <!--<div class="box-body">
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
                        {{ Form::label('id_matricula', Lang::get('idmatricula'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('id_matricula',null,array('class'=>'form-control','id'=>'id_matricula','placeholder'=>Lang::get('IdMatricula'))) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('tipo', Lang::get('tipo'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('tipo',null,array('class'=>'form-control','id'=>'tipo','placeholder'=>Lang::get('tipo'))) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('fecha_matricula', Lang::get('fecha de matricula'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input name='fecha' type="text" id="theInput" placeholder="Seleccione Fecha" />
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('idpado', Lang::get('id pago'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('idpago',null,array('class'=>'form-control','id'=>'idpago','placeholder'=>Lang::get('idPago'))) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('idalumno', Lang::get('id Alumno'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('idalumno',null,array('class'=>'form-control','id'=>'idalumno','placeholder'=>Lang::get('idAlumno'))) }}
                        </div>
                    </div>
                </div>-->
                <div class="box-footer">
                    <a class="btn btn-primary pull-right" href="{{ URL::to( '/detalleMatricula/agregar') }}"><i class="fa fa-plus"></i> @lang('Guardar')</a>
                    {{ Form::submit(Lang::get('Guardar'), array('class' => 'btn btn-info pull-right')) }}
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