<?php
/* @var $this GerenciaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Gerencias',
);

$this->menu=array(
	array('label'=>'Create Gerencia', 'url'=>array('create')),
	array('label'=>'Manage Gerencia', 'url'=>array('admin')),
);
?>

<h1>Gerencias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
