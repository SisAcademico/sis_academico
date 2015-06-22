@extends('_layouts.app')
@section('titulo')
    @lang('Editar alumno')
@stop
@section ('estilos')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/pru.css')}}">
@stop
@section('titulo_cabecera')
    @lang('Alumnos')<small>@lang('')</small>
@stop
@section('ruta_navegacion')
    <li><a href="#"><i class="fa fa-list"></i> @lang('sistema.alumno')</a></li>
    <li class="active">@lang('sistema.insertar_alumno')s</li>
@stop

@section('contenido')
    <!-- Main row -->
    <div class="row">
        <!-- INICIO: BOX PANEL -->
        <div class="col-md-12 col-sm-8">
            @foreach($alumnos as $alu)
            {{ Form::open(array('url' => 'alumno/'.$alu->idalumno,'method' => 'put', 'files' => true, 'class' => 'form-horizontal')) }}
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Editar Alumno</h3>
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
                        {{ Form::label('id_alumno', Lang::get('Código Alumno'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('id_alumno',$alu->idalumno,array('class'=>'form-control','id'=>'id_alumno','placeholder'=>Lang::get('Código Alumno'))) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('nombres', Lang::get('DNI'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('dni',$alu->dni,array('class'=>'form-control','id'=>'dni','placeholder'=>Lang::get('DNI'))) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('nombres', Lang::get('Nombres'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('nombres',$alu->nombres,array('class'=>'form-control','id'=>'nombres','placeholder'=>Lang::get('Nombres'))) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('apellidos', Lang::get('Apellidos'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('apellidos',$alu->apellidos,array('class'=>'form-control','id'=>'apellidos','placeholder'=>Lang::get('Apellidos'))) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('direccion', Lang::get('Dirección'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('direccion',$alu->direccion,array('class'=>'form-control','id'=>'direccion','placeholder'=>Lang::get('Dirección'))) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('telefono', Lang::get('Teléfono'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('telefono',$alu->telefono,array('class'=>'form-control','id'=>'telefono','placeholder'=>Lang::get('Teléfono'))) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('correo', Lang::get('Correo'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::text('correo',$alu->correo,array('class'=>'form-control','id'=>'correo','placeholder'=>Lang::get('Correo'))) }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('fecha_ingreso', Lang::get('Fecha de Ingreso'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            <input name='fecha' type="text" id="theInput" placeholder="Seleccione Fecha" value="{{$alu->fecha_ingreso}}" />
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('foto', Lang::get('Foto'),array('class'=>'col-sm-2 control-label')) }}
                        <div class="col-sm-10">
                            {{ Form::file('photo') }} 
                        </div> 
                    </div>
                </div>
                <div class="box-footer">
                    {{ Form::submit(Lang::get('Editar Alumno'), array('class' => 'btn btn-info pull-right')) }}
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
