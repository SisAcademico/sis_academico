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
				  <div class="box box-success">
				  
					<!-- INICIO: Cabecera -->
					<div class="box-header with-border">
					  <h3 class="box-title">Contenido de matenimientos</h3>
					</div>
					
					<!-- FIN: Cabecera -->
					<div class="box-body padding">
						<div class="row">
							<div class="col-md-9 col-sm-8">
							  <div class="">
								<p> ejemplo del contenido que puede ir aqui</p>
							  </div>
							</div>
						</div>
					</div>
					
					<!-- INICIO: Pie de BOX -->
					<div class="box-footer clearfix">
					  <a href="javascript::;" class="btn btn-sm btn-info btn-flat pull-left">Boton 1</a>
					  <a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">Boton 2</a>
					</div>
					<!-- FIN: Pie de Box -->
					
				  </div><!-- /.box -->
				</div><!-- /.box -->
			</div><!-- /.col -->
@endsection
