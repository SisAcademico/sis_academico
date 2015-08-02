@extends('_layouts.app')
@section('titulo')
    @lang('Detalles Matricula')
@stop
@section ('estilos')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/btn.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/pru.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/adminlte/plugins/datepicker/css/bootstrap-datepicker3.standalone.css')}}">
@stop
@section('titulo_cabecera')
    @lang('Detalles Matricula')<small>@lang('')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('Detalle Matricula')</a></li>
    <li class="active">@lang('Listar Detalle Matricula')</li>
@stop


@section('contenido')
    <!-- Main row -->
    <!--<a href="/sis/sis_academico/public/matricula/insertar">Crear</a>-->


    <div class="negros">
    </div>
    <div class="google-expando--wrap">
      <div class="google-expando">

            <div class="pdfss" style="position: fixed;right: 1px;">    
                  <a href="#"><img src="{{asset('/images/pdf.png')}}"></a>
            </div>
                

                <div class="google-expando__card" aria-hidden="true" >
                      {{ Form::open(array('url' => 'matricula', 'files' => true, 'class' => 'form-horizontal')) }}
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


                            <a href="matricula/detalle/PDFA/{{$idalumno}}" id="mc" style="margin-left: 5px;display: inline-block;background-color: rgba(85, 59, 150, 0.87);padding: 7px;border-radius: 7%;font-weight: bold;font-size: 13px;color: white;">Por Curso</a>
                            <br>
                            <br>
                            <a href="matriculacl/detalle/PDFA/{{$idalumno}}" id="mcl" style="margin-left: 5px;display: inline-block;background-color: rgba(85, 59, 150, 0.87);padding: 7px;border-radius: 7%;font-weight: bold;font-size: 13px;color: white;">Por Curso Libre</a>
                      </div>
                        {{ Form::close() }}
                      </div>

              </div>
            </div>
            </div>
    
    <div class="row">
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">{{$nombrealumno}}</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 20px">ID Asignatura</th>
                            <th >Nombre Asignatura</th>
                            <th >Horas Semanales</th>
                            <th >Horas Totales</th>

                        </tr>
                        <!-- LISTAR Matriculas-->
                        @foreach($matricula_detalles as $matri)
                            <tr>
                                <td>{{$matri->idasignatura}}</td>
                                <td>{{$matri->nombre_asignatura}}</td>
                                <td>{{$matri->horas_semanales}} </td>
                                <td>{{$matri->horas_totales}}</td>
                            </tr>
                        @endforeach
                        @foreach($matriculacl_detalles as $matri)
                            <tr>
                                <td>{{$matri->idasignatura_cl}}</td>
                                <td>{{$matri->nombre_asig_cl}}</td>
                                <td>{{""}}</td>
                                <td>{{$matri->horas_totales}}</td>
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
        <script src="{{asset('/adminlte/plugins/datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('/adminlte/plugins/datepicker/locales/bootstrap-datepicker.es.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('/js/sis_academico.js')}}" type="text/javascript"></script>
        
    @stop
@endsection
