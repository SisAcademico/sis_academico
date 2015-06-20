@extends('_layouts.app')
@section('titulo')
    @lang('Modificar carga_academica')
@stop
@section ('estilos')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/pru.css')}}">
@stop
@section('titulo_cabecera')
    @lang('carga_academica')<small>@lang('')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.carga_academica')</a></li>
    <li class="active">@lang('sistema.carga_academica')s</li>
@stop

@section('contenido')
    <!-- Main row -->
    <div class="row">
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
            {{ Form::open(array('url' => 'wilson/'.$cargaacademicaaeditar[0]->idcarga_academica,'autocomplete' => 'off','class' => 'form-horizontal', 'role' => 'form')) }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">modificar carga_academica</h3>
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

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        {{ Form::label('id_carga_academica', Lang::get('Idcarga_Academica:'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('id_carga_academica',Lang::get(''.$cargaacademicaaeditar[0]->idcarga_academica),array('class'=>'form-control','id'=>'id_carga_academica','placeholder'=>Lang::get('idcarga_academica'))) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('grupo', Lang::get('Grupo:'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('grupo',Lang::get(''.$cargaacademicaaeditar[0]->grupo),array('class'=>'form-control','id'=>'grupo','placeholder'=>Lang::get('grupo'))) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('turno', Lang::get('Turno:'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('turno',Lang::get(''.$cargaacademicaaeditar[0]->turno),array('class'=>'form-control','id'=>'turno','placeholder'=>Lang::get('turno'))) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('idsemestre', Lang::get('IdSemestre:'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <?php 
                            $arregloSemestre = [];
                            foreach ($Semestretodo as $semestre){
                                $token = $semestre->idsemestre; 
                                $aux = [$token=>$token];
                                $arregloSemestre = array_merge($aux,$arregloSemestre);
                            }
                            $elem =$cargaacademicaaeditar[0]->idsemestre;
                            $valoractual = array($elem =>$elem );
                            
                            ?>
                            {{Form::select('idsemestre',array_merge($valoractual,$arregloSemestre))}}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('idasignatura', Lang::get('idasignatura:'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <?php 
                            $arregloAsignatura = array();                            
                            foreach ($Asignaturatodo as $asignatura){
                                $token = $asignatura->idasignatura; 
                                $aux = [$token=>$token];
                                $arregloAsignatura = array_merge($aux,$arregloAsignatura);
                            }
                            $elem1 =$cargaacademicaaeditar[0]->idasignatura;
                            $valoractual1 = array($elem1 =>$elem1 );
                            ?>
                            {{Form::select('idasignatura',array_merge($valoractual1,$arregloSemestre))}}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('idasignatura_cl', Lang::get('idasignatura_cl:'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <?php 
                            $arregloSemestrecl = [];
                            foreach ($Semestrecltodo as $semestrecl){
                                $token = $semestrecl->idasignatura_cl; 
                                $aux = [$token=>$token];
                                $arregloSemestrecl = array_merge($aux,$arregloSemestrecl);
                            }
                            $elem2 =$cargaacademicaaeditar[0]->idasignatura_cl;
                            $valoractual2 = array($elem2 =>$elem2 );
                            ?>
                            {{Form::select('idasignatura_cl',array_merge($valoractual2,$arregloSemestre))}}
                        </div>
                    </div>
                    
                </div>
                <div class="box-footer">
                <!-- 
                -->
                    {{ Form::submit(Lang::get('Guardar cambios'), array('class' => 'btn btn-info pull-right')) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
        <!-- INICIO: BOX PANEL -->
    </div><!-- /.box -->
    @section ('scrips_n')
        <script src="{{asset('/js/ja.js')}}" type="text/javascript"></script>
    @stop
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
@endsection