@extends('_layouts.app')
@section('titulo')
    @lang('sistema.asignaturas')
@stop
@section('titulo_cabecera')
    @lang('sistema.matriculas')<small>@lang('sistema.editar_matricula')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.matriculas')</a></li>
    <li class="active">@lang('sistema.editar_matricula')s</li>
@stop

@section('contenido')
    <!-- Main row -->
    <div class="row" >
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
            @foreach($matriculas as $matri)
                {{ Form::open(array('url' => 'matricula/'.$matri->idmatricula,'method' => 'put', 'files' => true, 'class' => 'form-horizontal')) }}
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Editar Matricula</h3>
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
                            {{ Form::label('idmatricula', Lang::get('idmatricula'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-10">
                                {{ Form::text('idmatricula',$matri->idmatricula,array('class'=>'form-control','id'=>'idmatricula','placeholder'=>Lang::get('id Matricula'))) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('tipo', Lang::get('sistema.tipo'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-10">
                                {{ Form::text('tipo',$matri->tipo,array('class'=>'form-control','id'=>'tipo','placeholder'=>Lang::get('sistema.tipo'))) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('fecha_matricula', Lang::get('sistema.fecha_matricula'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-10">
                                {{ Form::text('fecha_matricula',$matri->fecha_matricula,array('class'=>'form-control','id'=>'fecha_matricula','placeholder'=>Lang::get('sistema.fecha_matricula'))) }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('idpago', Lang::get('sistema.idpago'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-10">
                                {{ Form::text('idpago',$matri->idpago,array('class'=>'form-control','id'=>'idpago','placeholder'=>Lang::get('sistema.idpago'))) }}
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('idalumno', Lang::get('sistema.idalumno'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-10">
                                {{ Form::text('idalumno',$matri->idalumno,array('class'=>'form-control','id'=>'idalumno','placeholder'=>Lang::get('sistema.idalumno'))) }}
                            </div>
                        </div>

                    </div>

                    <div class="box-footer">
                        {{ Form::submit(Lang::get('Editar Matricula'), array('class' => 'btn btn-info pull-right')) }}
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
