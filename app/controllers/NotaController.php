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
		$input = Input::all();
		$isasig =  $input['idasig'];
		$tipo = substr($isasig, 0, 1);
		if($tipo=="C")//curso libre
		{
			$horas=DB::table('tasignatura_cl')
			->select('horas_totales')->where('tasignatura_cl.idasignatura_cl','=',$isasig)->get();
            foreach ($horas as $hora) 
            {
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
				'tdetalle_matricula.iddetalle_matricula'
			)
			->where('tdetalle_matricula.idasignatura_cl','=',$isasig)
			->orderBy('talumno.idalumno','ASC')
			->get();

			foreach($data as $dato)
			{
				for ($i=0; $i <$nroExamenes ; $i++)
				{
					$idTextBox = ($dato->iddetalle_matricula).":".$i;
					$valor = $input[$idTextBox];
					if(empty($valor) || $valor == "NSP")
						$valor = 0;
					if(empty(DB::table('tnotas')
					-> where('iddetalle_matricula', '=', $dato->iddetalle_matricula)
					-> where('nro_parcial', '=', $i)
					-> get()
					))
					{
						$notas = new Nota();
						$notas -> fecha_nota = Carbon\Carbon::now();
						$notas -> nota = $valor;
						$notas -> iddetalle_matricula = $dato->iddetalle_matricula;
						$notas -> nro_parcial = $i;
						$notas -> save(); //guardar
					}
					else
					{
						if($valor !=0 )
						{
							DB::table('tnotas')
				            -> where('iddetalle_matricula', '=', $dato->iddetalle_matricula)
							-> where('nro_parcial', '=', $i)
				            -> update(array(
				            'nota' => $valor
				            ));
			        	}	
					}

				}
			}
			return Redirect::to('nota');
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
				'tdetalle_matricula.iddetalle_matricula'
			)
			->where('tdetalle_matricula.idasignatura','=',$isasig)
			->orderBy('talumno.idalumno','ASC')
			->get();

			foreach($data as $dato)
			{
				for ($i=0; $i <$nroExamenes ; $i++)
				{
					$idTextBox = ($dato->iddetalle_matricula).":".$i;
					$valor = $input[$idTextBox];
					if(empty($valor) || $valor == "NSP")
						$valor = 0;
					if(empty(DB::table('tnotas')
					-> where('iddetalle_matricula', '=', $dato->iddetalle_matricula)
					-> where('nro_parcial', '=', $i)
					-> get()
					))
					{
						$notas = new Nota();	
						$notas -> fecha_nota = Carbon\Carbon::now();
						$notas -> nota = $valor;
						$notas -> iddetalle_matricula = $dato->iddetalle_matricula;
						$notas -> nro_parcial = $i;
						$notas -> save();
					}
					else
					{
						if($valor !=0 )
						{
							DB::table('tnotas')
				            -> where('iddetalle_matricula', '=', $dato->iddetalle_matricula)
							-> where('nro_parcial', '=', $i)
				            -> update(array(
				            'nota' => $valor
				            ));
			        	}	
					}

				}
			}
			return Redirect::to('nota');
		}
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
				$nombr1=DB::table('tasignatura_cl')
				->select('nombre_asig_cl')->where('idasignatura_cl','=',$isasig)->get();

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
					->orderBy('tnotas.nro_parcial','ASC')
					->get();
				return View::make('nota.insertar',['datos'=> $data,'nroExamenes'=>$nroExamenes,'idasig'=>$isasig,'idasig3'=>$nombr1]);
			}
			else if($tipo=="A")
			{
				$nombr1=DB::table('tasignatura')
				->select('nombre_asignatura')->where('idasignatura','=',$isasig)->get();

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
				return View::make('nota.insertar',['datos'=> $data,'nroExamenes'=>$nroExamenes,'idasig'=>$isasig,'idasig2'=>$nombr1]);
			}
			else
				return Redirect::to('nota');

		}
		/*if(Request::isMethod('get'))
		{
		}*/
	}

}
