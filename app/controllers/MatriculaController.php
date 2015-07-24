<?php


/**
 * Description of users
 *
 * @author User
 */
class MatriculaController extends BaseController{

    /**
     * LISTAR ASIGNATURAS
     */
    public function index()
    {
        $matriculas=Matricula::all();
        $alumnos=Alumno::all();
        $asig=Asignatura::all();
        $asigcl=AsignaturaLibres::all();
        $modul=Modulo::all();
        $semst=Semestre::all();
        $auxiliar=DB::table('tmatricula')
            ->join('talumno', 'tmatricula.idalumno', '=', 'talumno.idalumno')
            //->join('tpago', 'tmatricula.idpago', '=', 'tpago.idpago')
            ->select('tmatricula.idmatricula','tmatricula.tipo' ,'talumno.idalumno', 'talumno.nombres','talumno.apellidos','tmatricula.fecha_matricula')
            ->get();
        return View::make('matricula.listar',['alumnos'=> $alumnos,'matricula'=>$auxiliar, 'asig' => $asig, 'asigcl' => $asigcl, 'modulo' => $modul, 'semest' => $semst]);
    }

    public function getMatriculaCLSemestre($id){
        $fpdf = new PDF();
        $colu = array('NRO', 'CODIGO', 'NOMBRES Y APELLIDOS');


        $data1=DB::table('tmatricula')
            ->join('talumno', 'tmatricula.idalumno', '=', 'talumno.idalumno')
            ->join('tdetalle_matricula', 'tmatricula.idmatricula', '=', 'tdetalle_matricula.idmatricula')
            ->join('tasignatura_cl', 'tasignatura_cl.idasignatura_cl','=', 'tdetalle_matricula.idasignatura_cl')
            ->join('tcarga_academica', 'tcarga_academica.idasignatura_cl','=', 'tasignatura_cl.idasignatura_cl')
            ->join('tsemestre', 'tsemestre.idsemestre','=', 'tcarga_academica.idsemestre')
            ->select('talumno.idalumno','talumno.nombres','talumno.apellidos')
            ->where('tsemestre.idsemestre','=',$id,'and','tmatricula.tipo','=','Curso_libre')
            ->groupBy('talumno.idalumno');

        $data=DB::table('tmatricula')
            ->join('talumno', 'tmatricula.idalumno', '=', 'talumno.idalumno')
            ->join('tdetalle_matricula', 'tmatricula.idmatricula', '=', 'tdetalle_matricula.idmatricula')
            ->join('tasignatura_cl', 'tasignatura_cl.idasignatura_cl','=', 'tdetalle_matricula.idasignatura_cl')
            ->join('tcarga_academica', 'tcarga_academica.idasignatura_cl','=', 'tasignatura_cl.idasignatura_cl')
            ->join('tsemestre', 'tsemestre.idsemestre','=', 'tcarga_academica.idsemestre')
            ->select('talumno.idalumno','talumno.nombres','talumno.apellidos')
            ->where('tsemestre.idsemestre','=',$id,'and','tmatricula.tipo','=','Curso_libre')
            ->groupBy('talumno.idalumno')
            ->union($data1)
            ->get();
         if(sizeof($data)>0){
            $fpdf->SetFont('Arial','B',13);
            $fpdf->AddPage();
            $fpdf->Cell(80);
            $fpdf->Cell(30,15,'Matricula Curso Libre '.$id, 0, 1, 'C');
            $fpdf->Cell(190,5,'Lista de Alumnos', 0, 1, 'C');
            $fpdf->SetFont('Arial','B',9);
            $fpdf->Ln(2);

            $fpdf->SetFont('Arial','B',10);
            $fpdf->FancyTable($colu,$data);

            $cabe=['Content-Type' => 'application/pdf'];
            return  Response::make($fpdf->Output(),200,$cabe);
         }
         else{
            return View::make('matricula.listarer');
         }
    }

