@extends('_layouts.app')
@section('titulo')
    @lang('Crear Asignatura')
@stop
@section ('estilos')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/pru.css')}}">
@stop
@section('titulo_cabecera')
    @lang('sistema.asignaturas')<small>@lang('')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.asignaturas')</a></li>
    <li class="active">@lang('sistema.agregar_asignaturas' )</li>
@stop

@section('contenido')
    <!-- Main row -->
    <div class="row">
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
            {{ Form::open(array('url' => 'asignatura', 'files' => true, 'class' => 'form-horizontal')) }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Agregar Asignatura</h3>
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
                        {{ Form::label('idasignatura', Lang::get('Id Asignatura'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('idasignatura',null,array('class'=>'form-control','id'=>'idasignatura','placeholder'=>Lang::get('id Asignatura'))) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('nombre_asignatura', Lang::get('sistema.nombre_asignatura'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('nombre_asignatura',null,array('class'=>'form-control','id'=>'nombre_asignatura','placeholder'=>Lang::get('nombre asignatura'))) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('horas_semanales', Lang::get('sistema.horas_semanales'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('horas_semanales',null,array('class'=>'form-control','id'=>'horas_semanales','placeholder'=>Lang::get('horas semanales'))) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('horas_totales', Lang::get('sistema.horas_totales'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('horas_totales',null,array('class'=>'form-control','id'=>'horas_totales','placeholder'=>Lang::get('horas totales'))) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('idmodulo', Lang::get('Id Modulo'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('idmodulo',null,array('class'=>'form-control','id'=>'idmodulo','placeholder'=>Lang::get('id modulo'))) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('pre_requisito', Lang::get('sistema.pre_requisito'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('pre_requisito',null,array('class'=>'form-control','id'=>'pre_requisito','placeholder'=>Lang::get('pre requisito'))) }}
                        </div>
                    </div>

                </div>
                <div class="box-footer">
                    {{ Form::submit(Lang::get('Crear Asignatura'), array('class' => 'btn btn-info pull-right')) }}
                </div>
            </div>
            {{ Form::close()  }}
        </div>
        <!-- INICIO: BOX PANEL -->
    </div><!-- /.box -->
@section ('scrips_n')
    <script src="{{asset('/js/ja.js')}}" type="text/javascript"></script>
@stop
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
@endsection
