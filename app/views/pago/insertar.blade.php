@extends('_layouts.app')
@section('titulo')
    @lang('sistema.pago')
@stop
@section('titulo_cabecera')
    @lang('Caja y Facturacion')
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.pago')</a></li>
    <li class="active">@lang('sistema.insertar_pago')s</li>
@stop

@section('contenido')
    <!-- Main row -->

    <?php
        $date = date("d-m-Y");
    ?>

	<div class="row">
		<!-- INICIO: BOX PANEL -->
		<div class="col-md-12 col-sm-8">
            {{ Form::open(array('url' => 'pago','autocomplete' => 'off','class' => 'form-horizontal', 'role' => 'form')) }}
            <div class="box box-success">
                <div class="box-header with-border" align="center">
                    <h3 class="box-title">Realizar Pago</h3>
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
                <div class="form-inline">
                    {{ Form::label('serie', Lang::get('Serie: '),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-xs-1">
                            <input name="serie" type="text" class="form-control" placeholder="" value= "001" readonly>
                        </div>
                    {{ Form::label('nro_boleta', Lang::get('Nro. Boleta: '),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-xs-2">
                            <input name="nro_boleta" type="text" class="form-control" placeholder="" value= "0000001" readonly>
                        </div>
                    {{ Form::label('fecha', Lang::get('Fecha: '),array('class'=>'col-sm-1 control-label')) }}
                        <div class="col-xs-2">
                            <input name='fecha' type="text" id="theInput" placeholder="Seleccione Fecha de Ingreso" class="form-control" placeholder="" value=<?php echo $date?> readonly/>
                        </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-inline">
                    {{ Form::label('Codigo', Lang::get('Codigo: '),array('class'=>'col-sm-2 control-label')) }}
                    <div class="col-xs-2">
                         <input id="id_alumno"  type="text" placeholder="Ingrese Codigo" class="form-control" name="id_alumno" onKeyPress="return validar(event)" maxlength="7" required>
                    </div>
                           <button type="submit" class="btn btn-info ">
                                <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar
                           </button>                    
                </div>
            </div>
            <div class="form-group">
                <div class="form-inline">
                    {{ Form::label('nombre', Lang::get('Nombre: '),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-xs-1">
                            <input type="text" id="nombres" placeholder="Nombre" class="form-control" required value="" readonly="">
                       </div>
                    {{ Form::label('apellido', Lang::get('Apellido: '),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-6">
                            <input type="text" id="apellidos" placeholder="Apellido" class="form-control" required value="" readonly="">
                        </div>
                </div>
            </div>
            <div class="form-group">
                    {{ Form::label('Concepto', Lang::get('Concepto: '),array('class'=>'col-sm-2 control-label')) }}
                    <div class="col-xs-4">
                         <input id="concepto"  type="text" placeholder="Concepto" class="form-control" name="concepto" maxlength="60" required>
                    </div>
                    {{ Form::label('Importe', Lang::get('Importe: '),array('class'=>'col-sm-1 control-label')) }}
                    <div class="col-xs-2">
                         <input id="importe"  type="text" placeholder="S/. 0.00" class="form-control" name="importe"  maxlength="7" required>
                    </div> 
                    <button type="submit" class="btn btn-info ">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar
                    </button>  
            </div>
            <table id="detalle_pago" class="table table-striped">
                <thead>
                    <tr>
                        <th>Nro</th>
                        <th>Concepto</th>
                        <th>Importe</th>
                        <th>Acciones</th>
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
                    <div class="col-xs-2">
                         <input type="text" name="total" class="form-control" id="total_pago" readonly>
                    </div>                      
                </div>
            </p>
            <div class="box-footer">
                {{ Form::submit(Lang::get('Guardar'), array('class' => 'btn btn-info pull-right')) }}
            </div>

            {{ Form::close() }}
		</div>
	  <!-- INICIO: BOX PANEL -->
	</div><!-- /.box -->
        @section ('scrips_n')
        <script src="{{asset('/js/ja.js')}}" type="text/javascript"></script>
                <script src="{{asset('/js/ja.js')}}" type="text/javascript"></script>
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
