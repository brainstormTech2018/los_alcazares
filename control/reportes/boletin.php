<?php 
require_once('../../libs/pdf/mpdf.php');

    $DB_SERVER = 'localhost';
    $DB_USERNAME ='root';
    $DB_PASSWORD = '';
    $DB_NAME ='colegio_alcazares';

$link = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

  $alumno = $_POST['alumno'];
  $docente = $_POST['docente'];

  $sql = "SELECT nota_academico, nota_personal, nota_soacial, nota_promedio,concat(estudiante_nombre,' ',estudiante_apellido) as nombre, tbl_estudiantes.curso_codigo as ciclo, tbl_cursos.docente_documento, concat(tbl_docentes.docente_nombre,' ',tbl_docentes.docente_apellido) as docente, tbl_notas.nota_observacion FROM tbl_notas INNER JOIN tbl_estudiantes on tbl_notas.estudiante_codigo = tbl_estudiantes.estudiante_documento INNER JOIN tbl_cursos on tbl_cursos.curso_codigo = tbl_estudiantes.curso_codigo INNER JOIN tbl_docentes on tbl_cursos.docente_documento = tbl_docentes.docente_documento where tbl_notas.docente_codigo = $docente and tbl_notas.estudiante_codigo = $alumno";
  

    $prepare = $link->prepare($sql);
    $prepare->execute();
    $resulSet = $prepare->get_result();
    while($productos[] = $resulSet->fetch_array());
    $resulSet->close();
    $link->close();

    if($productos[0][0] != ""){

$promedioSocial = 0;
$promedioPersonal = 0;
$promedioAcademico = 0;
$observaciones = "";
for ($i=0; $i < 7; $i++) { 
  $promedioSocial = $promedioSocial + $productos[$i][2];
  $promedioPersonal = $promedioPersonal + $productos[$i][1];
  $promedioAcademico = $promedioAcademico + $productos[$i][0];
  $observaciones.= " - <br>".$productos[$i][8];

}

$promSocial = round(($promedioSocial / 7),PHP_ROUND_HALF_UP);
$promPersonal = round(($promedioPersonal / 7),PHP_ROUND_HALF_UP);
 $promAcademico = round(($promedioAcademico / 7),PHP_ROUND_HALF_UP);


$promGral = round((($promPersonal + $promSocial + $promAcademico)/3),PHP_ROUND_HALF_UP);
 
 $sqlMateria = "SELECT tbl_materias.materia_nombre FROM tbl_asignacion INNER JOIN tbl_docentes ON tbl_asignacion.docente_documento = tbl_docentes.docente_documento INNER JOIN tbl_materias on tbl_materias.materia_codigo = tbl_asignacion.materia_codigo where tbl_asignacion.curso_codigo = ".$productos[0][5]." and tbl_asignacion.docente_documento = $docente";
$link2 = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$prepare2 = $link2->prepare($sqlMateria);
    $prepare2->execute();
    $resulSet2 = $prepare2->get_result();
    while($materia[] = $resulSet2->fetch_array());
    $resulSet2->close();
    $link2->close();
$html = '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" media="all" />
  </head>
  <body>
    <header class="clearfix">
    <div id="logo">
        BOLETIN DE DESEMPEÑO 2018 - 1
      </div>
        <div id="company">
        <h2 class="name">Colegio Los Alcázares</h2>
        <div>Res. 01847 de 09 DIC 2004</div>
        <div>Calle 5 # 9-09</div>
        <div>Tel. 8205441</div>
      </div>
     
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">Area:</div>
          <h2 class="name">'.$materia[0][0].'</h2>
          <div class="address"></div>
          <div class="email"><a href="">Ciclo: '.$productos[0][5].'</a></div>
        </div>
        <div id="invoice">
           <div class="email"><strong style="color: black;">Estudiante:</strong>
          '.$productos[0][4].'</div>
          <div class="date"><strong style="color: black;">Tutor:</strong> '.$productos[0][7].'</div>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">Semanas</th>
            <th class="desc">1</th>
            <th class="unit">2</th>
            <th class="desc">3</th>
            <th class="unit">4</th>
            <th class="desc">5</th>
            <th class="unit">6</th>
            <th class="desc">7</th>
            <th class="unit">Definitiva</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th class="no">Académico</th>
            <td class="desc">'.$productos[0][0].'</th>
            <td class="unit">'.$productos[1][0].'</th>
            <td class="desc">'.$productos[2][0].'</th>
            <td class="unit">'.$productos[3][0].'</th>
            <td class="desc">'.$productos[4][0].'</th>
            <td class="unit">'.$productos[5][0].'</th>
            <td class="desc">'.$productos[6][0].'</th>
            <td class="unit">'.$promAcademico.'<strong style="color:red;">';
            if($promAcademico <= 2.9){
              $html.=" BAJO";
            }else if($promAcademico >= 3.0 && $promAcademico <= 3.9 ){
              $html.=" BÁSICO";
            }else if($promAcademico >= 4.0 && $promAcademico <= 4.5){
              $html.=" ALTO";
            }else if($promAcademico >= 4.6 && $promAcademico <= 5.0){
              $html.=" SUPERIOR";
            }
            $html.='</strong></th>
          </tr>
          <tr>
            <th class="no">Personal</th>
            <td class="desc">'.$productos[0][1].'</th>
            <td class="unit">'.$productos[1][1].'</th>
            <td class="desc">'.$productos[2][1].'</th>
            <td class="unit">'.$productos[3][1].'</th>
            <td class="desc">'.$productos[4][1].'</th>
            <td class="unit">'.$productos[5][1].'</th>
            <td class="desc">'.$productos[6][1].'</th>
            <td class="unit">'.$promPersonal.'<strong style="color:red;">';
if($promPersonal <= 2.9){
              $html.=" BAJO";
            }else if($promPersonal >= 3.0 && $promPersonal <= 3.9 ){
              $html.=" BÁSICO";
            }else if($promPersonal >= 4.0 && $promPersonal <= 4.5){
              $html.=" ALTO";
            }else if($promPersonal >= 4.6 && $promPersonal <= 5.0){
              $html.=" SUPERIOR";
            }
            $html.='</strong></th>
          </tr>
          <tr>
            <th class="no">Social</th>
            <td class="desc">'.$productos[0][2].'</th>
            <td class="unit">'.$productos[1][2].'</th>
            <td class="desc">'.$productos[2][2].'</th>
            <td class="unit">'.$productos[3][2].'</th>
            <td class="desc">'.$productos[4][2].'</th>
            <td class="unit">'.$productos[5][2].'</th>
            <td class="desc">'.$productos[6][2].'</th>
            <td class="unit">'.$promSocial.'<strong style="color:red;">';
            if($promSocial <= 2.9){
              $html.=" BAJO";
            }else if($promSocial >= 3.0 && $promSocial <= 3.9 ){
              $html.=" BÁSICO";
            }else if($promSocial >= 4.0 && $promSocial <= 4.5){
              $html.=" ALTO";
            }else if($promSocial >= 4.6 && $promSocial <= 5.0){
              $html.=" SUPERIOR";
            }

            $html.='</strong></th>
          </tr>
          <tr>
            <th class="no">Promedio</th>
            <td class="desc">'.$productos[0][3].'</th>
            <td class="unit">'.$productos[1][3].'</th>
            <td class="desc">'.$productos[2][3].'</th>
            <td class="unit">'.$productos[3][3].'</th>
            <td class="desc">'.$productos[4][3].'</th>
            <td class="unit">'.$productos[5][3].'</th>
            <td class="desc">'.$productos[6][3].'</th>
            <td class="unit"><strong>'.$promGral.'<strong><strong style="color:red;">';
            if($promGral <= 2.9){
              $html.=" BAJO";
            }else if($promGral >= 3.0 && $promGral <= 3.9 ){
              $html.=" BÁSICO";
            }else if($promGral >= 4.0 && $promGral <= 4.5){
              $html.=" ALTO";
            }else if($promGral >= 4.6 && $promGral <= 5.0){
              $html.=" SUPERIOR";
            }
            $html.='</strong></th></th>
          </tr>
         
        </tbody>
         </table>
      <table border="0" cellspacing="0" cellpadding="0">
          <tr>
            <th class="no">Observaciones</th>
            <td class="desc">'.$observaciones.'</th>
          </tr>      
     </table>

     <table>
     	   <tr>
            <td colspan="5"></td>
            <td colspan="2">1,0 - 2,9</td>
            <td>NO APROBADO BAJO</td>
          </tr>
          <tr>
            <td colspan="5"></td>
            <td colspan="2">3,0 - 3,9</td>
            <td>APROBADO BÁSICO</td>
          </tr>
          <tr>
            <td colspan="5"></td>
            <td colspan="2">4,0 - 4,5</td>
            <td>APROBADO ALTO</td>
          </tr>
          <tr>
            <td colspan="5"></td>
            <td colspan="2">4,6 - 5.0</td>
            <td>APROBADO SUPERIOR</td>
          </tr>
        
       </table>

    </main>
    
  </body>
</html>';
}else{
  $html = "<h1>NO SE REGISTRA BOLETIN</h1>";
}
$mpdf = new mPDF('c','A5');
$css = file_get_contents("style.css");

$mpdf->writeHTML($css,1);
    $mpdf->writeHTML($html);
    $mpdf->Output('boletin'.$documento.'.pdf', 'I'); 










 ?>