    public function getMatriculaCLMes($id){
        $fpdf = new PDF();
        $colu = array('NRO', 'CODIGO', 'NOMBRES Y APELLIDOS');


        $data1=DB::table('tmatricula')
            ->join('talumno', 'tmatricula.idalumno', '=', 'talumno.idalumno')
            ->join('tdetalle_matricula', 'tmatricula.idmatricula', '=', 'tdetalle_matricula.idmatricula')
            ->join('tasignatura_cl', 'tasignatura_cl.idasignatura_cl','=', 'tdetalle_matricula.idasignatura_cl')
            ->join('tcarga_academica', 'tcarga_academica.idasignatura_cl','=', 'tasignatura_cl.idasignatura_cl')
            ->join('tsemestre', 'tsemestre.idsemestre','=', 'tcarga_academica.idsemestre')
            ->select('talumno.idalumno','talumno.nombres','talumno.apellidos')
            ->where('tsemestre.idsemestre','=',$id,'and','tmatricula.tipo','=','Curso_libre')
            ->groupBy('talumno.idalumno');

        $data=DB::table('tmatricula')
            ->join('talumno', 'tmatricula.idalumno', '=', 'talumno.idalumno')
            ->join('tdetalle_matricula', 'tmatricula.idmatricula', '=', 'tdetalle_matricula.idmatricula')
            ->join('tasignatura_cl', 'tasignatura_cl.idasignatura_cl','=', 'tdetalle_matricula.idasignatura_cl')
            ->join('tcarga_academica', 'tcarga_academica.idasignatura_cl','=', 'tasignatura_cl.idasignatura_cl')
            ->join('tsemestre', 'tsemestre.idsemestre','=', 'tcarga_academica.idsemestre')
            ->select('talumno.idalumno','talumno.nombres','talumno.apellidos')
            ->where('tsemestre.idsemestre','=',$id,'and','tmatricula.tipo','=','Curso_libre')
            ->groupBy('talumno.idalumno')
            ->union($data1)
            ->get();
         if(sizeof($data)>0){
            $fpdf->SetFont('Arial','B',13);
            $fpdf->AddPage();
            $fpdf->Cell(80);
            $fpdf->Cell(30,15,'Matricula Curso Libre '.$id, 0, 1, 'C');
            $fpdf->Cell(190,5,'Lista de Alumnos', 0, 1, 'C');
            $fpdf->SetFont('Arial','B',9);
            $fpdf->Ln(2);

            $fpdf->SetFont('Arial','B',10);
            $fpdf->FancyTable($colu,$data);

            $cabe=['Content-Type' => 'application/pdf'];
            return  Response::make($fpdf->Output(),200,$cabe);
         }
         else{
            return View::make('matricula.listarer');
         }
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    /**
     * AGREGAR ASIGNATURAS
     */
    public function create()
    {
        //
        return View::make('matricula.escojer_alumno');
    }

    public function create2()
    {
        //
        $idalumno = DB::table('talumno')->where('idalumno', Input::get('idalumno'))->pluck('idalumno');
        if(($idalumno != NULL)) {
            return View::make('matricula.insertar')->with('alu', $idalumno);
        }
        else {
            return View::make('matricula.escojer_alumno');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */

    /**
     * STORE ASIGNATURAS
     */
    public function store()
    {
        //
            $matricula = new Matricula;
            //$idpago = DB::table('tpago')->where('nro_boleta', Input::get('idboleta'))->pluck('idpago');

            //if(($idpago != NULL)) {
                $matricula->tipo = Input::get('idtipo');
                $matricula->fecha_matricula = Input::get('fecha_matricula');
                //$matricula->idpago = $idpago;
                $matricula->idalumno = Input::get('idalumno');
                $matricula->save();
                if(Input::get('idtipo')=='Curso_carrera'){
                    $idmatr = DB::table('tmatricula')->max('idmatricula');
                    return Redirect::to('/detalleMatricula/agregar/'.$idmatr);

                }
                else{
                    $idmatr = DB::table('tmatricula')->max('idmatricula');
                    return Redirect::to('/detalleMatricula/agregarcl/'.$idmatr);
                }
            /*}
            else {
                echo "pago no es valido";
            }*/

    }




    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    /**
     * ACTUALIZAR LAS ASIGNATURAS
     */
    public function edit($id)
    {
        //
        $matricula = Matricula::where('idmatricula','=',$id)->get();
        $alumno=Matricula::where('idmatricula','=',$id)->pluck('idalumno');
        $detallematricula = DetalleMatricula::all();
        $asignaturas=Asignatura::all();
        $alumnos=Alumno::all();
        $matriculas=Matricula::all();
        $cursoslibres= AsignaturaLibres::all();
        $asignatura=Asignatura::all();
        $aux2=DB::table('tmatricula')
            ->join('talumno', 'tmatricula.idalumno', '=', 'talumno.idalumno')
            ->join('tdetalle_matricula', 'tmatricula.idmatricula', '=', 'tdetalle_matricula.idmatricula')
            ->join('tasignatura', 'tasignatura.idasignatura','=', 'tdetalle_matricula.idasignatura')
            ->select('talumno.idalumno','talumno.nombres','tmatricula.idmatricula','tasignatura.idasignatura','tasignatura.nombre_asignatura','tasignatura.horas_semanales','tasignatura.horas_totales')
            ->where('talumno.idalumno','=',$alumno)
            ->get();



        $aux3=DB::table('tmatricula')
            ->join('talumno', 'tmatricula.idalumno', '=', 'talumno.idalumno')
            ->join('tdetalle_matricula', 'tmatricula.idmatricula', '=', 'tdetalle_matricula.idmatricula')
            ->join('tasignatura_cl', 'tasignatura_cl.idasignatura_cl','=', 'tdetalle_matricula.idasignatura_cl')
            ->select('talumno.idalumno','talumno.nombres','tmatricula.idmatricula','tasignatura_cl.idasignatura_cl','tasignatura_cl.nombre_asig_cl','tasignatura_cl.horas_totales')
            ->where('talumno.idalumno','=',$alumno)
            ->get();
        $detalle_matricula = DetalleMatricula::where('iddetalle_matricula','=',$id)->get();
        //return View::make('matricula.editar')->With(['matri'=> $matricula,'curso_libre'=>$cursoslibres]);
        return View::make('matricula.editar',['auxii'=>$aux3,'axuliar'=>$aux2,'matri'=> $matricula,'curso_libre'=>$cursoslibres,'detallematri'=>$detalle_matricula,'asig'=>$asignatura]);
        //return View::make('matricula.editar')->With(['matri'=> $cursoslibres]);
        //$asignatura=asignatura::where('idasignatura','=',$id)->get();

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    /**
     * ACTUALIZAR BD ASIGNATURAS
     */
        public function update($id)
    {
        //
        $entra = Input::all();
        $hola=$entra['nombre'];
        $hola2=$entra['nombre2'];
        $eli_ante=$entra['anterior'];
        $arreglo_ali=explode(',', $eli_ante);
        $matri = DB::table('tmatricula')
         ->where('idmatricula', $id)
         ->update(array(
         'fecha_matricula' => $entra['fecha'],
         ));

        if($eli_ante!=""){
            //elimina de la base de datos esto $arreglo_ali[$i] es equivalente al codigoasignatura 
            for ($i=0; $i <sizeof($arreglo_ali)-1; $i++) { 
                //elimina aqui con la consulta
               DB::table('tdetalle_matricula')->where('idmatricula','=',$entra['idmatricula'])->delete();

            }
        }
        if($hola!=""){
            foreach (explode(',', $hola) as $key) {
            //aqui solo tienes que agregar a la base de datos a curso carrera con idcurso=$key
            $detallematri = DB::table('tdetalle_matricula')
                 ->insert(array('idmatricula' => $entra['idmatricula'], 'idasignatura' => $key));
            }
        }
        else{

        }
                  //var_dump(explode(',', $hola2));
        if($hola2!=""){
            foreach (explode(',', $hola2) as $key) {
            //aqui solo tienes que agregar a la base de datos a curso libre con idcurso=$key
                $detallematri = DB::table('tdetalle_matricula')
                    ->insert(array('idmatricula' => $entra['idmatricula'], 'idasignatura_cl' => $key));

            }
        }
        else{
            
        }
        
        return Redirect::to('matricula');
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
    public function detalle($id)
    {
       // echo "Hola mundo";
        $detallematricula = DetalleMatricula::all();
        $asignaturas=Asignatura::all();
        $alumnos=Alumno::all();
        $matriculas=Matricula::all();
        $nombrealumno=DB::table('talumno')->where('idalumno',$id)->pluck('nombres');
        $aux2=DB::table('tmatricula')
            ->join('talumno', 'tmatricula.idalumno', '=', 'talumno.idalumno')
            ->join('tdetalle_matricula', 'tmatricula.idmatricula', '=', 'tdetalle_matricula.idmatricula')
            ->join('tasignatura', 'tasignatura.idasignatura','=', 'tdetalle_matricula.idasignatura')
            ->select('talumno.idalumno','talumno.nombres','tmatricula.idmatricula','tasignatura.idasignatura','tasignatura.nombre_asignatura','tasignatura.horas_semanales','tasignatura.horas_totales')
            ->where('talumno.idalumno','=',$id)
            ->get();

        //$aux3=DB::table($aux2)->where('idalumno','=',$id)->get();
      // echo $aux2;
        //$aux3=DB::statement('SELECT nombres from talumno where idalumno=120278')->get();
        //echo $aux3;
        //return View::make('matricula.listardetalles')->with('matricula_detalles',$aux2,$nombrealumno);
        return View::make('matricula.listardetalles',['matricula_detalles'=> $aux2,'nombrealumno'=>$nombrealumno,'idalumno'=>$id]);

    }
     public function getPDF($id)
    {
        $detallematricula = DetalleMatricula::all();
        $asignaturas=Asignatura::all();
        $alumnos=Alumno::all();
        $matriculas=Matricula::all();
        //$nombrealumno=DB::table('talumno')->where('idalumno',$id)->pluck('nombres');
        $aux2=DB::table('tmatricula')
            ->join('talumno', 'tmatricula.idalumno', '=', 'talumno.idalumno')
            ->join('tdetalle_matricula', 'tmatricula.idmatricula', '=', 'tdetalle_matricula.idmatricula')
            ->join('tasignatura', 'tasignatura.idasignatura','=', 'tdetalle_matricula.idasignatura')
            ->select('tasignatura.idasignatura','tasignatura.nombre_asignatura','tasignatura.horas_semanales','tasignatura.horas_totales')
            ->where('talumno.idalumno','=',$id)
            ->get();
        $fpdf = new PDF();
        $colu = array('NRO','ID Asignatura','Asignatura','Horas Semanales','Horas Totales');
        //$fpdf->Image("unsaac.png",10,6,30);
        $fpdf->SetFont('Arial','',13);
        $fpdf->AddPage();
        $fpdf->Cell(80);
        $fpdf->Cell(30,5,'Lista de cursos matriculados', 0, 1, 'C');
        $fpdf->SetFont('Arial','B',9);
        $fpdf->Ln(2);
        $fpdf->SetFont('Arial','B',10);
        $fpdf->FancyTableMatricula($colu,$aux2);

        $cabe=['Content-Type' => 'application/pdf'];
        return  Response::make($fpdf->Output(),200,$cabe);

    }
    public function getPDF2($asigna)
    {
        $detallematricula = DetalleMatricula::all();
        $asignaturas=Asignatura::all();
        $alumnos=Alumno::all();
        $matriculas=Matricula::all();
        //$nombrealumno=DB::table('talumno')->where('idalumno',$id)->pluck('nombres');
        $aux2=DB::table('tmatricula')
            ->join('tdetalle_matricula', 'tmatricula.idmatricula', '=', 'tdetalle_matricula.idmatricula')
            ->join('tasignatura', 'tasignatura.idasignatura','=', 'tdetalle_matricula.idasignatura')
            ->join('talumno','talumno.idalumno','=','tmatricula.idalumno')
            ->select('talumno.nombres','talumno.apellidos')
            ->where('tasignatura.idasignatura','=',$asigna)
            ->get();
        $fpdf = new PDF();
        $colu = array('NRO','Nombres','Apellidos');
        //$fpdf->Image("unsaac.png",10,6,30);
        $fpdf->SetFont('Arial','',13);
        $fpdf->AddPage();
        $fpdf->Cell(80);
        $fpdf->Cell(30,5,'Lista de alumnos matriculas', 0, 1, 'C');
        $fpdf->SetFont('Arial','B',9);
        $fpdf->Ln(2);
        $fpdf->SetFont('Arial','B',10);
        $fpdf->FancyTableMatriculaporCurso($colu,$aux2);

        $cabe=['Content-Type' => 'application/pdf'];
        return  Response::make($fpdf->Output(),200,$cabe);
    }
}

?>
