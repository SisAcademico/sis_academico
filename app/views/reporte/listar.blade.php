@extends('_layouts.app')
@section('titulo')
    @lang('sistema.reportes')s
@stop
@section('titulo_cabecera')
    @lang('sistema.reporte')s<small>@lang('sistema.listar_reporte')s</small>
@stop
@section('ruta_navegacion')
    <li><a href="{{ URL::to( '/reporte') }}"><i class="fa fa-list"></i> @lang('sistema.reporte')s</a></li>
    <li class="active">@lang('sistema.listar_de_reporte')</li>
@stop

@section('contenido')
	<div class="row">
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
            <div class="box box-success">
		                <div class="box-header with-border">
		                    <h3 class="box-title">Ranking de Alumnos</h3>
		                </div><!-- /.box-header -->
		                <div class="box-body">
		                    <table class="table table-bordered">
		                        <tr>
		                            <th >Tipo de Ranking</th>
		                            <th >Contenido</th>
		                            <th ></th>
		                        </tr>
		                        {{ Form::open(array( 'files' => true, 'class' => 'form-horizontal', 'action' => array('ReporteController@RankingPorAsignatura') )) }}
		                         <tr>
		                            <th >Ranking por Asignatura</th>
		                            <th > 
		                            	<input id="id_asignatura"  type="text"  class="form-control" name="id_asignatura" >
		                            </th>
		                            <th >
		                            	<input class="btn btn-info pull-right" type="submit" value="Generar Reporte" >
		                            </th>
		                        </tr>
		                        {{ Form::close() }}
		                    </table>
		                </div><!-- /.box-body -->
		    </div><!-- /.box -->
        </div>
        <!-- INICIO: BOX PANEL -->
    </div><!-- /.box -->

@endsection
