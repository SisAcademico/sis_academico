<?php

class AlumnoController extends \BaseController {

    /**
     * Mostrar el formulario de inserción de alumnos
     */
    public function getPDF($id){
    	$fpdf = new PDF();
	    $colu = array('NRO', 'CODIGO', 'NOMBRES Y APELLIDOS');
	    $data=DB::table('tmatricula')
            ->join('talumno', 'tmatricula.idalumno', '=', 'talumno.idalumno')
            ->join('tdetalle_matricula', 'tmatricula.idmatricula', '=', 'tdetalle_matricula.idmatricula')
            ->join('tasignatura_cl', 'tasignatura_cl.idasignatura_cl','=', 'tdetalle_matricula.idasignatura_cl')
            ->select('talumno.idalumno','talumno.nombres','talumno.apellidos')
            ->where('tasignatura_cl.idasignatura_cl','=',$id)
            ->get();
        if(sizeof($data)>0){
         	$fpdf->SetFont('Arial','B',13);
			$fpdf->AddPage();
			$fpdf->Cell(80);
			$fpdf->Cell(30,5,'Lista de Alumnos', 0, 1, 'C');
			$fpdf->SetFont('Arial','B',9);
			$fpdf->Ln(2);

			$fpdf->SetFont('Arial','B',10);
			$fpdf->FancyTable($colu,$data);

	        $cabe=['Content-Type' => 'application/pdf'];
	        return 	Response::make($fpdf->Output(),200,$cabe);
         }
         else{
         	return View::make('alumno.error');
         }
    }

    public function getPDF2($id){
        $fpdf = new PDF();
	    $colu = array('NRO', 'CODIGO', 'NOMBRES Y APELLIDOS');
	    $data=DB::table('tmatricula')
            ->join('talumno', 'tmatricula.idalumno', '=', 'talumno.idalumno')
            ->join('tdetalle_matricula', 'tmatricula.idmatricula', '=', 'tdetalle_matricula.idmatricula')
            ->join('tasignatura', 'tasignatura.idasignatura','=', 'tdetalle_matricula.idasignatura')
            ->select('talumno.idalumno','talumno.nombres','talumno.apellidos')
            ->where('tasignatura.idasignatura','=',$id)
            ->get();
         if(sizeof($data)>0){
         	$fpdf->SetFont('Arial','B',13);
			$fpdf->AddPage();
			$fpdf->Cell(80);
			$fpdf->Cell(30,5,'Lista de Alumnos', 0, 1, 'C');
			$fpdf->SetFont('Arial','B',9);
			$fpdf->Ln(2);

			$fpdf->SetFont('Arial','B',10);
			$fpdf->FancyTable($colu,$data);

	        $cabe=['Content-Type' => 'application/pdf'];
	        return 	Response::make($fpdf->Output(),200,$cabe);
         }
         else{
         	return View::make('alumno.error');
         }
    }

