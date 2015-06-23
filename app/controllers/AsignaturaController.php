<?php


class AsignaturaController extends \BaseController{

    /**
     * LISTAR ASIGNATURAS
     */
    public function index()
    {
        //
        $asignaturas=Asignatura::all();
        return View::make('asignatura.listar') ->with('asignatura',$asignaturas);
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
             $rules= array
                (
                    'horas_semanales'=>'required|integer|min:0',
                    'horas_totales'=>'required|integer|min:0',
                    'idmodulo'=>'required|integer|min:0',
                );
                $validator=Validator::make(Input::All(),$rules);
                if ($validator->passes()) {
                        $idmodulo = DB::table('tmodulo')->where('idmodulo', Input::get('idmodulo'))->pluck('idmodulo');
                        $vprerequisito=DB::table('tasignatura')->where('idasignatura',Input::get('pre_requisito'))->pluck('idasignatura');
                        if(($idmodulo != NULL) || ($vprerequisito != NULL)) {

                            $asignaturas->idasignatura = Input::get('idasignatura');
                            $asignaturas->nombre_asignatura = Input::get('nombre_asignatura');
                            $asignaturas->horas_semanales = Input::get('horas_semanales');
                            $asignaturas->horas_totales = Input::get('horas_totales');
                            $asignaturas->idmodulo = $idmodulo;
                            $asignaturas->pre_requisito = $vprerequisito;
                            $asignaturas->save();
                            return Redirect::to('asignatura');
                        }
                        else {
                            echo "modulo o prerequisito no validos";
                        }
                 }
                else
                {
                    return Redirect::back()->withInput()->withErrors($validator);
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
        $rules= array
                (
                    'horas_semanales'=>'required|integer|min:0',
                    'horas_totales'=>'required|integer|min:0',
                    'idmodulo'=>'required|integer|min:0',
                );
                $validator=Validator::make(Input::All(),$rules);
                if ($validator->passes()) {
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
                else
                {
                    return Redirect::back()->withInput()->withErrors($validator);
                }

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

