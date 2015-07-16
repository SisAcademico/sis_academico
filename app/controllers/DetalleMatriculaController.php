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
    public function create($idmatr)
    {
        //
        $auxi = DB::table('tasignatura')
            ->whereNotIn('tasignatura.idasignatura', function ($auxiliar) {
                $auxiliar->from('tmatricula')
                    ->join('tdetalle_matricula', 'tmatricula.idmatricula', '=', 'tdetalle_matricula.idmatricula')
                    ->join('tasignatura', 'tdetalle_matricula.idasignatura', '=', 'tasignatura.idasignatura')
                    ->join('tnotas', 'tdetalle_matricula.iddetalle_matricula', '=', 'tnotas.iddetalle_matricula')
                    ->where('tnotas.nota', '>', 10.4)
                    //-->where('tmatricula.idalumno', $id)
                    ->select('tdetalle_matricula.idasignatura');
            })
            /*->whereIn('tasignatura.pre_requisito',function ($auxiliar2)
            {
                $auxiliar2->from('tmatricula')
                    ->join('tdetalle_matricula', 'tmatricula.idmatricula', '=', 'tdetalle_matricula.idmatricula')
                    ->join('tasignatura','tdetalle_matricula.idasignatura', '=', 'tasignatura.idasignatura')
                    ->join('tnotas','tdetalle_matricula.iddetalle_matricula', '=', 'tnotas.iddetalle_matricula')
                    ->where('tnotas.nota','>',10.4)
                    //-->where('tmatricula.idalumno', $id)
                    ->select('tasignatura.nombre_asignatura');
            })*/

            ->select('tasignatura.idasignatura', 'tasignatura.nombre_asignatura', 'tasignatura.horas_semanales')
            ->get();
        return View::make('detalleMatricula.insertar',['detalleMatricula'=> $auxi,'id_matricula'=>$idmatr]);
    }

    public function createcl($idmatr)
    {
        $auxi = DB::table('tasignatura_cl')
            ->whereNotIn('tasignatura_cl.idasignatura_cl', function ($auxiliar) {
                $auxiliar->from('tmatricula')
                    ->join('tdetalle_matricula', 'tmatricula.idmatricula', '=', 'tdetalle_matricula.idmatricula')
                    ->join('tasignatura_cl', 'tdetalle_matricula.idasignatura_cl', '=', 'tasignatura_cl.idasignatura_cl')
                    ->join('tnotas', 'tdetalle_matricula.iddetalle_matricula', '=', 'tnotas.iddetalle_matricula')
                    ->where('tnotas.nota', '>', 10.4)
                    //-->where('tmatricula.idalumno', $id)
                    ->select('tdetalle_matricula.idasignatura_cl');
            })
            /*->whereIn('tasignatura.pre_requisito',function ($auxiliar2)
            {
                $auxiliar2->from('tmatricula')
                    ->join('tdetalle_matricula', 'tmatricula.idmatricula', '=', 'tdetalle_matricula.idmatricula')
                    ->join('tasignatura','tdetalle_matricula.idasignatura', '=', 'tasignatura.idasignatura')
                    ->join('tnotas','tdetalle_matricula.iddetalle_matricula', '=', 'tnotas.iddetalle_matricula')
                    ->where('tnotas.nota','>',10.4)
                    //-->where('tmatricula.idalumno', $id)
                    ->select('tasignatura.nombre_asignatura');
            })*/

            ->select('tasignatura_cl.idasignatura_cl', 'tasignatura_cl.nombre_asig_cl', 'tasignatura_cl.horas_totales')
            ->get();
        return View::make('detalleMatricula.insertarcl',['detalleMatricula'=> $auxi,'id_matricula'=>$idmatr]);
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
        //var_dump(Input::all());
        $entra = Input::all();
        $diferenciar= $entra['diferenciar'];


        if ($diferenciar=='ca') {

            $hola = $entra['nombre'];
            $arre = explode(',', $hola);

            $validator=Validator::make(Input::all(),$entra);

            if (sizeof($arre) < 6) {
                foreach (explode(',', $hola) as $key) {
                    $detallematri = DB::table('tdetalle_matricula')
                        ->insert(array('idmatricula' => $entra['codigomatri'], 'idasignatura' => $key));
                }
                return Redirect::to('/panel');
            }
            else
            {
                return Redirect::back()->withInput()->withErrors('$validator');
            }
        }
        else
        {
            $holacl = $entra['nombrecl'];
            foreach (explode(',', $holacl) as $key) {
                $detallematri = DB::table('tdetalle_matricula')
                    ->insert(array('idmatricula' => $entra['codigomatri'], 'idasignatura_cl' => $key));
            }
            return Redirect::to('/panel');
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
