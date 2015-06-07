@extends('_layouts.app')
@section('titulo')
    @lang('sistema.semestres')
@stop
@section('titulo_cabecera')
    @lang('sistema.listar_semestres')<small>@lang('sistema.listar_semestres')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.semestre')s</a></li>
    <li class="active">@lang('sistema.semestre')s</li>
@stop

@section('contenido')
			<!-- Main row -->
			<div class="row">
				<!-- INICIO: BOX PANEL -->
					<div class="col-md-12 col-sm-8">
						 <div class="box box-success">
								<div class="box-header with-border">
								  <h3 class="box-title">@lang('sistema.listar_semestre')</h3>
                                  <a class="btn btn-primary pull-right" href="{{ URL::to( '/semestre/agregar') }}"><i class="fa fa-plus"></i> @lang('sistema.agregar_semestre')</a>
								</div><!-- /.box-header -->
								<div class="box-body">
								  <table class="table table-bordered">
                                      <thead>
                                        <tr>
                                          <th style="width: 10px">@lang('sistema.semestre')</th>
                                          <th>@lang('sistema.fecha_inicio')</th>
                                          <th>@lang('sistema.fecha_fin')</th>
                                          <th style="width: 80px">@lang('sistema.accion')</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                      @foreach($semestres as $semestre)
                                          <tr>
                                              <td>{{ $semestre->idsemestre }}</td>
                                              <td>{{ $semestre->fecha_inicio }}</td>
                                              <td>{{ $semestre->fecha_fin }}</td>
                                              <td><a class="btn btn-xs btn-success" href="{{ URL::to('/'); }}/semestre/{{ $semestre->idsemestre }}"><i class="fa fa-eye"></i> </a></td>
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
