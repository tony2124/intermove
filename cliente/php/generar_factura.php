<?php
	session_start();
	require("../../api/fpdf/fpdf.php");
	require("../../scripts/conexion.php");
	$sql = "SELECT intencion_compra.*,c_tipo_carga.nombre_carga,cliente.razon_social FROM publicacion_demanda_servicio
	JOIN confirmacion_compra ON publicacion_demanda_servicio.num_guia=confirmacion_compra.num_guia
	JOIN intencion_compra ON confirmacion_compra.idconfirmacion_compra=intencion_compra.idintencion_compra
	JOIN cliente ON intencion_compra.id_cliente=cliente.id_cliente
	JOIN c_tipo_carga ON intencion_compra.idtipo_carga=c_tipo_carga.idctipo_carga
	WHERE publicacion_demanda_servicio.num_guia='".$_SESSION["numero_guia"]."'";
	$query = mysql_query($sql);
	$array = mysql_fetch_array($query);
	$pdf = new FPDF('P','mm','Letter');
	$pdf->SetMargins(30, 25 , 30);
	$pdf->AddPage();
	$pdf->SetFont('Times','B',30);
	$pdf->Image('../../img/intermove.png',5,10,200,20,'PNG');
	$pdf->SetFont('Times','B',14);
	$pdf->Ln(25);
	$pdf->Cell(100, 10, 'Razon social cliente:', 0,0);
	$pdf->Cell(100, 10, $array['razon_social'], 0,1);
	$pdf->Cell(100, 10, 'Fecha de compra:', 0,0);
	$pdf->Cell(100, 10, $array['fecha_in_compra'], 0,1);
	$pdf->Cell(100, 10, 'Fecha deseada de entrega:', 0,0);
	$pdf->Cell(100, 10, $array['fecha_deseada_entrega'], 0,1);
	$pdf->Cell(100, 10, 'importe cotizado del cliente:', 0,0);
	$pdf->Cell(100, 10, $array['importe_cotizado_cliente'], 0,1);
	$pdf->Cell(100, 10, 'Peso estimado:', 0,0);
	$pdf->Cell(100, 10, $array['peso_estimado'], 0,1);
	$pdf->Cell(100, 10, 'Estado in compra:', 0,0);
	$pdf->Cell(100, 10, $array['estado_int_compra'], 0,1);
	$pdf->Cell(100, 10, 'Tipo de carga:', 0,0);
	$pdf->Cell(100, 10, $array['nombre_carga'], 0,1);
	$pdf->Cell(100, 10, 'Tipo de cotizacion:', 0,0);
	$pdf->Cell(100, 10, $array['tipo_cotizacion'], 0,1);
	$pdf->Cell(100, 10, 'Fecha deseada de carga:', 0,0);
	$pdf->Cell(100, 10, $array['fecha_deseada_carga'], 0,1);
	$pdf->Cell(100, 10, 'Volumen estimado:', 0,0);
	$pdf->Cell(100, 10, $array['volumen_estimado'], 0,1);
	$pdf->Cell(100, 10, 'Distancia en km:', 0,0);
	$pdf->Cell(100, 10, $array['distancia_km'], 0,1);
	$pdf->Ln(10);


	$pdf->output();
?>