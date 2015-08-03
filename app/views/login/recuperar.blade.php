@extends('_layouts.login')

@section('titulo')
    @lang('sistema.pantalla_acceso')
@stop

@section('contenido')
    <div class="login-box">
        <div class="login-box-body loginform">
            <h4 class="text-center"> {{mb_strtoupper(Lang::get('sistema.administracion')) }}</h4>
            <div id="login_form" class="login_form">
			<h2>Recuperar contraseña</h2>
			<div>
				Para recuperar su contraseña, completa el formulario: {{ URL::to('password/reset', array($token)) }}.<br/>
				Este enlace expira en {{ Config::get('auth.reminder.expire', 60) }} minutos.
			</div>
			</div>
        </div><!-- panel-body -->
    </div><!-- panel -->
@stop
