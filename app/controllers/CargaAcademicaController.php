<?php
class CargaAcademicaController extends \BaseController {

    //================================LISTAR==================================
    public function listarCargaAcademica()
    {
        $FechaActual=date("Y-m-d");
        $semestrea="";
        $aux= Input::get('semestre');
        $SemestreActual = DB::table('tsemestre')
             ->where('tsemestre.fecha_inicio','<=',$FechaActual)
             ->where('tsemestre.fecha_fin','>=',$FechaActual)
             ->get();  
        foreach ($SemestreActual as $sem){
            $semestrea =$sem->idsemestre;
        }
        if($aux!=""){
            $semestrea=$aux;
        }
        $Nrotuplas = 10;
        $Semestretodo = Semestre::all(); 
        $Carreratodo = Carrera::all(); 
        if($semestrea =="")//al momento de listar por primera vez
        {
            $CargaAcademicatodo=DB::table('tcarga_academica')          
                ->join('tdocente', 'tcarga_academica.iddocente', '=', 'tdocente.iddocente')
                ->join('tsemestre', 'tsemestre.idsemestre', '=', 'tcarga_academica.idsemestre')
                ->where('tsemestre.fecha_inicio','<=',$FechaActual)
                ->where('tsemestre.fecha_fin','>=',$FechaActual)
                ->groupBy('tcarga_academica.iddocente')
                ->select('tcarga_academica.idcarga_academica','tcarga_academica.grupo', 'tcarga_academica.turno', 'tcarga_academica.idsemestre','tdocente.nombres','tdocente.apellidos','tdocente.iddocente')
                ->paginate($Nrotuplas); 
        }
        else
        {
            $CargaAcademicatodo=DB::table('tcarga_academica')          
               ->join('tdocente', 'tcarga_academica.iddocente', '=', 'tdocente.iddocente')
               ->join('tsemestre', 'tsemestre.idsemestre', '=', 'tcarga_academica.idsemestre')
               ->where('tsemestre.idsemestre','=',$semestrea)
               ->groupBy('tcarga_academica.iddocente')
               ->select('tcarga_academica.idcarga_academica','tcarga_academica.grupo', 'tcarga_academica.turno', 'tcarga_academica.idsemestre','tdocente.nombres','tdocente.apellidos','tdocente.iddocente')
               ->paginate($Nrotuplas);   
        }
        $pagina = $CargaAcademicatodo->getCurrentPage();
          
        return View::make('cargaAcademica.listar')
                            ->with('CargaAcademicatodo', $CargaAcademicatodo)
                            ->with('SemestreActual', $SemestreActual)
                            ->with('Semestretodo', $Semestretodo)
                            ->with('pagina',$pagina)
                            ->with('semestrea',$semestrea)
                            ->with('Carreratodo',$Carreratodo)
                            ->with('Nrotuplas',$Nrotuplas);
    }
    
