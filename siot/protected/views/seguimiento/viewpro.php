<?php

//error_reporting(E_ERROR | E_WARNING | E_PARSE);
$this->breadcrumbs=array(
	'Produccion Por Productos'=>array('indexpro'),
	$model->nombre_producto,
);
?>

<?php $this->widget('booster.widgets.TbDetailView', array(
    'data'=>$model,
    'attributes'=>array(),
)); ?>

<?php $this->renderPartial('Partials/_contenidopro', array('model'=>$model)); ?>




