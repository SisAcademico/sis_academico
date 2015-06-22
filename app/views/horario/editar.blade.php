@extends('_layouts.app')
@section('titulo')
    @lang('Horario')
@stop
@section ('estilos')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/btn.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/pru.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/mireloj.css')}}">
@stop
@section('titulo_cabecera')
    @lang('Horario')<small>@lang('')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.horario')</a></li>
    <li class="active">@lang('sistema.editar_horario')s</li>
@stop

@section('contenido')
    <!-- Main row -->
    <div class="row">
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
            @foreach($horarios as $horario)
            {{ Form::open(array('url' => 'horario/'.$horario->idhorario,'method' => 'put', 'files' => true, 'class' => 'form-horizontal')) }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Editar Horario</h3>
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
                    <input type="hidden" id="hora_inicio_antigua" value="{{ $horario->hora_inicio}}">
                    <input type="hidden" id="hora_fin_antigua" value="{{ $horario->hora_fin}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    	<div class="form-group">
                            {{ Form::label('Id', Lang::get('Id'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-10">
                                {{ Form::text('id',$horario->idhorario,array('class'=>'form-control','id'=>'Hora Inicio','placeholder'=>Lang::get('Inicio'), 'readonly' => 'true')) }}
                            </div>
                        </div>
                   		<div class="form-group">
                            {{ Form::label('hora_inicio', Lang::get('Hora  de Inicio'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-10">
                                <?php 
                                echo "<input id=\"input-a\" value=\"".$horario->hora_inicio."\" data-default=\"20:48\" class=\"form-control\" name=\"hora_inicio\" onKeyPress=\"return validar(event)\" maxlength=\"9\" required>";
                                ?>
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('hora_fin', Lang::get('Hora de Fin'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-10">
                                <?php 
                                echo "<input id=\"input-b\" value=\"".$horario->hora_fin."\" data-default=\"20:48\" class=\"form-control\" name=\"hora_fin\" onKeyPress=\"return validar(event)\" maxlength=\"9\" required>";
                                ?>
                            </div>
                        </div>
                </div>
                <div class="box-footer">
                    {{ Form::submit(Lang::get('Modificar Horario'), array('class' => 'btn btn-info pull-right', 'onclick' => 'validacionHoras()')) }}
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
        <script src="{{asset('/js/mireloj.js')}}" type="text/javascript"></script>
        <script src="{{asset('/js/dos.js')}}" type="text/javascript"></script>
        <script type="text/javascript">
            function validar(e) {
                tecla = (document.all) ? e.keyCode : e.which;
                if (tecla==8) return true; 
                if (tecla==44) return true; 
                if (tecla==48) return false;
                if (tecla==49) return false;
                if (tecla==50) return false;
                if (tecla==51) return false;
                if (tecla==52) return false;
                if (tecla==53) return false;
                if (tecla==54) return false;
                if (tecla==55) return false;
                if (tecla==56) return false;
                patron = /1/; //ver nota
                te = String.fromCharCode(tecla);
                return patron.test(te); 
            } 
            function validacionHoras()
            {
                inicio = document.getElementById("input-a").value;
                fin = document.getElementById("input-b").value;
                if(inicio >= fin)
                {
                    alert('La hora de inicio debe ser menor que la hora de fin');
                    document.getElementById("input-a").value = document.getElementById("hora_inicio_antigua").value;
                    document.getElementById("input-b").value = document.getElementById("hora_fin_antigua").value;
                    return false;
                }
                else
                {
                    return true;
                }
            }
        </script>   
        <script src="{{asset('/js/ja.js')}}" type="text/javascript"></script>
    @stop
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
@endsection
