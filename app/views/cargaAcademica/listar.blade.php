@extends('_layouts.app')
@section('titulo')
    @lang('Carga Academica')
@stop
@section('titulo_cabecera')
    @lang('Carga Academica')<small>@lang('Lista')</small>
    <br><br>
    <center>
        Carga Academica del Semestre {{$semestrea}}
        
    </center>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('Carga Academica.listar')</a></li>
    <li class="active">@lang('Carga Academica.listar_carga_academica')</li>
@stop


@section('contenido')
    <!-- Main row -->
    <div class="row">
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h4>Lista de Cargas Academicas:</h4><!--titulo del frame-->
                            {{ Form::open(array('url' => 'carga_academica/listar','autocomplete' => 'off','class' => 'form-horizontal', 'role' => 'form')) }}
                            <?php 
                            $arregloSemestre = array();                            
                            foreach ($Semestretodo as $sem){
                                $nombre = $sem->idsemestre;
                                $valor = $sem->idsemestre;
                                $aux = [$valor=>$nombre];
                                $arregloSemestre = array_merge($aux,$arregloSemestre);
                            }
                            $elem =$semestrea;
                            $valoractuald = array($elem =>$elem );
                            ?>

                            {{Form::select('semestre',array_merge($valoractuald,$arregloSemestre))}}
                            {{ Form::submit(Lang::get('Hacer Consulta'), array('class' => 'btn btn-info pull-center')) }}
                            {{ Form::close()}}

                </div><!-- /.box-header -->                
                <div class="box-body">
                    <?php
                    $cont=$pagina*$Nrotuplas-$Nrotuplas;                  
                    ?>
                    <table class="table table-bordered">
                        <tr>
                            <th>Nro</th>
                            <th>Docente</th>
                            <th>Acción</th>
                        </tr>
                        @foreach($CargaAcademicatodo as $Doc)
                        <?php 
                            $cont=$cont+1; 
                            if ($cont%2!==0)
                                    $color="#ffffff";
                            if ($cont%2==0)
                                    $color="#d2ecfb";
                        ?>
                            <tr bgcolor='<?php echo $color; ?>'>
                                <td>{{$cont}}</td>
                                <td>{{$Doc->nombres}} {{$Doc->apellidos}}</td>             
                                <td><a class="btn btn-xs btn-primary" href="{{ URL::to( '/carga_academica/vermas');}}/{{$Doc->iddocente}}/{{$Doc->idsemestre}}">Ver Carga</a></td>
                            </tr>
                        @endforeach
                    </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix text-center">
                    <ul class="pagination pagination-sm no-margin">
                        {{$CargaAcademicatodo->links();}}
                    </ul>
                </div>
            </div><!-- /.box -->
        </div>
        <!-- INICIO: BOX PANEL -->
    </div><!-- /.box -->
@endsection
