<?php

class AsistenciaDocenteController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$docente = docente::all();
		return View::make('docente.asistenciaInicio')->with('docentes',$docente);
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
	 *
	 * @return Response
	 */
	public function store()
	{
		$iddocente = Input::get('id_docente');
		$timeNow = Carbon\Carbon::now();
		echo $iddocente." : ".$timeNow;
		//consulta a DB para saber que curso tiene el docente a esta hora
		
		//return Redirect::to('docente/asistencia');
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
	public function listarCursosDocente()
	{
		$iddocente = Input::get('id_docente');
		$cursos1 = AsistenciaDocente::getJoinCargaAcademicaAsistenciaDocenteCarrera($iddocente);
		$cursos2 = AsistenciaDocente::getJoinCargaAcademicaAsistenciaDocenteLibre($iddocente);
		//sacaremos el id asignatura del curso que le toca ahora
		//en el modeo de BD solo se considera hora de inicio y hora de fin.
		//evitaremos el uso de dia para la comparacion, se considerar que un
		// curso es $idasignaturaNow si esta en el rango de +- 15 min de la hora de inicio de la asignatura		
		//echo sizeof($cursos1)." * ".sizeof($cursos2);
		$timeNow = Carbon\Carbon::now(); //hora actual
		$timeNow->addHours(2);
		$idasignatura = "";
		foreach ($cursos1 as $curso) {
			$date = Carbon\Carbon::now(); 
			$date->addHours(2);
			$hora_ini = (string)($curso->hora_inicio);
			$date->hour = substr($hora_ini, 0, 2);
			$date->minute = substr($hora_ini, 3, 2);
			$date->second = substr($hora_ini, 6, 2);
			
			$tmp = $timeNow->diffInMinutes($date);
			if(abs($tmp<=15 ))
			{
				$idasignatura = $curso->idasignatura;
				$dif = $date->copy();
			}
		}
		foreach ($cursos2 as $curso) {
			$date = $timeNow;
			$hora_ini = (string)($curso->hora_inicio);
			$date->hour = substr($hora_ini, 0, 2);
			$date->minute = substr($hora_ini, 3, 2);
			$date->second = substr($hora_ini, 6, 2);
			//echo $timeNow. "    :::   ".$date;
			//echo "<br>";
			$tmp = $timeNow->diffInMinutes($date);
			if(abs($tmp<=15 ))
			{
				$idasignatura = $curso->idasignatura;
				$dif = $date->copy();
			}
		}
		return View::make('docente.mostrarCursosDocente',['cursos1'=> $cursos1, 'cursos2'=> $cursos2, 'cursoCercano'=>$idasignatura]);

	}


}
