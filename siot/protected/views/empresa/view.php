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
	array('label'=>'Eliminar Empresa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_empresa),'confirm'=>'desea eliminar?')),
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
			/*'activo',*/
			'fecha_registro',
		),
	)); ?>
<hr>

	<?php $id_empresa = CHtml::encode($model->id_empresa);?>
	<?php $query=Yii::app()->db->createCommand("SELECT * from plantas where empresa_id='$id_empresa'")->queryAll();?>
	<table class="table" border="1">
		<tr>
	<td  style="background-color:skyblue"><center><h4>Plantas adscritas a la empresa <?php echo $model->razon_social; ?> </h4></center><td>
</tr>
	
	<?php foreach ($query as $consul) { ?>
		<tr>
			
	<td class="text-center"><h5><?php echo $consul['nombre_planta'];?></h5></td>
			
		</tr>


	<?php } ?>
</table>
</div>
