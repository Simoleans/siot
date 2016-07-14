<?php

//error_reporting(E_ERROR | E_WARNING | E_PARSE);
$this->breadcrumbs=array(
	'Produccion Por Productos'=>array('indexpro'),
	$model->nombre_producto,
);
?>


<?php 
	if (Yii::app()->user->getState('roles') == '2') 
	{ 
		$this->layout='//layouts/column1';
	}
?>





<h1><?=$hola?></h1>


