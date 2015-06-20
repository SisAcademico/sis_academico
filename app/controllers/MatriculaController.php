<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of users
 *
 * @author User
 */
class MatriculaController extends BaseController{

    /**
     * LISTAR ASIGNATURAS
     */
    public function index()
    {
        //
        $matriculas=Matricula::all();
        $alumnos=Alumno::all();
        $auxiliar=DB::table('tmatricula')
            ->join('talumno', 'tmatricula.idalumno', '=', 'talumno.idalumno')
            ->select('tmatricula.idmatricula','tmatricula.tipo' ,'talumno.idalumno', 'talumno.nombres','talumno.apellidos','tmatricula.fecha_matricula','tmatricula.idpago')
            ->get();
        return View::make('matricula.listar') -> With('matricula',$auxiliar);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    /**
     * AGREGAR ASIGNATURAS
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

    /**
     * STORE ASIGNATURAS
     */
    public function store()
    {

    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    /**
     * ACTUALIZAR LAS ASIGNATURAS
     */
    public function edit($id)
    {
        //
        $matricula = Matricula::where('idmatricula', '=', $id)->get();
        return View::make('matricula.editar')->with('matriculas',$matricula);

    }

/**/
    public function details($id)
    {
        

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    /**
     * ACTUALIZAR BD ASIGNATURAS
     */
    public function update($id)
    {
        //
        $entra = Input::all();
        $matricula = DB::table('tmatricula')
            ->where('idmatricula', $id)
            ->update(array(
                'idmatricula' => $entra['idmatricula'],
                'tipo' => $entra['tipo'],
                'fecha_matricula' => $entra['fecha_matricula'],
                'idpago' => $entra['idpago'],
                'idalumno' => $entra['idalumno'],
            ));
        return Redirect::to('matricula');

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}

?>
