
@extends('_layouts.app')
@section('titulo')
    @lang('Listar Asistencia Docente')<!--titulo de la ventana-->
@stop

@section('titulo_cabecera')
    @lang('sistema.listar_asistencia')<small>@lang('sistema.listar_asistencia')</small><!--titulo-subtitulos-->
@stop

@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.docente.listar.asistencia')</a></li><!--ruta de ubicacion-->
    <li class="active">@lang('sistema.docente')</li>
@stop

@section('contenido')
            <!-- Main row -->
            <div class="row">
                <!-- INICIO: BOX PANEL -->
                    <div class="col-md-12 col-sm-8">
                         <div class="box box-success">
                                <div class="box-header with-border">
                                  <h3 class="box-title">Lista asistencia asministrador</h3><!--titulo del frame-->
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                        <?php 
                                        $iddocente=$FilaFiltroRecuperada[0]->iddocente;
                                        $docente= Docente::where('iddocente','=',$iddocente)->get();
                                        echo '<h3>Asistencia de : '.$docente[0]->nombres.' '.$docente[0]->apellidos.' </h3> ' ;
                                        $cont=0;                                                   
                                        ?>
                                        <table class="table table-bordered">
                                        <tr>
                                        
                                        <th>Asignatura</th>
                                        <th>Fecha</th>
                                        <th>Observacion</th>
                                        <th>Tema</th>
                                                                            
                                        </tr>
                                        @foreach($FilaFiltroRecuperada as $key)  
                                        <?php
                                                    $aux= $key->idcarga_academica;
                                                    $AsisDoc = AsistenciaDocente::where('idcarga_academica','=',$aux)->get();
                                                    $Recu = CargaAcademica::where('idcarga_academica', '=', $aux)->get();
                                                
                                                    $asig=$Recu[0]->idasignatura;   
                                                    $asig_cl = $Recu[0]->idasignatura_cl;   
                                                    $variable="0";
                                                    if ($asig == NULL){
                                                        $R = AsignaturaLibres::where('idasignatura_cl', '=', $asig_cl)->get();
                                                        $variable = $R[0]->nombre_asig_cl;
                                                    }

                                                    if ($asig_cl == NULL){
                                                        $R = Asignatura::where('idasignatura', '=', $asig)->get();
                                                            $variable = $R[0]->nombre_asignatura;
                                                        
                                                        }
                                            

                                        
                                        ?>                               
                                            @foreach($AsisDoc as $lista)
                                            <?php $cont=$cont+1; 
                                            if ($cont%2!==0)
                                                $color="#ffffff";
                                            if ($cont%2==0)
                                                $color="#d2ecfb";?>
                                            <tr bgcolor='<?php echo $color; ?>'>
                                            <td><?php echo $variable;?></td>
                                            <td>{{$lista->fecha_asist_doc}}</td>
                                            <td>{{$lista->observacion}}</td>
                                            <td>{{$lista->tema}}</td>
                                            <td>
                                            </tr>
                                           
                                            @endforeach 
                                    
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