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
	array('label'=>'Eliminar Empresa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_empresa),'confirm'=>'¿desea eliminar esta empresa?')),
	array('label'=>'Gestionar Empresas', 'url'=>array('admin')),
);
?>

<span class="ez">Empresa: <?php echo $model->razon_social; ?></span>
<div class="pd-inner">
	<?php $this->widget('booster.widgets.TbDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			/*'id_empresa',*/
			'razon_social',
			'direccion',
			'rif',
			'telefono',
			'contacto',
			'correo',
			/*'activo',*/
			'fecha_registro',
		),
	)); ?>
<?php 
 		$id = $model->id_empresa;
    	$nombre = $model->razon_social;
    	$f = array();

  //consulta para traerme la produccion por producto mediante el id sociado a la tabla reportes
    $results = Yii::app()->db->createCommand("SELECT empresa.id_empresa,plantas.empresa_id
    FROM plantas INNER JOIN empresa ON empresa.id_empresa = plantas.empresa_id
    WHERE plantas.empresa_id = '".$id."' ")->queryAll();

    ?>

    <?php 

     	echo join($f,",");
    	
    ?>

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




</div>
