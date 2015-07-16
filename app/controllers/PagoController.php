<?php

class PagoController extends \BaseController {


	    /**
     * Mostrar el formulario de inserción de pagos
     */
    public function insertarPago()
    {
        return View::make('pago.insertar');
    }

	
	    /**
     * Listar los pagos
     */
    public function listarPagos()
    {
        $pagos = Pago::all();
        return View::make('pago.listar', array('pagos' => $pagos));
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	
	public function index()
	{
		$pago = Pago::all();
		return View::make('pago.listar')->with('pagos',$pago);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        return View::make('pago.insertar');
	}

	public function ajaxc()
    {
        //
        $pagos = new Pago;
        $pagos->nro_boleta = Input::get('nro_boleta');
        $pagos->serie = Input::get('serie');
        $pagos->fecha_pago = Input::get('fecha_pago');
        $pagos->idalumno = Input::get('idalumno');
        $pagos->monto_total = Input::get('monto');
        $pagos->save();

        return response::json(Input::get('nro_boleta'));
    }



	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($ids)
	{

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		

	}

	
}
