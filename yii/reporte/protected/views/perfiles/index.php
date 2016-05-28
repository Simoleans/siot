<?php
/* @var $this PerfilesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Listado de Perfiles',
);

$this->menu=array(
	array('label'=>'Crear Perfil', 'url'=>array('create')),
	array('label'=>'Gestionar Perfiles', 'url'=>array('admin')),
);
?>

<span class="ez">Listado de Perfiles</span>
<div class="pd-inner">
	<?php $this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_view',
	)); ?>
</div>
