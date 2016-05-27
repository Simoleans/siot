<?php
$this->breadcrumbs=array(
	'Reportes'=>array('index'),
	$model->id_reporte=>array('view','id'=>$model->id_reporte),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Reportes','url'=>array('index')),
	array('label'=>'Create Reportes','url'=>array('create')),
	array('label'=>'View Reportes','url'=>array('view','id'=>$model->id_reporte)),
	array('label'=>'Manage Reportes','url'=>array('admin')),
	);
	?>

	<h1>Update Reportes <?php echo $model->id_reporte; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>