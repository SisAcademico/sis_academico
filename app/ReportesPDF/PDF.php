<?php
use Anouar\Fpdf\Fpdf as baseFpdf;
class PDF extends baseFpdf
{
    
    function Header()
    {
        $this->Image("images/ISC.png",10,6,30);
        $this->SetFont('Arial','B',16);
        $this->Cell(55);
        $this->Cell(30,10,'Instituto de Sistemas Cusco');
        $this->Ln(5);
        $this->Cell(80);
        $this->Cell(30,10,'_______________________________________________________',0,1,'C');
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,utf8_decode ('Página '.$this->PageNo()),0,0,'C');
    }
    
    function FancyTable($header, $data)
    {
        
        $this->SetFillColor(100,100,100);
        $this->SetTextColor(255);
        $this->SetDrawColor(0,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');

        $w = array(13, 23, 158);
        for($i=0;$i<count($header);$i++)
            $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
        $this->Ln();

        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetFont('');

        $fill = false;
        $gg=1;
        foreach($data as $row)
        {
            $this->Cell($w[0],6,$gg++,'LR',0,'L',$fill);
            $this->Cell($w[1],6,$row->idalumno,'LR',0,'L',$fill);
            $this->Cell($w[2],6,$row->apellidos.' - '.$row->nombres,'LR',0,'L',$fill);
            $this->Ln();
            $fill = !$fill;
        }

        $this->Cell(array_sum($w),0,'','T');
    }

    function FancyTableHorario($header, $data)
    {
        
        $this->SetFillColor(100,100,100);
        $this->SetTextColor(255);
        $this->SetDrawColor(0,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');

        $w = array(12, 60, 60);
        for($i=0;$i<count($header);$i++)
            $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
        $this->Ln();

        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetFont('');

        $fill = false;
        $gg=0;
        foreach($data as $row)
        {
            $this->Cell($w[0],6,++$gg,'LR',0,'L',$fill);
            $this->Cell($w[1],6,$row->hora_inicio,'LR',0,'L',$fill);
            $this->Cell($w[2],6,$row->hora_fin,'LR',0,'L',$fill);
            $this->Ln();
            $fill = !$fill;
        }

        $this->Cell(array_sum($w),0,'','T');
    }
     function FancyTableMatricula($header,$data)
    {

        $this->SetFillColor(100,100,100);
        $this->SetTextColor(255);
        $this->SetDrawColor(0,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');

        $w = array(12, 30, 60, 30, 30);
        for($i=0;$i<count($header);$i++)
            $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
        $this->Ln();

        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetFont('');

        $fill = false;
        $gg=0;
        foreach($data as $row)
        {
            $this->Cell($w[0],6,++$gg,'LR',0,'L',$fill);
            $this->Cell($w[1],6,$row->idasignatura,'LR',0,'L',$fill);
            $this->Cell($w[2],6,$row->nombre_asignatura,'LR',0,'L',$fill);
            $this->Cell($w[3],6,$row->horas_semanales,'LR',0,'L',$fill);
            $this->Cell($w[4],6,$row->horas_totales,'LR',0,'L',$fill);
            $this->Ln();
            $fill = !$fill;
        }

        $this->Cell(array_sum($w),0,'','T');
    }
        function FancyTableMatriculaporCurso($header,$data)
    {

        $this->SetFillColor(100,100,100);
        $this->SetTextColor(255);
        $this->SetDrawColor(0,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');

        $w = array(12, 30, 60, 30, 30);
        for($i=0;$i<count($header);$i++)
            $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
        $this->Ln();

        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetFont('');

        $fill = false;
        $gg=0;
        foreach($data as $row)
        {
            $this->Cell($w[0],6,++$gg,'LR',0,'L',$fill);
            $this->Cell($w[1],6,$row->nombres,'LR',0,'L',$fill);
            $this->Cell($w[2],6,$row->apellidos,'LR',0,'L',$fill);
            $this->Ln();
            $fill = !$fill;
        }

        $this->Cell(array_sum($w),0,'','T');
    }
    function FancyTableRankingPorCurso($header,$data)
    {
        $this->SetFillColor(100,100,100);
        $this->SetTextColor(255);
        $this->SetDrawColor(0,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');

        $w = array(12, 30, 60, 30, 30);
        for($i=0;$i<count($header);$i++)
            $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
        $this->Ln();

        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetFont('');

        $fill = false;
        $gg=0;
        foreach($data as $row)
        {
            $this->Cell($w[0],6,++$gg,'LR',0,'L',$fill);
            $this->Cell($w[1],6,$row->Codigo,'LR',0,'L',$fill);
            $this->Cell($w[2],6,$row->Nombres,'LR',0,'L',$fill);
            $this->Cell($w[3],6,$row->Promedio,'LR',0,'L',$fill);
            $this->Ln();
            $fill = !$fill;
        }

        $this->Cell(array_sum($w),0,'','T');
    }
}
