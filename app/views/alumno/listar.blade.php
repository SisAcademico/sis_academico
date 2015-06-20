@extends('_layouts.app')
@section('titulo')
    @lang('Crear alumno')
@stop
@section('titulo_cabecera')
    @lang('Alumnos')<small>@lang('')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.alumno')</a></li>
    <li class="active">@lang('sistema.listar_alumno')</li>
@stop


@section('contenido')
    <!-- Main row -->
    <a href="nota/PDFA">Prueba PDF</a>
    <a href="/sis_academico/public/alumno/create">Crear</a>
    <div class="row">
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Listado de Alumnos</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 20px">Id</th>
                            <th >Nombres</th>
                            <th >Correo</th>
                            <th >DNI</th>
                            <th >Estado</th>
                        </tr>
                        <!-- LISTAR ALUMNOS-->
                        @foreach($alumnos as $alu)
                        <tr>
                            <td>{{$alu->idalumno}}</td>
                            <td>{{$alu->nombres}} {{$alu->apellidos}}</td>
                            <td>{{$alu->correo}}</td>
                            <td>{{$alu->dni}}</td>
                            <td>{{$alu->estado}}</td>
                            <td>
                                <!--<a href="/sis_academico/public/alumno/{{ $alu->idalumno }}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                -->
                                <a href="/sis_academico/public/alumno/{{ $alu->idalumno }}/edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
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
