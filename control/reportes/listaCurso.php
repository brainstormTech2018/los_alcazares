<?php 
session_start();
require '../../libs/excell/Classes/PHPExcel.php';
$curso = $_GET['curso'];
$documento = $_GET['documento'];

$hoy = getdate();

$conexion = new mysqli('localhost','root','','colegio_alcazares',3306);
if (mysqli_connect_errno()) {
   printf("La conexión con el servidor de base de datos falló: %s\n", mysqli_connect_error());
   exit();
}


$consulta = "SELECT concat(estudiante_nombre,' ',estudiante_apellido)q, estudiante_documento FROM `tbl_estudiantes` WHERE estudiante_documento = $documento";
$resultado = $conexion->query($consulta);

 

if($resultado->num_rows > 0 ){

	$objPHPExcel = new PHPExcel();

	// Se asignan las propiedades del libro
$objPHPExcel->getProperties()->setCreator("Los alcazares") // Nombre del autor
    
    ->setTitle("BOLETIN DE DESEMPEÑOS  ".$hoy['year']) // Titulo
    ->setDescription("Reporte de alumnos"); //Descripción
    


 $tituloReporte = "BOLETIN DE DESEMPEÑOS ".$hoy['year'];
 $titulosColumnas = array('SEMANA','DOCUMENTO', 'ACADEMICO', 'PERSONAL', 'SOCIAL', 'PROMEDIO', 'CICLO', 'OBSERVACION');

// Se combinan las celdas A1 hasta D1, para colocar ahí el titulo del reporte
$objPHPExcel->setActiveSheetIndex(0)
    ->mergeCells('A1:H1')
    ->mergeCells('A2:D2')
    ->mergeCells('E2:H2');

// Se agregan los titulos del reporte
    $fila = $resultado->fetch_array();
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1',$tituloReporte) // Titulo del reporte
    ->setCellValue('A2',"Nombre: ".$fila['q'])
    ->setCellValue('E2',"Ciclo: ".$curso)
    ->setCellValue('A3',  $titulosColumnas[0])  //Titulo de las columnas
    ->setCellValue('B3',  $titulosColumnas[1])
    ->setCellValue('C3',  $titulosColumnas[2])
    ->setCellValue('D3',  $titulosColumnas[3])
    ->setCellValue('E3',  $titulosColumnas[4])
    ->setCellValue('F3',  $titulosColumnas[5])
    ->setCellValue('G3',  $titulosColumnas[6])
    ->setCellValue('H3',  $titulosColumnas[7]);


    //Se agregan los datos de los alumnos
 
 $i = 4; //Numero de fila donde se va a comenzar a rellenar
 do {
  
     $objPHPExcel->getActiveSheet()
         ->setCellValue('A'.$i, ''.$i-3)
         ->setCellValue('B'.$i, $fila['estudiante_documento'])
         ->setCellValue('C'.$i, '0')
         ->setCellValue('D'.$i, '0')
         ->setCellValue('E'.$i, '0')
         ->setCellValue('F'.$i, '=((sum(C'.$i.':E'.$i.'))/3)')
         ->setCellValue('G'.$i, $curso);
     
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

$objPHPExcel->getActiveSheet()->getStyle('A1:H1')->applyFromArray($estiloTituloReporte);
$objPHPExcel->getActiveSheet()->getStyle('A2:H2')->applyFromArray($estiloTituloColumnas);
$objPHPExcel->getActiveSheet()->getStyle('A3:H3')->applyFromArray($estiloTituloColumnas);

$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A4:H".($i-1));

for ($j=0; $j < $i ; $j++) { 
   $objPHPExcel->getActiveSheet()->getStyle('F'.$j)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_00);
   $objPHPExcel->getActiveSheet()->getStyle('C'.$j.':F'.$j)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_00);
   
   $objPHPExcel->getActiveSheet()->getStyle('A'.$j.':B'.$j)->getProtection()->setLocked(
         PHPExcel_Style_Protection::PROTECTION_PROTECTED
    );
   
}

for($i = 'A'; $i <= 'H'; $i++){
    $objPHPExcel->setActiveSheetIndex(0)->getColumnDimension($i)->setAutoSize(TRUE);
}

// Se asigna el nombre a la hoja
$objPHPExcel->getActiveSheet()->setTitle('Alumnos');
 
// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
$objPHPExcel->setActiveSheetIndex(0);
 
// Inmovilizar paneles
//$objPHPExcel->getActiveSheet(0)->freezePane('A4');


// Se manda el archivo al navegador web, con el nombre que se indica, en formato 2007
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="'.$fila['q'].'.xlsx"');
header('Cache-Control: max-age=0');
 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
}
else{
    print_r('No hay resultados para mostrar');
}
 ?>
