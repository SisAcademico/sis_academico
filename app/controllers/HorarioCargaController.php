<?php

class HorarioCargaController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 * Este modulo se usa para almacenar la relacion entre la tabla carga academica y horario
	 * Lee(Input :: get('datos')) el idCargacademica y idhorario (puede aber mas un idhorario por cada idCaragCademica)
	 * y lo inserta en la tabla tcarga_horario
	 *
	 *
	 *
	 * @return Response
	 */
	public function store()
	{
		$cargaHorario = new HorarioCarga();
		$cargaHorario->idcarga_academica = Input::get('idcarga_academica');
		$cargaHorario->idhorario = Input::get('idhorario');
		//validar
		$cargaHorario-> save();
		return Redirect::to('carga_academica/listar');
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
