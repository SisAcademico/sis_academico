@extends('_layouts.app')
@section('titulo')
    @lang('sistema.semestre')
@stop
@section('titulo_cabecera')
    @lang('sistema.semestre')<small>@lang('sistema.agregar_semestre')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.semestre')</a></li>
    <li class="active">@lang('sistema.agregar_semestre')s</li>
@stop

@section('contenido')
    <!-- Main row -->
	<div class="row">
		<!-- INICIO: BOX PANEL -->
		<div class="col-md-12 col-sm-8">
            {{ Form::open(array('url' => 'semestre','autocomplete' => 'off','class' => 'form-horizontal', 'role' => 'form')) }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Agregar semestre</h3>
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
                {{ Form::label('idsemestre', Lang::get('sistema.semestre'),array('class'=>'col-sm-2 control-label')) }}
                <div class="col-sm-10">
                     {{ Form::text('idsemestre',null,array('class'=>'form-control','id'=>'idsemestre','placeholder'=>Lang::get('sistema.semestre'))) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('fecha_inicio', Lang::get('sistema.fecha_inicio'),array('class'=>'col-sm-2 control-label')) }}
                <div class="col-sm-10">
                    {{ Form::text('fecha_inicio',null,array('class'=>'form-control','id'=>'fecha_inicio','placeholder'=>Lang::get('sistema.fecha_inicio'))) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('fecha_fin', Lang::get('sistema.fecha_fin'),array('class'=>'col-sm-2 control-label')) }}
                <div class="col-sm-10">
                    {{ Form::text('fecha_fin',null,array('class'=>'form-control','id'=>'fecha_fin','placeholder'=>Lang::get('sistema.fecha_fin'))) }}
                </div>
            </div>

                </div>
                <div class="box-footer">
                    {{ Form::submit(Lang::get('sistema.agregar_semestre'), array('class' => 'btn btn-info pull-right')) }}
                </div>
            </div>
            {{ Form::close() }}
		</div>
	  <!-- INICIO: BOX PANEL -->
	</div><!-- /.box -->
@endsection
