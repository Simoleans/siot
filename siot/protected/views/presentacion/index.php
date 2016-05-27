<?php
/* @var $this PresentacionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Presentaciones',
);

$this->menu=array(
	array('label'=>'Crear Presentacion', 'url'=>array('create')),
	array('label'=>'Gestionar Presentaciones', 'url'=>array('admin')),
);
?>

<span class="ez">Listado de Presentaciones</span>
<div class="pd-inner">
	<?php $this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_view',
	)); ?>
</div>
