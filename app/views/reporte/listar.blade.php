@extends('_layouts.app')
@section('titulo')
    @lang('sistema.reporte')s
@stop
@section('titulo_cabecera')
    @lang('sistema.reporte')s<small>@lang('sistema.listar_semestre')s</small>
@stop
@section('ruta_navegacion')
    <li><a href="{{ URL::to( '/reporte') }}"><i class="fa fa-list"></i> @lang('sistema.reporte')s</a></li>
    <li class="active">@lang('sistema.listar_de_reporte')</li>
@stop

@section('contenido')
			<!-- Main row -->
			<div class="row">
				<!-- INICIO: BOX PANEL -->
					<div class="col-md-12 col-sm-8">
						 <div class="box box-success">
								<div class="box-header with-border">
								  <h3 class="box-title">@lang('sistema.listar_de_reporte')</h3>
                                  <a class="btn btn-primary pull-right" href="{{ URL::to( '/reporte') }}"><i class="fa fa-plus"></i> @lang('sistema.agregar_reporte')</a>
								</div><!-- /.box-header -->
								<div class="box-body">
								</div><!-- /.box-body -->
								<div class="box-footer clearfix text-center">
								</div>
						 </div><!-- /.box -->
					</div>
				  <!-- INICIO: BOX PANEL -->
			</div><!-- /.box -->
@endsection
