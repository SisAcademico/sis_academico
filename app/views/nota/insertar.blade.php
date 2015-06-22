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
                    <input type="hidden"  name="idasig" size="5" readonly="true" value=<?php echo $idasig ?> >
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 20px">Codigo</th>
                            <th >Nombres</th>
                            <th >Apellidos</th>
                             <?php for ($i=0; $i <$nroExamenes ; $i++) { 
                                        # code...
                             ?>
                            <th ><?php echo "Nota ".($i+1) ?></th><?php } ?>
                             <th >Promedio</th>
                        </tr>
                        <!-- LISTAR ALUMNOS-->
                       @if(!empty($datos))
                            <ul class="nav">
                                <?php  
                                $actual=$datos[0]->idalumno; 
                                $nombre = $datos[0]->nombres;
                                $apellido = $datos[0]->apellidos;
                                $idalumno = $datos[0]->idalumno; 
                                $iddetalle_matricula = $datos[0]->iddetalle_matricula;
                                $it = 0;
                                $nroAlumnos=sizeof($datos);
                                $itAlumn=0;
                                foreach($datos as $data){
                                    //echo $data->nombres;
                                    $itAlumn++;
                                    //echo $itAlumn." : ".$nroAlumnos;
                                    if($data->idalumno!=$actual )
                                    {
                                        //ecribir datos

                                        $Promedio=0;
                                        ?>    
                                        <tr>
                                            <td><?php echo $idalumno ?></td>
                                            <td><?php echo $nombre ?></td>
                                            <td><?php echo $apellido ?></td>
                                            <?php for ($i=0; $i <$nroExamenes ; $i++) { 
                                                # code...
                                                $var = $iddetalle_matricula.":".$i;
                                            ?>
                                            <td>
                                            
                                            @if(empty($notas[$i]) || $notas[$i]==0)
                                                <?php 
                                                    echo "<input type=\"text\" name=\"".$var."\" value = \"NSP\" size=\"5\" maxlength=\"7\" onKeypress=\"if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;\">"; 
                                                    $Promedio+=$notas[$i];
                                                ?>
                                            
                                            @else
                                                <?php 
                                                    echo "<input type=\"text\" name=\"".$var."\" value = \"".$notas[$i]."\" size=\"5\" maxlength=\"7\" onKeypress=\"if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;\">";
                                                    $Promedio+=$notas[$i];
                                                ?>
                                            @endif    

                                            </td><?php $notas[$i]=""; } ?>
                                            <td>
                                                <?php echo $Promedio/$nroExamenes ?>
                                            </td>
                                            

                                        </tr>
                                        <?php
                                        $actual=$data->idalumno;
                                        $nombre = $data->nombres;
                                        $apellido = $data->apellidos;
                                        $idalumno = $data->idalumno;
                                        $iddetalle_matricula = $data ->iddetalle_matricula;
                                        $notas[0] = $data->nota;
                                        $it=1;
                                    }
                                    else
                                    {
                                       // echo "en dos";
                                        $nombre = $data->nombres;
                                        $apellido = $data->apellidos;
                                        $idalumno = $data->idalumno;
                                        $iddetalle_matricula = $data ->iddetalle_matricula;
                                        $notas[$it] = $data->nota;
                                        $it++;
                                    }

                                ?>                               
                                
                                <?php 
                                if($itAlumn == $nroAlumnos)
                                    {
                                        //ecribir datos

                                       
                                        $Promedio=0;
                                        ?>    
                                        <tr>
                                            <td><?php echo $idalumno ?></td>
                                            <td><?php echo $nombre ?></td>
                                            <td><?php echo $apellido ?></td>
                                            <?php for ($i=0; $i <$nroExamenes ; $i++) { 
                                                # code...
                                                $var = $iddetalle_matricula.":".$i;
                                            ?>
                                            <td>
                                            
                                            @if(empty($notas[$i]) || $notas[$i]==0)
                                                <?php 
                                                    echo "<input type=\"text\" name=\"".$var."\" value = \"NSP\" size=\"5\">";
                                                    $Promedio+=$notas[$i];
                                                ?>
                                            
                                            @else
                                                <?php 
                                                    echo "<input type=\"text\" name=\"".$var."\" value = \"".$notas[$i]."\" size=\"5\">";
                                                    $Promedio+=$notas[$i];
                                                ?>
                                            @endif   

                                            </td><?php $notas[$i]=""; } ?>
                                            <td>
                                                <?php echo $Promedio/$nroExamenes ?>
                                            </td>
                                            

                                        </tr>
                                        <?php
                                    }    
                                }  ?>
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
             {{ Form::close()  }}
        </div>
        <!-- INICIO: BOX PANEL -->
    </div><!-- /.box -->
@endsection
@endsection
