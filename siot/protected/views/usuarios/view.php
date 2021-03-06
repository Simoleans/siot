<?php
$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->nombre,
);

$this->menu=array(
array('label'=>'Listado de Usuarios','url'=>array('index')),
array('label'=>'Crear Usuario','url'=>array('create'), 'visible'=>Yii::app()->user->getState('roles') =='1'),
array('label'=>'Modificar Usuario','url'=>array('update','id'=>$model->id_usuario), 'visible'=>Yii::app()->user->getState('roles') =='1'),
array('label'=>'Eliminar Usuario','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_usuario),'confirm'=>'Are you sure you want to delete this item?'), 'visible'=>Yii::app()->user->getState('roles') =='1'),
array('label'=>'Gestionar Usuarios','url'=>array('admin'), 'visible'=>Yii::app()->user->getState('roles') =='1'),
array('label'=>'Crear Usuario','url'=>array('create'), 'visible'=>Yii::app()->user->getState('roles') =='2'),
array('label'=>'Modificar Usuario','url'=>array('update','id'=>$model->id_usuario), 'visible'=>Yii::app()->user->getState('roles') =='2'),
array('label'=>'Eliminar Usuario','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_usuario),'confirm'=>'Are you sure you want to delete this item?'), 'visible'=>Yii::app()->user->getState('roles') =='2'),
array('label'=>'Gestionar Usuarios','url'=>array('admin'), 'visible'=>Yii::app()->user->getState('roles') =='2'),

);
?>

<span class="ez">Usuario: <?php echo $model->nombre; ?> <?php echo $model->apellido; ?> [<?php echo $model->usuario; ?>]</span>
<div class="pd-inner">
	<?php $this->widget('booster.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
			'cedula',
			'usuario',
			'nombre',
			'apellido',		
			'fecha_nac',
			'correo',
			'telefono',		
			'perfil.nombre_perfil',
			'empresa.razon_social',
			'planta.nombre_planta',
			/*
			'id_usuario',
			'sede_id',
			'gerencia_id',
			'contraseña',
			'activo',
			*/
			'fecha_registro',
	),
	)); ?>
</div>

<div id="statusMsg">
<?php //'success'  'error'  'notice'            
        $flashMessages = Yii::app()->user->getFlashes();
        if ($flashMessages) {   
                foreach($flashMessages as $key => $message) {
                        echo '<h4><div class="flash-' . $key . '" style="color:red; text-align:center">' . $message . "</div></h4>\n";

                          //Mensaje con un alert de script      
                        /*echo "<script language='JavaScript'>
                                        alert('".$message."');
                                        </script>";*/
                        
                }
        }
                ?>
</div>

