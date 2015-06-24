@extends('_layouts.app')
@section('titulo')
    @lang('Modificar administrador')
@stop
@section ('estilos')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/pru.css')}}">
@stop
@section('titulo_cabecera')
    @lang('Administradores')<small>@lang('')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.administrador')</a></li>
    <li class="active">@lang('sistema.modificar_administrador')es</li>
@stop

@section('contenido')
    <!-- Main row -->
    <div class="row">
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
            {{ Form::open(array('url' => 'formulario/'.$administradoraeditar[0]->idadministrador,'autocomplete' => 'off','class' => 'form-horizontal', 'role' => 'form')) }}
            <div class="box box-success">
                <div class="box-header with-border" align="center">
                    <h3 class="box-title">Modificar Administrador</h3>
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
                        {{ Form::label('id_administrador', Lang::get('ID Admin: '),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input id="id_administrador" type="text" placeholder="ID Admin"  value="{{$administradoraeditar[0]->idadministrador}}" class="form-control" name="id_administrador" onKeyPress="return validar(event)" maxlength="10" required>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('dni', Lang::get('Dni: '),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                               <input id="DNI" type="text" placeholder="DNI" value="{{$administradoraeditar[0]->dni}}" class="form-control" name="DNI" onKeyPress="return validar(event)" maxlength="8" required>
                        </div>
                    </div>  
                    <div class="form-group">
                        {{ Form::label('nombres', Lang::get('Nombres: '),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input id="NOMBRES" type="text" placeholder="Nombres" value="{{$administradoraeditar[0]->nombres}}" class="form-control" name="NOMBRES"  maxlength="50" required>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('apellidos', Lang::get('Apellidos: '),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                             <input id="APELLIDOS" type="text" placeholder="Apellidos" value="{{$administradoraeditar[0]->apellidos}}" class="form-control" name="APELLIDOS"  maxlength="60" required>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('direccion', Lang::get('Direccion: '),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input id="DIRECCION" type="text" placeholder="Dirección" value="{{$administradoraeditar[0]->direccion}}" class="form-control" name="DIRECCION"  maxlength="60" required>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('telefono', Lang::get('Telefono: '),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                                <input id="TELEFONO" type="text" placeholder="Teléfono"  value="{{$administradoraeditar[0]->telefono}}" class="form-control" name="TELEFONO" onKeyPress="return validar(event)" maxlength="9" minlength="6" required>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('correo', Lang::get('Correo: '),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input id="CORREO" type="email" placeholder="Correo" value="{{$administradoraeditar[0]->correo}}" class="form-control" name="CORREO"  required>
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
                            <input id="ESTADO" type="text" placeholder="Estado" value="{{$administradoraeditar[0]->estado}}" class="form-control" name="ESTADO"  maxlength="20" required>
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