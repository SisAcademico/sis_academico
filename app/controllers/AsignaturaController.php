<?php


class AsignaturaController extends \BaseController{

    /**
     * LISTAR ASIGNATURAS
     */
    public function index()
    {
        //
        //$asignaturas=Asignatura::all();
        //$modulo =Modulo::all();

        $auxiliar=DB::table('tasignatura')
            ->join('tmodulo', 'tasignatura.idmodulo', '=', 'tmodulo.idmodulo')
            ->join('tcarrera','tcarrera.idcarrera','=','tmodulo.idcarrera')
            ->select('tasignatura.idasignatura','tasignatura.nombre_asignatura' ,'tasignatura.horas_semanales', 'tasignatura.horas_totales','tmodulo.nombre_modulo','tcarrera.nombre_carrera','tasignatura.pre_requisito')
            ->get();
        return View::make('asignatura.listar') ->with('asignatura',$auxiliar);
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
        $idasig = DB::table('tasignatura')->max('idasignatura');
        $idasig2 = substr($idasig, 2, 6);
        $idasig3 = (int)$idasig2;
        $idasig4 = $idasig3+1;
        $idasig5 = strlen($idasig4);
        $idasig6 = (int)$idasig5;
        if($idasig6==1)
        {
            $idasig11 = "AC000".$idasig4;
            return View::make('asignatura.insertar')->with('idasigna',$idasig11);
        }
        
        if($idasig6==2)
        {
            $idasig12 = "AC00".$idasig4;
            return View::make('asignatura.insertar')->with('idasigna',$idasig12);
        }

        if($idasig6==3)
        {
            $idasig13 = "AC0".$idasig4;
            return View::make('asignatura.insertar')->with('idasigna',$idasig13);
        }

        if($idasig6==4)
        {
            $idasig14 = "AC".$idasig4;
            return View::make('asignatura.insertar')->with('idasigna',$idasig14);
        }   
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
                    'horas_semanales'=>'required|integer|min:0|max:20',
                    'horas_totales'=>'required|integer|min:0|max:350',
                    'idmodulo'=>'required|integer|min:0',
                );
                $validator=Validator::make(Input::All(),$rules);
                if ($validator->passes()) {
                        $idmodulo = DB::table('tmodulo')->where('idmodulo', Input::get('idmodulo'))->pluck('idmodulo');
                        $vprerequisito=DB::table('tasignatura')->where('idasignatura',Input::get('pre_requisito'))->pluck('idasignatura');
                        if($idmodulo != NULL) {

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

    public function getIdAsignatura()
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
                    'horas_semanales'=>'required|integer|min:0|max:20',
                    'horas_totales'=>'required|integer|min:0|max:350',
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

