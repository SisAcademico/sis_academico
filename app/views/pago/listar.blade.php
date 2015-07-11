@extends('_layouts.app')

@section('titulo')
    @lang('Pagos')
@stop

@section('titulo_cabecera')
    @lang('Pagos')
@stop
@section ('estilos')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/btn.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/pru.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/adminlte/plugins/datepicker/css/bootstrap-datepicker3.standalone.css')}}">
@stop

@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.pagos')</a></li>
    <li class="active">@lang('sistema.listar_pagos')s</li>
@stop


@section('contenido')
    <!-- Main row -->
        <?php
        $date = date("d-m-Y");
    ?>
    <div class="negro">
    </div>
    <div class="google-expando--wrap">
      <div class="google-expando">

        <div class="google-expando__icon">    
          <a href="#"><span class='dada' style="font-size: 29px;color: rgba(255, 255, 255, 0.8);"> + </span></a>

        </div>
                <div class="google-expando__card" aria-hidden="true">
              {{ Form::open(array('url' => 'pago', 'files' => true, 'class' => 'form-horizontal')) }}
                <div class="box box-success">
                    <div class="box-header with-border" align="center">
                        <h3 class="box-title">Realizar Pagos</h3>
                      </div>
                        <div class="box-header with-border">
              <div class="form-group">
                    {{ Form::label('serie', Lang::get('Serie: '),array('class'=>'col-sm-8 control-label')) }}
                        <div class="col-xs-2">
                            <input name="serie" type="text" class="form-control" placeholder="" value= "001" readonly>
                        </div>
               </div>

              <div class="form-group">
                    {{ Form::label('nro_boleta', Lang::get('Nro. de Boleta: '),array('class'=>'col-sm-3 control-label')) }}
                        <div class="col-xs-2">
                            <input name="nro_boleta" type="text" class="form-control" placeholder="" value= "0000001" readonly>
                        </div>
                    {{ Form::label('fecha', Lang::get('Fecha: '),array('class'=>'col-sm-3 control-label')) }}
                        <div class="col-xs-2">
                            <input name='fecha' type="text" id="theInput" placeholder="Seleccione Fecha de Ingreso" class="form-control" placeholder="" value=<?php echo $date?> readonly/>
                        </div>
                </div>
            </div>
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
                    {{ Form::label('Codigo', Lang::get('Codigo: '),array('class'=>'col-sm-2 control-label')) }}
                    <div class="col-xs-4">
                         <input id="id_alumno"  type="text" placeholder="Ingrese Codigo" class="form-control" name="id_alumno" onKeyPress="return validar(event)" maxlength="7" required>
                    </div>
                    <button type="submit" class="btn btn-info ">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar
                    </button>                    
            </div>
            <div class="form-group">
                    {{ Form::label('nombre', Lang::get('Nombre: '),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-xs-10">
                            <input type="text" id="nombres" placeholder="Nombre" class="form-control" required value="" readonly="">
                       </div>
            </div>
            <div class="form-group">
                    {{ Form::label('apellido', Lang::get('Apellido: '),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input type="text" id="apellidos" placeholder="Apellido" class="form-control" required value="" readonly="">
                        </div>
            </div>
            <div class="form-group">
                {{ Form::label('concepto', Lang::get('Concepto: '),array('class'=>'col-sm-2 control-label')) }}
                    <div class="col-sm-6">
                      {{
                         Form::select('concepto', array_pluck(Concepto::all(),'concepto','idconcepto'),null,array('class'=>'form-control','id'=>'idconcepto'))
                      }}
                    </div>
               <button type="submit" class="btn btn-info ">
                 <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar
               </button>
            </div>
            <table id="detalle_pago" class="table table-striped" align="center">
                <thead>
                    <tr>
                        <th>Nro</th>
                        <th>Concepto</th>
                        <th>Importe</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="rows">
                        <td id="nro"></td>
                        <td id="concepto"></td>
                        <td id="import"></td>
                        <td>
                            <a onclick="eliminar_detalle()"><span id="eliminar" class="label label-danger"></span></a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <p>
                <div class="form-group">
                {{ Form::label('Total', Lang::get('Total: '),array('class'=>'col-sm-2 control-label')) }}
                    <div class="col-xs-10">
                         <input type="text" name="total" class="form-control" id="total_pago" readonly>
                    </div>                      
                </div>
            </p>
            <div class="box-footer">
                                              <div class="col-xs-9">
                {{ Form::submit(Lang::get('Guardar'), array('class' => 'btn btn-info pull-right')) }}
              </div>
                                  <div class="col-xs-3">
                {{ Form::submit(Lang::get('Cancelar'), array('class' => 'btn btn-info pull-right')) }}
              </div>
            </div>
            {{ Form::close() }}
    </div>
    <!-- INICIO: BOX PANEL -->
  </div><!-- /.box -->
</div>
</div>
          <div class="col-md-12 col-sm-8">
             <div class="box box-success">
                <div class="box-header with-border" align="center">
                  <h3 class="box-title">Lista de Conceptos de Pagos </h3><!--titulo del frame-->
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="form-group">
                          {{ Form::label('Codigo', Lang::get('Codigo: '),array('class'=>'col-sm-2 control-label')) }}
                          <div class="col-xs-4">
                               <input id="id_alumno"  type="text" placeholder="Ingrese Codigo" class="form-control" name="id_alumno" onKeyPress="return validar(event)" maxlength="7" required>
                          </div>
                          <button type="submit" class="btn btn-info ">
                              <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar
                          </button>                    
                  </div>    
                  <div class="form-group">
                          {{ Form::label('NroBoleta', Lang::get('Nro. de Boleta: '),array('class'=>'col-sm-2 control-label')) }}
                          <div class="col-xs-4">
                               <input id="nroboleta"  type="text" placeholder="Ingresar nro de boleta" class="form-control" name="nroboleta" onKeyPress="return validar(event)" maxlength="7" required>
                          </div>
                          <button type="submit" class="btn btn-info ">
                              <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar
                          </button>                    
                  </div>                                  
                  <table class="table table-bordered">
                                      <thead>
                                        <tr>
                                          <th> Serie</th>
                                          <th> Nro. Boleta</th>
                                          <th> Fecha </th>
                                          <th> Codigo </th>
                                          <th> Nombre </th>
                                          <th> Importe </th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                      @foreach($pagos as $pago)
                                          <tr>
                                              <td>{{ $pago->idpago }}</td>
                                              <td>{{ $pago->nro_boleta }}</td>
                                              <td>{{ $pago->serie }}</td>
                                              <td>{{ $pago->fecha_pago }}</td>
                                              <td><a class="btn btn-xs btn-success" href="{{ URL::to('/'); }}/pago/{{ $pago->idpago }}"><i class="fa fa-eye"></i> </a></td>
                                          </tr>
                                      @endforeach
                                      </tbody>
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
            function validar(e) {
                tecla = (document.all) ? e.keyCode : e.which;
                if (tecla==8) return true; 
                if (tecla==44) return true; 
                if (tecla==48) return true;
                if (tecla==49) return true;
                if (tecla==50) return true;
                if (tecla==51) return true;
                if (tecla==52) return true;
                if (tecla==53) return true;
                if (tecla==54) return true;
                if (tecla==55) return true;
                if (tecla==56) return true;
                if (tecla==57) return true;
                patron = /1/; //ver nota
                te = String.fromCharCode(tecla);
                return patron.test(te); 
            } 
        </script>
    @stop
@endsection