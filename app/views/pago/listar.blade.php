@extends('_layouts.app')
@section('titulo')
    @lang('sistema.pagos')
@stop
@section('titulo_cabecera')
    @lang('sistema.listar_pagos')<small>@lang('sistema.listar_pagos')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.pagos')</a></li>
    <li class="active">@lang('sistema.pagos')s</li>
@stop

@section('contenido')
			<!-- Main row -->
			<div class="row">
				<!-- INICIO: BOX PANEL -->
					<div class="col-md-12 col-sm-8">
						 <div class="box box-success">
								<div class="box-header with-border">
								  <h3 class="box-title">@lang('sistema.listado_de_pagos')</h3>
                                  <a class="btn btn-primary pull-right" href="{{ URL::to( '/pago/insertar') }}"><i class="fa fa-plus"></i> @lang('sistema.registrar_pago')</a>
								</div><!-- /.box-header -->
								<div class="box-body">
								  <table class="table table-bordered">
                                      <thead>
                                        <tr>
                                          <th style="width: 10px">@lang('sistema.id')</th>
                                          <th>@lang('sistema.nro_boleta')</th>
                                          <th>@lang('sistema.serie')</th>
                                          <th>@lang('sistema.fecha_pago')</th>
                                          <th style="width: 80px">@lang('sistema.accion')</th>
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
@endsection