    public function vermas($id,$sem)
    {    
        $semestrea ="";
        $semestrea =$sem;
        $Docentestodo = DB::table('tdocente')->where('iddocente',$id)->get(); 
        $FechaActual=date("Y-m-d");
        if($semestrea=="")
        {
            $RelacionCarga = DB::table('tcarga_academica')
            ->join('tasignatura', 'tcarga_academica.idasignatura', '=', 'tasignatura.idasignatura')
            ->join('tdocente', 'tcarga_academica.iddocente', '=', 'tdocente.iddocente')
            ->join('tsemestre', 'tsemestre.idsemestre', '=', 'tcarga_academica.idsemestre')
            ->where('tdocente.iddocente',$id)
            ->where('tsemestre.fecha_inicio','<=',$FechaActual)
            ->where('tsemestre.fecha_fin','>=',$FechaActual)
            ->select('tcarga_academica.idcarga_academica as Id','tasignatura.nombre_asignatura as Asignatura','tcarga_academica.grupo as Grupo', 'tcarga_academica.turno as Turno', 'tcarga_academica.idsemestre as Semestre')
            ->get(); 

                $RelacionCargaCL = DB::table('tcarga_academica')
            ->join('tasignatura_cl', 'tcarga_academica.idasignatura_cl', '=', 'tasignatura_cl.idasignatura_cl')
            ->join('tdocente', 'tcarga_academica.iddocente', '=', 'tdocente.iddocente')
            ->join('tsemestre', 'tsemestre.idsemestre', '=', 'tcarga_academica.idsemestre')
            ->where('tdocente.iddocente',$id)
            ->where('tsemestre.fecha_inicio','<=',$FechaActual)
            ->where('tsemestre.fecha_fin','>=',$FechaActual)
            ->select('tcarga_academica.idcarga_academica as Id','tasignatura_cl.nombre_asig_cl as Asignatura','tcarga_academica.grupo as Grupo', 'tcarga_academica.turno as Turno', 'tcarga_academica.idsemestre as Semestre')
            ->get();
        
         }
             else
             {

                $RelacionCarga = DB::table('tcarga_academica')
            ->join('tasignatura', 'tcarga_academica.idasignatura', '=', 'tasignatura.idasignatura')
            ->join('tdocente', 'tcarga_academica.iddocente', '=', 'tdocente.iddocente')
            ->join('tsemestre', 'tsemestre.idsemestre', '=', 'tcarga_academica.idsemestre')
            ->where('tdocente.iddocente',$id)
            ->where('tsemestre.idsemestre',$semestrea)
            ->select('tcarga_academica.idcarga_academica as Id','tasignatura.nombre_asignatura as Asignatura','tcarga_academica.grupo as Grupo', 'tcarga_academica.turno as Turno', 'tcarga_academica.idsemestre as Semestre')
            ->get(); 

                $RelacionCargaCL = DB::table('tcarga_academica')
            ->join('tasignatura_cl', 'tcarga_academica.idasignatura_cl', '=', 'tasignatura_cl.idasignatura_cl')
            ->join('tdocente', 'tcarga_academica.iddocente', '=', 'tdocente.iddocente')
            ->join('tsemestre', 'tsemestre.idsemestre', '=', 'tcarga_academica.idsemestre')
            ->where('tdocente.iddocente',$id)
            ->where('tsemestre.idsemestre',$semestrea)
            ->select('tcarga_academica.idcarga_academica as Id','tasignatura_cl.nombre_asig_cl as Asignatura','tcarga_academica.grupo as Grupo', 'tcarga_academica.turno as Turno', 'tcarga_academica.idsemestre as Semestre')
            ->get();
             }
             $SemestreActual = DB::table('tsemestre')
             ->where('tsemestre.fecha_inicio','<=',$FechaActual)
             ->where('tsemestre.fecha_fin','>=',$FechaActual)
             ->get(); 
            return View::make('cargaAcademica.vermas')
                ->with('Docentestodo',$Docentestodo)
                ->with('RelacionCarga',$RelacionCarga)
                ->with('RelacionCargaCL',$RelacionCargaCL)
                ->with('sem',$sem)
                ->with('SemestreActual',$SemestreActual);
    }
    //================================INSERTAR==================================
    //funcion que recupera los campos de la BD para insertar
    public function insertar()
    {
        $FechaActual=date("Y-m-d");
        $Semestretodo = Semestre::all();        
        $Asignaturacltodo = AsignaturaLibres::all();
        $Asignaturatodo = Asignatura::all(); 
        $Docentetodo = Docente::all();
        $Aulatodo = Aula::all();
        $SemestreActual = DB::table('tsemestre')
             ->where('tsemestre.fecha_inicio','<=',$FechaActual)
             ->where('tsemestre.fecha_fin','>=',$FechaActual)
             ->get();
        return View::make('cargaAcademica.insertar')
                ->with('Semestretodo', $Semestretodo)
                ->with('Asignaturatodo', $Asignaturatodo)
                ->with('Aulatodo', $Aulatodo)
                ->with('SemestreActual', $SemestreActual)
                ->with('Asignaturacltodo', $Asignaturacltodo)
                ->with('Docentetodo', $Docentetodo);
    }
    //funcion que almacena los datos introducidos en el formulario 
    public function guardarcarga()
    {
        $reglas = ['grupo'=>'required|regex:/^[a-zA-Z]+$/i|min:1|max:1',
            'docente'=>'required'];
        $validador = Validator::make(Input::all(), $reglas); 
        
        $iddocente = substr(Input::get('docente'), 1,6);
        $GRUPO = strtoupper(Input::get('grupo'));
        $turno = Input::get('turno');
        $semestre = Input::get('semestre');
        $asignatura = Input::get('asignatura');
        if($validador->passes())
        {            
            //antes de insertar los datos en la base de datos 
            //verificamos que la carga academica no se repita para este docente
            
            //de igual manera verificamos si esta carga academica no este asignada
            //a otro docente
            $todocargaNoeste = CargaAcademica::where('iddocente', '<>', $iddocente)->get();
            $cargaasignadaaotro = false;
            $docntalqestaasignado = '';
            foreach ($todocargaNoeste as $doc)
            {
                $grup = $doc->grupo;
                $turn = $doc->turno;
                $asign = $doc->idasignatura;
                $asigl = $doc->idasignatura_cl;
                $iddoc = $doc->iddocente;
                $semes = $doc->idsemestre;
                if(((($asignatura=='0'.$asigl)&&($asign==''))||(($asignatura=='1'.$asign)&&($asigl=='')))&&
                        ($GRUPO==$grup)&&($turno==$turn)&&($semestre==$semes))
                {
                    $cargaasignadaaotro = true;
                    $reglas = DB::table('tdocente')->where('iddocente',$iddoc)->get();
                    foreach ($reglas as $value) {
                        $docntalqestaasignado = ' '.$value->nombres.' '.$value->apellidos;
                    }
                }
            }
            $todocargadocente = CargaAcademica::where('iddocente', '=', $iddocente)->get();
            $docenteconcargaasignada = false;
            foreach ($todocargadocente as $doc)
            {
                $grup = $doc->grupo;
                $turn = $doc->turno;
                $asign = $doc->idasignatura;
                $asigl = $doc->idasignatura_cl;
                $semes = $doc->idsemestre;
                if(((($asignatura=='0'.$asigl)&&($asign==''))||(($asignatura=='1'.$asign)&&($asigl=='')))&&
                        ($GRUPO==$grup)&&($turno==$turn)&&($semestre==$semes))
                {
                    $docenteconcargaasignada = true;
                }
            }
            if(($docenteconcargaasignada)||($cargaasignadaaotro))
            {
                if($cargaasignadaaotro)
                {
                    $error = ['wilson'=>'La Carga Academica Ingresada ya está Asignado a:'.$docntalqestaasignado];
                    return Redirect::back()->withInput()->withErrors($error);
                }
                else
                {
                    $error = ['wilson'=>'Este Docente ya tiene esta Carga Academica '];
                    return Redirect::back()->withInput()->withErrors($error);
                }
            }
            else
            {
                //almacenamos en la tabla cargaacademica
                $CargaAcademica = new CargaAcademica;
                $CargaAcademica->idcarga_academica='null';
                $CargaAcademica->grupo=$GRUPO;
                $CargaAcademica->turno=$turno;
                $CargaAcademica->idsemestre=$semestre;
                
                if(substr($asignatura,0,1)==1)
                    //1 significa que se  eligio una asignatura de carrera
                    //0 significa que se  eligio un curso libre
                {
                    $idcl=null;
                    $idAsig=substr($asignatura,1,strlen($asignatura));
                }
                else
                {
                    $idAsig=null;
                    $idcl=substr($asignatura,1,strlen($asignatura));
                }
            
                $CargaAcademica->idasignatura=$idAsig;
                $CargaAcademica->idasignatura_cl=$idcl;
                $CargaAcademica->iddocente=$iddocente;
                $CargaAcademica->save();
                return Redirect::to('carga_academica/vermas/'.$iddocente.'/'.$semestre);
            }
        }
        else
        {
            return Redirect::back()->withInput()->withErrors($validador);
        }
    }

