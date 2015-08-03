@extends('_layouts.app')
@section('titulo')
    @lang('sistema.pago')
@stop
@section('titulo_cabecera')
    @lang('Caja y Facturacion')
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> Pagos</a></li>
    <li class="active">Detalle de pago</li>
@stop

@section('contenido')
   <!-- Main row -->
<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Detalle de pago</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="" style="border:1px solid #CECDCD;padding:10px;">
                    <tbody>
					<tr>
                      <td class="col-md-5"><b>UNIVERSIDAD NACIONAL DE SAN ANTONIO ABAD DEL CUSCO</b><br><span class='text-center'><b>INSTITUTO DE SISTEMAS CUSCO</b></span></td>
                      <td></td>
                      <td>Serie:</td>
                      <td>{{$pago[0]->serie}}</td>
                    </tr>
                    <tr>
                      <td>Nro. de Boleta:</td>
                      <td>{{$pago[0]->nro_boleta}}</td>
                      <td>Fecha de pago:</td>
                      <td>{{$pago[0]->fecha_pago}}</td>
                    </tr>
                    <tr>
                      <td>Código de alumno:</td>
                      <td>code</td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>Nombres:</td>
                      <td>Juan perez</td>
                      <td>Apellidos</td>
                      <td></td>
                    </tr>
                  </tbody>
				 </table>
				 <div style="padding-top:10px;padding-bottom"></div>
				 <table class="table table-bordered">
                    <tbody>
					<tr>
                      <th>Nro</th>
                      <th>Concepto</th>
                      <th>Monto</th>
                      <th>Detalle</th>
                    </tr>
					<tr><td colspan="2"></td><td class="text-right">Sub-total</td><td>sss</td></tr>
					<tr><td colspan="2"></td><td class="text-right">IGV</td><td>sss</td></tr>
					<tr><td colspan="2"></td><td class="text-right"><b>Total</b></td><td>sss</td></tr>
                  </tbody>
				 </table>
                </div><!-- /.box-body -->
				<!-- INICIO: Pie de BOX -->
				<div class="box-footer clearfix">
					<div class="row pull-right">
						<div class="col-md-2"><a href="{{ URL::to( '/pago/listar') }}" class="btn btn-sm btn-info btn-flat pull-right"><i class="fa fa-print"></i> Imprimir Boleta</a></div>
						<div class="col-md-2 pull-right"><a href="{{ URL::to( '/pago/listar') }}" class="btn btn-sm btn-danger btn-flat pull-right"><i class="fa fa-chevron-left"></i> Retornar a lista de pagos</a></div>
					</div>
				</div>
            </div>
		</div>
		<!-- FIN: Pie de Box -->
      <!-- INICIO: BOX PANEL -->
    </div><!-- /.box -->
    @section ('scrips_n')
    @stop
@endsection
