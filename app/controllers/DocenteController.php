<?php

class DocenteController extends \BaseController {

    /**
     * Mostrar el formulario de inserción de Docentes
     */


	public function index()
	{
		$docente = Docente::all();   
                $Semestretodo = Semestre::all();
		return View::make('docente.listar')->with('docentes',$docente)
                                                   ->with('Semestretodo',$Semestretodo);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//return View::make('Docente.insertar');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$iddocenteaverificar = Input::get('id_docente');
		$dniaverificar = Input::get('dni');

		

			//antes de insertar los datos en la base de datos 
            //verificamos que los datos basicos para este  docente no se repitan como  Id,DNI
            
            
            $ListaDoc = Docente::all();
            $existedoc= false;
            $docntalqestaasignado = '';
            foreach ($ListaDoc as $doc)
            {
                $idl = $doc->iddocente;
                $dnil = $doc->dni;
               
                if($idl==$iddocenteaverificar)
                {
                    $existedoc = true;
                    $error = ['wilson'=>'Este Id ya Existe'];
                }
                if($dnil==$dniaverificar)
                {
                    $existedoc = true;
                    $error = ['wilson'=>'Este DNI ya Existe'];
                }
            }


		if($existedoc)
            {
            		 
                    return Redirect::back()->withInput()->withErrors($error);

			}
		else{

		/*$id2 = DB::table('tfoto')->insertGetId(
    	['imagen' => Input::file("photo")]
		);*/
		$docentes = new Docente;
		$foto = new Foto;
		$id = DB::table('tusuario')->insertGetId(
    	['password' => Input::get('id_docente').'i', 'tipo_usuario' => 'docente']);
		$docentes->iddocente = Input::get('id_docente');
		$docentes->idusuario = $id;
		$docentes->dni = Input::get('dni');
		$docentes->nombres = Input::get('nombres');
		$docentes->apellidos = Input::get('apellidos');
		$docentes->direccion = Input::get('direccion');
		$docentes->telefono = Input::get('telefono');
		$docentes->correo = Input::get('correo');
		$docentes->cargo = Input::get('cargo');
		$docentes->telefono = Input::get('telefono');
		$docentes->fecha_inicio = Input::get('fecha');
		/*$docentes->idfoto = $id2;
		$docentes->estado = 'Activo';*/
		$docentes->save();
		return Redirect::to('docente');
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
		//$Docente = Docente::where('idDocente', '=', $ids)->get();
		//return View::make('Docente.listar')->with('Docentes',$Docente);

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$docente = Docente::where('iddocente', '=', $id)->get();
		return View::make('docente.editar')->with('docentes',$docente);

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$iddocenteaverificar = Input::get('id_docente');
		$dniaverificar = Input::get('dni');

            $ListaDoc = Docente::where('iddocente', '<>', $iddocenteaverificar)->get();

            $existedoc= false;
            $docntalqestaasignado = '';
            foreach ($ListaDoc as $doc)
            {
                $dnil = $doc->dni;
               

                if($dnil==$dniaverificar)
                {
                    $existedoc = true;
                    $error = ['wilson'=>'Este DNI ya Existe'];
                }
            }


		if($existedoc)
            {
            		 
                    return Redirect::back()->withInput()->withErrors($error);

			}
		else{
		$entra = Input::all();

		$docente = DB::table('tDocente')
            ->where('iddocente', $id)
            ->update(array(
            'iddocente' => $entra['id_docente'],
            'dni' => $entra['dni'],
            'nombres' => $entra['nombres'],
            'apellidos' => $entra['apellidos'],
            'direccion' => $entra['direccion'],
            'telefono' => $entra['telefono'],
            'correo' => $entra['correo'],
            'cargo' => $entra['cargo'],
            'fecha_inicio' => $entra['fecha']

            ));
		return Redirect::to('docente');
	}
	}

 public function listarDocente()
    {
    	//return View::make('docente.listar');
        $Docentestodo=docente::all();

        if(isset($_GET["buscar"]))
        {

        	$buscar = htmlspecialchars(Input::get("buscar"));
        	$fila = docente::select(DB::raw('*'))->where('nombres', 'like', '%'.$buscar.'%')->orwhere('apellidos', 'like', '%'.$buscar.'%')->get();
        	return View::make('docente.listar')->with('Busqueda',$fila);
		
        }

        return View::make('docente.listar')->with('Docentestodo',$Docentestodo);
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
        
        public function reportedocente(){
            $test = Input::all();
            echo 'hola este es el reporte<br>';
            print_r($test);
            echo '<br>';
            print_r($test['semestre']);
        }
        public function getPDF()
	{
            //$semestreselect = Input::all();
	    $fpdf = new PDF();
	    $colu = array('NRO', 'CODIGO', 'NOMBRES Y APELLIDOS');
	    $data=  Docente::all();
            $fpdf->SetFont('Arial','B',13);
            $fpdf->AddPage();
            $fpdf->Cell(80);
            $fpdf->Cell(30,5,'Lista de Docentes', 0, 1, 'C');
            $fpdf->SetFont('Arial','B',9);
            $fpdf->Ln(2);
            $fpdf->SetFont('Arial','B',10);
            $fpdf->FancyTableDocente($colu,$data);
            $cabe=['Content-Type' => 'application/pdf'];
            return 	Response::make($fpdf->Output(),200,$cabe);
	}

}
