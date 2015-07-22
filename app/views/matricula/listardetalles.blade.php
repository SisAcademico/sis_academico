@extends('_layouts.app')
@section('titulo')
    @lang('Detalles Matricula')
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
    <a href="/matricula/detalle/PDFA/{{$idalumno}}">Prueba PDF</a>
    
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
@endsection
