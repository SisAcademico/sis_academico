@extends('_layouts.app')
@section('titulo')
    @lang('Matriculas')
@stop
@section('titulo_cabecera')
    @lang('Matriculas')<small>@lang('')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('Matricula')</a></li>
    <li class="active">@lang('Listar Matricula')</li>
@stop


@section('contenido')
    <!-- Main row -->
    <!--<a href="/sis/sis_academico/public/matricula/insertar">Crear</a>-->
    <div class="row">
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Listado de Matriculas</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 20px">Codigo</th>
                            <th >Tipo</th>
                            <th >Codigo del Alumno</th>
                            <th >Alumno</th>
                            <th >Fecha Matricula </th>
                            <th >Nro Boleta</th>
                            <th >Editar</th>
                            <th >Detalle</th>

                        </tr>
                        <!-- LISTAR Matriculas-->

                        @foreach($matricula as $matri)
                            <tr>
                                <td>{{$matri->idmatricula}}</td>
                                <td>{{$matri->tipo}} </td>
                                <td>{{$matri->idalumno}}</td>
                                <td>{{$matri->nombres}} {{$matri->apellidos}}</td>
                                <td>{{$matri->fecha_matricula}}</td>
                                <td>{{$matri->nro_boleta}}</td>
                                <td>
                                    <a href="/sis/sis_academico/public/matricula/{{ $matri->idmatricula }}/edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                </td>
                                <td>
                                    <a href="/sis/sis_academico/public/detalleMatricula/{{ $matri->idmatricula }}/detail" class="btn btn-xs btn-primary"><i class="fa fa-asterisk"></i></a>
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
