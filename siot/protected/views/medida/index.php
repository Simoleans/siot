<?php
/* @var $this MedidaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Medidas',
);

$this->menu=array(
	array('label'=>'Crear Medida', 'url'=>array('create')),
	array('label'=>'Gestionar Medidas', 'url'=>array('admin')),
);
?>

<span class="ez">Listado de Medidas</span>
<div class="pd-inner">
	<?php $this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_view',
	)); ?>
</div>
