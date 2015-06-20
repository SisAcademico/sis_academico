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
class DetalleMatriculaController extends BaseController{

    /**
     * LISTAR ASIGNATURAS
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
    /**
     * AGREGAR ASIGNATURAS
     */
    public function create()
    {
        //
        $asignaturas = Asignatura::all();
        $detallematriculas=DetalleMatricula::all();
        $matriculas=Matricula::all();

            $auxi=DB::table('tasignatura')
            ->whereNotIn('tasignatura.idasignatura',function ($auxiliar)
            {
                $auxiliar->from('tmatricula')
                    ->join('tdetalle_matricula', 'tmatricula.idmatricula', '=', 'tdetalle_matricula.idmatricula')
                    ->join('tasignatura','tdetalle_matricula.idasignatura', '=', 'tasignatura.idasignatura')
                    ->join('tnotas','tdetalle_matricula.iddetalle_matricula', '=', 'tnotas.iddetalle_matricula')
                    ->where('tnotas.nota','>',10.4)
                    //-->where('tmatricula.idalumno', $id)
                    ->select('tdetalle_matricula.idasignatura');
            })
            ->whereIn('tasignatura.pre_requisito',function ($auxiliar2)
            {
                $auxiliar2->from('tmatricula')
                    ->join('tdetalle_matricula', 'tmatricula.idmatricula', '=', 'tdetalle_matricula.idmatricula')
                    ->join('tasignatura','tdetalle_matricula.idasignatura', '=', 'tasignatura.idasignatura')
                    ->join('tnotas','tdetalle_matricula.iddetalle_matricula', '=', 'tnotas.iddetalle_matricula')
                    ->where('tnotas.nota','>',10.4)
                    //-->where('tmatricula.idalumno', $id)
                    ->select('tasignatura.nombre_asignatura');
            })

            ->select('tasignatura.idasignatura','tasignatura.nombre_asignatura','tasignatura.horas_semanales')

            ->get();
        return View::make('detalleMatricula.insertar') -> With('detalleMatricula',$auxi);
        //return View::make('detalleMatricula.insertar');

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
            $detalle_matricula = new Detalle_Matricula;
            $idmatricula = DB::table('tmatricula')->where('idmatricula', Input::get('idmatricula'))->pluck('idmatricula');
            $idasignatura=DB::table('tasignatura')->where('idasignatura',Input::get('idasignatura'))->pluck('idasignatura');
            $idasignatura_cl=DB::table('tasignatura_cl')->where('idasignatura_cl',Input::get('idasignatura_cl'))->pluck('idasignatura_cl');
            if(($idmatricula != NULL) || ($idasignatura != NULL || ($idasignatura_cl != NULL)))
            {
                $detalle_matricula->iddetalle_matricula = Input::get('iddetalle_matricula');
                $detalle_matricula->idmatricula = $idmatricula;
                $detalle_matricula->idasignatura = $idasignatura;
                $detalle_matricula->idasignatura_cl = $idasignatura_cl;
                $detalle_matricula->save();
                return Redirect::to('detalle_matricula');
            }
            else {
                echo "la matricula o asignatura no son validos";
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
