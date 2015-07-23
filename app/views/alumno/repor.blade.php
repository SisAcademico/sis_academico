@extends('_layouts.app')
@section('titulo')
    @lang('Crear alumno')
@stop
@section ('estilos')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/btn.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/pru.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/adminlte/plugins/datepicker/css/bootstrap-datepicker3.standalone.css')}}">
@stop
@section('titulo_cabecera')
    <h1 style="
    font-size: 23px;
    font-weight: bold;
    color: rgba(0, 0, 0, 0.55);
    margin: 0px auto;
">    Reportes Alumnos</h1>
@stop


@section('contenido')
    <!-- Main row -->
    <div class="negro">
    </div>
    <div class="google-expando--wrap">
      <div class="google-expando">

        <div class="google-expando__icon" style="
    position: fixed;
    right: 1px;
    top: 81%;
">    
          <a href="#"><span class='dada' style="font-size: 29px;color: rgba(255, 255, 255, 0.75);"> + </span></a>

        </div>
        <div class="google-expando__card" aria-hidden="true" >
              {{ Form::open(array('url' => 'alumno', 'files' => true, 'class' => 'form-horizontal')) }}
                <div class="box box-success" style="border-top-color: rgba(0, 0, 0, 0.44);
    border-width: 4px;">
                    <div class="box-header with-border">
                        <h3 class="text-center" style="
    font-size: 21px;
    font-weight: bold;
    color: rgba(0, 0, 0, 0.59);
    margin: 0px;
">Tipo de Reportes</h3>
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
                        $i=0;
                        $codi="";
                    ?>
                    <select name="number" class="form-control"  id="hola1" style="width: 60%;display: inline-block;margin-bottom: 10px; background-color: rgba(0, 0, 0, 0.25); font-size: 15px; font-weight: bold; font-family: monospace; color: rgba(0, 0, 0, 0.51);">
                        @foreach ($curli as $curl)
                            <?php $i++;  ?>
                            <option value="{{$curl->idasignatura}}">{{$curl->nombre_asignatura}}</option>
                            <?php
                                if($i==1){
                                    $codi=$curl->idasignatura;
                                }
                            ?>
                        @endforeach
                    </select>
                    <a href="curso/PDFA/{{$codi}}" id="cu" style="margin-left: 5px;display: inline-block;background-color: rgba(85, 59, 150, 0.87);padding: 7px;border-radius: 7%;font-weight: bold;font-size: 13px;color: white;">Por Cursos</a>
                    <?php
                        $i=0;
                        $codi="";
                    ?>
                    <select name="curso_libre" class="form-control"  id="holas" style="  width: 60%;display: inline-block;margin-bottom: 10px; background-color: rgba(0, 0, 0, 0.25); font-size: 15px; font-weight: bold; font-family: monospace; color: rgba(0, 0, 0, 0.51);">
                        @foreach ($curli1 as $curl1)
                            <?php $i++;  ?>
                            <option value="{{$curl1->idasignatura_cl}}">{{$curl1->nombre_asig_cl}}</option>
                            <?php
                                if($i==1){
                                    $codi=$curl1->idasignatura_cl;
                                }
                            ?>
                        @endforeach
                    </select>
                    <a href="cursolibre/PDFA/{{$codi}}" id="cu_li" style="margin-left: 5px;display: inline-block;background-color: rgba(85, 59, 150, 0.87);padding: 7px;border-radius: 7%;font-weight: bold;font-size: 13px;color: white;">Por Curso Libre</a>



                    <?php
                        $i=0;
                        $codi="";
                    ?>
                    <select name="semestre" class="form-control"  id="holas_sem" style=" width: 60%;display: inline-block;margin-bottom: 10px; background-color: rgba(0, 0, 0, 0.25); font-size: 15px; font-weight: bold; font-family: monospace; color: rgba(0, 0, 0, 0.51);">
                        @foreach ($semest as $curl3)
                            <?php $i++;  ?>
                            <option value="{{$curl3->idsemestre}}">{{$curl3->idsemestre}}</option>
                            <?php
                                if($i==1){
                                    $codi=$curl3->idsemestre;
                                }
                            ?>
                        @endforeach
                    </select>
                    <a href="semestre/PDFA/{{$codi}}" id="smtr" style="margin-left: 5px;display: inline-block;background-color: rgba(85, 59, 150, 0.87);padding: 7px;border-radius: 7%;font-weight: bold;font-size: 13px;color: white;">Por Semestre</a>

                    <?php
                        $i=0;
                        $codi="";
                    ?>
                    <select name="modulo" class="form-control"  id="holas_modu" style=" width: 60%;display: inline-block;margin-bottom: 10px; background-color: rgba(0, 0, 0, 0.25); font-size: 15px; font-weight: bold; font-family: monospace; color: rgba(0, 0, 0, 0.51);">
                        @foreach ($modulo as $curl2)
                            <?php $i++;  ?>
                            <option value="{{$curl2->idmodulo}}">{{$curl2->nombre_modulo}}</option>
                            <?php
                                if($i==1){
                                    $codi=$curl2->idmodulo;
                                }
                            ?>
                        @endforeach
                    </select>
                    <a href="modulo/PDFA/{{$codi}}" id="modll" style="margin-left: 5px;display: inline-block;background-color: rgba(85, 59, 150, 0.87);padding: 7px;border-radius: 7%;font-weight: bold;font-size: 13px;color: white;">Por Módulo</a>
                {{ Form::close() }}
        </div>

      </div>
    </div>
    <!-- <a href="nota/PDFA">Listar Todos Los Alumnos</a> -->


    {{ Form::open(array('class' => 'form-horizontal')) }}
        <div class="box box-success" style="border:none;padding:10px;margin-top:10px;">
            <p>
                <H4>Reporte por Cursos Carrera</H1>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
        </div>
        <div class="box box-success" style="border:none;padding:10px">
            <p>
                <H4>Reporte por Cursos Libres</H1>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
        </div>
        <div class="box box-success" style="border:none;padding:10px">
            <p>
                <H4>Reporte por Cursos Semestre</H1>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
        </div>
        <div class="box box-success" style="border:none;padding:10px">
            <p>
                <H4>Reporte por Cursos Módulo</H1>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
        </div>
    {{ Form::close() }}
    
    @section ('scrips_n')
        <script src="{{asset('/js/ja1.js')}}" type="text/javascript"></script>
        <script src="{{asset('/js/ja.js')}}" type="text/javascript"></script>
        <script src="{{asset('/adminlte/plugins/datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('/adminlte/plugins/datepicker/locales/bootstrap-datepicker.es.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('/js/sis_academico.js')}}" type="text/javascript"></script>
        <script type="text/javascript">
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    
                    reader.onload = function (e) {
                        $('#blah').attr('src', e.target.result);
                    }
                    
                    reader.readAsDataURL(input.files[0]);
                }
            }
    
            $("#imgInp").change(function(){
                readURL(this);
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("select").change(function(){
                    var ho = $( "#holas option:selected" ).val();
                    $("#cu_li").attr("href", "cursolibre/PDFA/"+ho);
                    var ho1 = $( "#hola1 option:selected" ).val();
                    $("#cu").attr("href", "curso/PDFA/"+ho1);

                    var ho2 = $( "#holas_sem option:selected" ).val();
                    $("#smtr").attr("href", "semestre/PDFA/"+ho2);
                    var ho3 = $( "#holas_modu option:selected" ).val();
                    $("#modll").attr("href", "modulo/PDFA/"+ho3);
                });
                
            });
        </script>
    @stop
@endsection
