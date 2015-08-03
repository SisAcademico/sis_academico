<?php

class CarreraController extends \BaseController {


	public function index()
	{
		$carrera = Carrera::all();
		return View::make('carrera.listar')->with('carreras',$carrera);
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
		$carreras = new Carrera;
		$carreras->idcarrera = Input::get('idcarrera');
		$carreras->nombre_carrera = Input::get('nombre_carrera');
		$carreras->nro_modulos = Input::get('nro_modulos');
		$carreras->save();
		return Redirect::to('carrera');
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
		$carrera = Carrera::where('idcarrera', '=', $id)->get();
		return View::make('carrera.editar')->with('carreras',$carrera);

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
		$carrera = DB::table('tcarrera')
            ->where('idcarrera', $id)
            ->update(array(
            'idcarrera' => $entra['idcarrera'],
            'nombre_carrera' => $entra['nombre_carrera'],
            'nro_modulos' => $entra['nro_modulos'],
            ));
		return Redirect::to('carrera');
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
