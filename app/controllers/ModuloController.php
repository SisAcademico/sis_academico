<?php

class ModuloController extends BaseController {

	public function insertarModulo()
    {
        return View::make('modulo.insertar');

    }


	public function listarModulo()
	{
		$modulostodo=Modulo::all();
        return View::make('modulo.listar')->with('modulostodo',$modulostodo);
	}
	public function modificarModulo($id)
    {

    }
	
	/**
	* Muestra la pantalla  de acceso al sistema
	*/
	public function mostrarPanel()
	{
		//return View::make('login.login');
		return View::make('modulo.formulario');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Respons
	 */
	public function store()
	{
		//
		$modulo = new Modulo;

		$modulo->idmodulo=Input::get('idmodulo');
		$modulo->nombre_modulo=Input::get('nombre_modulo');
		$modulo->idcarrera=Input::get('idcarrera');
		$modulo->save();

		return Redirect::to('modulo/listar');
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
			$moduloeditar = Modulo::where('idmodulo', '=', $id)->get();
    	//$docenteaeditar = Docente::where('iddocente','=',$id)->get();
		return View::make('modulo.modificar')->with('moduloeditar',$moduloeditar);
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
		$recuperado = Input::all();
		//print_r($recuperado) ;
		$modulo = DB::table('tmodulo')
			->where('idmodulo',$id)
			->update(array(
				//'iddocente'=>$recuperado['IDDOCENTE'],
				'idmodulo'=>$recuperado['idmodulo'],
				'nombre_modulo'=>$recuperado['nombre_modulo'],
				'idcarrera'=>$recuperado['idcarrera'],
				 ));
				return Redirect::to('modulo/modificar');

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
		echo "esto es una prueba de eliminar";
		$test = Modulo::where('idmodulo','=',$id)->delete($id);
		//print_r($test);
		echo "elimiado";
		//return $this->showUsers();
		return Redirect::to('modulo/listar');
	}


}