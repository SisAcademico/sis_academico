@extends('_layouts.app')
@section('titulo')
    @lang('sistema.cursolibre')
@stop
@section('titulo_cabecera')
    @lang('Cursos Libres')<small>@lang('Agregar nuevo curso libre')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('cursos libres')</a></li>
    <li class="active">@lang('Agregar Nuevo')s</li>
@stop

@section('contenido')
    <!-- Main row -->
    <div class="row">
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
            {{ Form::open(array('url' => 'cursolibre','autocomplete' => 'off','class' => 'form-horizontal', 'role' => 'form')) }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Insertar Curso Libre</h3>
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
                {{ Form::label('idasignatura_cl', Lang::get('Codigo'),array('class'=>'col-sm-2 control-label')) }}
                <div class="col-sm-10">
                     {{ Form::text('idasignatura_cl',null,array('class'=>'form-control','id'=>'idasignatura_cl','placeholder'=>Lang::get('Codigo'))) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('nombre_asig_cl', Lang::get('Nombre'),array('class'=>'col-sm-2 control-label')) }}
                <div class="col-sm-10">
                    {{ Form::text('nombre_asig_cl',null,array('class'=>'form-control','id'=>'nombre_asig_cl','placeholder'=>Lang::get('Nombre del Curso'))) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('horas_totales', Lang::get('sistema.horas_totales'),array('class'=>'col-sm-2 control-label')) }}
                <div class="col-sm-10">
                    {{ Form::text('horas_totales',null,array('class'=>'form-control','id'=>'horas_totales','placeholder'=>Lang::get('Horas Totales'))) }}
                </div>
            </div>

                </div>
                <div class="box-footer">
                    {{ Form::submit(Lang::get('Guardar'), array('class' => 'btn btn-info pull-right')) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
      <!-- INICIO: BOX PANEL -->
    </div><!-- /.box -->
@endsection
