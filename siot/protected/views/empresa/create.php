<?php
/* @var $this EmpresaController */
/* @var $model Empresa */

$this->breadcrumbs=array(
	'Empresas'=>array('index'),
	'Crear Empresa',
);

$this->menu=array(
	array('label'=>'Listado de Empresas', 'url'=>array('index')),
	array('label'=>'Gestionar Empresas', 'url'=>array('admin')),
);
?>

<span class="ez">Crear Empresa</span>
<div class="pd-inner">

	<?php $this->renderPartial('_form', array('model'=>$model)); ?>

</div>