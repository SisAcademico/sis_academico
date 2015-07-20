<?php

class SemestreController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $semestres = Semestre::paginate(20);
        return View::make('semestre.listar', array('semestres' => $semestres));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return View::make('semestre.agregar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $semestre = new Semestre();
        $rules = array
            (
            'idsemestre' => 'required|unique:tsemestre',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
        );
        $validator = Validator::make(Input::All(), $rules);
        if ($validator->passes()) {
            //$idsemestre = DB::table('tsemestre')->where('idsemestre', Input::get('idsemestre'))->pluck('idsemestre');
                $semestre->idsemestre = Input::get('idsemestre');
                $semestre->fecha_inicio = Input::get('fecha_inicio');
                $semestre->fecha_fin = Input::get('fecha_fin');
                $semestre->save();
                return Redirect::to('semestre');
            
        } else {
            return Redirect::back()->withInput()->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $semestre = Semestre::where('idsemestre', '=', $id)->get();
        return View::make('semestre.editar')->with('semestre',$semestre);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $rules= array
                (
					'fecha_inicio' => 'required',
					'fecha_fin' => 'required',
                );
                $validator=Validator::make(Input::All(),$rules);
                if ($validator->passes()) {
                        $inputs = Input::all();
                        $semestre = DB::table('tsemestre')
                            ->where('idsemestre', $id)
                            ->update(array(
                                'fecha_inicio' => $inputs['fecha_inicio'],
                                'fecha_fin' => $inputs['fecha_fin'],
                            ));
                        return Redirect::to('semestre');
                 }
                else
                {
                    return Redirect::back()->withInput()->withErrors($validator);
                }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }

}
