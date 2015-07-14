@extends('_layouts.app')
@section('titulo')
    @lang('Modificar docente aistencia')
@stop
@section ('estilos')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/pru.css')}}">
@stop
@section('titulo_cabecera')
    @lang('docentes')<small>@lang('')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.docente.asistencia')</a></li>
    <li class="active">@lang('sistema.docente.asistentica.modicficar')es</li>
@stop

@section('contenido')
    <!-- Main row -->
    <div class="row">
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
            {{ Form::open(array('url' => 'formulario2/'.$asistenciaaeditar[0]->idasistencia_docente,'autocomplete' => 'off','class' => 'form-horizontal', 'role' => 'form')) }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">modificar asistencia docente</h3>
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
                        {{ Form::label('Id Asistencia', Lang::get('Id Asistencia '),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                        <fieldset disabled>
                            {{ Form::text('idasistencia_docente',Lang::get(''.$asistenciaaeditar[0]->idasistencia_docente),array('class'=>'form-control','id'=>'idasistencia_docente','placeholder'=>Lang::get('idasistencia_docente'))) }}
                         </fieldset>   
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('Fecha', Lang::get('Fecha'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input type="text" readonly="readnly" class="form-control" name = "fecha" value="<?php echo $asistenciaaeditar[0]->fecha_asist_doc?>" placeholder="Seleccione Fecha" />
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('Lista Docente', Lang::get('Lista Docente'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                        <fieldset disabled>
                                <?php
                                $filacarga = CargaAcademica::where('idcarga_academica','=',$asistenciaaeditar[0]->idcarga_academica)-> get();
                                $iddocente=$filacarga[0]->iddocente;                                  
                                $docente = docente::where('iddocente','=',$iddocente)->get();
                                ?>
                            {{ Form::text('lista_docente',Lang::get($iddocente.' - '.$docente[0]->nombres.' '.$docente[0]->apellidos.' - '.$docente[0]->dni),array('class'=>'form-control','id'=>'lista_docente','placeholder'=>Lang::get('lita_docente'))) }}
                         </fieldset>   
                        </div>
                    </div>
                    <div class="form-group">
                          <?php
                            $Asig = 0;    
                            $nombre=0;
                            $asignatura=$filacarga[0]->idasignatura;
                            $asignaturacl=$filacarga[0]->idasignatura_cl;  
                            if($asignatura === "NULL"){
                                $Asig=$asignatura;
                                $nombre = $Asig[0]->nombre_asignatura;                                  

                            }else{
                                $Asig=$asignaturacl;
                       
                               // $nombre = $Asig[0]->nombre_asig_cl;                                                              
                            }
                              
                            ?>
                        {{ Form::label('Asignatura', Lang::get('Asignatura'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                        <fieldset disabled>
                            {{ Form::text('asigntura',Lang::get(''.$Asig.' - '.$nombre),array('class'=>'form-control','id'=>'asigntura','placeholder'=>Lang::get('asigntura'))) }}
                         </fieldset>   
                        </div>
                    </div>
                    <div class="form-group">
                     <?php
                                $turno=$filacarga[0]->turno;                                  
                              
                                ?>
                        {{ Form::label('Turno', Lang::get('Turno'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                        <fieldset disabled>
                            {{ Form::text('turno',Lang::get(''.$turno),array('class'=>'form-control','id'=>'Turno','placeholder'=>Lang::get('Turno'))) }}
                         </fieldset>   
                        </div>
                    </div>
                       <div class="form-group">
                         <?php
                                $grupo=$filacarga[0]->grupo;                                  
                              
                                ?>
                        {{ Form::label('Grupo', Lang::get('Grupo'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                        <fieldset disabled>
                            {{ Form::text('grupo',Lang::get(''.$grupo),array('class'=>'form-control','id'=>'grupo','placeholder'=>Lang::get('grupo'))) }}
                         </fieldset>   
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('Observacion', Lang::get('Observacion'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                         <fieldset disabled>
                            {{ Form::text('observacion',Lang::get(''.$asistenciaaeditar[0]->observacion),array('class'=>'form-control','id'=>'observacion','placeholder'=>Lang::get('observacion'))) }}
                            {{ $errors->first('observacion')}}
                         </fieldset>   
                            
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('tema', Lang::get('Tema'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('tema',Lang::get(''.$asistenciaaeditar[0]->tema),array('class'=>'form-control','id'=>'tema','placeholder'=>Lang::get('tema'))) }}
                            {{ $errors->first('tema')}}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('Carga Academica', Lang::get('Carga Academica'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                        <fieldset disabled>
                            {{ Form::text('idcarga_academica',Lang::get(''.$asistenciaaeditar[0]->idcarga_academica),array('class'=>'form-control','id'=>'idcarga_academica','placeholder'=>Lang::get('idcarga_academica'))) }}                          
                      </fieldset>
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