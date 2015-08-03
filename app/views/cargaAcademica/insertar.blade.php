@extends('_layouts.app')
@section('titulo')
    @lang('Crear Carga_Academica')
@stop
@section ('estilos')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/pru.css')}}">
@stop
@section('titulo_cabecera')
    @lang('Carga Academica')<small>@lang('Asignar una carga academica')</small>
    <br><br>
    <center>
        <?php
        
        if(empty($SemestreActual)==1){
            $semestre = '';
        }
        else{
            $semestre = $SemestreActual[0]->idsemestre;
            echo 'Carga Academica del Semestre '.$semestre;
        }
        ?>
    </center>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.carga_academica')</a></li>
    <li class="active">@lang('sistema.asignar_carga_academica')</li>
@stop
@section('contenido')
    <!-- Main row -->
    <div class="row">
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
            {{ Form::open(array('url' => 'carga_academica/guardar','autocomplete' => 'off','class' => 'form-horizontal', 'role' => 'form')) }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h4>Ingrese Datos De Carga Academica</h4>
                </div><!-- /.box-header -->
                <div class="box-body">
                    @if ($errors->first('wilson') != '')
                    <div class="alert alert-danger"><button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                        <ul class="error_list"><li>{{ $errors->first('wilson') }}</li></ul>
                    </div>
                    @endif
                    @if ($semestre == '')
                    <div class="alert alert-danger"><button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                        <ul class="error_list"><li>ERROR! no tienes ningun semestre agregado en la base de datos</li></ul>
                    </div>
                    @endif
                    <?php $docente = empty($Docentetodo);?>
                    @if ($docente == 1)
                    <div class="alert alert-danger"><button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                        <ul class="error_list"><li>ERROR! no tienes ningun Docente agregado en la base de datos</li></ul>
                    </div>
                    @endif
                    <div class="form-group"> 
                        {{ Form::hidden('semestre',Lang::get($semestre))}}
                        {{ Form::label('iddocente', Lang::get('Docente:'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <?php 
                            $arregloDocente = array();
                            foreach ($Docentetodo as $docente){
                                $nombre = $docente->nombres;
                                $apellidos = $docente->apellidos;
                                $valor = $docente->iddocente;
                                $aux = ["w".$valor=>$nombre." ".$apellidos];
                                $arregloDocente = array_merge($aux,$arregloDocente);
                            }
                            ?>
                            {{Form::select('docente',$arregloDocente)}}
                            <p></p>
                            @if($errors->first('docente') != '')
                                <div class="alert alert-danger"><button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                                    <ul class="error_list"><li>{{ $errors->first('docente') }}</li></ul>
                                </div>
                            @endif
                            @if($docente == '')
                                <div class="alert alert-danger"><button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                                    <ul class="error_list"><li>ERROR! no tienes ningun Docente agregado en la base de datos</li></ul>
                                </div>
                            @endif
                        </div>
        </div>

                    <div class="form-group">
                        {{ Form::label('grupo', Lang::get('Grupo:'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('grupo',null,array('class'=>'form-control','id'=>'grupo','placeholder'=>Lang::get('grupo'))) }}
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
                             {{Form::select('turno',['Maniana'=>'Maniana','Tarde'=>'Tarde','Noche'=>'Noche'])}}
                        </div>
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
                            
                            $arregloSemestrecl = [];
                            foreach ($Asignaturacltodo as $asignaturacl){
                                $nombre = $asignaturacl->nombre_asig_cl;
                                $valor = $asignaturacl->idasignatura_cl;
                                $aux = ['0'.$valor=>$nombre];
                                $arregloSemestrecl = array_merge($aux,$arregloSemestrecl);
                            }
                            
                            $asig1 = empty($arregloAsignatura);
                            $asig2 = empty($arregloSemestrecl);
                            ?> 
                            {{ Form::select('asignatura', array(
                            'Cursos de Carrera' => $arregloAsignatura,
                            'Cursos Libres' => $arregloSemestrecl))}}
                            <p></p>
                            @if(( $asig1== '1')&&($asig2 == '1'))
                                <div class="alert alert-danger"><button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                                    <ul class="error_list"><li>ERROR! no tienes ninguna Asignatura agregado en la base de datos</li></ul>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10" style="margin-left:170px">
                            <br><br>
                            {{ Form::submit(Lang::get('Crear Carga_Academica'), array('class' => 'btn btn-info pull-left')) }}
                            
                        </div>
                    </div>
                </div>
            </div>
            {{ Form::close()}}
        </div>
        <!-- INICIO: BOX PANEL -->
    </div><!-- /.box -->
    @section ('scrips_n')
        <script src="{{asset('/js/ja.js')}}" type="text/javascript"></script>
    @stop
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
@endsection