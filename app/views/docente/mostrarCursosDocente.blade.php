@extends('_layouts.app')
@section('titulo')
    @lang('Asistencia de Docentes')
@stop
@section ('estilos')
@stop
@section('titulo_cabecera')
    @lang('Docentes')<small>@lang('')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.docente')</a></li>
    <li class="active">@lang('sistema.asistencia_docente')</li>
@stop


@section('contenido')
    <!-- Main row -->
    <div class="row">
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Asistencia</h3>
                </div><!-- /.box-header -->
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
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 30px">Codigo</th>
                            <th >Asignatura</th>
                            <th >Inicio</th>
                            <th >Fin</th>
                            <th >Tema</th>
                            <th >Observación</th>
                        </tr>
                        <!-- LISTAR ALUMNOS-->
                        @foreach($cursos1 as $curso)
                        <tr>
                            <td>{{$curso->idasignatura}}</td>
                            <td>{{$curso->nombre_asignatura}}</td>
                            <td>{{$curso->hora_inicio}}</td>
                            <td>{{$curso->hora_fin}}</td>
                            <td>
                            <?php
                                if(empty($curso->idasistencia_docente))
                                {
                                    $flag = true ;
                                }
                                else
                                {
                                    $flag = false ;
                                }
                            ?>
                            </td>
                            <td>
                            <div class="form-group">
                                {{ Form::label('estado', Lang::get('sistema.estado'),array('class'=>'col-sm-2 control-label')) }}
                                <div class="col-sm-10">
                                    {{ Form::label('disponible', 'Disponible') }}
                                    {{ Form::radio('estado', 'Disponible',true, array('id'=>'disponible','class' => 'field')) }}
                                    {{ Form::label('ocupado', 'Ocupado') }}
                                    {{ Form::radio('estado', 'Ocupado','', array('id'=>'ocupado','class' => 'field')) }}
                                    {{ Form::label('mantenimiento', 'Matenimiento') }}
                                    {{ Form::radio('estado', 'Matenimiento','', array('id'=>'mantenimiento','class' => 'field')) }}
                                </div>
                            </div>    
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
    @section ('scrips_n')
    @stop
@endsection
