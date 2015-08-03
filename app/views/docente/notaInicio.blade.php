@extends('_layouts.app')
@section('titulo')
    @lang('Registrar Asistencia')
@stop
@section('titulo_cabecera')
    @lang('Docentes')<small>@lang('sistema.registrar_asistencia')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.docente')</a></li>
    <li class="active">@lang('sistema.registrar_asistencia')s</li>
@stop

@section('contenido')
    <!-- Main row -->
    <div class="row">
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
            {{ Form::open(array( 'files' => true, 'class' => 'form-horizontal' , 'action' => array('NotaController@listarCursosDocente'))) }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Registrar Asistencia</h3>
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
                        {{ Form::label('id_docente', Lang::get('Codigo de Docente'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input type = "text" name = "id_docente" size = "20" placeholder= "Ejem: d0001">
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    {{ Form::submit(Lang::get('Registrar Nota'), array('class' => 'btn btn-info pull-right')) }}
                </div>
            </div>
            {{ Form::close() }}
        </div>
        <!-- INICIO: BOX PANEL -->
    </div><!-- /.box -->
@endsection
