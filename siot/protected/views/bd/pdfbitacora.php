<?php

//$report = Yii::app()->db->createCommand("SELECT r.*,u.*,p.id_producto,p.nombre_producto from reportes AS r INNER JOIN usuarios AS u ON r.usuario_id=u.id_usuario INNER JOIN productos AS p ON r.producto_id=p.id_producto")->queryAll();

$pdf = Yii::createComponent('application.extensions.mpdf.mpdf');
$html='<h3 style="text-align:center;">Bitacora SIOT</h3>
<style>

thead th{

  background-color: skyblue;
}
    
</style>
<table cellspacing="0" width="100%"  border="1">
<thead>
	<tr>
            <th>ID</th>
            <th>TABLA</th>
            <th>ACCION</th>
            <th>DESCRIPCION</th>
            <th>FECHA</th>
        </tr>
</thead>';
foreach ($bitacora as $b) {

  $html.='<tbody>
  <tr>
  	                       <td class="center">B-'.$b['id_bitacora'].'</td>
        									<td class="center">'.$b['tabla'].'</td>
        									<td class="center">'.$b['accion'].'</td>
        									<td class="center">'.$b['descripcion'].'</td>
        									<td class="center">'.$b['fecha'].'</td>
  </tr></tbody>';


}
  $html.='
  </table>
';
$header='<img src="'.Yii::app()->request->baseUrl.'/images/barra.png"/> <hr><br><br>';
$mpdf=new mPDF('win-1252','LETTER','','',15,15,25,12,5,7);
$mpdf->SetHTMLHeader($header);
$mpdf->SetFooter(' {DATE j/m/Y}|Página {PAGENO}/{nbpg}|MinPPAL-SIOT');
$mpdf->WriteHTML($html);
$mpdf->Output('reportes'.date('Y-m-d').'.pdf','I');
exit;
?>