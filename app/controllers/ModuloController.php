<?php

class ModuloController extends BaseController {




	public function index()
	{

		$modulo = Modulo::paginate(20);
		return View::make('modulo.listar')->with('modulos',$modulo);

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

		$modulos = new Modulo;

	//	$modulos->idmodulo=Input::get('idmodulo');
		$modulos->nombre_modulo=Input::get('nombre_modulo');
		$modulos->idcarrera=Input::get('idcarrera');
		$modulos->save();

		return Redirect::to('modulo');
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
		$modulo = Modulo::where('idmodulo', '=', $id)->get();
		return View::make('modulo.editar')->with('modulos',$modulo);

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
		$carrera = DB::table('tmodulo')
            ->where('idmodulo', $id)
            ->update(array(
       //     'idmodulo' => $entra['idmodulo'],
            'nombre_modulo' => $entra['nombre_modulo'],
            'idcarrera' => $entra['idcarrera'],
            ));
		return Redirect::to('modulo');
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













