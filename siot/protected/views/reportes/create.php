<?php
$this->breadcrumbs=array(
	'Reportes'=>array('index'),
	'Crear Reporte',
);


$this->menu=array(
array('label'=>'Listado de Reportes','url'=>array('index')),
array('label'=>'Gestionar Reportes','url'=>array('admin'), 'visible'=>Yii::app()->user->getState('roles') =='1'),
);

?>

<span class="ez"><b>Crear Reporte</b></span>
<div class="pd-inner">
	<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>