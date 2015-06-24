@extends('_layouts.app')
@section('titulo')
    @lang('Crear Administrador')
@stop
@section ('estilos')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/pru.css')}}">
@stop
@section('titulo_cabecera')
    @lang('Administrador')<small>@lang('')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.administrador')</a></li>
    <li class="active">@lang('sistema.administrador')es</li>
@stop

@section('contenido')
    <!-- Main row -->
    <div class="row">
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
        {{ Form::open(array('url' => 'formulario','autocomplete' => 'off','class' => 'form-horizontal', 'role' => 'form')) }}
            <div class="box box-success">
                <div class="box-header with-border " align="center" >
                    <h3 class="box-title">AGREGAR ADMINISTRADOR</h3>
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
                        {{ Form::label('id_administrador', Lang::get('ID Administrador: '),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input id="id_administrador"  type="text" placeholder="Código del Admin" class="form-control" name="id_administrador" onKeyPress="return validar(event)" maxlength="10" required>
                        </div>
                    </div>
                    <div class="form-group">
                            {{ Form::label('dni', Lang::get('Dni: '),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input id="dni" type="text" placeholder="DNI" class="form-control" name="dni" onKeyPress="return validar(event)" maxlength="8" required>

                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('nombres', Lang::get('Nombres: '),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input id="nombres" type="text" placeholder="Nombres"  class="form-control" name="nombres"  maxlength="50" required>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('apellidos', Lang::get('Apellidos: '),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                                <input id="apellidos" type="text" placeholder="Apellidos"  class="form-control" name="apellidos"  maxlength="60" required>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('direccion', Lang::get('Direccion: '),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                                <input id="direccion" type="text" placeholder="Dirección" class="form-control" name="direccion"  maxlength="60" required>
                       </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('telefono', Lang::get('Telefono: '),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                                <input id="telefono" type="text" placeholder="Teléfono" class="form-control" name="telefono" onKeyPress="return validar(event)" maxlength="9" required>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('correo', Lang::get('Correo: '),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                             <input id="correo" type="email" placeholder="Correo" class="form-control" name="correo"  required>
                         </div>
                    </div>
                    
                    <div class="form-group">
                        {{ Form::label('foto', Lang::get('Foto: '),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                             {{ Form::file('photo') }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('estado', Lang::get('Estado: '),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input id="estado" type="text" placeholder="estado"  class="form-control" name="estado"  maxlength="20" required>
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
                    {{ Form::submit(Lang::get('Crear administrador'), array('class' => 'btn btn-info pull-right')) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
        <!-- INICIO: BOX PANEL -->
    </div><!-- /.box -->
    @section ('scrips_n')
        <script src="{{asset('/js/ja.js')}}" type="text/javascript"></script>
                <script src="{{asset('/js/ja.js')}}" type="text/javascript"></script>
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
    @stop
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
@endsection