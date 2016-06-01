<?php

$this->breadcrumbs=array(
	'Produccion Por Empresa',
);

$this->menu=array(
	array('label'=>'Produccion Empresa VS Empresa', 'url'=>array('indexeve')),
	array('label'=>'Produccion Empresa VS Historial', 'url'=>array('indexevh')),
	//array('label'=>'Produccion Mensual VS Cap. Operativa', 'url'=>array('')),
	//array('label'=>'Produccion Mensual VS Meta', 'url'=>array('')),
	
);
?>

<span class="ez">Estatus de Empresas</span>
<div class="pd-inner">
	<?php $this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_view',
	)); ?>
</div>
