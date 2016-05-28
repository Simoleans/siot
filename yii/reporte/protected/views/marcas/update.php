<?php
/* @var $this MarcasController */
/* @var $model Marcas */

$this->breadcrumbs=array(
	'Marcases'=>array('index'),
	$model->nombre_marca=>array('view','id'=>$model->id_marca),
	'Modificar Marca',
);

$this->menu=array(
	array('label'=>'Listado de Marcas', 'url'=>array('index')),
	array('label'=>'Crear Marca', 'url'=>array('create')),
	array('label'=>'Ver Marca', 'url'=>array('view', 'id'=>$model->id_marca)),
	array('label'=>'Gestionar Marcas', 'url'=>array('admin')),
);
?>

<span class="ez"><b>Modificar Marca: <?php echo $model->nombre_marca; ?></b></span>
<div class="pd-inner">
	<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>