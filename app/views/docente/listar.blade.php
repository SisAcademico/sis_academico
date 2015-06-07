@extends('_layouts.app')

@section('titulo')
    @lang('sistema.docentes')<!--titulo de la ventana-->
@stop

@section('titulo_cabecera')
    @lang('sistema.listar_docentes')<small>@lang('sistema.listar_docentes')</small><!--titulo-subtitulos-->

@stop

@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.docentes')</a></li><!--ruta de ubicacion-->
    <li class="active">@lang('sistema.docentes')</li>
@stop

@section('contenido')
		@if(Session::has('message'))
    	<p class="alert alert-success">{{Session::get('message')}}</p>
    	@endif
			<!-- Main row -->
			<div class="row">
				<!-- INICIO: BOX PANEL -->
					<div class="col-md-12 col-sm-8">
						 <div class="box box-success">
								<div class="box-header with-border">
								  <h3 class="box-title">Listado de docentes</h3><!--titulo del frame-->
								</div><!-- /.box-header -->
								<div class="box-body">
								 <!-- <table class="table table-bordered">
									<tr>
									  <th style="width: 10px">#</th>
									  <th>Nombre</th>
									  <th style="width: 80px">Accion</th>
									</tr>
									<tr>
									  <td>1.</td>
									  <td>Carreras1</td>
									  <td>
										<a class="btn btn-xs btn-primary" href="{{ URL::to( '/docente/insertar') }}"><i class="fa fa-edit"></i></a>
										<a class="btn btn-xs btn-danger" href="{{ URL::to( '/docente/eliminar') }}"><i class="fa fa-trash"></i></a>
									  </td>
									</tr>
									<tr>
									  <th style="width: 10px">#</th>
									  <th>Apellidos</th>
									  <th style="width: 80px">Accion</th>
									</tr>
									<tr>
									  <td>1.</td>
									  <td>Carreras2</td>
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
								  </table>-->
								  
								
								

										
										<?php 
											//echo $Docentestodo;
											/*foreach ($Docentestodo as $Doc) 
											{
												echo $Doc->nombres;
											}*/

										$cont=0;
										?>
										<table class="table table-bordered">
										<tr>
									  <th>Nombres</th>
											<th>Apellidos</th>
											<th>Direccion</th>
											<th>Telefono</th>
											<th>Correo</th>
											<th>Cargo</th>
											<th>Estado</th>
											<th>Fecha Inicio</th>
											<th>IdFoto</th>
											<th>Accion</th>
											</tr>
										@foreach($Docentestodo as $Doc)
										<?php $cont=$cont+1; 
											if ($cont%2!==0)
												$color="#ffffff";
											if ($cont%2==0)
												$color="#d2ecfb";
										?>
											<tr bgcolor='<?php echo $color; ?>'>
									 		<td>{{$Doc->nombres}}</td>
											<td>{{$Doc->apellidos}}</td>
											<td>{{$Doc->direccion}}</td>
											<td>{{$Doc->telefono}}</td>
											<td>{{$Doc->correo}}</td>
											<td>{{$Doc->cargo}}</td>
											<td>{{$Doc->estado}}</td>
											<td>{{$Doc->fecha_inicio}}</td>
											<td>{{$Doc->idfoto}}</td>
											 <td>
										<a class="btn btn-xs btn-primary" href="{{ URL::to( '/docente/editar') }}"><i class="fa fa-edit"></i></a>
										<a class="btn btn-xs btn-danger" href="{{ URL::to( 'docente.delete') }}"><i class="fa fa-trash"></i></a>
										

									  </td>
											</tr>
										@endforeach
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
