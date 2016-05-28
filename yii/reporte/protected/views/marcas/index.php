<?php
/* @var $this MarcasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Marcas',
);

$this->menu=array(
	array('label'=>'Crear Marca', 'url'=>array('create')),
	array('label'=>'Gestionar Marcas', 'url'=>array('admin')),
);
?>

<span class="ez"><b>Listado de Marcas</b></span>
<div class="pd-inner">
	<?php $this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_view',
	)); ?>
</div>
