<?php 
include 'vendor/autoload.php';

$parser = new \Smalot\PdfParser\Parser(); 
 
$file = '1.pdf'; 
 
$pdf = $parser->parseFile($file); 
 
$textContent = $pdf->getText();

echo $textContent;