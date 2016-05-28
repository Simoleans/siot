<?php
/* @var $this EmpresaController */
/* @var $model Empresa */

$this->breadcrumbs=array(
	'Empresas'=>array('index'),
	$model->razon_social,
);

$this->menu=array(
	array('label'=>'Listado de Empresas', 'url'=>array('index')),
	array('label'=>'Crear Empresa', 'url'=>array('create')),
	array('label'=>'Modificar Empresa', 'url'=>array('update', 'id'=>$model->id_empresa)),
	array('label'=>'Eliminar Empresa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_empresa),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar Empresas', 'url'=>array('admin')),
);
?>

<span class="ez">Empresa: <?php echo $model->razon_social; ?></span>
<div class="pd-inner">
	<?php $this->widget('booster.widgets.TbDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			/*'id_empresa',
			'razon_social',*/
			'direccion',
			'rif',
			'telefono',
			'contacto',
			'correo',
			/*'activo',
			'fecha_registro',*/
		),
	)); ?>
</div>
