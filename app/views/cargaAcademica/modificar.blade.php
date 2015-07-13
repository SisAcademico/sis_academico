@extends('_layouts.app')
@section('titulo')
    @lang('Modificar carga_academica')
@stop
@section ('estilos')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/pru.css')}}">
@stop
@section('titulo_cabecera')
    @lang('carga_academica')<small>@lang('Modificar')</small>
    <br><br>
    <center>
        Carga Academica del Semestre 
        {{$cargaacademicaaeditar[0]->idsemestre;}}
    </center>
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
            {{ Form::open(array('url' => 'carga_academica/modificar/'.$cargaacademicaaeditar[0]->idcarga_academica,'autocomplete' => 'off','class' => 'form-horizontal', 'role' => 'form')) }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h4>Modificar esta Carga Academica</h4>
                </div><!-- /.box-header -->
                <div class="box-body">
                    @if ($errors->first('wilson') != '')
                    <div class="alert alert-danger"><button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                        <ul class="error_list"><li>{{ $errors->first('wilson') }}</li></ul>
                    </div>
                    @endif
                    
                    <div class="form-group">
                        <div class="col-sm-10">
                            {{ Form::hidden('id_carga_academica',Lang::get(''.$cargaacademicaaeditar[0]->idcarga_academica),array('class'=>'form-control','id'=>'id_carga_academica','placeholder'=>Lang::get('idcarga_academica'))) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('docente', Lang::get('Docente:'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <?php 
                            $arregloDocente = [];
                            foreach ($Docentetodo as $docente){
                                $nombre = $docente->nombres;
                                $apellido= $docente->apellidos;
                                $valor = $docente->iddocente;
                                $aux = ["w".$valor=>$nombre.' '.$apellido];
                                $arregloDocente = array_merge($aux,$arregloDocente);
                            }
                            $elem =$cargaacademicaaeditar[0]->iddocente;
                            $valoractuald = array("w".$elem =>"" );
                            ?>
                            {{Form::select('docente',array_merge($valoractuald,$arregloDocente))}}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('grupo', Lang::get('Grupo:'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('grupo',Lang::get(''.$cargaacademicaaeditar[0]->grupo),array('class'=>'form-control','id'=>'grupo','placeholder'=>Lang::get('grupo'))) }}
                            <p></p>
                            @if ($errors->first('grupo') != '')
                            <div class="alert alert-danger"><button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                                <ul class="error_list"><li>{{ $errors->first('grupo') }}</li></ul>
                            </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group">
                        {{ Form::label('turno', Lang::get('Turno:'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                           <?php
                           $turnorec = $cargaacademicaaeditar[0]->turno;
                            $arregloTurno=[$turnorec=>$turnorec,'Maniana'=>'Maniana','Tarde'=>'Tarde','Noche'=>'Noche'];
                            ?>
                            {{Form::select('turno',$arregloTurno)}}
                        </div>
                    </div>
                    
                    <div class="form-group">
                        {{ Form::hidden('semestre', Lang::get(''.$cargaacademicaaeditar[0]->idsemestre),array('class'=>'col-sm-2 control-label')) }} 
                    </div>
                    <div class="form-group">
                        {{ Form::label('asignatura', Lang::get('Asignatura:'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <?php 
                            $arregloAsignatura = array();                            
                            foreach ($Asignaturatodo as $asignatura){
                                $nombre = $asignatura->nombre_asignatura;
                                $valor = $asignatura->idasignatura;
                                $aux = ['1'.$valor=>$nombre];
                                $arregloAsignatura = array_merge($aux,$arregloAsignatura);
                            }
                            
                            $arregloAsignaturacl = array();
                            foreach ($Asignaturacltodo as $asignaturacl){
                                $nombre = $asignaturacl->nombre_asig_cl;
                                $valor = $asignaturacl->idasignatura_cl;
                                $aux = ["0".$valor=>$nombre];
                                $arregloAsignaturacl = array_merge($aux,$arregloAsignaturacl);
                            }
                            $valor2 =$cargaacademicaaeditar[0]->Id;
                            $elem2 =$cargaacademicaaeditar[0]->Asignatura;
                            
                            if(array_key_exists("1".$valor2, $arregloAsignatura)){                                
                                $valoractual= array("1".$valor2 =>$elem2 );
                            }
                            else{
                                $valoractual= array("0".$valor2 =>$elem2 );
                            }
                            ?>
                            {{ Form::select('asignatura', array(
                            'Curso Actual' => $valoractual,
                            'Cursos de Carrera' => $arregloAsignatura,
                            'Cursos Libres' => $arregloAsignaturacl))}}
                        </div>
                    </div>                    
                </div>
                <div class="box-footer" style="margin-left:17%">
                
                    {{ Form::submit(Lang::get('Guardar cambios'), array('class' => 'btn btn-info pull-left')) }}
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