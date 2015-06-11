<?php

class NotaController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('nota.escojer_curso');
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$notas = new Nota;
		//$id = seleccionar idDetallematricula en base a la ultima matricula de un alumno X en un curso Y;
		/* -- al parecer existe un error en la BD, falta la relacion entre alumno y matricula :/ para solucionar esto
			-- ponemos "alter table tmatricula add idalumno varchar(10) references talumno" en el php myadmin
			--en sql seria algo asi :(no sé como hacerlo en aca :'()
			
			
			select $id = iddetalle_matricula, max(fecha_matricula) from talumno a inner join matricula m on a.idalumno = m.idalumno inner join
				tdetalle_matricula dm on dm.idmatricula = m.idmatricula where idasignatura = @id_asignatura.
		*/
		//$notas->idnota = Input::get('id_nota'); AUTO_INCREMENT
		$notas->fecha_nota = Input::get('fecha_nota'); //se puede usar la fecha y hora del sistema
		$notas->nota = Input::get('nota');
		$notas->iddetalle_matricula = $id;
		$alumnos->save();
		return Redirect::to('nota');
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
		$nota = Nota::where('idnota', '=', $id)->get();
		return View::make('nota.editar')->with('notas',$nota);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$entra = Input::all();
		$nota = DB::table('tnota')
            ->where('idnota', $id)
            ->update(array(
            'idnota' => $entra['id_nota'],
            'fecha_nota' => $entra['fecha_nota'],
            'nota' => $entra['nota'],
            'iddetalle_matricula' => $entra['iddetalle_matricula']
            ));
		return Redirect::to('nota');
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
