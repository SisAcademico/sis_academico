@extends('_layouts.app')

@section('titulo')
    @lang('Carreras')
@stop

@section('titulo_cabecera')
    @lang('Carreras')<small>@lang('listar')</small>
@stop

@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('carreras')</a></li>
    <li class="active">@lang('carreras')s</li>
@stop

@section('contenido')
      <!-- Main row -->
      <div class="row">
        <!-- INICIO: BOX PANEL -->
          <div class="col-md-12 col-sm-8">
             <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Lista de Carreras</h3><!--titulo del frame-->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?php 
                      

                    $cont=0;
                    ?>
                    <table class="table table-bordered">
                    <tr>
                    <th>IdCarrera</th>
                    <th>Nombre Carrera</th>
                    <th>Nro. Modulos</th>
                      </tr>
                    @foreach($carrerastodo as $Car)
                    <?php $cont=$cont+1; 
                      if ($cont%2!==0)
                        $color="#eeffff";
                      if ($cont%2==0)
                        $color="#d2ecfb";
                    ?>
                      <tr bgcolor='<?php echo $color; ?>'>
                      <td>{{$Car->idcarrera}}</td>
                      <td>{{$Car->nombre_carrera}}</td>
                      <td>{{$Car->nro_modulos}}</td>
                       <td>
                    <a class="btn btn-xs btn-primary" href="{{ URL::to( 'sis_academico/public/modulo/modificar');}}/{{$Car->idmodulo}}"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-xs btn-success" href="{{ URL::to( 'sis_academico/public/modulo/Eliminar');}}/{{$Car->idmodulo}}"><i class="fa fa-trash"></i></a>
                    
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