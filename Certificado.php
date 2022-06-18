<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
  
    // Arial bold 15
    $this->SetFont('Arial','B',20);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,'Certificado Laboral',0,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}
$pdf = new PDF();
$pdf-> AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,utf8_decode('Certificado laboral para el empleado #####'));
$pdf->Output();
?>