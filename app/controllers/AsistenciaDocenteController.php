<?php

class AsistenciaDocenteController extends BaseController {

	public function insertarAsistenciaDocente(){
        //return View::make('docente.insertar');
        return View::make('docente.insertarasistencia');
				//return "Hola";
    }


	public function show($id){
		//
			$asistenciaaeditar = AsistenciaDocente::where('idasistencia_docente', '=', $id)->get();
    	//$docenteaeditar = Docente::where('iddocente','=',$id)->get();
		return View::make('docente.modificarasistencia')->with('asistenciaaeditar',$asistenciaaeditar);
	}

	public function filtrodocente($id){
		//
		$filafiltro = CargaAcademica::where('iddocente', '=', $id)->get();
		if(count($filafiltro)==0)
		{
				return Redirect::back()->withErrors("Error: docente no tiene carga academica");
		}elseif (count($filafiltro)>0){
			$filaAsis = AsistenciaDocente::where('idcarga_academica','=',$filafiltro[0]->idcarga_academica)->get();
			if(count($filaAsis)==0){
				return Redirect::back()->withErrors("Error: docente no tiene carga academica");
			}elseif (count($filaAsis)>0) {
				return View::make('docente.filtroAsistencia')->with('FilaFiltroRecuperada',$filafiltro);
			}
		}
	}

	public function listar(){
		$asistencia=AsistenciaDocente::all();

        return View::make('docente.listarasistencia')->with('AsistenciaDocentetodo',$asistencia);
	}

	public function mostrarPanel(){
		//return View::make('login.login');
		return View::make('docente.formulario2');
		//return 'karennnnnnnn';
	}

	public function store(){
		$inputs = Input::all();
		$reglas = array(
			'tema' => 'required|min:2|max:50');
		$mensajes= array('required' => 'Campo obligatorio');

		$validar = Validator::make($inputs,$reglas,$mensajes);

		if ($validar -> fails()){
			return Redirect::back()->withErrors($validar);
		}
		else{
			$grupo =Input::get('Grupo') ;
            $turno=Input::get('Turno') ;
            $semestre=Input::get('Semestre');
            $asignatura=Input::get('Asignatura');
            $asignaturaL=Input::get('AsignaturaL');
            $docente = Input::get('Docente') ;

            $recuperar2 = CargaAcademica::where('iddocente', '=', $docente)->get();

            if(count($recuperar2)==0 || $recuperar2 == NULL){
            	return Redirect::back()->withErrors("Escoger una Asignatura");
            }else{
            	$RAsignatura = $recuperar2[0]->idasignatura;
            	$RAsignatura_cl = $recuperar2[0]->idasignatura_cl;

            	if (($asignaturaL=="0") && ($asignatura== "0")) {
                return Redirect::back()->withErrors("Escoger una Asignatura");
            	}
            	else{
            		if (($asignaturaL!="0") && ($asignatura!= "0")){
            			return Redirect::back()->withErrors("No puede escoger dos asignaturas.");
            		}
            		else{
            			if($asignatura!="0") {

            				$recup = CargaAcademica::where('grupo', '=', $grupo)
	               			->where('turno', '=', $turno)
	               			->where('idsemestre', '=', $semestre)
	               			->where('idasignatura', '=', $asignatura)
	               			->where('iddocente', '=', $docente)
	               			->get();
                    		if (count($recup)==0 || $recup == NULL ){
         						return Redirect::back()->withErrors("Datos no correspondientes al docente");
         					}
            			}
            			else{
            				if($asignaturaL!="0") {
			               		$recup = CargaAcademica::where('grupo', '=', $grupo)
			               			->where('turno', '=', $turno)
			               			->where('idsemestre', '=', $semestre)
			               			->where('idasignatura_cl', '=', $asignaturaL)
			               			->where('iddocente', '=', $docente)
			               			->get();

		                    	if (count($recup)==0 || $recup == NULL )
		                    	{
		         					return Redirect::back()->withErrors("Datos no correspondientes al docente");

		                    	}
			               	}
            			}

             		}
            	}
            }

            if((count($recup)!=0)){
	        	$idCarga = $recup[0]->idcarga_academica;
	      	}else {
	      		return Redirect::back()->withErrors("carga acdemica no existe");
	      	}

	      	$idhorario=CargaHorario::where('idcarga_academica','=',$idCarga)->get();

			if ( (count($idhorario)==0) ||($idhorario==null) ){
				return Redirect::back()->withErrors("el curso seleccionado no tiene un horario establecido");
			}

			$hora=Horario::Where('idhorario','=',$idhorario[0]->idhorario)->get();

			if ((count($hora)==0) || ($hora==null)) {
				return Redirect::back()->withErrors("el curso seleccionado no tiene un horario establecido");
			}

			$aux1= date('Y-m-d')." ".($hora[0]->hora_inicio);
	        $aux1 = strtotime($aux1);

	        $aux1 = date('Y-m-d H:i:s',$aux1);

			$aux2= date('Y-m-d')." ".($hora[0]->hora_fin);
			$aux2 = strtotime($aux2);
			$aux2 = date('Y-m-d H:i:s',$aux2);

			$asist = AsistenciaDocente::where('idcarga_academica', '=', $idCarga)
				->where('fecha_asist_doc', '>=', $aux1)
				->where('fecha_asist_doc', '<=', $aux2)->get();

			if (count($asist)!=0) {
	        	return Redirect::back()->withErrors("El docente ya se registro");
	        }


	        $Hora = date("H:i:s");
            $id = $idCarga;
            $recup = CargaHorario::where('idcarga_academica', '=', $id)->get();
            $Vhorario= $recup[0]->idhorario;
            $recup2 = Horario::where('idhorario', '=', $Vhorario)->get();
            $VInicio = $recup2[0]->hora_inicio;
            $VFin = $recup2[0]->hora_fin;
            $VInicio1 = date ( "H:i:s",strtotime ( '+5 minute' , strtotime ( $VInicio ) ));
            if ($Hora<  $VInicio1 ){
               $MensajeObservacion ="Temprano";
            }
            if ($Hora> $VInicio1){
                $MensajeObservacion ="Tarde";
            }




	        $idasistencia_docente = DB::table('tasistencia_docente')->insertGetId(
			array(
				'fecha_asist_doc'=>Input::get('fecha'),
				'observacion'=>$MensajeObservacion,
				'tema'=>Input::get('tema'),
				'idcarga_academica'=>$idCarga,
				));

	        return Redirect::to('docente/insertarasistencia');
		}
	}


	public function update($id)	{

		$inputs = Input::all();
		$reglas = array(


		'observacion' => 'required|min:2|max:10',
		'tema' => 'required|min:2|max:10' 	,
		//'idcarga_academica' => 'required|min:2|max:10'

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

					'observacion'=>$recuperado['observacion'],
					'tema'=>$recuperado['tema'],

				));

			return Redirect::to('docente/listarasistencia');
		}
	}

	public function destroy($id){

		echo "esto es una prueba de eliminar";
		//DB::delete('delete from tdocente where id = '.$id);
		//$test = DB::table('tdocente')->where('iddocente',$id);
		$test = AsistenciaDocente::where('idasistencia_docente','=',$id)->delete($id);
		//print_r($test);
		echo "elimiado";
		//return $this->showUsers();
		return Redirect::to('docente/listarasistencia');
	}

	public function listardocentes(){
		$Docentes=Docente::all();
	    return View::make('docente.insertarasistencia')->with('listadocentes',$Docentes);
	}

}
