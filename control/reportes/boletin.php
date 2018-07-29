<?php 
require_once('../../libs/pdf/mpdf.php');

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
          <h2 class="name">CALCULO</h2>
          <div class="address"></div>
          <div class="email"><a href="">Ciclo: 6,2</a></div>
        </div>
        <div id="invoice">
           <div class="email"><strong style="color: black;">Estudiante:</strong>
          Sebastian Peña Perafan</div>
          <div class="date"><strong style="color: black;">Tutor:</strong> Maria Fernanda Campo Dorado</div>
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
            <td class="desc">1</th>
            <td class="unit">2</th>
            <td class="desc">3</th>
            <td class="unit">4</th>
            <td class="desc">5</th>
            <td class="unit">6</th>
            <td class="desc">7</th>
            <td class="unit">8 <strong style="color:red;">BAJO</strong></th>
          </tr>
          <tr>
            <th class="no">Personal</th>
            <td class="desc">1</th>
            <td class="unit">2</th>
            <td class="desc">3</th>
            <td class="unit">4</th>
            <td class="desc">5</th>
            <td class="unit">6</th>
            <td class="desc">7</th>
              <td class="unit">8 <strong style="color:red;">BAJO</strong></th>
          </tr>
          <tr>
            <th class="no">Social</th>
            <td class="desc">1</th>
            <td class="unit">2</th>
            <td class="desc">3</th>
            <td class="unit">4</th>
            <td class="desc">5</th>
            <td class="unit">6</th>
            <td class="desc">7</th>
            <td class="unit">8 <strong style="color:red;">BAJO</strong></th>
          </tr>
          <tr>
            <th class="no">Promedio</th>
            <td class="desc">1</th>
            <td class="unit">2</th>
            <td class="desc">3</th>
            <td class="unit">4</th>
            <td class="desc">5</th>
            <td class="unit">6</th>
            <td class="desc">7</th>
            <td class="unit">8 <strong style="color:red;">BAJO</strong></th>
          </tr>
          <tr>
            <th class="no">Inasistencia</th>
            <td class="desc">1</th>
            <td class="unit">2</th>
            <td class="desc">3</th>
            <td class="unit">4</th>
            <td class="desc">5</th>
            <td class="unit">6</th>
            <td class="desc">7</th>
            <td class="unit">8 <strong style="color:red;">BAJO</strong></th>
          </tr>
        </tbody>
         </table>
      <table border="0" cellspacing="0" cellpadding="0">
          <tr>
            <th class="no">Observaciones</th>
            <td class="desc">El estudiante presenta una inasistencia constantes, esto se ve reflejado en su rendimiento académico, se solicita l presencia de los padres de familia y/o acudientes lo mas pronto posible.</th>
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
$mpdf = new mPDF('c','A5');
$css = file_get_contents("style.css");

$mpdf->writeHTML($css,1);
    $mpdf->writeHTML($html);
    $mpdf->Output('boletin'.$documento.'.pdf', 'I'); 









 ?>