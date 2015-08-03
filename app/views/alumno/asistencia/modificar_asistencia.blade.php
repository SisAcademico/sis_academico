@extends('_layouts.app')
@section('titulo')
    @lang('sistema.registrar_asistencia_alumno')
@stop
@section ('estilos')
    <link href="{{asset('/adminlte/plugins/iCheck/square/red.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('/adminlte/plugins/iCheck/square/yellow.css')}}" rel="stylesheet" type="text/css">
@stop
@section('titulo_cabecera')
    @lang('sistema.registrar_asistencia_alumno')<small>Actualizar asistencia de alumnos</small>
@stop
@section('ruta_navegacion')
    <li><a href="{{ URL::to( '/alumno/asistencia/listar') }}"><i class="fa fa-list"></i> @lang('sistema.registrar_asistencia')</a></li>
    <li class="active">@lang('sistema.registrar_asistencia_alumno')</li>
@stop

@section('contenido')
    <!-- Main row -->
    <div class="row">
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">{{Lang::get('sistema.relacion_alumnos').': '.$objAsig->idasignatura,' - '.$objAsig->nombre_asignatura.'<br><b>Semestre:</b>'.$objSemestre->idsemestre.' <b>Fecha:</b> '.$fecha_hora}}</h3>
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
					<!-- INICIO -->
					<table class="table table-bordered">
                        <tr>
                            <th style="width: 130px;vertical-align: middle;"  rowspan="2">{{Lang::get('sistema.codigo_alumno')}}</th>
                            <th style="vertical-align: middle;" rowspan="2">{{Lang::get('sistema.dni')}}</th>
                            <th style="vertical-align: middle;" rowspan="2">{{Lang::get('sistema.apellidos_nombres')}}</th>
                            <th style="vertical-align: middle;" rowspan="2">{{Lang::get('sistema.foto')}}</th>
                            <th style="vertical-align: middle; text-align:center;" colspan="3">{{Lang::get('sistema.observacion')}}</th>
                        </tr>
						<tr>
                            <th >{{Lang::get('sistema.asistio')}}</th>
                            <th >{{Lang::get('sistema.tarde')}}</th>
                            <th >{{Lang::get('sistema.falto')}}</th>
                        </tr>
                        <!-- LISTAR ALUMNOS-->
                       @if(!empty($relacionAlumnos))
                                @foreach($relacionAlumnos as $alumno)
                                    <tr>
                                        <td>{{ $alumno->idalumno }}</td>
                                        <td>{{ $alumno->dni }}</td>
                                        <td>{{ $alumno->apellidos.', '.$alumno->nombres }}</td>
                                        <td></td>
                                        <td>{{ Form::radio('obsAsis'.$alumno->idalumno.'[]', 'temprano',(($alumno->fecha_asist_alumn==$fecha_hora&&$alumno->observacion=='temprano')?true:false), array('id'=>'temprano_'.$alumno->idalumno,'class' => 'asistencia field','rel'=>$alumno->idalumno.'_'.$alumno->iddetalle_matricula)) }}</td>
                                        <td>{{ Form::radio('obsAsis'.$alumno->idalumno.'[]', 'tarde',(($alumno->fecha_asist_alumn==$fecha_hora&&$alumno->observacion=='tarde')?true:false), array('id'=>'tarde_'.$alumno->idalumno,'class' => 'asistencia field yellow_radio','rel'=>$alumno->idalumno.'_'.$alumno->iddetalle_matricula)) }}</td>
                                        <td>{{ Form::radio('obsAsis'.$alumno->idalumno.'[]', 'falto',(($alumno->fecha_asist_alumn==$fecha_hora&&$alumno->observacion=='falto')?true:false), array('id'=>'falto_'.$alumno->idalumno,'class' => 'asistencia field red_radio','rel'=>$alumno->idalumno.'_'.$alumno->iddetalle_matricula))}}</td>
                                    </tr>
                                @endforeach
                        @endif  

                        @if(empty($relacionAlumnos))
                            <ul >
                                  <p class="alert alert-info">{{Lang::get('sistema.no_hay_datos')}}</p>
                            </ul> 
                        @endif
                    </table>
					<!-- FIN -->
                <input type="hidden" name="_token" value="{{ csrf_token() }}">                    
                </div>
                <div class="box-footer">
					<a class="btn btn-info" href="{{ URL::to( '/alumno/asistencia/asignatura/'.$dataAsistencia)}}"><i class="fa fa-chevron-left"></i> Retornar</a>
                </div>
            </div>
        </div>
        <!-- INICIO: BOX PANEL -->
    </div><!-- /.box -->
      {{ Form::open(array('url' => ['/alumno/asistencia/registrar','CODIGO_ALUMNO'],'autocomplete' => 'off','method'=>'POST','id'=>'form_asistencia'))}}
        {{ Form::hidden('fecha_horaForm',$fecha_hora,array('class'=>'form-control','id'=>'fecha_horaForm')) }}
        {{ Form::hidden('idasignaturaForm',$objAsig->idasignatura,array('class'=>'form-control','id'=>'idasignaturaForm')) }}
        {{ Form::hidden('observacionForm',null,array('class'=>'form-control','id'=>'observacionForm')) }}
        {{ Form::hidden('matriDelForm',null,array('class'=>'form-control','id'=>'matriDelForm')) }}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
      {{ Form::close()}}
@endsection
@section ('scrips_n')
	<script>
      $(function () {
       $('input[type="radio"].red_radio').iCheck({
          checkboxClass: 'icheckbox_square-red',
          radioClass: 'iradio_square-red',
          increaseArea: '20%' // optional
        });
	   $('input[type="radio"].yellow_radio').iCheck({
          checkboxClass: 'icheckbox_square-yellow',
          radioClass: 'iradio_square-yellow',
          increaseArea: '20%' // optional
        });

      });
      $( document ).ready(function() {
           // Determinammos el ID-codigo de alumnos y lo enviamos
           //---------------------
            $('input[type="radio"]').on('ifChecked', function(e){

                e.preventDefault();

                var ID = ($(this).attr('id')).split('_');
                var REL = ($(this).attr('rel')).split('_');
                var estadoAsisALumno=ID[0];
                var codigoALumno=ID[1];

                var form=$('#form_asistencia');
                $("#observacionForm").val(estadoAsisALumno);
                $("#matriDelForm").val(REL[1]);

                var url=form.attr('action').replace('CODIGO_ALUMNO',codigoALumno);
                var data=form.serialize();

                $.post(url,data,function(result){
                    //alert(result);
                })
            });
           
           //---------------------
      });
    </script>
@stop