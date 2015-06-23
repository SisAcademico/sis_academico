<?php

class CarreraController extends BaseController {

	public function insertarCarrera()
    {
        return View::make('carrera.insertar');

    }


	public function listarCarreras()
	{
		$carrerastodo=Carrera::all();
        return View::make('carrera.listar')->with('carrerastodo',$carrerastodo);
	}
	public function modificarcarrera($id)
    {

    }
	
	/**
	* Muestra la pantalla  de acceso al sistema
	*/
	public function mostrarPanel()
	{
		//return View::make('login.login');
		return View::make('Carrera.formulario');
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
		$carrera = new Carrera;

		$carrera->idcarrera=Input::get('idcarrera');
		$carrera->nombre_carrera=Input::get('nombre_carrera');
		$carrera->dni=Input::get('nro_modulos');
		$carrera->save();

		return Redirect::to('carrera/listar');
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
			$carreraaeditar = Carrera::where('idcarrera', '=', $id)->get();
    	//$docenteaeditar = Docente::where('iddocente','=',$id)->get();
		return View::make('carrera.modificar')->with('carreraaeditar',$carreraaeditar);
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
		$carrera = DB::table('tcarrera')
			->where('idcarrera',$id)
			->update(array(
				//'iddocente'=>$recuperado['IDDOCENTE'],
				'idcarrera'=>$recuperado['IDCARRERA'],
				'nombre_carrera'=>$recuperado['NOMBRE_CARRERA'],
				'Nro_modulos'=>$recuperado['NRO_MODULOS'],
				 ));
				return Redirect::to('carrera/listar');

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
		//DB::delete('delete from tdocente where id = '.$id);
		//$test = DB::table('tdocente')->where('iddocente',$id);
		$test = Carrera::where('idcarrera','=',$id)->delete($id);
		//print_r($test);
		echo "elimiado";
		//return $this->showUsers();
		return Redirect::to('carrera/listar');
	}


}