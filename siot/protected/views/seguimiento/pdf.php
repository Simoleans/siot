<?php
	$this->layout='//layouts/column1';
	$id = $model->id_producto;
    $nombre = $model->nombre_producto;
  //consulta para traerme la produccion por producto mediante el id sociado a la tabla reportes

$pdf = Yii::createComponent('application.extensions.mpdf.mpdf');
$html='<h3 style="text-align:center;">Reporte '.$nombre.'</h3>
<table cellspacing="0" width="100%"  border="1" class="table">
<thead>
	<tr style="background-color:#E39595;">
		<th>Producto</th>
		<th>Produccion</th>
		<th>Descripcion</th>
		<th>Fecha</th>
	</tr>
</thead>';

 

		

   
        
      
    $results = Yii::app()->db->createCommand("SELECT * FROM reportes WHERE producto_id='".$id."' ORDER BY fecha_reporte DESC limit 7")->queryAll();
        $contar = count($results);

    if ($contar>0){
   				$html.='<tbody>';
   				foreach($results as $r):
				$html.='<tr>
					<td>'.$nombre.'</td>
					<td>'.$r["produccion"].'</td>
					<td>'.$r["descripcion"].'</td>
					<td>'.date("d-m-Y",strtotime($r["fecha_reporte"])).'</td>
				</tr>';
      endforeach;
 }else{

  	$html.='<tr><td colspan="5"><center><h3>No hay produccion</h3></center></td></tr>';
  }

      $html.='</tbody></table>';

      


      
$header='<img src="'.Yii::app()->request->baseUrl.'/images/barra.png"/> <hr>';
$mpdf=new mPDF('win-1252','LETTER','','',15,15,25,12,5,7);
$mpdf->SetHTMLHeader($header);
$mpdf->SetHTMLHeader($header);
$mpdf->SetTitle('Seguimiento-Producto');
//$mpdf->SetProtection(array(), 'SIOT', 'siot');
$mpdf->SetAuthor('SIOT');
$mpdf->SetCreator('HernandezYBarrios');
$mpdf->SetFooter(' {DATE j/m/Y}|Página {PAGENO}/{nbpg}|MinPPAL-SIOT');
$mpdf->WriteHTML($html);
$mpdf->Output('reportes'.date('Y-m-d').'.pdf','I');
exit;
?>