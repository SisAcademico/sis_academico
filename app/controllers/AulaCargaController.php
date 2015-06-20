<?php

class AulaCargaController extends \BaseController {

    
    public function listarAulaCarga()
    {
    	$AulaCarga = AulaCarga::all();
        return View::make('aulaCarga.listar')->with('AulaCarga', $AulaCarga);
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$tdocente=docente::all();
		return View::make('cargaAcademica.listar');//->with('tdocente',$tdocente);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function insertar()
	{
		//return View::make('docente.insertar');
		return View::make('aulaCarga.insertar');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$CargaAcademica = new CargaAcademica;
		
		$CargaAcademica->idcarga_academica=1;//Input::get('id_carga_academica');
		$CargaAcademica->grupo=Input::get('grupo');
		$CargaAcademica->turno=Input::get('turno');
		$CargaAcademica->idsemestre=Input::get('idsemestre');
		//---Almacenar 
		$CargaAcademica->save();
		return Redirect::to('CargaAcademicaController/listarCargaAcademica');
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
