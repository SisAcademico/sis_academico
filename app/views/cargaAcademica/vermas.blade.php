@extends('_layouts.app')
@section('titulo')
    @lang('Carga Academica')
@stop
@section('titulo_cabecera')
    @lang('Carga Academica')<small>@lang('Lista.Ver Mas')</small>
    <br><br>
    <center>
        Carga Academica del Semestre 
       
            {{$sem}}
      
    </center>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('Carga Academica.Ver Mas')</a></li><!--ruta de ubicacion-->
    <li class="active">@lang('Carga Academica.Ver Mas')</li>
@stop
@section('contenido')
    @if(Session::has('message'))
        <p class="alert alert-success">{{Session::get('message')}}</p>
    @endif
    <!-- Main row -->
    <div class="row">
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h4>Carga Academica del Docente:</h4><!--titulo del frame-->
                </div><!-- /.box-header -->
                <div class="box-body">
                     <table>                        
                        <?php 
                            foreach ($Docentestodo as $Doc)
                            {
                                $codigo = $Doc->iddocente;
                                $nombre = $Doc->nombres;
                                $apellidos = $Doc->apellidos;
                            }   
                        ?>
                        <tr><td style="width: 130px;height: 30px"> <strong>Código:</strong></td><td>{{$codigo}}</td></tr>
                        <tr><td style="width: 130px;height: 30px"><strong>Nombres:</strong></td><td>{{$nombre}}</td></tr>
                        <tr><td style="width: 130px;height: 30px"><strong>Apellidos:</strong></td><td>{{$apellidos}}</td></tr>
                    </table>
                    <table class="table table-bordered">
                        <tr>
                            <th>Nro</th>
                            <th>Asigantura</th>
                            <th>Turno</th>
                            <th>Grupo</th>
                            <th>Tipo</th>
                        </tr>
                            <?php $cont=0;?>
                        @foreach($RelacionCarga as $Carga)
                            <?php $cont=$cont+1; 
                            if ($cont%2!==0)
                                    $color="#ffffff";
                            if ($cont%2==0)
                                    $color="#d2ecfb";
                            ?>
                            <tr bgcolor='<?php echo $color; ?>'>
                            <td>{{$cont}}</td>
                            <td>{{$Carga->Asignatura}}</td>
                            <td>{{$Carga->Turno}}</td>
                            <td>{{$Carga->Grupo}}</td>
                            <td>Curso Normal</td>
                            <td><a class="btn btn-xs btn-primary" href="{{ URL::to( '/carga_academica/editar');}}/{{$Carga->Id}}"><i class="fa fa-edit"></i></a></td>
                            </tr>
                        @endforeach
                    
                        @foreach($RelacionCargaCL as $Carga)
                            <?php $cont=$cont+1; 
                            if ($cont%2!==0)
                                    $color="#ffffff";
                            if ($cont%2==0)
                                    $color="#d2ecfb";
                            ?>
                            <tr bgcolor='<?php echo $color; ?>'>
                            <td>{{$cont}}</td>
                            <td>{{$Carga->Asignatura}}</td>
                            <td>{{$Carga->Turno}}</td>
                            <td>{{$Carga->Grupo}}</td>
                            <td>Curso Libre</td>
                            <td><a class="btn btn-xs btn-primary" href="{{ URL::to( '/carga_academica/editar');}}/{{$Carga->Id}}"><i class="fa fa-edit"></i></a></td>
                            </tr>
                        @endforeach
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div> <!-- INICIO: BOX PANEL -->
    </div><!-- /.box -->
@endsection