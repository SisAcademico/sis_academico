@extends('_layouts.app')
@section('titulo')
    @lang('Matriculas')
@stop
@section ('estilos')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/btn.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/pru.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/adminlte/plugins/datepicker/css/bootstrap-datepicker3.standalone.css')}}">
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
    <div class="negro">
    </div>
    <div class="google-expando--wrap">
      <div class="google-expando">

        <div class="google-expando__icon" style="position: fixed;right: 1px;top: 81%;">    
          <a href="#"><span class='dada' style="font-size: 29px;color: rgba(255, 255, 255, 0.8);"> + </span></a>
        </div>
        

        <div class="google-expando__card" aria-hidden="true" >
              {{ Form::open(array( 'files' => true, 'class' => 'form-horizontal', 'action' => array('MatriculaController@create2') )) }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Ingresar Alumno</h3>
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

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  
                    <div class="form-group">
                        {{ Form::label('idalumno', Lang::get('Codigo Alumno'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <div class="col-sm-10">
                                <input class="form-control" id="idalumno" placeholder="Codigo Alumno" name="idalumno" type="text" maxlength="10" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <input class="btn btn-info pull-right" id = "idingresar" action="MatriculaController@create2" type="submit" value="Ingresar">
                </div>
            </div>
            {{ Form::close() }}
        </div>

      </div>
    </div>







    <div class="negros">
    </div>
    <div class="google-expando--wrap">
      <div class="google-expando">

            <div class="pdfss" style="position: fixed;right: 1px;">    
                  <a href="#"><img src="{{asset('/images/pdf.png')}}"></a>
            </div>
                

                <div class="google-expando__card" aria-hidden="true" >
                      {{ Form::open(array('url' => 'matricula', 'files' => true, 'class' => 'form-horizontal')) }}
                        <div class="box box-success" style="border-top-color: rgba(0, 0, 0, 0.44);border-width: 4px;">
                            <div class="box-header with-border">
                                <h3 class="text-center" style="font-size: 21px;font-weight: bold;color: rgba(0, 0, 0, 0.59);margin: 0px;">Tipo de Reportes</h3>
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


                             <?php
                                $i=0;
                                $codi="";
                            ?>
                            <select name="semestre" class="form-control"  id="holas_sem" style="width: 60%;display: inline-block;margin-bottom: 10px; background-color: rgba(0, 0, 0, 0.25); font-size: 15px; font-weight: bold; font-family: monospace; color: rgba(0, 0, 0, 0.51);">
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
                            <select name="mes" class="form-control" id="holas_mes" style="width: 60%;display: inline-block;margin-bottom: 10px; background-color: rgba(0, 0, 0, 0.25); font-size: 15px; font-weight: bold; font-family: monospace; color: rgba(0, 0, 0, 0.51);">
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
                      </div>
                        {{ Form::close() }}
                      </div>

              </div>
            </div>

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
    @section ('scrips_n')
        <script src="{{asset('/js/ja1.js')}}" type="text/javascript"></script>
        <script src="{{asset('/js/ja.js')}}" type="text/javascript"></script>
        <script src="{{asset('/adminlte/plugins/datepicker/js/bootstrap-datepicker.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('/adminlte/plugins/datepicker/locales/bootstrap-datepicker.es.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('/js/sis_academico.js')}}" type="text/javascript"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                $("select").change(function(){

                    var ho2 = $( "#holas_sem option:selected" ).val();
                    $("#smtr").attr("href", "semestreMatricula/PDFA/"+ho2);

                    var ho3 = $( "#holas_mes option:selected" ).val();
                    $("#ms").attr("href", "mesMatricula/PDFA/"+ho3);
                });
                
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function(){           
              var consulta;
                     
              //hacemos focus
              $("#idalumno").focus();
                                                         
              //comprobamos si se pulsa una tecla
              $("#idingresar").click(function(e){
                     //obtenemos el texto introducido en el campo
                     consulta = $("#idalumno").val();
                                              
                     //hace la búsqueda
                     //$("#idingresar").delay(1000).queue(function(n) {      
                                                   
                         $("#idingresar").html('<img src="ajax-loader.gif" />');
                                                   
                                $.ajax({
                                      type: "POST",
                                      url: "MatriculaController.php",
                                      data: { codigo: $("#idalumno").val() }
                                      dataType: "html",
                                      error: function(){
                                            alert("Error no existe alumno, ingrese de nuevo");
                                      }
                          });                        
                     //});                 
              });                  
        });
        </script>

        
    @stop
@endsection
