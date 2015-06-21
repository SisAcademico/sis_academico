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





public function store()
	{


		$inputs = Input::all();
		$reglas = array(

			'idasistencia_docente' =>'required|min:2|max:11|unique:asistencia,idasistencia_docente',
			'observacion' => 'required|min:2|max:10',
			'tema' => 'required|min:2|max:10' 	,
			'idcarga_academica' => 'required|min:2|max:10'

			);
		$mensajes= array('required' => 'Campo obligatorio');

		$validar = Validator::make($inputs,$reglas,$mensajes);

		if ($validar -> fails())
		{
			return Redirect::back()->withErrors($validar);
		}
else{


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

public function update($id)
	{

		$inputs = Input::all();
		$reglas = array(

			'idasistencia_docente' =>'required|min:2|max:11|unique:asistencia,idasistencia_docente',
			'observacion' => 'required|min:2|max:10',
			'tema' => 'required|min:2|max:10' 	,
			'idcarga_academica' => 'required|min:2|max:10'

			);
		$mensajes= array('required' => 'Campo obligatorio');

		$validar = Validator::make($inputs,$reglas,$mensajes);

		if ($validar -> fails())
		{
			return Redirect::back()->withErrors($validar);
		}
else{
		//
		$recuperado = Input::all();
		//print_r($recuperado) ;
		$asistencia = DB::table('tasistencia_docente')
			->where('idasistencia_docente',$id)
			->update(array(
				//'idasistencia_docente'=>$recuperado['idasistencia_docente'],
				'fecha_asist_doc'=>$recuperado['fecha'],
				'observacion'=>$recuperado['observacion'],
				'tema'=>$recuperado['tema'],
				'idcarga_academica'=>$recuperado['idcarga_academica'],
				
				 ));

				return Redirect::to('docente/listarasistencia');
}
	}

public function destroy($id)
	{
		//
		echo "esto es una prueba de eliminar";
		//DB::delete('delete from tdocente where id = '.$id);
		//$test = DB::table('tdocente')->where('iddocente',$id);
		$test = AsistenciaDocente::where('idasistencia_docente','=',$id)->delete($id);
		//print_r($test);
		echo "elimiado";
		//return $this->showUsers();
return Redirect::to('docente/listarasistencia');
	}


}