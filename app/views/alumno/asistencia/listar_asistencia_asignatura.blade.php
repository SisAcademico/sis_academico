@extends('_layouts.app')

@section('titulo')
    @lang('sistema.asistencia_alumnos')<!--titulo de la ventana-->
@stop
@section ('estilos')
    <link rel="stylesheet" type="text/css" href="{{asset('/adminlte/plugins/datepicker/css/bootstrap-datepicker3.standalone.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/adminlte/plugins/timepicker/bootstrap-timepicker.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/adminlte/plugins/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css')}}">
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
								  <h3 class="box-title">Lista de asistencias del curso: <?php echo ($tipoAsig==1)? $objAsig->idasignatura.' <br> '.$objAsig->nombre_asignatura:$objAsig->idasignatura_cl.' <br> '.$objAsig->nombre_asig_cl ?> Grupo: {{$grupo}}</h3>
									  <div class="pull-right bg-gray col-md-6" style="padding:5px;">
									  {{ Form::open(array('url' => '/alumno/asistencia/agregar_registro','autocomplete' => 'off','method'=>'POST','class' => 'form-horizontal', 'role' => 'form')) }}
							                <div class="col-md-5">
								                <div class="input-group input-group-sm">
							                        {{ Form::text('fecha_hora',null,array('class'=>'form-control fecha_hora required','id'=>'fecha_hora','placeholder'=>'yyyy-mm-dd hh:mm:ss','required')) }}
							                        <span class="input-group-btn">
							                          <button class="btn bg-purple btn-flat btn_calHora" type="button"><i class="fa fa-clock-o"></i></button>
							                        </span>
							                    </div>
						                    </div>
							                <div class="col-sm-3">
												{{ Form::select('turno', [
													'' => '--Turno',
													'DIA' => 'Día',
													'TARDE' => 'Tarde',
													'NOCHE' => 'Noche'],null,array('class'=>'form-control','id'=>'turno','required'))
												}}
							                </div>
							                <div class="col-md-2 pull-right">
							                {{ Form::hidden('codigoAsignatura',(($tipoAsig==1)? $objAsig->idasignatura:$objAsig->idasignatura_cl),array('class'=>'form-control','id'=>'codigoAsignatura')) }}
							                {{ Form::hidden('grupo',$grupo,array('class'=>'form-control','id'=>'grupo')) }}
							                {{ Form::hidden('tipo',$tipoAsig,array('class'=>'form-control','id'=>'tipo')) }}
							                {{ Form::hidden('semestre',$semestre,array('class'=>'form-control','id'=>'semestre')) }}
							                <input type="hidden" name="_token" value="{{ csrf_token() }}">
									  		{{ Form::submit('Agregar registro', array('class' => 'btn btn-info pull-right')) }}
									  		</div>
									  	{{ Form::close() }}
									  </div>
								</div><!-- /.box-header -->
								<div class="box-body">
										<?php 
										$cont=0;
										?>
										<table class="table table-bordered">
										<tr>
										<th>{{Lang::get('sistema.codigo_asignatura')}}</th>
										<th>Fecha de asistencia</th>
										<th>{{Lang::get('sistema.asignatura')}}</th>
										<th>{{Lang::get('sistema.semestre')}}</th>
										<th>{{Lang::get('sistema.grupo')}}</th>
										<th>{{Lang::get('sistema.turno')}}</th>											
										<th>Horas Semanales</th>											
										<th style="text-align:center;">{{Lang::get('sistema.accion')}}</th>											
										</tr>
										@foreach($listaRegistrosAsistencia as $registroAsignatura)
										<?php $cont=$cont+1; 
											if ($cont%2!==0)
												$color="#ffffff";
											if ($cont%2==0)
												$color="#ECF7FF";
										?>
											<tr bgcolor='<?php echo $color; ?>'>
											<td>{{$registroAsignatura->idasignatura}}</td>
											<td>{{$registroAsignatura->fecha_asist_alumn}}</td>
									 		<td>{{$registroAsignatura->nombre_asignatura}}</td>
									 		<td>{{$registroAsignatura->idsemestre}}</td>
											<td>{{ ucfirst($registroAsignatura->grupo)}}</td>
											<td>{{$registroAsignatura->turno}}</td>
											<td>{{$registroAsignatura->horas_semanales}}</td>
											<td style="text-align:center;">
											<?php $asig_sem_fechaReg=base64_encode($registroAsignatura->idasignatura.'|'.$registroAsignatura->idsemestre.'|'.$registroAsignatura->fecha_asist_alumn.'|'.$grupo) ?>
										<a data-toggle="tooltip" title="{{Lang::get('sistema.registrar_asistencia')}}" class="btn btn-xs btn-success" href="{{ URL::to( '/alumno/asistencia')}}/{{$asig_sem_fechaReg}}"><i class="fa fa-group"></i> Asistencia</a>
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
								<div class="box-footer clearfix">
								<a class="btn btn-info" href="{{ URL::to( '/alumno/asistencia/listar');}}"><i class="fa fa-chevron-left"></i> Volver a listado de </a>
								</div>
						 </div><!-- /.box -->
					</div>
				  <!-- INICIO: BOX PANEL -->
			</div><!-- /.box -->
			<!-- INICIO-->
			<!-- ########################### Iniciando la ventana modal ########################-->
			<div class="modal fade" id="user_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h3 class="modal-title" id="myModalLabel">Seleccione una asignatura</h3>
						</div> <!-- End Modal Header -->
						<div class="modal-body">
							<div class="te"></div>
							<?php  // URL::route('/alumno/asistencia/asignatura/registro')}}/{{ $objAsig->idasignatura}}|{{ $grupo }}?>
						</div> <!-- End Modal Body -->
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
						</div> <!-- End Modal Footer -->
					</div> <!-- End Modal Content -->
				</div> <!-- End Modal Dialog -->
			</div> <!-- End Modal -->
			<!-- FIN -->
@endsection
@section ('scrips_n')
<script src="{{asset('/adminlte/plugins/moment.js')}}" type="text/javascript"></script>
    <script src="{{asset('/adminlte/plugins/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}" type="text/javascript"></script>
    
	<script type="text/javascript">
	$(document).ready(function() {
		$("[data-toggle='tooltip']").tooltip();
		$('.btn_calHora').on('click', function() {$(this).parent().parent().find(".fecha_hora").focus();});
		$('.fecha_hora').datetimepicker({format: 'YYYY-MM-DD HH:mm:00'});
	});
</script>
@stop