<?php
/* @var $this PlantasController */
/* @var $model Plantas */

$this->breadcrumbs=array(
	'Plantas'=>array('index'),
	$model->nombre_planta,
);

$this->menu=array(
	array('label'=>'Listado de Plantas', 'url'=>array('index')),
	array('label'=>'Crear Planta', 'url'=>array('create')),
	array('label'=>'Modificar Planta', 'url'=>array('update', 'id'=>$model->id_planta)),
	array('label'=>'Eliminar Planta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_planta),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar Plantas', 'url'=>array('admin')),
);
?>

<span class="ez">Planta: <?php echo $model->nombre_planta; ?></span>
<div class="pd-inner">

	<?php $this->widget('booster.widgets.TbDetailView', array(
		'data'=>$model,
		'htmlOptions'=>array('class'=>'table table-striped responsive-table'),
		'attributes'=>array(
			/*'id_planta',
			'nombre_planta',*/
			'empresa.razon_social',
		'tipo.nombre_tipo',
			'estado.estado',
			'municipio.municipio',
			'parroquia.parroquia',
			/*
			'descripcion',
			'cap_inst',
			'cap_ope',
			'cap_alm',
			'alm_seco',
			'alm_frio',
			'alm_silo',
			'cant_lineas',
			'estatus_lineas',
			'cant_empleados',
			'longitud',
			'latitud',
			'activo',*/
			
		),
	)); ?>

	<?php $mod = $model->id_planta; ?>
	<?php $query=Yii::app()->db->createCommand("SELECT n.*,p.*,m.*,presentacion.* from producto_planta AS p 
		INNER JOIN productos AS n ON p.producto_id=n.id_producto  
		INNER JOIN marcas AS m ON m.id_marca=n.marca_id
		INNER JOIN presentacion AS presentacion  ON presentacion.id_presentacion=n.presentacion_id
		 where p.planta_id = '$mod'")->queryAll();
	 $contar = count($query);
	?>	
<?php if ($contar>0){?>
<br><br>
<table class="table table-bordered">	
	<thead>

	
		<tr class="danger" align="center">
			<td colspan="3">
				<b style="font-size: 18px;">Productos registrados en <?php echo $model->nombre_planta; ?> </b>
			</td>
		</tr>
		<tr>    <td class="warning"><b><i>Nombre de producto</td></i></b>
				<td class="warning"><b><i>Presentacion</td></i></b>
				<td class="warning"><b><i>Marca</td></i></b>
		</tr>
	</thead>
	<tbody>
		
	<?php foreach ($query as $planta) { ?>
		<tr align="center" class="success">
			<td>
				<b>
					<?php echo $planta['nombre_producto'];?>
				</b>
			</td>
	
		
			<td>
				<b>
					<?php echo $planta['nombre_presentacion'];?>
				</b>
			</td>
	
	
			<td>
				<b>
					<?php echo $planta['nombre_marca'];?>
				</b>
			</td>
		</tr>
		
		
	<?php } ?>




	</tbody>
</table>
<?php }else{
?>

<br></br>
<table class="table table-bordered">	
	<thead>

	
		<tr class="danger" align="center">
			<td colspan="3">
				<b style="font-size: 18px;">Productos registrados en <?php echo $model->nombre_planta; ?> </b>
			</td>
		</tr>
		<tr>    <td class="warning"><b><i>Nombre de producto</td></i></b>
				<td class="warning"><b><i>Presentacion</td></i></b>
				<td class="warning"><b><i>Marca</td></i></b>
		</tr>
	</thead>
	<tbody>
	<tr>
	<td colspan="3" class="success"><center><h2>NO HAY PRODUCTOS ASIGNADOS</h2></center></td>
	</tr>
	</tbody>
</table> 
<?php } ?>


</div>
