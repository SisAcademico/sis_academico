<?php

class AuthController extends \BaseController {
	
	/**
	* Muestra la pantalla  de acceso al sistema
	*/
	public function mostrarLogin()
    {
        // Verificamos si hay sesión activa
        if (Auth::check())
        {
            // Si tenemos sesión activa mostrará la página de inicio
            return Redirect::to('/panel');
        }
        // Si no hay sesión activa mostramos el formulario
        return View::make('login.login');
    }

    public function postLogin()
    {
        // Obtenemos los datos del formulario
        $data = [
            'usuario' => Input::get('usuario'),
            'password' => Input::get('password')
        ];

        // Verificamos los datos
        // Como segundo parámetro pasámos el checkbox para sabes si queremos recordar la contraseña
        if (Auth::attempt($data, Input::get('remember'))) 
        {
            // Si nuestros datos son correctos mostramos la página de inicio
            return Redirect::intended('/panel');
        }
        // Si los datos no son los correctos volvemos al login y mostramos un error
        return Redirect::back()->with('mensaje_error', 'Los datos ingresados son incorrectos')->withInput();
    }

    public function logOut()
    {
        // Cerramos la sesión
        Auth::logout();
        // Volvemos al login y mostramos un mensaje indicando que se cerró la sesión
        return Redirect::to('login')->with('mensaje_error', 'Se cerro la sesión correctamente');
    }
}
