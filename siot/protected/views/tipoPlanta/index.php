<?php
/* @var $this TipoPlantaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo de Plantas',
);

$this->menu=array(
	array('label'=>'Crear Tipo de Planta', 'url'=>array('create')),
	array('label'=>'Gestionar Tipos de Plantas', 'url'=>array('admin')),
);
?>

<span class="ez">Listado de Tipos de Plantas</span>
<div class="pd-inner">
	<?php $this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_view',
	)); ?>
</div>
