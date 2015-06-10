<?php

class Administradorcontroller extends BaseController {




	public function listarAdministrador()
	{
		$administradorestodo=Administrador::all();
        return View::make('administrador.listar')->with('administradorestodo',$administradorestodo);
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


	
	public function get_formulario()
	{
		//
		return View::make('administrador.administrador');
	}
	public function post_Formulario()
	{
		//
		
	} 


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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