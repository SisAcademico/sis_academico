<?php

class HorarioController extends \BaseController {

	public function getPDF()
	{
	    $fpdf = new PDF();
	    $colu = array('NRO', 'Hora de Inicio', 'Hora de Fin');
	    $data= Horario::all();
        //$fpdf->Image("unsaac.png",10,6,30);
        $fpdf->SetFont('Arial','',13);
		$fpdf->AddPage();
		$fpdf->Cell(80);
		$fpdf->Cell(30,5,'Lista de Horarios', 0, 1, 'C');
		$fpdf->SetFont('Arial','B',9);
		$fpdf->Ln(2);
		$fpdf->SetFont('Arial','B',10);
		$fpdf->FancyTableHorario($colu,$data);

        $cabe=['Content-Type' => 'application/pdf'];
        return 	Response::make($fpdf->Output(),200,$cabe);

	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$horario = Horario::all();
		return View::make('horario.listar')->with('horarios',$horario);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$horario = new Horario();
		$horario->hora_inicio = Input::get('hora_inicio');
		$horario->hora_fin = Input::get('hora_fin');
		//validar :D 
		$horario->save();
		return Redirect::to('horario');
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
		$horario = Horario::where('idhorario', '=', $id)->get();
		return View::make('horario.editar')->with('horarios',$horario);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$hora_inicio = Input::get('hora_inicio');
		$hora_fin = Input::get('hora_fin');
		//validar
		DB::table('thorario')
		 	->where('idhorario', $id)
            ->update(array(
            'hora_inicio' => $hora_inicio,
            'hora_fin' => $hora_fin,
            ));
        return Redirect::to('horario');   
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
