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



    <?php
        $i=0;
        $codi="";
    ?>
    <select name="semestre" class="form-control" style="width: 25%;border:none;" id="holas_sem">
        @foreach ($semest as $curl3)
            <?php $i++;  ?>
            <option value="{{$curl3->idsemestre}}">{{$curl3->idsemestre}}</option>
            <?php
                if($i==1){
                    $codi=$curl3->idsemestre;
                }
            ?>
        @endforeach
    </select>
    <a href="semestreMatricula/PDFA/{{$codi}}" id="smtr">Semestre</a>

    <?php
        $i=0;
        $codi="";
    ?>
    <select name="mes" class="form-control" style="width: 25%;border:none;" id="holas_mes">
      <?php $i++;  ?>
      <option value="1">Enero</option>
      <option value="2">Febrero</option>
      <option value="3">Marzo</option>
      <option value="4">Abril</option>
      <option value="5">Mayo</option>
      <option value="6">Junio</option>
      <option value="7">Julio</option>
      <option value="8">Agosto</option>
      <option value="9">Setiembre</option>
      <option value="10">Octubre</option>
      <option value="11">Noviembre</option>
      <option value="12">Diciembre</option>
       <?php
            if($i==1){
                $codi='1';
            }
        ?>
    </select>
    <a href="mesMatricula/PDFA/{{$codi}}" id="ms">Mes</a>



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

                            <th >Editar</th>
                            <th >Detalle</th>

                        </tr>
                        <!-- LISTAR Matriculas-->

                        <!-- @foreach($matricula as $matri)-->
                            <tr>
                                <td>{{$matri->idmatricula}}</td>
                                <td>{{$matri->tipo}} </td>
                                <td>{{$matri->idalumno}}</td>
                                <td>{{$matri->nombres}} {{$matri->apellidos}}</td>
                                <td>{{$matri->fecha_matricula}}</td>


                                <td>
                                     <a href="{{URL::to('/matricula') }}/{{ $matri->idmatricula }}/edit" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                                </td>
                                <td>
                                    <a href="{{URL::to('/matricula') }}/detalle/{{ $matri->idalumno }}" class="btn btn-xs btn-primary"><i class="fa fa-list"></i></a>
                                </td>
                            </tr>
                        <!--@endforeach-->

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
