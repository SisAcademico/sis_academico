<?php

class NotaController extends \BaseController {

	
	public function __construct()
	{
	    $this->datos = Input::has('team_id') ? Input::get('team_id') : "" ;
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		$asigna=Asignatura::all();
		$asigna2=Asignatura2::all();
		return View::make('nota.escojer_curso')->with(['asig'=> $asigna,'asig2'=> $asigna2]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('nota.insertar')->with('datos', $this->datos );
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$idasignatura =  Input::get('idasig');
		echo $idasignatura;
		$mytime = Carbon\Carbon::now();
		echo $mytime->toDateTimeString();

		/*$notas = new Nota;
		//$id = seleccionar idDetallematricula en base a la ultima matricula de un alumno X en un curso Y;
		/* -- al parecer existe un error en la BD, falta la relacion entre alumno y matricula :/ para solucionar esto
			-- ponemos "alter table tmatricula add idalumno varchar(10) references talumno" en el php myadmin
			--en sql seria algo asi :(no sé como hacerlo en aca :'()
			
			
			select $id = iddetalle_matricula, max(fecha_matricula) from talumno a inner join matricula m on a.idalumno = m.idalumno inner join
				tdetalle_matricula dm on dm.idmatricula = m.idmatricula where idasignatura = @id_asignatura.
		*/
		//$notas->idnota = Input::get('id_nota'); AUTO_INCREMENT
		/*$notas->fecha_nota = Input::get('fecha_nota'); //se puede usar la fecha y hora del sistema
		$notas->nota = Input::get('nota');
		$notas->iddetalle_matricula = $id;
		$alumnos->save();
		return Redirect::to('nota');*/
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
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
	public function getCourseData()
	{
		if(Request::isMethod('post'))
		{
			$isasig = Input::get('id_asignatura');
			$tipo = substr($isasig, 0, 1);
			if($tipo=="C")//curso libre
			{
				$horas=DB::table('tasignatura_cl')
				->select('horas_totales')->where('tasignatura_cl.idasignatura_cl','=',$isasig)->get();
                 foreach ($horas as $hora) {
                                    # code...
                      $nroExamenes= $hora->horas_totales/20;
                 }
				if($nroExamenes==0)
					$nroExamenes=1;
				$data = DB::table('tdetalle_matricula')
					->leftJoin('tnotas', 'tdetalle_matricula.iddetalle_matricula', '=', 'tnotas.iddetalle_matricula')
					->join('tmatricula', 'tmatricula.idmatricula', '=', 'tdetalle_matricula.idmatricula')
					->join('talumno', 'talumno.idalumno','=','tmatricula.idalumno')

					->select
					(
						'talumno.idalumno',
						'talumno.nombres',
						'talumno.apellidos',
						'tnotas.idnota',
						'tnotas.nota',
						'tdetalle_matricula.iddetalle_matricula'
					)
					->where('tdetalle_matricula.idasignatura_cl','=',$isasig)
					->orderBy('talumno.idalumno','ASC')
					->get();
				return View::make('nota.insertar',['datos'=> $data,'nroExamenes'=>$nroExamenes,'idasig'=>$isasig]);
			}
			else if($tipo=="A")
			{
				$horas=DB::table('tasignatura')
				->select('horas_totales')->where('tasignatura.idasignatura','=',$isasig)->get();
				 foreach ($horas as $hora) {
                                    # code...
                      $nroExamenes= $hora->horas_totales/40;
                 }
				if($nroExamenes==0)
					$nroExamenes=1;
				$data = DB::table('tdetalle_matricula')
					->leftJoin('tnotas', 'tdetalle_matricula.iddetalle_matricula', '=', 'tnotas.iddetalle_matricula')
					->join('tmatricula', 'tmatricula.idmatricula', '=', 'tdetalle_matricula.idmatricula')
					->join('talumno', 'talumno.idalumno','=','tmatricula.idalumno')
					->select
					(
						'talumno.idalumno',
						'talumno.nombres',
						'talumno.apellidos',
						'tnotas.idnota',
						'tnotas.nota',
						'tdetalle_matricula.iddetalle_matricula'
					)
					->where('tdetalle_matricula.idasignatura','=',$isasig)
					->orderBy('talumno.idalumno','ASC')
					->get();
				return View::make('nota.insertar',['datos'=> $data,'nroExamenes'=>$nroExamenes,'idasig'=>$isasig]);
			}
			else
				return Redirect::to('nota');

		}
		/*if(Request::isMethod('get'))
		{
		}*/
	}

}