    //================================MODIFICAR==================================
    //recuperamos los datos de la carga academica a moficar y lo cargamos en el formulario
    public function recuperarparamodificar($id)
    {
        $FechaActual=date("Y-m-d");
        $SemestreActual = DB::table('tsemestre')
             ->where('tsemestre.fecha_inicio','<=',$FechaActual)
             ->where('tsemestre.fecha_fin','>=',$FechaActual)
             ->get();
        $Semestretodo = Semestre::all();
        $Asignaturatodo = Asignatura::all();
        $Asignaturacltodo = AsignaturaLibres::all();
        $Docentetodo = Docente::all();
        $cargaacademicaasignatura = DB::table('tcarga_academica')
            ->join('tasignatura', 'tcarga_academica.idasignatura', '=', 'tasignatura.idasignatura')
            ->where('tcarga_academica.idcarga_academica',$id)
            ->select('tasignatura.nombre_asignatura as Asignatura','tasignatura.idasignatura as Id','tcarga_academica.idcarga_academica','tcarga_academica.grupo', 'tcarga_academica.turno', 'tcarga_academica.idsemestre', 'tcarga_academica.iddocente');
        
        $cargaacademicaaeditar = DB::table('tcarga_academica')
            ->join('tasignatura_cl', 'tcarga_academica.idasignatura_cl', '=', 'tasignatura_cl.idasignatura_cl')
            ->where('tcarga_academica.idcarga_academica',$id)
            ->select('tasignatura_cl.nombre_asig_cl as Asignatura','tasignatura_cl.idasignatura_cl as Id','tcarga_academica.idcarga_academica','tcarga_academica.grupo', 'tcarga_academica.turno', 'tcarga_academica.idsemestre', 'tcarga_academica.iddocente')
            ->union($cargaacademicaasignatura)
            ->get();
        
        return View::make('cargaAcademica.modificar')
                    ->with('cargaacademicaaeditar',$cargaacademicaaeditar)
                    ->with('Semestretodo', $Semestretodo)
                    ->with('Asignaturatodo', $Asignaturatodo)
                    ->with('Docentetodo', $Docentetodo)
                    ->with('Asignaturacltodo', $Asignaturacltodo)
                    ->with('SemestreActual',$SemestreActual);
    }
    //ejecutamos la modificacion
    public  function modificar($id)
    {
        $reglas = ['grupo'=>'required|regex:/^[a-zA-Z]+$/i|min:1|max:1',
            'docente'=>'required'];
        $validador = Validator::make(Input::all(), $reglas); 
        
        $iddocente = substr(Input::get('docente'), 1, 6);
        $GRUPO = strtoupper(Input::get('grupo'));
        $turno = Input::get('turno');
        $semestre = Input::get('semestre');
        $asignatura = Input::get('asignatura');
        if($validador->passes())
        {            
            //antes de insertar los datos en la base de datos 
            //verificamos que la carga academica no se repita para este docente
            //buscamos este docente y recuperamos todos sus cargas academicas
            
            //de igual manera verificamos si esta carga academica no este asignada
            //a otro docente
            $cargaactual = CargaAcademica::where('idcarga_academica', '=', $id)->get();

            $todocargaNoeste = CargaAcademica::where('iddocente', '<>', $cargaactual[0]->iddocente)->get();
            $cargaasignadaaotro = false;
            $docntalqestaasignado = '';
            foreach ($todocargaNoeste as $doc)
            {
                $grup = $doc->grupo;
                $turn = $doc->turno;
                $asign = $doc->idasignatura;
                $asigl = $doc->idasignatura_cl;
                $iddoc = $doc->iddocente;
                $semes = $doc->idsemestre;
                if(((($asignatura=='0'.$asigl)&&($asign==''))||(($asignatura=='1'.$asign)&&($asigl=='')))&&
                        ($GRUPO==$grup)&&($turno==$turn)&&($semestre==$semes))
                {
                    $cargaasignadaaotro = true;
                    $reglas = DB::table('tdocente')->where('iddocente',$iddoc)->get();
                    foreach ($reglas as $value) {
                        $docntalqestaasignado = ' '.$value->nombres.' '.$value->apellidos;
                    }
                }
            }
            if($cargaasignadaaotro)
            {
                $error = ['wilson'=>'La Carga Academica Ingresada ya está Asignado a:'.$docntalqestaasignado];
                    return Redirect::back()->withInput()->withErrors($error);            }
            else
            {
                if(substr($asignatura,0,1) == 1)
                {
                    $idcl=null;
                    $idAsig=substr($asignatura,1,strlen($asignatura));
                }
                else
                {
                    $idAsig=null;
                    $idcl=substr($asignatura,1,strlen($asignatura));
                }
                DB::table('tcarga_academica')
                        ->where('idcarga_academica',$id)
                        ->update([
                            'grupo'=> $GRUPO,
                            'turno'=> $turno,
                            'idsemestre'=>$semestre,
                            'idasignatura'=>$idAsig,
                            'idasignatura_cl'=>$idcl,
                            'iddocente'=>$iddocente]);
                return Redirect::to('carga_academica/vermas/'.$iddocente.'/'.$semestre);
            }
        }
        else
        {
            return Redirect::back()->withInput()->withErrors($validador);
        }
    }
    //=======================================REPORTE DOCENTE POR ASIGNATURA======================
    public function getDAPDF()
    {        
        $iddocente = Input::get('docente');;
        $semestre = Input::get('semestre');
        $fpdf = new PDF();
        $colu = array('NRO', 'CODIGO', 'APELLIDOS Y NOMBRES','ASIGNATURA');
        $cargaacademicaasignatura = DB::table('tcarga_academica')
            ->join('tasignatura', 'tcarga_academica.idasignatura', '=', 'tasignatura.idasignatura')
            ->join('tdocente', 'tcarga_academica.iddocente', '=', 'tdocente.iddocente')
            ->where('tcarga_academica.iddocente',$iddocente)
            ->where('tcarga_academica.idsemestre',$semestre)
            ->select('tdocente.iddocente','tdocente.nombres','tdocente.apellidos','tasignatura.nombre_asignatura as Asignatura');
        
        $data = DB::table('tcarga_academica')
            ->join('tasignatura_cl', 'tcarga_academica.idasignatura_cl', '=', 'tasignatura_cl.idasignatura_cl')
            ->join('tdocente', 'tcarga_academica.iddocente', '=', 'tdocente.iddocente')
            ->where('tcarga_academica.iddocente',$iddocente)
            ->where('tcarga_academica.idsemestre',$semestre)
            ->select('tdocente.iddocente','tdocente.nombres','tdocente.apellidos','tasignatura_cl.nombre_asig_cl as Asignatura')
            ->union($cargaacademicaasignatura)
            ->get();
        $fpdf->SetFont('Arial','B',13);
        $fpdf->AddPage();
        $fpdf->Cell(80);
        $fpdf->Cell(30,5,'Lista de cursos que dicta el docente ', 0, 1, 'C');
        $fpdf->SetFont('Arial','B',9);
        $fpdf->Ln(2);
        $fpdf->SetFont('Arial','B',10);
        $fpdf->FancyTableDocenteCurso($colu,$data);
        $cabe=['Content-Type' => 'application/pdf'];
        return  Response::make($fpdf->Output(),200,$cabe);
    }
    //=======================================REPORTE CATALOGO======================
    public function getcatalogoPDF()
    {
        //$semestre = Input::get('semestre');
        $semestre = '2015-II';
        $carrera = 'AS';
        
        
        
        $fpdf = new PDF();
        $colu = array('NRO', 'ASIGNATURA', 'DOCENTE', 'GRUPO','TURNO', 'HRS-SEM', 'MODULO');
        //$data = Docente::all();
       
        $data = DB::table('tcarga_academica')
            ->join('tasignatura', 'tcarga_academica.idasignatura', '=', 'tasignatura.idasignatura')
            ->join('tdocente', 'tcarga_academica.iddocente', '=', 'tdocente.iddocente')
            ->join('tmodulo', 'tmodulo.idmodulo', '=', 'tasignatura.idmodulo')
            ->join('tcarrera', 'tmodulo.idcarrera', '=', 'tcarrera.idcarrera')
            ->where('tmodulo.idcarrera',$carrera)
            ->where('tcarga_academica.idsemestre',$semestre)
              ->select('tasignatura.nombre_asignatura as Asignatura','tdocente.iddocente','tdocente.nombres','tdocente.apellidos'
                    ,'tcarga_academica.grupo','tcarga_academica.turno', 'tasignatura.horas_semanales'
                    ,'tmodulo.idmodulo')
            ->get();
        $fpdf->SetFont('Arial','B',13);
        $fpdf->AddPage();
        $fpdf->Cell(80);
        $fpdf->Cell(30,5,'Catalogo de la carrera '.$carrera.'  en el semestre'.$semestre, 0, 1, 'C');
        $fpdf->SetFont('Arial','B',9);
        $fpdf->Ln(2);
        $fpdf->SetFont('Arial','B',10);
       // print_r($data);
        $fpdf->FancyTableCatalogo($colu,$data);
        $cabe=['Content-Type' => 'application/pdf'];
        return  Response::make($fpdf->Output(),200,$cabe);
    }
}
