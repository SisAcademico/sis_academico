@extends('_layouts.app')
@section('titulo')
    @lang('Crear Aula Carga')
@stop
@section('titulo_cabecera')
    @lang('Aula Carga')<small>@lang('')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.listar')</a></li>
    <li class="active">@lang('sistema.listar_aula_carga')</li>
@stop


@section('contenido')
    <!-- Main row -->
    <div class="row">
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">LISTA DE AULA CARGA</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    
                    <?php 
                    $cont=0;
                    ?>
                    <table class="table table-bordered">
                        <tr>
                            <th>idcarga_academica</th>
                            <th>idaula</th>
                        </tr>
                            @foreach($AulaCarga as $Doc)
                            <?php $cont=$cont+1; 
                                    if ($cont%2!==0)
                                            $color="#ffffff";
                                    if ($cont%2==0)
                                            $color="#d2ecfb";
                            ?>
                                    <tr bgcolor='<?php echo $color; ?>'>
                                    <td>{{$Doc->idcarga_academica}}</td>
                                    <td>{{$Doc->idaula}}</td>              
                                    <td>
                            <a class="btn btn-xs btn-primary" href="{{ URL::to( '/carga_academica/modificar');}}/{{$Doc->idcarga_academica}}"><i class="fa fa-edit"></i></a>


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
