@extends('_layouts.app')
@section('titulo')
    @lang('sistema.pagos')
@stop
@section('titulo_cabecera')
    @lang('sistema.listar_pagos')<small>@lang('sistema.listar_pagos')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.pagos')</a></li>
    <li class="active">@lang('sistema.pagos')s</li>
@stop

@section('contenido')
			<!-- Main row -->
			<div class="row">
				<!-- INICIO: BOX PANEL -->
					<div class="col-md-12 col-sm-8">
						 <div class="box box-success">
								<div class="box-header with-border">
								  <h3 class="box-title">Listado de pagos</h3>
								</div><!-- /.box-header -->
								<div class="box-body">
								  <table class="table table-bordered">
									<tr>
									  <th style="width: 10px">#</th>
									  <th>Nombre</th>
									  <th style="width: 80px">Accion</th>
									</tr>
									<tr>
									  <td>1.</td>
									  <td>Carrera 1</td>
									  <td>
										<a class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
										<a class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
									  </td>
									</tr>
									<tr>
									  <td>2.</td>
									  <td>Carrera 2</td>
									  <td>
										<a class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
										<a class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
									  </td>
									</tr>
								  </table>
								</div><!-- /.box-body -->
								<div class="box-footer clearfix text-center">
								  <ul class="pagination pagination-sm no-margin">
									<li><a href="#">&laquo;</a></li>
									<li><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">&raquo;</a></li>
								  </ul>
								</div>
						 </div><!-- /.box -->
					</div>
				  <!-- INICIO: BOX PANEL -->
			</div><!-- /.box -->
@endsection
