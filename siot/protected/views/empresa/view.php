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
	<?php $mod = $model->id_empresa; ?>
	<?php $query=Yii::app()->db->createCommand("SELECT nombre_planta from plantas where empresa_id = '$mod'")->queryAll();
	 $contar = count($query);
	?>	
<?php if ($contar>0){?>
<br><br>
<table class="table table-bordered">	
	<thead>
		<tr class="danger" align="center">
			<td>
				<b style="font-size: 18px;">Plantas Adscritas</b>
			</td>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($query as $planta) { ?>
		<tr align="center">
			<td>
				<b>
					<?php echo $planta['nombre_planta'];?>
				</b>
			</td>
		</tr>
	<?php }?>
	</tbody>
</table>
<?php }?>
</div>
 