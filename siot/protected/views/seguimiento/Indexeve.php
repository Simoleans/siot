<?php

$this->breadcrumbs=array(
	'Produccion Por Empresa'=>array('index'),
);

$this->menu=array(
	array('label'=>'Produccion Empresa VS Empresa', 'url'=>array('')),
	array('label'=>'Produccion Empresa VS Historial', 'url'=>array('')),
	//array('label'=>'Produccion Mensual VS Cap. Operativa', 'url'=>array('')),
	//array('label'=>'Produccion Mensual VS Meta', 'url'=>array('')),
	
);
?>

<span class="ez">Produccion Por Empresa VS Empresa</span>
<div class="pd-inner">
	<?php $this->renderPartial('_vieweve', array('model'=>$model)); ?>
</div>