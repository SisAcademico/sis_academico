<?php
class ConceptoController extends BaseController {


	public function index()
	{
		$concepto = Concepto::paginate(20);
		return View::make('concepto.listar')->with('conceptos',$concepto);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//return View::make('alumno.insertar');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$conceptos = new Concepto;
		$conceptos->idconcepto = Input::get('idconcepto');
		$conceptos->concepto = Input::get('concepto');
		$conceptos->observacion = Input::get('observacion');
		$conceptos->importe = Input::get('importe');
		$conceptos->save();
		return Redirect::to('concepto');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($ids)
	{
		//$alumno = Alumno::where('idalumno', '=', $ids)->get();
		//return View::make('alumno.listar')->with('alumnos',$alumno);

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$concepto = Concepto::where('idconcepto', '=', $id)->get();
		return View::make('concepto.editar')->with('conceptos',$concepto);

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$entra = Input::all();
		$concepto = DB::table('tconcepto')
            ->where('idconcepto', $id)
            ->update(array(
      //   'idconcepto' => $entra['idconcepto'],
            'concepto' => $entra['concepto'],
            'observacion'=>$entra['observacion'],
            'importe' => $entra['importe'],
            ));
		return Redirect::to('concepto');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
		$modulo=DB::table('tconcepto')->where('idconcepto','=',$id)->delete();
		return Redirect::to('concepto');
	}

	
}
