<?php
$this->breadcrumbs=array(
	'Usuarios',
);

$this->menu=array(
array('label'=>'Crear Usuario','url'=>array('create'), 'visible'=>Yii::app()->user->getState('roles') =='1'),
array('label'=>'Crear Usuario','url'=>array('create'), 'visible'=>Yii::app()->user->getState('roles') =='2'),
array('label'=>'Gestionar Usuarios','url'=>array('admin'), 'visible'=>Yii::app()->user->getState('roles') =='1'),
array('label'=>'Gestionar Usuarios','url'=>array('admin'), 'visible'=>Yii::app()->user->getState('roles') =='2'),
);
?>

<span class="ez">Listado de Usuarios</span>
<div class="pd-inner">
	<?php $this->widget('booster.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	)); ?>
</div>
