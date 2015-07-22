<?php

class NotaController extends \BaseController {


	public function getPDF()
	{
	    $fpdf = new PDF();
	    $colu = array('NRO', 'CODIGO', 'NOMBRES Y APELLIDOS');
	    $data=Alumno::all();
        //$fpdf->Image("unsaac.png",10,6,30);
        $fpdf->SetFont('Arial','B',13);
		$fpdf->AddPage();
		$fpdf->Cell(80);
		$fpdf->Cell(30,5,'Lista de Alumnos', 0, 1, 'C');
		$fpdf->SetFont('Arial','B',9);
		/*$fpdf->Cell(10,5,'Asignatura:', 0, 1, 'L');
		$fpdf->Cell(10,5,'Docente:', 0, 1, 'L');*/
		$fpdf->Ln(2);

		$fpdf->SetFont('Arial','B',10);
		$fpdf->FancyTable($colu,$data);

        $cabe=['Content-Type' => 'application/pdf'];
        return 	Response::make($fpdf->Output(),200,$cabe);

	}
	
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
		
		$docente = Docente::all();
		return View::make('docente.notaInicio')->with('docentes',$docente);
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
		$tipo = substr($isasig, 0, 2);
		if($tipo=="AL")//curso libre
		{
			$horas=DB::table('tasignatura_cl')
			->select('horas_totales')->where('tasignatura_cl.idasignatura_cl','=',$isasig)->get();
            foreach ($horas as $hora) 
            {
                $nroExamenes= $hora->horas_totales/20;
            }
			if($nroExamenes==0)
				$nroExamenes=1;
			$data = Nota::getDataNotaLibre($isasig);

			foreach($data as $dato)
			{
				for ($i=0; $i <$nroExamenes ; $i++)
				{
					$idTextBox = ($dato->iddetalle_matricula).":".$i;
					$valor = $input[$idTextBox];
					if(empty($valor) || $valor == "NSP")
						$valor = 0;
					$temp=DB::table('tnotas')
					-> where('iddetalle_matricula', '=', $dato->iddetalle_matricula)
					-> where('nro_parcial', '=', $i)
					-> get();
					if(empty($temp))
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
		else if($tipo=="AC")
		{
			$horas=DB::table('tasignatura')
			->select('horas_totales')->where('tasignatura.idasignatura','=',$isasig)->get();
			 foreach ($horas as $hora) {
                                   # code...
                $nroExamenes= $hora->horas_totales/40;
            }
			if($nroExamenes==0)
				$nroExamenes=1;
			$data = Nota::getDataNotaCarrera($isasig);

			foreach($data as $dato)
			{
				for ($i=0; $i <$nroExamenes ; $i++)
				{
					$idTextBox = ($dato->iddetalle_matricula).":".$i;
					$valor = $input[$idTextBox];
					if(empty($valor) || $valor == "NSP")
						$valor = 0;
					$temp2=DB::table('tnotas')
					-> where('iddetalle_matricula', '=', $dato->iddetalle_matricula)
					-> where('nro_parcial', '=', $i)
					-> get();
					if(empty($temp2))
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
				$horas=DB::table('tasignatura_cl')
				->select('horas_totales')->where('tasignatura_cl.idasignatura_cl','=',$isasig)->get();
                 foreach ($horas as $hora) {
                                    # code...
                      $nroExamenes= $hora->horas_totales/20;
                 }
				if($nroExamenes==0)
					$nroExamenes=1;
				$data = Nota::getDataNotaLibre($isasig);
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
					$data = Nota::getDataNotaCarrera($isasig);
				return View::make('nota.insertar',['datos'=> $data,'nroExamenes'=>$nroExamenes,'idasig'=>$isasig]);
			}
			else
				return Redirect::to('nota');

		}
		/*if(Request::isMethod('get'))
		{
		}*/
	}
	public function listarCursosDocente()
	{
		$iddocente = Input::get('id_docente');
		$cursos1 = AsistenciaDocente::getJoinCargaAcademicaAsistenciaDocenteCarrera($iddocente);
		$cursos2 = AsistenciaDocente::getJoinCargaAcademicaAsistenciaDocenteLibre($iddocente);
		return View::make('nota.escojer_curso')->with(['asig'=> $cursos1,'asig2'=> $cursos2]);

	}
}
