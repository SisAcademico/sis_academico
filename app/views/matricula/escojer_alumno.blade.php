@extends('_layouts.app')
@section('titulo')
    @lang('Ingresar Alumno')
@stop
@section('titulo_cabecera')
    @lang('Alumnos')<small>@lang('')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('Alumno')</a></li>
    <li class="active">@lang('Ingresar Alumno')s</li>
@stop

@section('contenido')
    <!-- Main row -->
    <div class="row">
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
            {{ Form::open(array( 'files' => true, 'class' => 'form-horizontal', 'action' => array('MatriculaController@create2') )) }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Ingresar Alumno</h3>
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
                        {{ Form::label('idalumno', Lang::get('Codigo Alumno'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <div class="col-sm-10">
                                <input class="form-control" id="idalumno" placeholder="Codigo Alumno" name="idalumno" type="text" maxlength="10" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    {{ Form::submit(Lang::get('Ingresar'), array('class' => 'btn btn-info pull-right', 'action' => 'MatriculaController@create2')) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
        <!-- INICIO: BOX PANEL -->
    </div><!-- /.box -->
@endsection
