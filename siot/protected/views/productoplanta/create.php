<?php
$this->breadcrumbs=array(
	'Producto Asociados'=>array('index'),
	'Asociar Producto a Planta',
);

$this->menu=array(
array('label'=>'Productos Asociados','url'=>array('index')),
array('label'=>'Gestionar Productos Asociados','url'=>array('admin')),
);
?>

<span class="ez"><b>Asociar Producto a Planta</b></span>
<div class="pd-inner">
	<?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>