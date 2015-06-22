@extends('_layouts.app')
@section('titulo')
    @lang('Cursos Libres')
@stop
@section('titulo_cabecera')
    @lang('Cursos Libres')<small>@lang('')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('Cursos Libres')</a></li>
    <li class="active">@lang('Cursos Libres')s</li>
@stop

@section('contenido')
            <!-- Main row -->
            <div class="row">
                <!-- INICIO: BOX PANEL -->
                    <div class="col-md-12 col-sm-8">
                         <div class="box box-success">
                                <div class="box-header with-border">
                                  <h3 class="box-title">@lang('Listado de Cursos Libres')</h3>

                                </div><!-- /.box-header -->
                                <div class="box-body">
                                  <table class="table table-bordered">
                                      <thead>
                                        <tr>
                                          <th>@lang('Codigo')</th>
                                          <th>@lang('Nombre Curso Libre')</th>
                                          <th>@lang('Horas Totales')</th>
                                        </tr>
                                      </thead>

                                      
                                      <tbody>
                                      @foreach($cursoslibres as $cursolibre)
                                          <tr>
                                              <td>{{ $cursolibre->idasignatura_cl}}</td>
                                              <td>{{ $cursolibre->nombre_asig_cl }}</td>
                                              <td>{{ $cursolibre->horas_totales }}</td>
                                              <td><a class="btn btn-xs btn-success" href="{{ URL::to('/'); }}/pago/{{ $cursolibre->idasignatura_cl }}"><i class="fa fa-eye"></i> </a></td>
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