	public function index()
	{
		$alumno = Alumno::paginate(20);
		$cuan = sizeof(Alumno::all());
		$cod = "";
		$lo = strlen(strval($cuan));
		for ($i=0; $i < 7 - $lo ; $i++) { 
			$cod=$cod."0";
		}
		$cod="ISC".$cod.$cuan;

		$curss=Asignatura::all();
		$curss1=AsignaturaLibres::all();
		$modul=Modulo::all();
		$semst=Semestre::all();
		return View::make('alumno.listar',['alumnos'=> $alumno,'cuan'=>$cod, 'curli' => $curss, 'curli1' => $curss1, 'modulo' => $modul, 'semest' => $semst]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//return View::make('alumno.insertar');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$codi=Input::get('id_alumno');
		$cuan=sizeof(DB::table('talumno')->where('idalumno', '=',Input::get('id_alumno'))->get());
		if($cuan!=0){
			$error = [''=>'El código '.$codi.' ya existe.'];
			return Redirect::back()->withInput()->withErrors($error);
		}
		else{
			if (Input::hasFile('fphoto')){
				$alumnos = new Alumno;
				$id = DB::table('tusuario')->insertGetId(
		    	['usuario' => Input::get('id_alumno') , 'password' => Input::get('id_alumno'), 'tipo_usuario' => 'alumno' , 'estado' => 'activo']
				);

			    $file = Input::file('fphoto');
			    $file->move('images', $id.$file->getClientOriginalName());
			    $image = Image::make(sprintf('images/%s', $id.$file->getClientOriginalName()))->resize(350, null, function ($constraint) {
				    $constraint->aspectRatio();
				})->save();
			    
				$alumnos->idalumno = Input::get('id_alumno');
				$alumnos->idusuario = $id;
				$alumnos->dni = Input::get('dni');
				$alumnos->nombres = Input::get('nombres');
				$alumnos->apellidos = Input::get('apellidos');
				$alumnos->direccion = Input::get('direccion');
				$alumnos->telefono = Input::get('telefono');
				$alumnos->correo = Input::get('correo');
				$alumnos->fecha_ingreso = Input::get('fecha');
				$alumnos->foto = $id.$file->getClientOriginalName();
				$alumnos->save();
				return Redirect::to('alumno');
			}
			else{
				$alumnos = new Alumno;
				$id = DB::table('tusuario')->insertGetId(
		    	['usuario' => Input::get('id_alumno') , 'password' => Input::get('id_alumno'), 'tipo_usuario' => 'alumno' , 'estado' => 'activo']
				);
				$alumnos->idalumno = Input::get('id_alumno');
				$alumnos->idusuario = $id;
				$alumnos->dni = Input::get('dni');
				$alumnos->nombres = Input::get('nombres');
				$alumnos->apellidos = Input::get('apellidos');
				$alumnos->direccion = Input::get('direccion');
				$alumnos->telefono = Input::get('telefono');
				$alumnos->correo = Input::get('correo');
				$alumnos->fecha_ingreso = Input::get('fecha');
				$alumnos->foto = "default.png";
				$alumnos->save();
				return Redirect::to('alumno');

			}
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($ids)
	{
		//$alumno = Alumno::where('idalumno', '=', $ids)->get();
		//return View::make('alumno.listar')->with('alumnos',$alumno);

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$alumno = Alumno::where('idalumno', '=', $id)->get();
		return View::make('alumno.editar')->with('alumnos',$alumno);

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$error = "";
		$entra = Input::all();
		$alumno = DB::table('talumno')
            ->where('idalumno', $id)
            ->update(array(
            'dni' => $entra['dni'],
            'nombres' => $entra['nombres'],
            'apellidos' => $entra['apellidos'],
            'direccion' => $entra['direccion'],
            'telefono' => $entra['telefono'],
            'correo' => $entra['correo'],
            'fecha_ingreso' => $entra['fecha'],
            'foto' => ""
            ));
		return Redirect::to('alumno');
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
	public function getPDF3($id){
        $fpdf = new PDF();
	    $colu = array('NRO', 'CODIGO', 'NOMBRES Y APELLIDOS');
	    $data=DB::table('tmatricula')
            ->join('talumno', 'tmatricula.idalumno', '=', 'talumno.idalumno')
            ->join('tdetalle_matricula', 'tmatricula.idmatricula', '=', 'tdetalle_matricula.idmatricula')
            ->join('tasignatura', 'tasignatura.idasignatura','=', 'tdetalle_matricula.idasignatura')
            ->join('tmodulo', 'tmodulo.idmodulo','=', 'tasignatura.idmodulo')
            ->select('talumno.idalumno','talumno.nombres','talumno.apellidos')
            ->where('tmodulo.idmodulo','=',$id)
            ->get();
         if(sizeof($data)>0){
         	$fpdf->SetFont('Arial','B',13);
			$fpdf->AddPage();
			$fpdf->Cell(80);
			$fpdf->Cell(30,5,'Lista de Alumnos', 0, 1, 'C');
			$fpdf->SetFont('Arial','B',9);
			$fpdf->Ln(2);

			$fpdf->SetFont('Arial','B',10);
			$fpdf->FancyTable($colu,$data);

	        $cabe=['Content-Type' => 'application/pdf'];
	        return 	Response::make($fpdf->Output(),200,$cabe);
         }
         else{
         	return View::make('alumno.error');
         }
    }

    public function getPDF4($id){
        $fpdf = new PDF();
	    $colu = array('NRO', 'CODIGO', 'NOMBRES Y APELLIDOS');
	    $data1=DB::table('tmatricula')
            ->join('talumno', 'tmatricula.idalumno', '=', 'talumno.idalumno')
            ->join('tdetalle_matricula', 'tmatricula.idmatricula', '=', 'tdetalle_matricula.idmatricula')
            ->join('tasignatura', 'tasignatura.idasignatura','=', 'tdetalle_matricula.idasignatura')
            ->join('tcarga_academica', 'tcarga_academica.idasignatura','=', 'tasignatura.idasignatura')
            ->join('tsemestre', 'tsemestre.idsemestre','=', 'tcarga_academica.idsemestre')
            ->select('talumno.idalumno','talumno.nombres','talumno.apellidos')
            ->where('tsemestre.idsemestre','=',$id);

        $data=DB::table('tmatricula')
            ->join('talumno', 'tmatricula.idalumno', '=', 'talumno.idalumno')
            ->join('tdetalle_matricula', 'tmatricula.idmatricula', '=', 'tdetalle_matricula.idmatricula')
            ->join('tasignatura', 'tasignatura.idasignatura','=', 'tdetalle_matricula.idasignatura')
            ->join('tcarga_academica', 'tcarga_academica.idasignatura','=', 'tasignatura.idasignatura')
            ->join('tsemestre', 'tsemestre.idsemestre','=', 'tcarga_academica.idsemestre')
            ->select('talumno.idalumno','talumno.nombres','talumno.apellidos')
            ->where('tsemestre.idsemestre','=',$id)
            ->union($data1)
            ->get();
         if(sizeof($data)>0){
         	$fpdf->SetFont('Arial','B',13);
			$fpdf->AddPage();
			$fpdf->Cell(80);
			$fpdf->Cell(30,5,'Lista de Alumnos', 0, 1, 'C');
			$fpdf->SetFont('Arial','B',9);
			$fpdf->Ln(2);

			$fpdf->SetFont('Arial','B',10);
			$fpdf->FancyTable($colu,$data);

	        $cabe=['Content-Type' => 'application/pdf'];
	        return 	Response::make($fpdf->Output(),200,$cabe);
         }
         else{
         	return View::make('alumno.error');
         }
    }


}
