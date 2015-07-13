@extends('_layouts.app')
@section('titulo')
    @lang('sistema.asignaturas')
@stop
@section('titulo_cabecera')
    @lang('sistema.listar_asignaturas')<small>@lang('sistema.listar_asignaturas')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.asignaturas')</a></li>
    <li class="active">@lang('sistema.asignaturas')s</li>
@stop

@section('contenido')
    <!-- Main row -->
    <div class="row" >
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Listado de Asignaturas</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 10px">Id</th>
                            <th>Nombre Asignatura</th>
                            <th>Horas Semanales</th>
                            <th>Horas Totales</th>
                            <th>Modulo</th>
                            <th>Carrera</th>
                            <th>Pre Requisito</th>
                            <th style="width: 80px">Accion</th>
                        </tr>


                        @foreach($asignatura as $asig)
                            <tr>
                                <td>{{ $asig->idasignatura }}</td>
                                <td>{{ $asig->nombre_asignatura }}</td>
                                <td>{{ $asig->horas_semanales }}</td>
                                <td>{{ $asig->horas_totales }}</td>
                                <td>{{ $asig->nombre_modulo }}</td>
                                <td>{{ $asig->nombre_carrera }}</td>
                                <td>{{ $asig->pre_requisito }}</td>
                                <!--<form action="actualizar.blade.php" method="post">-->
                                <td>
                                    <a href="/sis_academico/public/asignatura/{{ $asig->idasignatura}}/edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
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
@endsection
