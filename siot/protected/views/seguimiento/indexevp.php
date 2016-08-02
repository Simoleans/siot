<?php

$this->breadcrumbs=array(
	'Produccion Por Empresa/Planta',
);
/*$this->menu=array(
  array('label'=>'Produccion Planta VS Meta', 'url'=>array('')),
  array('label'=>'Produccion Planta VS Historial', 'url'=>array('')),
  //array('label'=>'Produccion Mensual VS Cap. Operativa', 'url'=>array('')),
  //array('label'=>'Produccion Mensual VS Meta', 'url'=>array('')),
  
);*/

$usuario = Yii::app()->user->getId();
$modelUsuario=Usuarios::model()->find('id_usuario=:modelUsuario', array('modelUsuario'=>$usuario));
    $empresa = $modelUsuario->empresa_id;   
    
?>
<span class="ez"><label class="pull-left">Empresa/Plantas</label>
<hr>
<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
  'enableAjaxValidation'=>false,
)); ?>
<?php echo $form->errorSummary($model); ?>
  <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-3 col-xs-12">
          <?php // traer nada mas su empresa
                    $query = Yii::app()->db->createCommand("SELECT id_empresa,razon_social FROM empresa WHERE id_empresa<>999")->queryAll(); // fin de traer solamente su empresa
                    echo $form->dropDownList($model,'empresa_id',
                      CHtml::listData($query, 'id_empresa', 'razon_social'),
                        array(
                          'class' => 'form-control',
                          'style' => 'width:200px;',
                          'ajax'=>array(
                          'type'=>'POST',
                          'url'=>CController::createUrl('Seguimiento/SelectPlanta'),
                          'update'=>'#'.CHtml::activeId($model,'id_planta'),
                        
                          ),
                          'prompt'=>'SELECCIONE EMPRESA...'
                        )
                    ); ?>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-3 col-xs-12">       
                    <?php echo $form->dropDownList($model,'id_planta',
                        array(),
                        array('class' => 'form-control',
                              'style' => 'width:200px;',
                              'prompt'=>'SELECCIONE PLANTA...')
                        ); ?>       
                    <?php echo $form->error($model,'id_planta'); ?>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-1 col-xs-12">
                <button class="btn btn-primary" name="buscarp" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>        
  </div>  
<?php $this->endWidget(); ?>
</span>

<?php echo $this->renderPartial('_viewevp',array('model'=>$model)); ?>

