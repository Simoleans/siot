<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<span class="ez" align="center">Bienvenidos al <?php echo CHtml::encode(Yii::app()->name); ?></span>


<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img style="width: 900px;height: 600px; padding-left: 400px;" src="<?php echo Yii::app()->request->baseUrl; ?>/images/Region/1.png" alt="central">
      <div class="carousel-caption">
     
      </div>
    </div>
    <div class="item">
      <img style="width: 1300px;height: 600px; padding-left: 100px;" src="<?php echo Yii::app()->request->baseUrl; ?>/images/Region/2.png" alt="llanos">
      <div class="carousel-caption">
        ...
      </div>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Siguiente</span>
  </a>
</div>