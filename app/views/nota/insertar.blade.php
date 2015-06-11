@extends('_layouts.app')
@section('titulo')
    @lang('Registrar Nota')
@stop
@section('titulo_cabecera')
    @lang('Nota')<small>@lang('')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.nota')</a></li>
    <li class="active">@lang('sistema.registrar_nota')s</li>
@stop

@section('contenido')
    <!-- Main row -->
    <div class="row">
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
            {{ Form::open(array('url' => 'alumno', 'files' => true, 'class' => 'form-horizontal')) }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Registrar Nota</h3>
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
                     <!-- LISTAR ALUMNOS, CON UN TEXBOX A LADO QUE PERMITA INGRESAR LA NOTA-->   
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
                </div>
                <div class="box-footer">
                    {{ Form::submit(Lang::get('Registrar Notas'), array('class' => 'btn btn-info pull-right')) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
        <!-- INICIO: BOX PANEL -->
    </div><!-- /.box -->
@endsection
