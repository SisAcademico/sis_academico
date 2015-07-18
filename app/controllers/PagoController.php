<?php

class PagoController extends \BaseController {


	// llamada ajax
	public function recuperarAlumno()
    {
        $codigo = Input::get('codigoAlumno');
        $alumno = Alumno::where('idalumno','=',$codigo)->get();
        if(sizeof($alumno)==0)
        	$mensaje = 'No existe';
        else
        	$mensaje = 'Existe';
       	return Response::json(
       		array(
       			'alumno'=>$alumno,
       			'mensaje' => $mensaje
       			));
    }
    
    public function recuperarImporte()
    {
    	$idconcepto= Input::get('idconcepto');
    	$concepto = Concepto::where('idconcepto','=',$idconcepto)->get();
        return Response::json(array('concepto'=>$concepto));
    }
    
    /**
     * Mostrar el formulario de inserción de pagos
     */
    public function insertarPago()
    {
    	$concepto= Concepto::all()->lists('concepto','idconcepto');
        return View::make('pago.insertar', array('concepto' => $concepto )); 
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
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function insert()
	{
		$pago = new Pago;
		$pago->nro_boleta = Input::get('nro_boleta');
		$pago->serie = Input::get('serie');
		$pago->fecha_pago = Input::get('fecha');
		$pago->idalumno = Input::get('idalumno');
		$pago->monto_total = Input::get('Total');
		if($pago->save())
		{
			$id = Pago::all()->last()->idpago;
			$i=1;
			while (Input::has($i)) {
				$detalle = new DetallePago;
				$detalle->idpago = $id;
				$detalle->concepto = Input::get($i);
				$concepto = Concepto::find($detalle->concepto);
				$detalle->monto = $concepto->importe;
				$detalle->save();
				$i++;
			}
		}
		return Redirect::to('pago/listar');
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
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
