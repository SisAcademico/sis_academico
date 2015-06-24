<?php

class AdministradorController extends BaseController {

	public function insertarAdministrador()
    {
        return View::make('administrador.insertar');

    }


	public function listarAdministrador()
	{
		$administradorestodo=Administrador::all();
        return View::make('administrador.listar')->with('administradorestodo',$administradorestodo);
	}
	public function modificarAdministrador($id)
    {

    }
	
	/**
	* Muestra la pantalla  de acceso al sistema
	*/
	public function mostrarPanel()
	{
		//return View::make('login.login');
		return View::make('administrador.formulario');
		//return 'karennnnnnnn';
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
		$administrador = new Administrador;

		$foto = new foto;
		$id=DB::table('tusuario')
		->insertGetId(['password'=>Input::get('idadministrador').'i','tipo_usuario'=>'administrador']);

		$id1=DB::table('tfoto')->insertGetId(['imagen'=>Input::file("photo")]);

		$administrador->idadministrador=Input::get('id_administrador');
		$administrador->idusuario=Input::get('idusuario');
		$administrador->dni=Input::get('dni');
		$administrador->nombres=Input::get('nombres');
		$administrador->apellidos=Input::get('apellidos');
		$administrador->direccion=Input::get('direccion');
		$administrador->telefono=Input::get('telefono');
		$administrador->correo=Input::get('correo');
		
		$administrador->estado=Input::get('estado');
		
		$administrador->idfoto=$id1;

		$administrador->save();

		return Redirect::to('administrador/listar');
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
			$administradoraeditar = Administrador::where('idadministrador', '=', $id)->get();
    	//$docenteaeditar = Docente::where('iddocente','=',$id)->get();
		return View::make('administrador.modificar')->with('administradoraeditar',$administradoraeditar);
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
		$administrador = DB::table('tadministrador')
			->where('idadministrador',$id)
			->update(array(
				'idadministrador'=>$recuperado['id_administrador'],
				'dni'=>$recuperado['DNI'],
				'nombres'=>$recuperado['NOMBRES'],
				'apellidos'=>$recuperado['APELLIDOS'],
				'direccion'=>$recuperado['DIRECCION'],
				'telefono'=>$recuperado['TELEFONO'],
				'correo'=>$recuperado['CORREO'],
				
				'estado'=>$recuperado['ESTADO'],
				'idfoto'=>1,
				 ));
				return Redirect::to('administrador/listar');

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
		$test = Administrador::where('idadministrador','=',$id)->delete($id);
		//print_r($test);
		echo "elimiado";
		//return $this->showUsers();
		return Redirect::to('administrador/listar');
	}


}