<?php

class CargaAcademicaController extends \BaseController {

    
    public function listarCargaAcademica()
    {
    	$CargaAcademicatodo = CargaAcademica::all();
        return View::make('cargaAcademica.listar')->with('CargaAcademicatodo', $CargaAcademicatodo);
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
            $Semestretodo = Semestre::all();
            $Asignaturatodo = Asignatura::all();
            $Semestrecltodo = Asignaturacl::all();
            $Aulatodo = Aula::all();
            return View::make('cargaAcademica.insertar')
                    ->with('Semestretodo', $Semestretodo)
                    ->with('Asignaturatodo', $Asignaturatodo)
                    ->with('Semestrecltodo', $Semestrecltodo)
                    ->with('Aulatodo', $Aulatodo);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$CargaAcademica = new CargaAcademica;
		
		$CargaAcademica->idcarga_academica=Input::get('idcarga_academica');
		$CargaAcademica->grupo=Input::get('grupo');
		$CargaAcademica->turno=Input::get('turno');
                $CargaAcademica->idsemestre=Input::get('idsemestre');
                $CargaAcademica->idasignatura=Input::get('idasignatura');
                $CargaAcademica->idasignatura_cl=Input::get('idasignatura_cl');
		//---Almacenar 
		$CargaAcademica->save();
                
                //echo 'se agrego correctamete carga academica';
                $AulaCarga = new AulaCarga;
                /*
                $test = Input::get('idcarga_academica');
                echo '<br>es: '.$test;
                $test2 = Input::get('idaula');
                echo '<br>es: '.$test2;
                print_r($test2);
              */
                $AulaCarga->idcarga_academica=Input::get('idcarga_academica');
                $AulaCarga->idaula=Input::get('idaula');
                $AulaCarga->save();
                //echo 'se agrego corectamente al taula_carga';
                return Redirect::to('carga_academica/listar');
	}
        public function recuperarparamodificar($id)
	{
            $Semestretodo = Semestre::all();
            $Asignaturatodo = Asignatura::all();
            $Semestrecltodo = Asignaturacl::all();
            $cargaacademicaaeditar = CargaAcademica::where('idcarga_academica', '=', $id)->get();
            return View::make('cargaAcademica.modificar')
                    ->with('cargaacademicaaeditar',$cargaacademicaaeditar)
                    ->with('Semestretodo', $Semestretodo)
                    ->with('Asignaturatodo', $Asignaturatodo)
                    ->with('Semestrecltodo', $Semestrecltodo);
	}
        public  function modificar($id)
        {
            $recuperado = Input::all();
            //print_r($recuperado) ;
            DB::table('tcarga_academica')
                    ->where('idcarga_academica',$id)
                    ->update([
                        'idcarga_academica'=> $id,
                        'grupo'=> $recuperado['grupo'],
                        'turno'=> $recuperado['turno'],
                        'idsemestre'=>$recuperado['idsemestre'],
                        'idasignatura'=>$recuperado['idasignatura'],
                        'idasignatura_cl'=>$recuperado['idasignatura_cl']
                            ]);
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
