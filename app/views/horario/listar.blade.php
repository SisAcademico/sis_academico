@extends('_layouts.app')
@section('titulo')
    @lang('Crear Horario')
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
    <li class="active">@lang('sistema.crear_horario')</li>
@stop


@section('contenido')
    <!-- Main row -->
    <div class="negro">
    </div>
    <div class="google-expando--wrap">
      <div class="google-expando">

        <div class="google-expando__icon">    
          <a href="#"><span class='dada' style="font-size: 29px;color: rgba(255, 255, 255, 0.8);"> + </span></a>

        </div>
        <div class="google-expando__card" aria-hidden="true">
              {{ Form::open(array('url' => 'horario', 'files' => true, 'class' => 'form-horizontal' )) }}
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Insertar Horario</h3>
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
                            {{ Form::label('hora_inicio', Lang::get('Hora  de Inicio'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-10">
                                <input id="input-a" value="" data-default="20:48" class="form-control" name="hora_inicio" onKeyPress="return validar(event)" maxlength="9" required>
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('hora_fin', Lang::get('Hora de Fin'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-10">
                                <input id="input-b" value="" data-default="20:48" class="form-control" name="hora_fin" onKeyPress="return validar(event)" maxlength="9" required>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        {{ Form::submit(Lang::get('Crear Horario'), array('class' => 'btn btn-info pull-right', 'onclick' => 'validacionHoras()')) }}
                    </div>
                </div>
                {{ Form::close() }}
        </div>

      </div>
    </div>
    <a href="horario/PDFA">Prueba PDF</a>

    <div class="row">
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Listado de Horarios</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 20px">Nro</th>
                            <th >Hora Inicio</th>
                            <th >Hora Fin</th>
                        </tr>
                        <!-- LISTAR HORARIOS-->
                        <?php $i=1 ?>
                        @foreach($horarios as $horario)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$horario->hora_inicio}}</td>
                            <td>{{$horario->hora_fin}}</td>
                            <td>
                                <a href="/sis_academico/public/horario/{{ $horario->idhorario }}/edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                            </td>

                        </tr>
                        @endforeach
                       
                        
                    </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix text-center">
                    <ul class="pagination pagination-sm no-margin">
                        <li><a href="#">&laquo;</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div><!-- /.box -->
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
                var inicio = document.getElementById("input-a").value;
                var fin = document.getElementById("input-b").value;
                if(inicio >= fin)
                {
                    alert('La hora de inicio debe ser menor que la hora de fin');
                    document.getElementById("input-b").value = "";
                    return false;
                }
                else
                {
                    return true;
                }
            }
        </script>
    @stop
@endsection
