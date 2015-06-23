<?php


class AsignaturaLibreController extends \BaseController{

    /**
     * LISTAR ASIGNATURAS
     */
    public function index()
    {
        //
        $asignaturas=AsignaturaLibres::all();
        return View::make('asignaturalibre.listar') ->with('asignaturalibre',$asignaturas);
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
        return View::make('asignaturalibre.insertar');
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
            $asignaturalibre = new AsignaturaLibres;
                $asignaturalibre->idasignatura_cl = Input::get('idasignatura_cl');
                $asignaturalibre->nombre_asig_cl = Input::get('nombre_asig_cl');
                $asignaturalibre->horas_totales = Input::get('horas_totales');
                $asignaturalibre->save();
                return Redirect::to('asignaturalibre');

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
        $asignaturalibre = AsignaturaLibres::where('idasignatura_cl', '=', $id)->get();
        return View::make('asignaturalibre.editar')->with('asignaturalibre',$asignaturalibre);
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
        $asignatura = DB::table('tasignatura_cl')
            ->where('idasignatura_cl', $id)
            ->update(array(
                'idasignatura_cl' => $entra['idasignatura_cl'],
                'nombre_asig_cl' => $entra['nombre_asig_cl'],
                'horas_totales' => $entra['horas_totales'],
            ));
        return Redirect::to('asignaturalibre');
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

