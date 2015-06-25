<?php

class DocenteController extends \BaseController {

    /**
     * Mostrar el formulario de inserción de Docentes
     */


	public function index()
	{
		$docente = Docente::all();
		return View::make('docente.listar')->with('docentes',$docente);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//return View::make('Docente.insertar');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$docentes = new Docente;
		$foto = new Foto;
		$id = DB::table('tusuario')->insertGetId(
    	['password' => Input::get('id_docente').'i', 'tipo_usuario' => 'docente']
		);
		$id2 = DB::table('tfoto')->insertGetId(
    	['imagen' => Input::file("photo")]
		);
		$docentes->iddocente = Input::get('id_docente');
		$docentes->idusuario = $id;
		$docentes->dni = Input::get('dni');
		$docentes->nombres = Input::get('nombres');
		$docentes->apellidos = Input::get('apellidos');
		$docentes->direccion = Input::get('direccion');
		$docentes->telefono = Input::get('telefono');
		$docentes->correo = Input::get('correo');
		$docentes->cargo = Input::get('cargo');
		$docentes->telefono = Input::get('telefono');
		$docentes->fecha_inicio = Input::get('fecha');
		$docentes->idfoto = $id2;
		$docentes->estado = 'Activo';
		$docentes->save();
		return Redirect::to('docente');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($ids)
	{
		//$Docente = Docente::where('idDocente', '=', $ids)->get();
		//return View::make('Docente.listar')->with('Docentes',$Docente);

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$docente = Docente::where('iddocente', '=', $id)->get();
		return View::make('docente.editar')->with('docentes',$docente);

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$entra = Input::all();
		$foto = new Foto;
		$id2 = DB::table('tfoto')->insertGetId(
    	['imagen' => Input::file("photo")]
		);
		$docente = DB::table('tDocente')
            ->where('iddocente', $id)
            ->update(array(
            'iddocente' => $entra['id_docente'],
            'dni' => $entra['dni'],
            'nombres' => $entra['nombres'],
            'apellidos' => $entra['apellidos'],
            'direccion' => $entra['direccion'],
            'telefono' => $entra['telefono'],
            'correo' => $entra['correo'],
            'cargo' => $entra['cargo'],
            'fecha_inicio' => $entra['fecha'],
            'estado' => 'Activo',
            'idfoto' => $id2
            ));
		return Redirect::to('docente');
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
