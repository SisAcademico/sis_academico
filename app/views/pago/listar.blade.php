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
        <div class="col-md-12 col-sm-8">
            {{ Form::open(array('url' => 'pago','autocomplete' => 'off','class' => 'form-horizontal', 'role' => 'form')) }}
            <div class="box box-success">
                <div class="box-header with-border" align="center">
                    <h3 class="box-title">Lista Pagos</h3>
					<a class="btn btn-primary pull-right" href="{{ URL::to( '/pago/insertar') }}"><i class="fa fa-plus"></i> Agregar pago</a>
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
            <div class="form-group">
                <div class="form-inline">
                    {{ Form::label('Codigo', Lang::get('Codigo: '),array('class'=>'col-sm-1 control-label')) }}
                    <div class="col-xs-2">
                         <input id="idalumno" type="text" placeholder="Ingrese Codigo" class="form-control" name="idalumno" maxlength="10" required>
                    </div>
                           <button type="button"  id='codigo' class="btn btn-info ">
                                <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar
                           </button>                    
                </div>
            </div>


                <input type="hidden" name="_token" value="{{ csrf_token() }}">

								  <table class="table table-bordered">
                                      <thead>
                                        <tr>
                                          <th>@lang('Serie')</th>
                                          <th>@lang('Nro. Boleta')</th>
                                          <th>@lang('Cod Alumno')</th>                                                                                    
                                          <th>@lang('Fecha Pago')</th>
                                          <th>@lang('Monto')</th>
                                          <th style="width: 80px">@lang('Accion')</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                      @foreach($pagos as $pago)
                                          <tr>
                                              <td>{{ $pago->serie }}</td>
                                              <td>{{ $pago->nro_boleta }}</td>
                                              <td>{{ $pago->idalumno }}</td>
                                              <td>{{ $pago->fecha_pago }}</td>
                                              <td>{{ $pago->monto_total }}</td>
                                              <td><a class="btn btn-xs btn-success" href="{{ URL::to('/pago/detalle') }}/{{ $pago->idpago }}"><i class="fa fa-eye"></i> </a></td>
                                          </tr>
                                      @endforeach
                                      </tbody>
								  </table>
								</div><!-- /.box-body -->
								<div class="box-footer clearfix text-center">
                                    {{$pagos-> links();}}
								</div>
            {{ Form::close() }}
        </div>
      <!-- INICIO: BOX PANEL -->
    </div><!-- /.box -->
</div>
@endsection
