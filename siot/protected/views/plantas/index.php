<?php
/* @var $this PlantasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Plantas',
);

$this->menu=array(
	array('label'=>'Crear Planta', 'url'=>array('create')),
	array('label'=>'Gestionar Plantas', 'url'=>array('admin')),
);
?>

<span class="ez">Listado de Plantas</span>
<div class="pd-inner">
<?php $this->widget('booster.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</div>
