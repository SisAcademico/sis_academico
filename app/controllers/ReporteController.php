<?php

class ReporteController extends \BaseController {

    /**
     * Lista de procedimientos
     *
     * @return Response
     */
    public function index() {
        return View::make('reporte.listar');
    }
    public function RankingPorAsignatura()
    {
    	$isasig = Input::get('id_asignatura');
		//echo $isasig;
	    $fpdf = new PDF();
	    $colu = array('CODIGO', 'APELLIDOS Y NOMBRES', 'PROMEDIO');
	    $data=Nota::rankingPorCurso($isasig);
        //$fpdf->Image("unsaac.png",10,6,30);
        $fpdf->SetFont('Arial','B',13);
		$fpdf->AddPage();
		$fpdf->Cell(80);
		$fpdf->Cell(30,5,'Ranking de Alumnos por Asignatura', 0, 1, 'C');
		$fpdf->SetFont('Arial','B',9);
		/*$fpdf->Cell(10,5,'Asignatura:', 0, 1, 'L');
		$fpdf->Cell(10,5,'Docente:', 0, 1, 'L');*/
		$fpdf->Ln(2);

		$fpdf->SetFont('Arial','B',10);
		//echo sizeof($data);
		$fpdf->FancyTableRankingPorCurso($colu,$data);

        $cabe=['Content-Type' => 'application/pdf'];
        return 	Response::make($fpdf->Output(),200,$cabe);
    }
}
