<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;?>
      <?php $usuario = Yii::app()->user->getId();?>   
      <?php $result = Yii::app()->db->createCommand("SELECT razon_social,nombre_planta,nombre,apellido FROM empresa
                              INNER JOIN plantas ON empresa.id_empresa=plantas.empresa_id
                              INNER JOIN usuarios ON empresa.id_empresa=usuarios.empresa_id
                              AND plantas.id_planta=usuarios.planta_id
                              WHERE id_usuario = '".$usuario."' LIMIT 1")->queryAll();
        $contar = count($result);
        foreach ($result as $r) {
          $empresa = $r["razon_social"];
          $planta = $r["nombre_planta"];
          $nombre = $r["nombre"];
          $apellido = $r["apellido"];
        }
      ?>  
      <?php if($contar>0) {?>
        <?php
          $admin = "<b>ADMINISTRADOR </b>"."<b style='text-transform:uppercase; color:#8E1010;'>".$nombre."&nbsp;".$apellido."</b>"."<b> EMPRESA </b>"."<b style='text-transform:uppercase;color:#8E1010;'>".$empresa."</b>"."<b> PLANTA </b>"."<b style='text-transform:uppercase;color:#8E1010;'>".$planta."</b>";

          $admine = "<b>ADMINISTRADOR DE EMPRESA </b>"."<b style='text-transform:uppercase; color:#8E1010;'>".$nombre."&nbsp;".$apellido."</b>"."<b> EMPRESA </b>"."<b style='text-transform:uppercase;color:#8E1010;'>".$empresa."</b>"."<b> PLANTA </b>"."<b style='text-transform:uppercase;color:#8E1010;'>".$planta."</b>";

          $analista = "<b>ANALISTA </b>"."<b style='text-transform:uppercase; color:#8E1010;'>".$nombre."&nbsp;".$apellido."</b>"."<b> EMPRESA </b>"."<b style='text-transform:uppercase;color:#8E1010;'>".$empresa."</b>"."<b> PLANTA </b>"."<b style='text-transform:uppercase;color:#8E1010;'>".$planta."</b>";

          $seguimiento = "<b>SEGUIDOR DE PRODUCCION  </b>"."<b style='text-transform:uppercase; color:#8E1010;'>".$nombre."&nbsp;".$apellido."</b>"."<b> EMPRESA </b>"."<b style='text-transform:uppercase;color:#8E1010;'>".$empresa."</b>"."<b> PLANTA </b>"."<b style='text-transform:uppercase;color:#8E1010;'>".$planta."</b>";

          $bd = "<b>ADMINISTRADOR DE LA BD </b>"."<b style='text-transform:uppercase; color:#8E1010;'>".$nombre."&nbsp;".$apellido."</b>"."<b> EMPRESA </b>"."<b style='text-transform:uppercase;color:#8E1010;'>".$empresa."</b>"."<b> PLANTA </b>"."<b style='text-transform:uppercase;color:#8E1010;'>".$planta."</b>";
        ?>
        <div class='alert alert-success alert-dismissible' role='alert'   align='center'>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
          <?php 
            if(Yii::app()->user->getState('roles') =='1'){echo "<p align='center'><i class='fa fa-user' aria-hidden='true'></i> $admin</p>";}
            if(Yii::app()->user->getState('roles') =='2'){echo "<p align='center'><i class='fa fa-user' aria-hidden='true'></i> $admine</p>";}
            if(Yii::app()->user->getState('roles') =='3'){echo "<p align='center'><i class='fa fa-user' aria-hidden='true'></i> $analista</p>";}
            if(Yii::app()->user->getState('roles') =='4'){echo "<p align='center'><i class='fa fa-user' aria-hidden='true'></i> $seguimiento</p>";}
            if(Yii::app()->user->getState('roles') =='5'){echo "<p align='center'><i class='fa fa-user' aria-hidden='true'></i> $bd</p>";}
          ?>
        </div>
      <?php }?>
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