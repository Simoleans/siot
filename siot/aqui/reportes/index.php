<?php
$this->breadcrumbs=array(
	'Reportes',
);


$this->menu=array(
array('label'=>'Crear Reporte','url'=>array('create'), 'visible'=>Yii::app()->user->getState('roles') =='3'),
array('label'=>'Gestionar Reportes','url'=>array('admin'), 'visible'=>Yii::app()->user->getState('roles') =='1'),
);

?>

<span class="ez">Listado de Reportes</span>
<div class="pd-inner">
<?php $this->widget('booster.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</div>
