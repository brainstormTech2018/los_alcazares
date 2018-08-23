<?php 
session_start();
require '../../libs/excell/Classes/PHPExcel.php';


$DB_SERVER = 'localhost';
    $DB_USERNAME ='root';
    $DB_PASSWORD = '';
    $DB_NAME ='colegio_alcazares';

$link = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);


$sql = "SELECT `estudiante_id`, `estudiante_tipoDocumento`, `estudiante_documento`, `estudiante_nombre`, `estudiante_apellido`, `estudiante_activo`, `estudiante_direccion`, `estudiante_correo`, `estudiante_telefono`, `curso_codigo`, `estudiante_jornada` FROM `tbl_estudiantes`";
 $prepare = $link->prepare($sql);
    $prepare->execute();
    $resulSet = $prepare->get_result();
    while($productos[] = $resulSet->fetch_array());
    $resulSet->close();
    $link->close();
    
    $hoy = getdate();
    $objPHPExcel = new PHPExcel();

 
for ($positionInExcel=0; $positionInExcel < sizeof($productos)-1 ; $positionInExcel++) { 
        $titulo = $productos[$positionInExcel]['curso_codigo'];

       
    $objPHPExcel->createSheet($positionInExcel);

    $objPHPExcel->getProperties()->setCreator("Los alcazares") // Nombre del autor
    
    ->setTitle("REPORTE DE ALUMNOS  ".$hoy['year']) // Titulo
    ->setDescription("Reporte de alumnos"); //Descripción
    


 $tituloReporte = "LISTADO GENERAL DE ALUMNOS ".$hoy['year'];
 $titulosColumnas = array('NOMBRE','APELLIDO', 'ESTADO');

// Se combinan las celdas A1 hasta D1, para colocar ahí el titulo del reporte
$objPHPExcel->setActiveSheetIndex($positionInExcel)
    ->mergeCells('A1:C1')
    ->mergeCells('A2:C2');
    

    // Se agregan los titulos del reporte
    //$fila = $resultado->fetch_array();
$objPHPExcel->setActiveSheetIndex($positionInExcel)
    ->setCellValue('A1',$tituloReporte) // Titulo del reporte
    
    ->setCellValue('A2',  'CICLO: '.$Titulo)  //Titulo de las columnas
    ->setCellValue('A3',  $titulosColumnas[0])
    ->setCellValue('B3',  $titulosColumnas[1])
    ->setCellValue('C3',  $titulosColumnas[2]);
 
 $i = 3; //Numero de fila donde se va a comenzar a rellenar
 do {
  
     $objPHPExcel->getActiveSheet()
         ->setCellValue('A'.$i, $productos[$positionInExcel]['estudiante_nombre'])
         ->setCellValue('B'.$i, $productos[$positionInExcel]['estudiante_apellido'])
         ->setCellValue('C'.$i, $productos[$positionInExcel]['estudiante_estado']);
       
     $i++;
 }while ($i <= 10); 

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

$objPHPExcel->getActiveSheet()->getStyle('A1:C1')->applyFromArray($estiloTituloReporte);
$objPHPExcel->getActiveSheet()->getStyle('A2:C2')->applyFromArray($estiloTituloColumnas);
$objPHPExcel->getActiveSheet()->getStyle('A3:C3')->applyFromArray($estiloTituloColumnas);

$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A4:C".($i-1));



for($i = 'A'; $i <= 'C'; $i++){
    $objPHPExcel->setActiveSheetIndex($positionInExcel)->getColumnDimension($i)->setAutoSize(TRUE);
}

// Se asigna el nombre a la hoja
$objPHPExcel->getActiveSheet()->setTitle($titulo);
 


}

$objPHPExcel->setActiveSheetIndex(0);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="prueba.xlsx"');
header('Cache-Control: max-age=0');
 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');

 ?>
