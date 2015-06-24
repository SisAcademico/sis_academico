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
		$cursos1 = DB::table('tcarga_academica')
				->join('tasignatura', 'tcarga_academica.idasignatura', '=', 'tcarga_academica.idasignatura')
				->join('tdocente', 'tcarga_academica.iddocente', '=', 'tdocente.iddocente')
				->join('tcarga_horario', 'tcarga_horario.idcarga_academica', '=', 'tcarga_horario.idcarga_academica') 
				->join('thorario', 'thorario.idhorario', '=', 'tcarga_horario.idhorario')
				->select 
				(
					'tcarga_academica.idcarga_academica',
					'tasignatura.idasignatura',
					'tasignatura.nombre_asignatura',
					'thorario.hora_inicio',
					'thorario.hora_fin'
				)
				->where('tdocente.iddocente', '=', $iddocente)
				->get();
		$cursos2 = DB::table('tcarga_academica')
				->join('tasignatura_cl', 'tcarga_academica.idasignatura_cl', '=', 'tcarga_academica.idasignatura_cl')
				->join('tdocente', 'tcarga_academica.iddocente', '=', 'tdocente.iddocente')
				->join('tcarga_horario', 'tcarga_horario.idcarga_academica', '=', 'tcarga_horario.idcarga_academica') 
				->join('thorario', 'thorario.idhorario', '=', 'tcarga_horario.idhorario')
				->select 
				(
					'tcarga_academica.idcarga_academica',
					'tasignatura_cl.idasignatura_cl',
					'tasignatura_cl.nombre_asig_cl',
					'thorario.hora_inicio',
					'thorario.hora_fin'
				)
				->where('tdocente.iddocente', '=', $iddocente)
				->get();
		//sacaremos el id asignatura del curso que le toca ahora
		//en el modeo de BD solo se considera hora de inicio y hora de fin.
		//evitaremos el uso de dia para la comparacion, se considerar que un
		// curso es $idasignaturaNow si esta en el rango de +- 15 min de la hora de inicio de la asignatura		
		$dt = Carbon\Carbon::now();		
		$timeNow = Carbon\Carbon::createFromTime($dt->hour,$dt->minute ,$dt->second , $dt->micro); //hora actual
		echo $timeNow;
		$idasignatura = "";
		foreach ($cursos1 as $curso) {
			$dif = $timeNow->diffInMinutes($curso['hora_inicio']);
			if($dif<=15 || $dif>=-15)
				$idasignatura = $curso['idasignatura'];
		}
		foreach ($cursos2 as $curso) {
			$dif = $timeNow->diffInMinutes($curso['hora_inicio']);
			if($dif<=15|| $dif>=-15)
				$idasignatura = $curso['idasignatura_cl'];
		}
		/*no hay cursos cercanos a la hora, se verifica todos los cursos con hora menor a la actual
		  en caso exista algun curso que no tenga asistencia insertada, se le pone como FALTA
		*/
		if($idasignatura=="") 
		{

		}
		else
		{ //verificar si es temprano o tarde : signo de $dif
			if($dif>=0) //temprano
			{

			}
			else
			{

			}
		}
		return View::make('docente.mostrarCursosDocente',['cursos1'=> $cursos1, 'cursos2'=> $cursos2, 'cursoCercano'=>$idasignatura]);

	}


}
