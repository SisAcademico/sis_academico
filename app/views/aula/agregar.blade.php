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
            {{ Form::open(array('url' => 'aula','autocomplete' => 'off','class' => 'form-horizontal', 'role' => 'form')) }}
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
                     {{ Form::text('idaula',null,array('class'=>'form-control','id'=>'idaula','placeholder'=>Lang::get('sistema.codigo_aula'))) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('capacidad', Lang::get('sistema.capacidad'),array('class'=>'col-sm-2 control-label')) }}
                <div class="col-sm-3">
                    {{ Form::text('capacidad',null,array('class'=>'form-control','id'=>'capacidad','placeholder'=>Lang::get('sistema.ingrese_capacidad'))) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('tipo', Lang::get('sistema.tipo'),array('class'=>'col-sm-2 control-label')) }}
                <div class="col-sm-3">
					{{ Form::select('tipo', [
						'' => '-- Seleccione un tipo --',
						'Laboratorio' => 'Laboratorio',
						'Teoria' => 'Teoría',
						'Otros' => 'Otros'],null,array('class'=>'form-control','id'=>'tipo'))
					}}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('estado', Lang::get('sistema.estado'),array('class'=>'col-sm-2 control-label')) }}
                <div class="col-sm-10">
                    {{ Form::label('Disponible', 'Disponible') }}
                    {{ Form::radio('estado[]', 'DISPONIBLE',true, array('id'=>'Disponible','class' => 'field')) }}
                    {{ Form::label('No_disponible', 'No Disponible') }}
                    {{ Form::radio('estado[]', 'No_disponible','', array('id'=>'No_disponible','class' => 'field')) }}
                </div>
            </div>

            </div>
                <div class="box-footer">
                    {{ Form::submit(Lang::get('sistema.agregar_aula'), array('class' => 'btn btn-info pull-right')) }}
                </div>
            </div>
            {{ Form::close() }}
		</div>
	  <!-- INICIO: BOX PANEL -->
	</div><!-- /.box -->
@endsection
