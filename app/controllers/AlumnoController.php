<?php

class AlumnoController extends \BaseController {

    /**
     * Mostrar el formulario de inserción de alumnos
     */


	public function index()
	{
		$alumno = Alumno::all();
		return View::make('alumno.listar')->with('alumnos',$alumno);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('alumno.insertar');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$alumnos = new Alumno;
		$foto = new Foto;
		$id = DB::table('tusuario')->insertGetId(
    	['password' => Input::get('id_alumno').'i', 'tipo_usuario' => 'alumno']
		);
		$id2 = DB::table('tfoto')->insertGetId(
    	['imagen' => Input::file("photo")]
		);

		$alumnos->idalumno = Input::get('id_alumno');
		$alumnos->idusuario = $id;
		$alumnos->dni = Input::get('dni');
		$alumnos->nombres = Input::get('nombres');
		$alumnos->apellidos = Input::get('apellidos');
		$alumnos->direccion = Input::get('direccion');
		$alumnos->telefono = Input::get('telefono');
		$alumnos->correo = Input::get('correo');
		$alumnos->fecha_ingreso = Input::get('fecha');
		$alumnos->idfoto = $id2;
		$alumnos->estado = 'activo';
		$alumnos->save();
		return Redirect::to('alumno');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
