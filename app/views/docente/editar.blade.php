@extends('_layouts.app')
@section('titulo')
    @lang('Editar Docente')
@stop
@section ('estilos')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/pru.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/adminlte/plugins/datepicker/css/bootstrap-datepicker3.standalone.css')}}">
@stop
@section('titulo_cabecera')
    @lang('Docentes')<small>@lang('')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.docente')</a></li>
    <li class="active">@lang('sistema.insertar_docente')s</li>
@stop

@section('contenido')
    <!-- Main row -->
    <div class="row">
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
            @foreach($docentes as $doc)
            {{ Form::open(array('url' => 'docente/'.$doc->iddocente,'method' => 'put', 'files' => true, 'class' => 'form-horizontal')) }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Editar Docente</h3>
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
                        {{ Form::label('id_docente', Lang::get('Código Docente'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input id="id_docente" type="text" placeholder="Código del Docente" readonly="readonly"   value="{{$doc->iddocente}}" class="form-control" name="id_docente" maxlength="5" required>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('nombres', Lang::get('DNI'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input id="dni" type="text" placeholder="DNI" value="{{$doc->dni}}" class="form-control" name="dni" onKeyPress="return validar(event)" maxlength="8" required>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('nombres', Lang::get('Nombres'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input id="nombres" type="text" placeholder="Nombres" value="{{$doc->nombres}}" class="form-control" name="nombres"  maxlength="50" required>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('apellidos', Lang::get('Apellidos'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input id="apellidos" type="text" placeholder="Apellidos" value="{{$doc->apellidos}}" class="form-control" name="apellidos"  maxlength="60" required>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('direccion', Lang::get('Dirección'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input id="direccion" type="text" placeholder="Dirección" value="{{$doc->direccion}}" class="form-control" name="direccion"  maxlength="90" required>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('telefono', Lang::get('Teléfono'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                                <input id="telefono" type="text" placeholder="Teléfono"  value="{{$doc->telefono}}" class="form-control" name="telefono" onKeyPress="return validar(event)" maxlength="9" minlength="6" required>
                            </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('correo', Lang::get('Correo'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input id="correo" type="email" placeholder="Correo" value="{{$doc->correo}}" class="form-control" name="correo"  required>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('cargo', Lang::get('Cargo'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <SELECT id="cargo" name="cargo" SIZE=1 > 
                                <option>{{$doc->cargo}}</option>
                                <OPTION VALUE="Docente" >Docente</OPTION>
                                <OPTION value="Director">Director</OPTION>
                                <OPTION value="Cordinador">Cordinador</OPTION>
                            </SELECT> 
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('fecha', Lang::get('Fecha de Ingreso'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-3">
                            <div class="input-group input-group-sm">
                                {{ Form::text('fecha',$doc->fecha_inicio,array('class'=>'form-control fecha_cal','id'=>'fecha_fin','placeholder'=>Lang::get('sistema.formato_fecha'),'readonly'=>'readonly')) }}
                                <span class="input-group-btn">
                                  <button class="btn bg-blue btn-flat btn_calen" type="button"><i class="fa fa-calendar"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('foto', Lang::get('Foto'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::file('photo') }} 
                        </div> 
                    </div>
                </div>
                <div class="box-footer">
                    {{ Form::submit(Lang::get('Editar Docente'), array('class' => 'btn btn-info pull-right')) }}
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
        </script>
    @stop
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
@endsection
