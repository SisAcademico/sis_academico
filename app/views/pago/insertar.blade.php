@extends('_layouts.app')
@section('titulo')
    @lang('sistema.pago')
@stop
@section('titulo_cabecera')
    @lang('sistema.pago')<small>@lang('sistema.insertar_pago')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.pago')</a></li>
    <li class="active">@lang('sistema.insertar_pago')s</li>
@stop

@section('contenido')
    <!-- Main row -->
	<div class="row">
		<!-- INICIO: BOX PANEL -->
		<div class="col-md-12 col-sm-8">
            {{ Form::open(array('url' => 'pago','autocomplete' => 'off','class' => 'form-horizontal', 'role' => 'form')) }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Insertar pago</h3>
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
                {{ Form::label('nro_boleta', Lang::get('sistema.nro_boleta'),array('class'=>'col-sm-2 control-label')) }}
                <div class="col-sm-10">
                     {{ Form::text('nro_boleta',null,array('class'=>'form-control','id'=>'nro_boleta','placeholder'=>Lang::get('sistema.nro_boleta'))) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('serie', Lang::get('sistema.serie'),array('class'=>'col-sm-2 control-label')) }}
                <div class="col-sm-10">
                    {{ Form::text('serie',null,array('class'=>'form-control','id'=>'serie','placeholder'=>Lang::get('sistema.serie'))) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('fecha_pago', Lang::get('sistema.fecha_pago'),array('class'=>'col-sm-2 control-label')) }}
                <div class="col-sm-10">
                    {{ Form::text('fecha_pago',null,array('class'=>'form-control','id'=>'fecha_pago','placeholder'=>Lang::get('sistema.fecha_pago'))) }}
                </div>
            </div>

                </div>
                <div class="box-footer">
                    {{ Form::submit(Lang::get('sistema.procesar_pago'), array('class' => 'btn btn-info pull-right')) }}
                </div>
            </div>
            {{ Form::close() }}
		</div>
	  <!-- INICIO: BOX PANEL -->
	</div><!-- /.box -->
@endsection
