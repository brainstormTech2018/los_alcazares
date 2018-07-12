<?php
	require '../../libs/excell/Classes/PHPExcel.php';
	$curso=$_GET['curso'];
	/** Se agrega la libreria PHPExcel */
    $fila = 4; 
    
 
// Se crea el objeto PHPExcel
 $objPHPExcel = new PHPExcel();

$objPHPExcel->getProperties()->setCreator("Brainstorm") // Nombre del autor
    ->setLastModifiedBy("Brainstorm") //Ultimo usuario que lo modificó
    ->setTitle("Reporte de Notas".$curso) // Titulo
    ->setSubject("Los alcazares") //Asunto
    ->setDescription("Reporte de relacion notas - alumnos 1 periodo") //Descripción
    ->setKeywords("") //Etiquetas
    ->setCategory("Reporte excel"); //Categorias

    $tituloReporte = "Relación de alumnos y notas 1 Periodo ";
	$titulosColumnas = array('NOMBRE', 'OBERVACIONES', '1 NOTA', '2 NOTA', '3 NOTA', 'DEFINITIVA');

	$objPHPExcel->setActiveSheetIndex(0)
    ->mergeCells('A1:F1')
    ->mergeCells('A2:F2');

    // Se agregan los titulos del reporte
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1',$tituloReporte)
    ->setCellValue('A2',"CICLO: ".$curso) // Titulo del reporte
    ->setCellValue('A3',  $titulosColumnas[0])  //Titulo de las columnas
    ->setCellValue('B3',  $titulosColumnas[1])
    ->setCellValue('C3',  $titulosColumnas[2])
    ->setCellValue('D3',  $titulosColumnas[3])
    ->setCellValue('E3',  $titulosColumnas[4])
    ->setCellValue('F3',  $titulosColumnas[5]);

    $estiloTituloReporte = array(
    'font' => array(
	'name'      => 'Arial',
	'bold'      => true,
	'italic'    => false,
	'strike'    => false,
	'size' =>13
    ),
    'fill' => array(
	'type'  => PHPExcel_Style_Fill::FILL_SOLID
	),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_NONE
	)
    ),
    'alignment' => array(
	'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	);
 
$estiloTituloColumnas = array(
    'font' => array(
	'name'  => 'Arial',
	'bold'  => true,
	'size' =>10,
	'color' => array(
	'rgb' => 'FFFFFF'
	)
    ),
    'fill' => array(
	'type' => PHPExcel_Style_Fill::FILL_SOLID,
	'color' => array('rgb' => '538DD5')
    ),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_THIN
	)
    ),
    'alignment' =>  array(
	'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	);
	
	$estiloInformacion = new PHPExcel_Style();
	$estiloInformacion->applyFromArray( array(
    'font' => array(
	'name'  => 'Arial',
	'color' => array(
	'rgb' => '000000'
	)
    ),
    'fill' => array(
	'type'  => PHPExcel_Style_Fill::FILL_SOLID
	),
    'borders' => array(
	'allborders' => array(
	'style' => PHPExcel_Style_Border::BORDER_THIN
	)
    ),
	'alignment' =>  array(
	'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
	'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    )
	));
 
$estiloInformacion = new PHPExcel_Style();
$estiloInformacion->applyFromArray( array(
    'font' => array(
        'name'  => 'Arial',
        'color' => array(
            'rgb' => '000000'
        )
    ),
    'fill' => array(
  'type'  => PHPExcel_Style_Fill::FILL_SOLID,
  'color' => array(
            'argb' => 'FFd9b7f4')
  ),
    'borders' => array(
        'left' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN ,
      'color' => array(
              'rgb' => '3a2a47'
            )
        )
    )
));

$objPHPExcel->getActiveSheet()->getStyle('A1:F1')->applyFromArray($estiloTituloReporte);
$objPHPExcel->getActiveSheet()->getStyle('A2:F2')->applyFromArray($estiloTituloReporte);
$objPHPExcel->getActiveSheet()->getStyle('A3:F3')->applyFromArray($estiloTituloColumnas);

for($i = 'A'; $i <= 'F'; $i++){
    $objPHPExcel->setActiveSheetIndex(0)->getColumnDimension($i)->setAutoSize(TRUE);
}

// Se asigna el nombre a la hoja
$objPHPExcel->getActiveSheet()->setTitle($curso);
 
// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
$objPHPExcel->setActiveSheetIndex(0);
 
// Inmovilizar paneles
//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,6);

$sql = "SELECT emp_nombre, emp_apellido,emp_documento,liq_cesantias,liq_vacaciones,liq_interescesantias,liq_fechaingreso,liq_fecharetiro,liq_prima FROM tbl_liquidacion INNER JOIN tbl_empleados ON liq_documentoempleado = emp_documento WHERE liq_fechaingreso = '2018-04-01' AND liq_fecharetiro='2018-04-02'";
$resultado = $link->query($sql);

while($rows = $resultado->fetch_assoc()){
        
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila, utf8_encode($rows['emp_nombre']));
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila, utf8_encode($rows['emp_apellido']));
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila, $rows['emp_documento']);
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila, $rows['liq_cesantias']);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila, $rows['liq_interescesantias']);
        $objPHPExcel->getActiveSheet()->setCellValue('F'.$fila, $rows['liq_vacaciones']);
        $objPHPExcel->getActiveSheet()->setCellValue('G'.$fila, $rows['liq_prima']);
        $objPHPExcel->getActiveSheet()->setCellValue('H'.$fila, $rows['liq_fechaingreso']);
        $objPHPExcel->getActiveSheet()->setCellValue('I'.$fila, $rows['liq_fecharetiro']);

        
        
        $fila++; //Sumamos 1 para pasar a la siguiente fila
    }

$fila = $fila-1;

// Se manda el archivo al navegador web, con el nombre que se indica, en formato 2007
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Reportedenotas.xlsx"');
header('Cache-Control: max-age=0');
 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');



?>