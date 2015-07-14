@extends('_layouts.app')
@section('titulo')
    @lang('Asistencia de Docentes')
@stop
@section ('estilos')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/pru.css')}}">
@stop
@section('titulo_cabecera')
    @lang('Asistencia Docentes')<small>@lang('')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.asistencia')</a></li>
    <li class="active">@lang('sistema.asistencia.docente')es</li>
@stop

@section('contenido')
    <!-- Main row -->
    <div class="row">
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
        {{ Form::open(array('url' => 'formulario2','autocomplete' => 'off','class' => 'form-horizontal', 'role' => 'form')) }}



            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Insertar administrador</h3>
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
                    <?php
                        $fecha=date("Y-m-d H:i:s");

                        $semestre = semestre::where('fecha_inicio', '<=',$fecha)->where('fecha_fin', '>=',$fecha)->get();
                       // echo "<br>"."<br>"."<br>". $semestre."<br>";

                        $idsemestre = $semestre[0]->idsemestre;

                        //echo $idsemestre;


                    ?>





                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        {{ Form::label('Semestre', Lang::get('Semestre'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input type="text" readonly="readonly" class="form-control" name = "Semestre"  value="<?php echo $idsemestre ?>"  />
                        </div>
                    </div>
                     <div class="form-group">
                          {{ Form::label('Fecha', Lang::get('Fecha'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input type="text" readonly="readonly" class="form-control" name = "fecha"  value="<?php echo  date("Y-m-d H:i:s")?>"  />
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('Lista Docente', Lang::get('Lista Docente'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-4">
                            <select class="form-control selectpicker " name="Docente">
                            @foreach($listadocentes as $Docentes)
                            <option value = "<?php echo $Docentes->iddocente;?>"> {{$Docentes->iddocente}}- {{$Docentes->apellidos}} {{$Docentes->nombres}}  - {{$Docentes->dni}}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="col-sm-4">
                            <a href="" class="btn btn-success">Seleccione la asignatura</a>
                        </div>

                    </div>



                    <div class="form-group">
                        {{ Form::label('Asignatura', 'Asigantura',array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-4">
                            <?php
                                $resultado = Asignatura::all();
                            ?>
                            <select class="form-control" data-style="btn-success" name="Asignatura">
                              <option  selected value="0">Selecciona un curso</option>
                                @foreach($resultado as $key)
                                  <option value = "<?php echo $key->idasignatura;?>" >{{$key->idasignatura}} - {{$key->nombre_asignatura}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('Asignatura', 'Asiganturas Libres',array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-4">
                    <?php
                            // $resultado = DB::select('SELECT * FROM tasignatura where idasignatura in
                            // (SELECT idasignatura FROM tcarga_academica WHERE iddocente=? AND idsemestre=?)',array($iddeldocente,$iddelsemestre));
                            //
                            // $resultado2 = DB::select('SELECT * FROM tasignatura_cl where idasignatura_cl in
                            // (SELECT idasignatura_cl FROM tcarga_academica WHERE iddocente=? AND idsemestre=?)',array('d0001','2015-VI'));
                            //
                            //$resultado = Asignatura::all();

                            $resultado2 = AsignaturaLibres::all();


                            ?>
                            <select class="form-control" data-style="btn-success" name="AsignaturaL">
                              <option  selected value="0">Selecciona un curso</option>
                                @foreach($resultado2 as $key)
                                  <option value="{{$key->idasignatura_cl}}" >{{$key->idasignatura_cl}} - {{$key->nombre_asig_cl}}</option>
                                @endforeach
                            </select>
                        </div>



                    </div>

                    </div>

                    <?php

                    $Gru=CargaAcademica::select('grupo')->distinct()->get();
                    $Gru1=CargaAcademica::select('turno')->distinct()->get();


                    ?>
                    <div class="form-group">
                        {{ Form::label('Grupo', Lang::get('Grupo'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-4">
                            <select class="form-control selectpicker " name="Grupo">
                            @foreach($Gru as $Grupo1)

                            <option value = "<?php echo $Grupo1->grupo;?>"> {{$Grupo1->grupo}}</option>
                            @endforeach
                            </select>
                        </div>


                    </div>




                    <div class="form-group">
                            {{ Form::label('Turno', Lang::get('Turno'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-4">
                            <select class="form-control selectpicker " name="Turno">
                            @foreach($Gru1 as $Turno1)
                            <option value = "<?php echo $Turno1->turno;?>"> {{$Turno1->turno}}</option>
                            @endforeach
                            </select>
                        </div>


                    </div>







                    <div class="form-group">
                        {{ Form::label('Tema', Lang::get('Tema'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('tema',null,array('class'=>'form-control','id'=>'tema','placeholder'=>Lang::get('tema'))) }}
                            {{ $errors->first('tema')}}
                        </div>
                    </div>



   </div>


                </div>
                <div class="box-footer">
                <!--
                    Se debe insertar en talumno,
                    tfoto(auto_increment, fotoElegida),
                    en tusuario: idusuario = DNI, passwors =DNI //valores por defecto
                    el alumno y usuario tiene por defecto el estado "activo"
                -->
                    {{ Form::submit(Lang::get('Guardar Asistencia'), array('class' => 'btn btn-info pull-right')) }}
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
