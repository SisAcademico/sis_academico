@extends('_layouts.app')

@section('titulo')
    @lang('sistema.asistencia_alumnos')<!--titulo de la ventana-->
@stop

@section('titulo_cabecera')
    @lang('sistema.asistencia_alumnos')<small>@lang('sistema.listar_asistencia')</small><!--titulo-subtitulos-->
@stop

@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.asistencia_alumnos')</a></li><!--ruta de ubicacion-->
    <li class="active">@lang('sistema.listar_asistencia')</li>
@stop

@section('contenido')
			<!-- Main row -->
			<div class="row">
				<!-- INICIO: BOX PANEL -->
					<div class="col-md-12 col-sm-8">
						 <div class="box box-success">
								<div class="box-header with-border">
								  <h3 class="box-title">{{Lang::get('sistema.lista_asignaturas_docente')}}</h3><!--titulo del frame-->
								  <!-- <a class="btn btn-success pull-right" href="{{ URL::to( '/alumno/asistencia/registrar') }}"><i class="fa fa-plus"></i> {{Lang::get('sistema.registrar_asistencia')}}</a> -->
								</div><!-- /.box-header -->
								<div class="box-body">
										<?php 
										$cont=0;
										?>
										<table class="table table-bordered">
										<tr>
										<th>{{Lang::get('sistema.semestre')}}</th>
										<th>{{Lang::get('sistema.codigo_asignatura')}}</th>
										<th>{{Lang::get('sistema.asignatura')}}</th>
										<th>{{Lang::get('sistema.turno')}}</th>											
										<th>{{Lang::get('sistema.grupo')}}</th>											
										<th style="text-align:center;">{{Lang::get('sistema.accion')}}</th>											
										</tr>
										@foreach($listaAsignaturasCargo as $asignaturaCargo)
										<?php $cont=$cont+1; 
											if ($cont%2!==0)
												$color="#ffffff";
											if ($cont%2==0)
												$color="#ECF7FF";
										?>
											<tr bgcolor='<?php echo $color; ?>'>
											<td>{{$asignaturaCargo->idsemestre}}</td>
									 		<td>{{$asignaturaCargo->idasignatura}}</td>
									 		<td>{{$asignaturaCargo->nombre_asignatura}}</td>
											<td>{{ ucfirst($asignaturaCargo->turno)}}</td>
											<td>{{$asignaturaCargo->grupo}}</td>
											<?php $asig_grupo=base64_encode($asignaturaCargo->idasignatura.'|'.$asignaturaCargo->grupo); ?>
											<td style="text-align:center;">
										<a data-toggle="tooltip" title="Mostrar Registro" class="btn btn-xs btn-primary" href="{{ URL::to( '/alumno/asistencia/asignatura')}}/{{ $asig_grupo}}"><i class="fa fa-list"></i> Registros de Asistencia</a>
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
@section ('scrips_n')
	<script type="text/javascript">
	$(document).ready(function() {
		$("[data-toggle='tooltip']").tooltip();
	});
</script>
@stop