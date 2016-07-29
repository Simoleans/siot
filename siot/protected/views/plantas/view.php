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
<?php //'success'  'error'  'notice'            
        $flashMessages = Yii::app()->user->getFlashes();
        if ($flashMessages) {   
                foreach($flashMessages as $key => $message) {
                        echo '<h3><div class="flash-' . $key . '" style="color:red; text-align:center">' . $message . "</div></h3>\n";
                                
                    
                        
                }
        }
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

	<table class="table table-striped responsive-table  table-condensed table-bordered">
	<tr class="even">
				<td>
				<strong>Ficha de planta <?=$model->nombre_planta?></strong></td>
					<td><a  name="respaldar" class="btn btn-danger pull-left"  href="../../pdf/id/<?php echo $model->id_planta?>"><i class="fa fa-file-pdf-o fa-lg" aria-hidden="true"></i> Imprimir</a></td>
	</tr>
								    
				</table>

	



