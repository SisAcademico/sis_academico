@extends('_layouts.app')
@section('titulo')
    @lang('Nuevo Matricula')
@stop
@section ('estilos')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/pru.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/btn.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/adminlte/plugins/datepicker/css/bootstrap-datepicker3.standalone.css')}}">
@stop
@section('titulo_cabecera')
    @lang('Matricula')<small>@lang('')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('Matricula')</a></li>
    <li class="active">@lang('Nueva Matricula')</li>
@stop

@section('contenido')



    <!-- Main row -->
    <div class="row">
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
            {{ Form::open(array('url' => 'matricula', 'files' => true, 'class' => 'form-horizontal')) }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Nueva Matricula</h3>
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
                        {{ Form::label('idalumno', Lang::get('Codigo Alumno'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input id="idalumno" type="text" class="form-control" name="idalumno" readonly="readonly" value="{{$alu}}">
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('tipo', Lang::get('Tipo'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{
                                Form::select('idtipo',array('Curso_carrera' => 'CARRERA PROFESIONAL', 'Curso_libre' => 'CURSO LIBRE') ,null,array('class'=>'form-control','id'=>'idtipo'))
                                }}
                        </div>
                    </div>

                        <div class="form-group">
                            {{ Form::label('fecha_matricula', Lang::get('Fecha de Ingreso'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-3">
                                <div class="input-group input-group-sm">
                                    {{ Form::text('fecha_matricula','',array('class'=>'form-control fecha_cal','id'=>'fecha_fin','placeholder'=>Lang::get('sistema.formato_fecha'),'readonly'=>'readonly')) }}
                                    <span class="input-group-btn">
                                  <button class="btn bg-purple btn-flat btn_calen" type="button"><i class="fa fa-calendar"></i></button>
                                </span>
                                </div>
                            </div>
                        </div>

                </div>
                <div class="box-footer">
                    {{ Form::submit(Lang::get('Guardar'), array('class' => 'btn btn-info pull-right')) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
        <!-- INICIO: BOX PANEL -->
    </div><!-- /.box -->
@section ('scrips_n')
    <script>
        $(document).ready(function(){
            $('#btn2').click(function(e){
                e.preventDefault();
                $.ajax({
                        url: '{{url()}}/pago/agregar',
                          type: 'POST',
                            cache: false,
                            data: $('form#add').serialize(),
                            dataType: 'json',
                            beforeSend: function(){
                                $("#nro_boleta").val('');
                            },
                            sucess: function(data)
                            {
                                $('#idboleta').val($('#nro_boleta').val());
                            }
                        });
            });
        });
    </script>
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
            patron = /1/; //ver nota
            te = String.fromCharCode(tecla);
            return patron.test(te);
        }
    </script>
@stop
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
@endsection
