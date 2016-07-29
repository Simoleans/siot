<?php
/* @var $this RubrosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Rubros',
);

$this->menu=array(
	array('label'=>'Crear Rubro', 'url'=>array('create')),
	array('label'=>'Gestionar Rubros', 'url'=>array('admin')),
);
?>

<span class="ez"><b>Listado de Rubros</b></span>
<div class="pd-inner">
	<?php $this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_view',
	)); ?>
</div>
