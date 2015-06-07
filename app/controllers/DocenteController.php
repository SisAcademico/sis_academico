<?php
use Illuminate\Support\Facades\Session;
class DocenteController extends \BaseController {

    /**
     * Mostrar el formulario de inserción de alumnos
     */
    public function insertarDocente()
    {
        //return View::make('docente.insertar');
        $tdocente=docente::all();
		
        return View::make('docente.insertar')->with('tdocente',$tdocente);
    }

    /**
     * Listar alumnos
     */
    public function listarDocente()
    {
    	//return View::make('docente.listar');
        $Docentestodo=docente::all();
        return View::make('docente.listar')->with('Docentestodo',$Docentestodo);
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{  
		//
		/*$posts=Post::all();
		return View::make('docente.listar')->with('docentes',$posts)*/
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
		$docente=new docente;
		$docente->iddocente=Input::post('iddocente');
		$docente->dni=Input::post('dni');
		$docente->nombres=Input::post('nombres');
		$docente->apellidos=Input::post('apellidos');
		$docente->direccion=Input::post('direccion');
		$docente->telefono=Input::post('telefono');
		$docente->correo=Input::post('correo');
		$docente->cargo=Input::post('cargo');
		$docente->estado=Input::post('estado');
		$docente->fecha_inicio=Input::post('fecha_inicio');
		$docente->idfoto=Input::post('idfoto');
		$docente->save();
		return Redirect::to('docente.listar');
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
		$docente= Docente::find($id);
		$docente-> delete();
		Session::flash('message',$docente->nombres.'fue eliminado de la base de datos');
		return Redirect::to('docente.listar');
		//dd("Id Eliminado".$id);
	}


}
