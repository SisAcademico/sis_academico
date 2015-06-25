@extends('_layouts.app')
@section('titulo')
    @lang('sistema.aulas')
@stop
@section('titulo_cabecera')
    @lang('sistema.listar_aulas')<small>@lang('sistema.listar_aulas')</small>
@stop
@section('ruta_navegacion')
    <li><a href="{{ URL::to( '/aula') }}"><i class="fa fa-list"></i> @lang('sistema.aula')s</a></li>
    <li class="active">@lang('sistema.aula')s</li>
@stop

@section('contenido')
			<!-- Main row -->
			<div class="row">
				<!-- INICIO: BOX PANEL -->
					<div class="col-md-12 col-sm-8">
						 <div class="box box-success">
								<div class="box-header with-border">
								  <h3 class="box-title">@lang('sistema.listar_aulas')</h3>
                                  <a class="btn btn-primary pull-right" href="{{ URL::to( '/aula/create') }}"><i class="fa fa-plus"></i> @lang('sistema.agregar_aula')</a>
								</div><!-- /.box-header -->
								<div class="box-body">
								  <table class="table table-bordered">
                                      <thead>
                                        <tr>
                                          <th>{{Lang::get('sistema.codigo_aula')}}</th>
                                          <th>@lang('sistema.capacidad')</th>
                                          <th>@lang('sistema.tipo')</th>
                                          <th >@lang('sistema.estado')</th>
                                          <th >{{Lang::get('sistema.accion')}}</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                      @foreach($aulas as $aula)
                                          <tr>
                                              <td>{{ $aula->idaula }}</td>
                                              <td>{{ $aula->capacidad }}</td>
                                              <td>{{ $aula->tipo }}</td>
                                              <td>{{ $aula->estado }}</td>
                                              <td><a class="btn btn-xs btn-success" href="{{ URL::to('/'); }}/aula/{{ $aula->idaula }}/edit"><i class="fa fa-edit"></i> </a></td>
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
