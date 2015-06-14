@extends('_layouts.app')
@section('titulo')
    @lang('Crear Nota')
@stop
@section('titulo_cabecera')
    @lang('Notas')<small>@lang('')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.nota')</a></li>
    <li class="active">@lang('sistema.ingresar_nota')</li>
@stop


@section('contenido')
    <!-- Main row -->
    <a >Ingresar</a>
    <div class="row">
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
        {{ Form::open(array( 'files' => true, 'class' => 'form-horizontal', 'action' => array('NotaController@store') )) }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Ingresar Notas</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 20px">Codigo</th>
                            <th >Nombres</th>
                            <th >Apellidos</th>
                            <th >Nota</th>
                        </tr>
                        <!-- LISTAR ALUMNOS-->
                       @if(!empty($datos))
                            <ul class="nav">
                                NO VACIO
                                @foreach($datos as $data)
                                <tr>
                                    <td>{{$data->idalumno}}</td>
                                    <td>{{$data->nombres}} </td>
                                    <td>{{$data->apellidos}}</td>

                                    <td>
                                    @if(empty($data->nota))
                                        NSP
                                    @else
                                        {{$data->nota}}
                                    @endif      
                                    </td>
                                    <td>
                                    <input type="text"   value = "12">
                                    </td>

                                </tr>
                                @endforeach
                        @endif  

                        @if(empty($datos))
                            <ul >
                                  VACIO
                            </ul> 
                        @endif
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
                <div class="box-footer">
                    {{ Form::submit(Lang::get('Ingresar Notas'), array('class' => 'btn btn-info pull-right')) }}
                </div>
            </div><!-- /.box -->
             {{ Form::close() }}
        </div>
        <!-- INICIO: BOX PANEL -->
    </div><!-- /.box -->
@endsection
