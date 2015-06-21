@extends('_layouts.app')

@section('titulo')
    @lang('Listar Asistencia Docente')<!--titulo de la ventana-->
@stop

@section('titulo_cabecera')
    @lang('sistema.listar_asistencia')<small>@lang('sistema.listar_asistencia')</small><!--titulo-subtitulos-->
@stop

@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.docente.listar.asistencia')</a></li><!--ruta de ubicacion-->
    <li class="active">@lang('sistema.docente')</li>
@stop

@section('contenido')
			<!-- Main row -->
			<div class="row">
				<!-- INICIO: BOX PANEL -->
					<div class="col-md-12 col-sm-8">
						 <div class="box box-success">
								<div class="box-header with-border">
								  <h3 class="box-title">Lista asistencia asministrador</h3><!--titulo del frame-->
								</div><!-- /.box-header -->
								<div class="box-body">
										<?php 
											

										$cont=0;
										?>
										<table class="table table-bordered">
										<tr>
										<th>Id Asistencia</th>
									  	<th>Fecha</th>
										<th>Observacion</th>
										<th>Tema</th>
										<th>Id Carga Academica</th>											
										</tr>
										@foreach($AsistenciaDocentetodo as $AsisDoc)
										<?php $cont=$cont+1; 
											if ($cont%2!==0)
												$color="#ffffff";
											if ($cont%2==0)
												$color="#d2ecfb";
										?>
											<tr bgcolor='<?php echo $color; ?>'>
											<td>{{$AsisDoc->idasistencia_docente}}</td>
									 		<td>{{$AsisDoc->fecha_asist_doc}}</td>
											<td>{{$AsisDoc->observacion}}</td>
											<td>{{$AsisDoc->tema}}</td>
											<td>{{$AsisDoc->idcarga_academica}}</td>
											
											 <td>
										<a class="btn btn-xs btn-primary" href="{{ URL::to( '/docente/modificarasistencia');}}/{{$AsisDoc->idasistencia_docente}}"><i class="fa fa-edit"></i></a>
										<a class="btn btn-xs btn-danger" href="{{ URL::to( '/docente/Eliminarasistencia');}}/{{$AsisDoc->idasistencia_docente}}"><i class="fa fa-trash"></i></a>
										
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