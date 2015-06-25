@extends('_layouts.app')
@section('titulo')
    @lang('sistema.matriculas')
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
                            <div class="col-sm-8">
                                <input id="idmatricula" type="text" placeholder="Codigo" class="form-control" name="idmatricula" >
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('tipo', Lang::get('tipo'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-8">
                                <input id="tipo" type="text" placeholder="Tipo" class="form-control" name="tipo" >                                
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('fecha_matricula', Lang::get('fecha_matricula'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-8">
                                <input id="fecha_matricula" type="text" placeholder="Fecha Matricula" class="form-control" name="fecha_matricula" >                                
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('idpago', Lang::get('idpago'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-8">
                                <input id="idpago" type="text" placeholder="Codigo Pago" class="form-control" name="idpago" >                                
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('idalumno', Lang::get('idalumno'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-8">
                                <input id="idalumno" type="text" placeholder="Codigo Alumno" class="form-control" name="idalumno" >                                
                           </div>
                        </div>
                        <div class="form-group">
                            {{ Form::label('idalumno', Lang::get('idalumno'),array('class'=>'col-sm-2 control-label')) }}
                            <div class="col-sm-8">
                                <input id="idalumno" type="text" placeholder="Codigo Alumno" class="form-control" name="idalumno" >                                
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
