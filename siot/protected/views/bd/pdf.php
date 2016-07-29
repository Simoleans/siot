<?php

$report = Yii::app()->db->createCommand("SELECT r.*,u.*,p.id_producto,p.nombre_producto from reportes AS r 
  INNER JOIN usuarios AS u ON r.usuario_id=u.id_usuario INNER JOIN productos AS p ON r.producto_id=p.id_producto")->queryAll();

$pdf = Yii::createComponent('application.extensions.mpdf.mpdf');
$html='<h3 style="text-align:center;">Reportes SIOT</h3>
<style>
thead th{

  background-color: skyblue;
}


    
</style>
<table cellspacing="0" width="100%"  border="1">
<thead>
	<tr>
		
		<th>Usuario</th>
		<th>Producto</th>
		<th>Produccion</th>
		<th>Descripcion</th>
		<th>Fecha</th>
	</tr>
	</thead>';
foreach ($report as $re) {  if($usuario['descripcion']==NULL){$descripcion="No hay descripcion";}else{$descripcion=$usuario['descripcion'];}
$fecha = substr($re['fecha_reporte'],0,10);

  $html.='<tr>
  	<td>'.$re['nombre'].'</td>

        									<td>'.$re['nombre_producto'].'</td>

        									<td>'.number_format($re["produccion"],1,",",".").'</td>
        									<td>'.$re['descripcion'].'</td>
        									<td>'.$fecha.'</td>
  <tr>';


}
  $html.='
  </table>
';
$header='<img src="'.Yii::app()->request->baseUrl.'/images/barra.png"/> <hr>';
$mpdf=new mPDF('win-1252','LETTER','','',15,15,25,12,5,7);
$mpdf->SetHTMLHeader($header);
$mpdf->SetFooter(' {DATE j/m/Y}|Página {PAGENO}/{nbpg}|MinPPAL-SIOT');
$mpdf->WriteHTML($html);
$mpdf->Output('reportes'.date('Y-m-d').'.pdf','I');
exit;
?>