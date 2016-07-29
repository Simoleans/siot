<?php


$pdf = Yii::createComponent('application.extensions.MPDF.mpdf');
$html='';


$header='<img src="'.Yii::app()->request->baseUrl.'/images/barra.png"/> <hr>';
$mpdf=new mPDF('win-1252','LETTER','','',15,15,25,12,5,7);
$mpdf->SetHTMLHeader($header);
$mpdf->SetFooter(' {DATE j/m/Y}|Página {PAGENO}/{nbpg}|MinPPAL-SIOT');
$mpdf->WriteHTML($html);
$mpdf->Output('report'.date('Y-m-d').'.pdf','I');
exit;
?>