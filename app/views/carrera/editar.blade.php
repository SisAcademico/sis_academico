@extends('_layouts.app')
@section('titulo')
    @lang('Modificar Carrera')
@stop
@section ('estilos')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/pru.css')}}">
@stop
@section('titulo_cabecera')
    @lang('Carreras')<small>@lang('')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.carrera')</a></li>
    <li class="active">@lang('sistema.modificar_carrera')es</li>
@stop

@section('contenido')
    <!-- Main row -->
    <div class="row">
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
            @foreach($carreras as $Carr)
            {{ Form::open(array('url' => 'carrera/'.$Carr->idcarrera,'method' => 'put', 'files' => true, 'class' => 'form-horizontal')) }}
            <div class="box box-success">
                <div class="box-header with-border" align="center">
                    <h3 class="box-title">Modificar Carrera Profesional</h3>
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
                        {{ Form::label('idcarrera', Lang::get('Codigo Carrera: '),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input id="idcarrera" type="text" placeholder="Codigo Carrera" value="{{$Carr->idcarrera}}" class="form-control" name="idcarrera" maxlength="5" required>
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('nombre_carrera', Lang::get('Nombre de la Carrera: '),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input id="nombre_carrera" type="text" placeholder="Nombre Carrera" value="{{$Carr->nombre_carrera}}" class="form-control" name="nombre_carrera" maxlength="50" required>
                       </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('nro_modulos', Lang::get('Nro. De Modulos: '),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input id="nro_modulos" type="text" placeholder="Nro. de Modulos" value="{{$Carr->nro_modulos}}" class="form-control" name="nro_modulos" onKeyPress="return validar(event)" maxlength="11" required>
                        </div>
                    </div>               

                <div class="box-footer">
                <!-- 
                -->
                    {{ Form::submit(Lang::get('Guardar cambios'), array('class' => 'btn btn-info pull-right')) }}
                </div>
            </div>
            {{ Form::close() }}
                        @endforeach
        </div>
        <!-- INICIO: BOX PANEL -->
    </div><!-- /.box -->
    @section ('scrips_n')
        <script src="{{asset('/js/ja.js')}}" type="text/javascript"></script>
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