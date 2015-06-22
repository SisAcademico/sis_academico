<?php

class CursoLibreController extends \BaseController {

	/**
	 * mostrar el formulario insertar cursoslibres
	 */
	 public function insertarCursoLibre()
    {
        return View::make('cursolibre.insertar');
    }

    /**
     * Listar los cursoslibres
     */
    public function listarCursoLibre()
    {
        $cursoslibres = Asignatura2::all();
        return View::make('cursolibre.listar', array('cursoslibres' => $cursoslibres));
    }

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
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		$asignaturas = new Asignatura2;
            if(($idmodulo != NULL) || ($vprerequisito != NULL)) {
                $asignaturas->idasignatura_cl = Input::get('idasignatura');
                $asignaturas->nombre_asig_cl = Input::get('nombre_asignatura');
                $asignaturas->horas_totales = Input::get('horas_totales');
                $asignaturas->save();
                return Redirect::to('asignatura');
            }
            else {
                echo "modulo o prerequisito no validos";
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
		$asignatura = Asignatura2::where('idasignatura_cl', '=', $id)->get();
        return View::make('cursolibre.editar')->with('cursoslibres',$asignatura);
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
		 $entra = Input::all();
        $cursolibre = DB::table('tasignatura_cl')
            ->where('idasignatura', $id)
            ->update(array(
                'idasignatura_cl' => $entra['idasignatura_cl'],
                'nombre_asig_cl' => $entra['nombre_asig_cl'],
                'horas_totales' => $entra['horas_totales'],
            ));
        return Redirect::to('cursolibre');
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
