<?php
/* @var $this EmpresaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Empresas',
);

$this->menu=array(
	array('label'=>'Crear Empresa', 'url'=>array('create')),
	array('label'=>'Gestionar Empresas', 'url'=>array('admin')),
);
?>

<span class="ez">Listado de Empresas</span>
<div class="pd-inner">
	<?php

	
	 for($i=0; $i <400 ; $i++) { 

	 	echo "<br>".$i;
		
	} ?>
</div>
