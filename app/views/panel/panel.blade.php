@extends('_layouts.app')
@section('titulo')
    @lang('sistema.pantalla_acceso')
@stop
@section('titulo_cabecera')
    @lang('sistema.panel')<small>Version 2.0.1</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-dashboard"></i> @lang('sistema.inicio')</a></li>
    <li class="active">@lang('sistema.panel')</li>
@stop

@section('contenido')
			<!-- Main row -->
			<div class="row">
				<!-- Left col -->
				<div class="col-md-12">
				  <!-- BOX PANEL -->
				  <div class="box box-info">
				  
					<!-- INICIO: Cabecera -->
					<div class="box-header with-border">
					  <h3 class="box-title">Bienvenido usuario: {{Auth::user()->usuario}}</h3>
					</div>
					
					<!-- FIN: Cabecera -->
					<div class="box-body padding">
						<div class="row">
							<div class="col-md-9 col-sm-8">
							  <div class="">
								<p> Sistema Académico - Instituto de Sistemas Cusco ISC</p>
							  </div>
							</div>
						</div>
					</div>
					
					<!-- INICIO: Pie de BOX -->
					<div class="box-footer clearfix">
					  <a href="javascript::;" class="btn btn-sm btn-success btn-flat pull-right">Panel</a>
					</div>
					<!-- FIN: Pie de Box -->
					
				  </div><!-- /.box -->
				</div><!-- /.box -->
			</div><!-- /.col -->
@endsection
