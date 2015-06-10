@extends('_layouts.app')

@section('titulo')
    @lang('sistema.administrador')<!--titulo de la ventana-->
@stop

@section('titulo_cabecera')
    @lang('sistema.listar_administrador')<small>@lang('sistema.listar_administrador')</small><!--titulo-subtitulos-->
@stop

@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.administrador')</a></li><!--ruta de ubicacion-->
    <li class="active">@lang('sistema.administrador')</li>
@stop

@section('contenido')
			<!-- Main row -->
			<div class="row">
				<!-- INICIO: BOX PANEL -->
					<div class="col-md-12 col-sm-8">
						 <div class="box box-success">
								<div class="box-header with-border">
								  <h3 class="box-title">Lista de administradores</h3><!--titulo del frame-->
								</div><!-- /.box-header -->
								<div class="box-body">
										<?php 
											

										$cont=0;
										?>
										<table class="table table-bordered">
										<tr>
										<th>Nombres</th>
									  		<th>idadministrador</th>
											<th>Apellidos</th>
											<th>Direccion</th>
											<th>Telefono</th>
											<th>Correo</th>											
											<th>Estado</th>
											<th>IdFoto</th>
											<th>Accion</th>
											</tr>
										@foreach($administradorestodo as $Adm)
										<?php $cont=$cont+1; 
											if ($cont%2!==0)
												$color="#ffffff";
											if ($cont%2==0)
												$color="#d2ecfb";
										?>
											<tr bgcolor='<?php echo $color; ?>'>
											<td>{{$Adm->idadministrador}}</td>
									 		<td>{{$Adm->nombres}}</td>
											<td>{{$Adm->apellidos}}</td>
											<td>{{$Adm->direccion}}</td>
											<td>{{$Adm->telefono}}</td>
											<td>{{$Adm->correo}}</td>
											<td>{{$Adm->estado}}</td>
											<td>{{$Adm->idfoto}}</td>
											 <td>
										<a class="btn btn-xs btn-primary" href="{{ URL::to( '/administrador/editar') }}"><i class="fa fa-edit"></i></a>
										<a class="btn btn-xs btn-danger" href="{{ URL::to( '/administrador/eliminar') }}"><i class="fa fa-trash"></i></a>
										
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