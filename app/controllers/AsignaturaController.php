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
class AsignaturaController extends BaseController{

    /**
     * LISTAR ASIGNATURAS
     */
    public function index()
    {
        //
            $asignaturas=Asignatura::all();
            return View::make('asignatura.listar') -> With('asignatura',$asignaturas);
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
             return View::make('asignatura.insertar');
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
        //
            $asignaturas = new Asignatura;
            $asignaturas->idasignatura = Input::get('id_asignatura');
            $asignaturas->nombre_asignatura = Input::get('nombre_asignatura');
            $asignaturas->horas_semanales = Input::get('horas_semanales');
            $asignaturas->horas_totales = Input::get('horas_totales');
            $asignaturas->idmodulo = Input::get('idmodulo');
            $asignaturas->pre_requisito = Input::get('pre_requisito');
            $asignaturas->save();
            return Redirect::to('asignatura');
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
            $asignatura = Asignatura::where('idasignatura', '=', $id)->get();
            return View::make('asignatura.editar')->with('asignaturas',$asignatura);
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
            $asignatura = DB::table('tasignatura')
            ->where('idasignatura', $id)
            ->update(array(
            'idasignatura' => $entra['id_asignatura'],
            'nombre_asignatura' => $entra['nombre_asignatura'],
            'horas_semanales' => $entra['horas_semanales'],
            'horas_totales' => $entra['horas_totales'],
            'idmodulo' => $entra['idmodulo'],
            'pre_requisito' => $entra['pre_requisito'],
            ));
            return Redirect::to('asignatura');
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
