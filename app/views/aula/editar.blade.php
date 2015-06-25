@extends('_layouts.app')
@section('titulo')
    @lang('sistema.semestre')
@stop
@section('titulo_cabecera')
    @lang('sistema.aula')<small>@lang('sistema.agregar_aula')</small>
@stop
@section('ruta_navegacion')
    <li><a href="{{ URL::to( '/aula') }}"><i class="fa fa-list"></i> @lang('sistema.aula')</a></li>
    <li class="active">@lang('sistema.agregar_aula')</li>
@stop

@section('contenido')
    <!-- Main row -->
	<div class="row">
		<!-- INICIO: BOX PANEL -->
		<div class="col-md-12 col-sm-8">
		@foreach($aula as $au)
            {{ Form::open(array('url' => 'aula/'.$au->idaula,'autocomplete' => 'off','method' => 'put','class' => 'form-horizontal', 'role' => 'form')) }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">{{Lang::get('sistema.agregar_aula')}}</h3>
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
                {{ Form::label('idaula', Lang::get('sistema.codigo_aula'),array('class'=>'col-sm-2 control-label')) }}
                <div class="col-sm-3">
                     {{ Form::text('idaula',$au->idaula,array('class'=>'form-control','id'=>'idaula','placeholder'=>Lang::get('sistema.codigo_aula'))) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('capacidad', Lang::get('sistema.capacidad'),array('class'=>'col-sm-2 control-label')) }}
                <div class="col-sm-3">
                    {{ Form::text('capacidad',$au->capacidad,array('class'=>'form-control','id'=>'capacidad','placeholder'=>Lang::get('sistema.ingrese_capacidad'))) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('tipo', Lang::get('sistema.tipo'),array('class'=>'col-sm-2 control-label')) }}
                <div class="col-sm-3">					
					{{ Form::select('tipo', [
						'' => '-- Seleccione un tipo --',
						'LAB' => 'Laboratorio',
						'TEORIA' => 'Teoría',
						'GENERICO' => 'Genérico'], array($au->tipo), array('class'=>'form-control','id' => 'tipo')) }}
					
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('estado', Lang::get('sistema.estado'),array('class'=>'col-sm-2 control-label')) }}
                <div class="col-sm-10">
                    {{ Form::label('disponible', 'Disponible') }}
                    {{ Form::radio('estado[]', 'DISPONIBLE','', array('id'=>'disponible','class' => 'field',($au->estado=='DISPONIBLE')?'checked':'')) }}
                    {{ Form::label('ocupado', 'Ocupado') }}
                    {{ Form::radio('estado[]', 'OCUPADO','', array('id'=>'ocupado','class' => 'field',($au->estado=='OCUPADO')?'checked':'')) }}
                    {{ Form::label('mantenimiento', 'Mantenimiento') }}
                    {{ Form::radio('estado[]','MANTENIMIENTO','', array('id'=>'mantenimiento','class' => 'field',($au->estado=='MANTENIMIENTO')?'checked':'')) }}
                </div>
            </div>

            </div>
                <div class="box-footer">
                    {{ Form::submit(Lang::get('sistema.actualizar_aula'), array('class' => 'btn btn-info pull-right')) }}
                </div>
            </div>
            {{ Form::close() }}
			@endforeach
		</div>
	  <!-- INICIO: BOX PANEL -->
	</div><!-- /.box -->
@endsection
