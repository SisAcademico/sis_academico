@extends('_layouts.app')
@section('titulo')
    @lang('sistema.cursolibre')
@stop
@section('titulo_cabecera')
    @lang('sistema.cursolibre')<small>@lang('')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.cursolibre')</a></li>
    <li class="active">@lang('sistema.editar_cursolibre')s</li>
@stop

@section('contenido')
    <!-- Main row -->
    <div class="row" >
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
            @foreach($cursoslibres as $cl)
                {{ Form::open(array('url' => 'cursolibre/'.$cl->idasignatura_cl,'method' => 'put', 'files' => true, 'class' => 'form-horizontal')) }}
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
                            {{ Form::label('id_asignatura_cl', Lang::get('idasignatura_cl'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-10">
                                {{ Form::text('id_asignatura_cl',$asig->idasignatura_cl,array('class'=>'form-control','id'=>'id_asignatura','placeholder'=>Lang::get('id CursoLibre'))) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('nombre_asig_cl', Lang::get('sistema.nombre_asig_cl'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-10">
                                {{ Form::text('nombre_asig_cl',$asig->nombre_asig_cl,array('class'=>'form-control','id'=>'nombre_asig_cl','placeholder'=>Lang::get('sistema.nombre_asig_cl'))) }}
                            </div>
                        </div>
                        
                        <div class="form-group">
                            {{ Form::label('horas_totales', Lang::get('sistema.horas_totales'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-10">
                                {{ Form::text('horas_totales',$asig->horas_totales,array('class'=>'form-control','id'=>'horas_totales','placeholder'=>Lang::get('sistema.horas_totales'))) }}
                            </div>
                        </div>

                        

                    </div>

                    <div class="box-footer">
                        {{ Form::submit(Lang::get('Editar Cursos Libres'), array('class' => 'btn btn-info pull-right')) }}
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
