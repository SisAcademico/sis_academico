<?php

class AsistenciaDocenteController extends BaseController {

 public function insertarAsistenciaDocente()
    {
        //return View::make('docente.insertar');	
        return View::make('docente.insertarasistencia');
    }


public function show($id)
	{
		//
			$asistenciaaeditar = AsistenciaDocente::where('idasistencia_docente', '=', $id)->get();
    	//$docenteaeditar = Docente::where('iddocente','=',$id)->get();
		return View::make('docente.modificarasistencia')->with('asistenciaaeditar',$asistenciaaeditar);
	}


public function listar()
	{
		$asistencia=AsistenciaDocente::all();
        return View::make('docente.listarasistencia')->with('AsistenciaDocentetodo',$asistencia);
	}

		public function mostrarPanel()
	{
		//return View::make('login.login');
		return View::make('docente.formulario2');
		//return 'karennnnnnnn';
	}

public function update($id)
	{
		//
		$recuperado = Input::all();
		//print_r($recuperado) ;
		$administrador = DB::table('tadministrador')
			->where('idadministrador',$id)
			->update(array(
				//'iddocente'=>$recuperado['IDDOCENTE'],
				'idusuario'=>1,
				'dni'=>$recuperado['DNI'],
				'nombres'=>$recuperado['NOMBRES'],
				'apellidos'=>$recuperado['APELLIDOS'],
				'direccion'=>$recuperado['DIRECCION'],
				'telefono'=>$recuperado['TELEFONO'],
				'correo'=>$recuperado['CORREO'],
				
				'estado'=>$recuperado['ESTADO'],
				'idfoto'=>1,
				 ));

				return Redirect::to('administrador/listar');

	}



public function store()
	{

		$asistencia=new AsistenciaDocente;

		$asistencia->idasistencia_docente=Input::get('idasistencia_docente');
		$asistencia->fecha_asist_doc=Input::get('fecha');
		$asistencia->observacion=Input::get('observacion');
		$asistencia->tema=Input::get('tema');
		$asistencia->idcarga_academica=Input::get('idcarga_academica');
		

		$asistencia->save();

		return Redirect::to('docente/listarasistencia');
	}




}