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
    @lang('Alumnos')<small>@lang('')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.alumno')</a></li>
    <li class="active">@lang('sistema.listar_alumno')</li>
@stop


@section('contenido')
    <!-- Main row -->
    <div class="negro">
    </div>
    <div class="google-expando--wrap">
      <div class="google-expando">

        <div class="google-expando__icon" style="position: fixed;right: 1px;top: 81%;">    
          <a href="#"><span class='dada' style="font-size: 29px;color: rgba(255, 255, 255, 0.8);"> + </span></a>
        </div>
        

        <div class="google-expando__card" aria-hidden="true" >
              {{ Form::open(array('url' => 'alumno', 'files' => true, 'class' => 'form-horizontal')) }}
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Insertar Alumno</h3>
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
                            {{ Form::label('id_alumno', Lang::get('Código'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-10">
                                <input id="id_alumno"  type="text" value="{{$cuan}}" class="form-control" name="id_alumno"  maxlength="10" required>
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('nombres', Lang::get('DNI'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-10">
                                <input id="dni" type="text" placeholder="DNI" class="form-control" name="dni" onKeyPress="return validar(event)" maxlength="8">
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('nombres', Lang::get('Nombres'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-10">
                                <input id="nombres" type="text" placeholder="Nombres"  class="form-control" name="nombres"  maxlength="50" required>
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('apellidos', Lang::get('Apellidos'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-10">
                                <input id="apellidos" type="text" placeholder="Apellidos"  class="form-control" name="apellidos"  maxlength="60" required>
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('direccion', Lang::get('Dirección'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-10">
                                <input id="direccion" type="text" placeholder="Dirección" class="form-control" name="direccion"  maxlength="60">
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('telefono', Lang::get('Teléfono'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-10">
                                <input id="telefono" type="text" placeholder="Teléfono" class="form-control" name="telefono" onKeyPress="return validar(event)" maxlength="9">
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('correo', Lang::get('Correo'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-10">
                                <input id="correo" type="email" placeholder="Correo" class="form-control" name="correo">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            {{ Form::label('fecha', Lang::get('Fecha'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-5">
                                <div class="input-group input-group-sm">
                                    {{ Form::text('fecha',null,array('class'=>'form-control fecha_cal','id'=>'fecha_fin','placeholder'=>Lang::get('sistema.formato_fecha'),'readonly'=>'readonly', 'size' =>'20')) }}
                                    <span class="input-group-btn">
                                      <button class="btn bg-blue btn-flat btn_calen" type="button"><i class="fa fa-calendar"></i></button>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('foto', Lang::get('Foto'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-10">
                                <input name="fphoto" type="file" id="imgInp" class="btn btn-info" >
                            </div>
                        </div>
                        <img id="blah" src="{{asset('/images/default.png')}}" alt="Imagen Por Defecto" style="display: block;margin: 0px auto;
" />
                    </div>
                    <div class="box-footer">
                        <input class="btn btn-info pull-right" type="submit" value="Crear Alumno">
                    </div>
                </div>
                {{ Form::close() }}
        </div>

      </div>
    </div>
    <!-- <a href="nota/PDFA">Listar Todos Los Alumnos</a> -->
    <div class="negros">
    </div>
    <div class="google-expando--wrap">
      <div class="google-expando">

        <div class="pdfss" style="position: fixed;right: 1px;">    
          <a href="#"><img src="{{asset('/images/pdf.png')}}"></a>
    </div>
        

        <div class="google-expando__card" aria-hidden="true" >
              {{ Form::open(array('url' => 'alumno', 'files' => true, 'class' => 'form-horizontal')) }}
                <div class="box box-success" style="border-top-color: rgba(0, 0, 0, 0.44);border-width: 4px;">
                    <div class="box-header with-border">
                        <h3 class="text-center" style="font-size: 21px;font-weight: bold;color: rgba(0, 0, 0, 0.59);margin: 0px;">Tipo de Reportes</h3>
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
                </div>
                {{ Form::close() }}
        </div>

      </div>
    </div>

    <div class="row">
        <!-- INICIO: BOX PANEL -->
        @if (count($errors) > 0)
                            <div class="alert alert-danger fade in">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <ul class="error_list">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
        @endif
        <div class="col-md-12 col-sm-8">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Listado de Alumnos</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 30px">Código</th>
                            <th >Nombres</th>
                            <th >Correo</th>
                            <th >DNI</th>
                            <th >Estado</th>
                        </tr>
                        <!-- LISTAR ALUMNOS-->
                        @foreach($alumnos as $alu)
                        <tr>
                            <td>{{$alu->idalumno}}</td>
                            <td>{{$alu->nombres}} {{$alu->apellidos}}</td>
                            <td>{{$alu->correo}}</td>
                            <td>{{$alu->dni}}</td>
                            <td>{{$alu->estado}}</td>
                            <td>
                                <!--<a href="/sis_academico/public/alumno/{{ $alu->idalumno }}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                -->
                                <a href="{{URL::to( '/alumno') }}/{{ $alu->idalumno }}/edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        
                    </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix text-center">
					{{$alumnos-> links();}}
                </div>
            </div><!-- /.box -->
        </div>
        <!-- INICIO: BOX PANEL -->
    </div><!-- /.box -->
    @section ('scrips_n')
        <script src="{{asset('/js/ja1.js')}}" type="text/javascript"></script>
        <script src="{{asset('/js/ja.js')}}" type="text/javascript"></script>
        <script src="{{asset('/adminlte/plugins/datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('/adminlte/plugins/datepicker/locales/bootstrap-datepicker.es.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('/js/sis_academico.js')}}" type="text/javascript"></script>
        <script type="text/javascript">
            function validar(e) {
                tecla = (document.all) ? e.keyCode : e.which;
                if (tecla==8) return true; 
                if (tecla==44) return true; 
                if (tecla==48) return true;
                if (tecla==49) return true;
                if (tecla==50) return true;
                if (tecla==51) return true;
                if (tecla==52) return true;
                if (tecla==53) return true;
                if (tecla==54) return true;
                if (tecla==55) return true;
                if (tecla==56) return true;
                if (tecla==57) return true;
                patron = /1/; //ver nota
                te = String.fromCharCode(tecla);
                return patron.test(te); 
            } 
        </script>
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
