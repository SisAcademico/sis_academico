<?php

class AulaController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $aulas = Aula::paginate(20);

        return View::make('aula.listar', array('aulas' => $aulas));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('aula.agregar');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$aula = new Aula();
        $rules = array
            (
            'idaula' => 'required|unique:taula',
            'capacidad' => 'required|numeric|min:15',
            'estado' => 'required',
            'capacidad' => 'required',
        );
        $validator = Validator::make(Input::All(), $rules);
        if ($validator->passes()) {
                $aula->idaula = Input::get('idaula');
                $estado = Input::get('estado');
				$aula->estado=$estado[0];
                $aula->capacidad = Input::get('capacidad');
                $aula->tipo = Input::get('tipo');
                $aula->save();
                return Redirect::to('aula');
            
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
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$aula = Aula::where('idaula', '=', $id)->get();
        return View::make('aula.editar')->with('aula',$aula);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules= array
                (
					'capacidad' => 'required|numeric|min:15',
					'estado' => 'required',
					'capacidad' => 'required',
                );
                $validator=Validator::make(Input::All(),$rules);
                if ($validator->passes()) {
                        $inputs = Input::all();
				
                        $aula = DB::table('taula')
                            ->where('idaula', $id)
                            ->update(array(
                                'estado' => $inputs['estado'][0],
                                'capacidad' => $inputs['capacidad'],
                                'tipo' => $inputs['tipo'],
                            ));
                        return Redirect::to('aula');
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
	public function destroy($id)
	{
		//
	}


}
