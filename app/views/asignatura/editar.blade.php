

@extends('_layouts.app')
@section('titulo')
    @lang('sistema.asignaturas')
@stop
@section('titulo_cabecera')
    @lang('sistema.asignaturas')<small>@lang('sistema.editar_asignatura')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.asignaturas')</a></li>
    <li class="active">@lang('sistema.editar_asignatura')s</li>
@stop

@section('contenido')
    <!-- Main row -->
    <div class="row" >
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
            @foreach($asignaturas as $asig)
                {{ Form::open(array('url' => 'asignatura/'.$asig->idasignatura,'method' => 'put', 'files' => true, 'class' => 'form-horizontal')) }}
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Editar Asignatura</h3>
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
                            {{ Form::label('id_asignatura', Lang::get('Codigo de Asignatura'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-10">
                                {{ Form::text('id_asignatura',$asig->idasignatura,array('class'=>'form-control','id'=>'id_asignatura','placeholder'=>Lang::get('id Asignatura'))) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('nombre_asignatura', Lang::get('sistema.nombre_asignatura'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-10">
                                {{ Form::text('nombre_asignatura',$asig->nombre_asignatura,array('class'=>'form-control','id'=>'nombre_asignatura','placeholder'=>Lang::get('sistema.nombre_asignatura'))) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('horas_semanales', Lang::get('sistema.horas_semanales'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-10">
                                {{ Form::text('horas_semanales',$asig->horas_semanales,array('class'=>'form-control','id'=>'horas_semanales','placeholder'=>Lang::get('sistema.horas_semanales'))) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('horas_totales', Lang::get('sistema.horas_totales'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-10">
                                {{ Form::text('horas_totales',$asig->horas_totales,array('class'=>'form-control','id'=>'horas_totales','placeholder'=>Lang::get('sistema.horas_totales'))) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('idmodulo', Lang::get('sistema.idmodulo'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-10">
                                {{ Form::text('idmodulo',$asig->idmodulo,array('class'=>'form-control','id'=>'idmodulo','placeholder'=>Lang::get('sistema.idmodulo'))) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('pre_requisito', Lang::get('sistema.pre_requisito'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-10">
                                {{ Form::text('pre_requisito',$asig->pre_requisito,array('class'=>'form-control','id'=>'pre_requisito','placeholder'=>Lang::get('sistema.pre_requisito'))) }}
                            </div>
                        </div>

                    </div>

                    <div class="box-footer">
                        {{ Form::submit(Lang::get('Editar Asignatura'), array('class' => 'btn btn-info pull-right')) }}
                    </div>
                </div>
                {{ Form::close() }}
            @endforeach
        </div>
        <!-- INICIO: BOX PANEL -->
    </div><!-- /.box -->
@section ('scrips_n')
    <script src="{{asset('/js/ja.js')}}" type="text/javascript"></script>
@stop
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js" type="text/javascript"></script>
@endsection
