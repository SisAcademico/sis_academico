@extends('_layouts.login')

@section('titulo')
    @lang('sistema.pantalla_acceso')
@stop

@section('contenido')
    <div class="login-box">
        <div class="login-box-body loginform">
            <h4 class="text-center"> {{mb_strtoupper(Lang::get('sistema.administracion')) }}</h4>
            <div id="login_form" class="login_form">
        {{ Form::open(array('url' => 'login','autocomplete' => 'off','class' => 'form-signin', 'role' => 'form')) }}
        @if(Session::has('mensaje_error'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <ul class="error_list">
                        {{ Session::get('mensaje_error') }}
                </ul>
            </div>
        @endif

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group has-feedback">
            {{ Form::text('usuario',null,array('class'=>'form-control','placeholder'=>Lang::get('sistema.nombre_usuario'))) }}
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            {{ Form::password('password',array('class'=>'form-control','id'=>'password','placeholder'=>Lang::get('sistema.contrasena'))) }}
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
		
		<div class="row">
            <div class="col-xs-8">    
              <div class="checkbox icheck">
				  {{ Form::checkbox('remember',true,null, array('id'=>'remember')) }}
                  {{ Form::label('remember', Lang::get('sistema.recordarme')) }}
              </div>                        
            </div><!-- /.col -->
            <div class="col-xs-4">
			  {{ Form::submit(Lang::get('sistema.acceder'), array('class' => 'btn btn-primary btn-block btn-flat')) }}
            </div><!-- /.col -->
        </div>
		
        <div class="row">
            <div class="pull-right">
                <a class="btn btn-link" href="{{ url('/password/email') }}">{{trans('sistema.olvidar_contrasena')}}</a>
            </div>
        </div>

        {{ Form::close() }}
    </div>

        </div><!-- panel-body -->
    </div><!-- panel -->
@stop
