<?php

require 'vendor/autoload.php';

use  Dompdf\Dompdf ;

$dompdf = new  Dompdf ();
ob_start();

require "content-pdf.php";

$html = ob_get_clean();

$dompdf->loadHtml($html);

// (Opcional) Configure o tamanho e a orientação do papel 
$dompdf -> setPaper ( ' A4 ');

// Renderizar o HTML como PDF 
$dompdf -> render ();

// Envie o PDF gerado para o navegador 
$dompdf -> stream ();
