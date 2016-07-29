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
<?php //'success'  'error'  'notice'      

        $flashMessages = Yii::app()->user->getFlashes();
        if ($flashMessages) {   
                foreach($flashMessages as $key => $message) {
                        echo '<div class="flash-' . $key . ' content" style=" text-align:center">' . $message . "</div>";             
                }
        }

?>
<div class="pd-inner">
	<?php $this->widget('ext.yiibooster.widgets.TbListView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_view',
	)); ?>
</div>
<script> // Para desaparecer el mensaje flash
$(document).ready(function() {
    setTimeout(function() {
        $(".content").fadeOut("slow");
    },1500);
});
</script>