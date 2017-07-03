<?php

$dbh = new PDO($bdd[0],$bdd[1],$bdd[2]);
foreach($dbh->query('SELECT * FROM episode WHERE id='.$_GET['id']) as $row){
            $episode = array($row[0], $row[1], $row[2], $row[3], $row[4], $row[5]);
        }

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,$row[2]);
$pdf->Ln(10);
$pdf->SetFont('Times','',12);
    // Sortie du texte justifié
$pdf->MultiCell(0,5, strip_tags(html_entity_decode($row[3])));
$pdf->Output();

