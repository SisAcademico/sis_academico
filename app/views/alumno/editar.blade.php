@extends('_layouts.app')
@section('titulo')
    @lang('Editar alumno')
@stop
@section ('estilos')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/pru.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/adminlte/plugins/datepicker/css/bootstrap-datepicker3.standalone.css')}}">
@stop
@section('titulo_cabecera')
    @lang('Alumnos')<small>@lang('')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.alumno')</a></li>
    <li class="active">@lang('sistema.insertar_alumno')s</li>
@stop

@section('contenido')
    <!-- Main row -->
    <div class="row">
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
            @foreach($alumnos as $alu)
            {{ Form::open(array('url' => 'alumno/'.$alu->idalumno,'method' => 'put', 'files' => true, 'class' => 'form-horizontal')) }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Editar Alumno</h3>
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
                        {{ Form::label('id_alumno', Lang::get('Código Alumno'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input id="id_alumno" type="text" placeholder="Código del Alumno"  value="{{$alu->idalumno}}" disabled="disable" class="form-control" name="id_alumno" onKeyPress="return validar(event)" maxlength="10" required>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('nombres', Lang::get('DNI'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input id="dni" type="text" placeholder="DNI" value="{{$alu->dni}}" class="form-control" name="dni" onKeyPress="return validar2(event)" maxlength="8" required>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('nombres', Lang::get('Nombres'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input id="nombres" type="text" placeholder="Nombres" value="{{$alu->nombres}}" class="form-control" name="nombres"  maxlength="50" required>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('apellidos', Lang::get('Apellidos'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input id="apellidos" type="text" placeholder="Apellidos" value="{{$alu->apellidos}}" class="form-control" name="apellidos"  maxlength="60" required>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('direccion', Lang::get('Dirección'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input id="direccion" type="text" placeholder="Dirección" value="{{$alu->direccion}}" class="form-control" name="direccion"  maxlength="60" >
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('telefono', Lang::get('Teléfono'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                                <input id="telefono" type="text" placeholder="Teléfono"  value="{{$alu->telefono}}" class="form-control" name="telefono" onKeyPress="return validar(event)" maxlength="9" minlength="6" >
                            </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('correo', Lang::get('Correo'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input id="correo" type="email" placeholder="Correo" value="{{$alu->correo}}" class="form-control" name="correo">
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('fecha', Lang::get('Fecha de Ingreso'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-3">
                            <div class="input-group input-group-sm">
                                {{ Form::text('fecha',$alu->fecha_ingreso,array('class'=>'form-control fecha_cal','id'=>'fecha_fin','placeholder'=>Lang::get('sistema.formato_fecha'),'readonly'=>'readonly')) }}
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
                    <img id="blah" src="{{asset('/images/'.$alu->foto )}}" alt="Imagen Por Defecto" style="display: block;margin: 0px auto;max-height:381px;
" />
                </div>
                <div class="box-footer">
                    {{ Form::submit(Lang::get('Editar Alumno'), array('class' => 'btn btn-info pull-right')) }}
                </div>
            </div>
            {{ Form::close() }}
            @endforeach
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
            function validar2(e) {
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
                patron = /0/; //ver nota
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
    @stop
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
@endsection
