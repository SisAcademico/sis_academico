@extends('_layouts.app')
@section('titulo')
    @lang('Matricula')
@stop
@section ('estilos')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/pru.css')}}">
@stop
@section('titulo_cabecera')
    @lang('Detalle Matricula')<small>@lang('')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('Matricula')</a></li>
    <li class="active">@lang('Detalle Matricula')s</li>
@stop

@section('contenido')
    <!-- Main row -->
    <div class="row">
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
            {{ Form::open(array('url' => 'detalle_matricula', 'files' => true, 'class' => 'form-horizontal')) }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Detalle Matricula</h3>
                </div><!-- /.box-header -->
                <div class="box-header with-border">
                    <center><h3 class="box-title">Elegir Cursos Libres</h3></center>
                </div>
                <input   type='text'   value="{{$id_matricula}}" name="codigomatri" style="display:none" >
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 20px">Codigo</th>
                            <th >Nombre Asignatura Curso Libre</th>
                            <th >Horas Totales</th>
                            <th >Estado</th>
                        </tr>
                        <!-- LISTAR Matriculas-->

                        @foreach($detalleMatricula as $matri)
                            <tr>
                                <td>{{$matri->idasignatura_cl}}</td>
                                <td>{{$matri->nombre_asig_cl}} </td>
                                <td>{{$matri->horas_totales}}</td>
                                <!--<td><input type='checkbox' ></td>-->
                                <td><input id="nombre_asignatura" type='checkbox'   value="{{$matri->idasignatura_cl}}" class="form-control" name="nombrecl"></td>
                            </tr>
                        @endforeach


                    </table>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    {{ Form::submit(Lang::get('Guardar'), array('class' => 'btn btn-info pull-right','id' => 'jajaja')) }}
                </div>
            </div>
            <input id="cacche"  type='text'   value="poder"  name="nombrecl" style="display:none">
            <input type='text'   value="cl"  name="diferenciar" style="display:none">
            {{ Form::close() }}

        </div>
        <!-- INICIO: BOX PANEL -->
    </div><!-- /.box -->
@section ('scrips_n')
    <script src="{{asset('/js/ja.js')}}" type="text/javascript"></script>
    <script src="{{asset('/js/sis_academico.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#jajaja').click(function(){
                var values=$('input:checkbox[name=nombrecl]:checked').map(function(){
                    return this.value;
                }).get();
                $('#cacche').val(values);
            });

        });
    </script>
@stop
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
@endsection