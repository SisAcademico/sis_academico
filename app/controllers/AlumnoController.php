<?php

class AlumnoController extends \BaseController {

    /**
     * Mostrar el formulario de inserción de alumnos
     */


	public function index()
	{
		$alumno = Alumno::all();
		$cuan = sizeof(Alumno::all());
		$cod = "";
		$lo = strlen(strval($cuan));
		for ($i=0; $i < 7 - $lo ; $i++) { 
			$cod=$cod."0";
		}
		$cod="ISC".$cod.$cuan;
		return View::make('alumno.listar',['alumnos'=> $alumno,'cuan'=>$cod]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//return View::make('alumno.insertar');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$error = "Código de Alumno Repertido";
		if(!empty(DB::table('talumno')->where('id_alumno', '=',Input::get('id_alumno'))))
		{
			echo "Alumno ya exite";
			return Redirect::to('alumno');
		}
		$error = "";
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
		$alumnos->estado = 'Activo';
		$alumnos->save();
		return Redirect::to('alumno');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($ids)
	{
		//$alumno = Alumno::where('idalumno', '=', $ids)->get();
		//return View::make('alumno.listar')->with('alumnos',$alumno);

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$alumno = Alumno::where('idalumno', '=', $id)->get();
		return View::make('alumno.editar')->with('alumnos',$alumno);

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$error = "";
		$entra = Input::all();
		$foto = new Foto;
		$id2 = DB::table('tfoto')->insertGetId(
    	['imagen' => Input::file("photo")]
		);
		$alumno = DB::table('talumno')
            ->where('idalumno', $id)
            ->update(array(
            'idalumno' => $entra['id_alumno'],
            'dni' => $entra['dni'],
            'nombres' => $entra['nombres'],
            'apellidos' => $entra['apellidos'],
            'direccion' => $entra['direccion'],
            'telefono' => $entra['telefono'],
            'correo' => $entra['correo'],
            'fecha_ingreso' => $entra['fecha'],
            'estado' => 'Activo',
            'idfoto' => $id2
            ));
		return Redirect::to('alumno');
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
