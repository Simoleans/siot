<?php
/* @var $this PlantasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Plantas',
);

$this->menu=array(
	array('label'=>'Crear Planta', 'url'=>array('create')),
	array('label'=>'Gestionar Plantas', 'url'=>array('admin')),
);
?>


<script type="text/javascript"> // Para desaparecer el mensaje flash
$(document).ready(function() {
    setTimeout(function() {
        $(".content").fadeOut("slow");
    },1500);
});
</script>


<span class="ez">Listado de Plantas</span>
<?php //'success'  'error'  'notice'      

        $flashMessages = Yii::app()->user->getFlashes();
        if ($flashMessages) {   
                foreach($flashMessages as $key => $message) {
                        echo '<div class="flash-' . $key . ' content" style=" text-align:center">' . $message . "</div>";             
                }
        }

?>
<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbListView',array(
    	'dataProvider'=>$dataProvider,
    	'itemView'=>'_view',
    )); ?>
</div>
