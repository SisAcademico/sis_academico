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
        $matriculas=Matricula::all();
        $alumnos=Alumno::all();
        $auxiliar=DB::table('tmatricula')
            ->join('talumno', 'tmatricula.idalumno', '=', 'talumno.idalumno')
            ->join('tpago', 'tmatricula.idpago', '=', 'tpago.idpago')
            ->select('tmatricula.idmatricula','tmatricula.tipo' ,'talumno.idalumno', 'talumno.nombres','talumno.apellidos','tmatricula.fecha_matricula','tpago.nro_boleta')
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
            return View::make('matricula.insertar');

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
            $matricula = new Matricula;
            $idpago = DB::table('tpago')->where('idpago', Input::get('idpago'))->pluck('idpago');
            $idalumno=DB::table('talumno')->where('idalumno',Input::get('idalumno'))->pluck('idalumno');
            if(($idpago != NULL) || ($idalumno != NULL)) {
                $matricula->idmatricula = Input::get('idmatricula');
                $matricula->tipo = Input::get('tipo');
                $matricula->fecha_matricula = Input::get('fecha_matricula');
                $matricula->idpago = $idpago;
                $matricula->idalumno = $idalumno;
                $matricula->save();
                return Redirect::to('matricula');
            }
            else {
                echo "pago o alumno no son validos";
            }
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
