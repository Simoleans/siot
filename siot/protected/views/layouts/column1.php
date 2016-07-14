
<?php /* @var $this Controller */ ?>
<?php //$this->beginContent('//layouts/main'); ?>
<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="language" content="en">
		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
		
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main2.css">
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/Highcharts/jquery.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/datapicker/external/jquery.js"></script>
		
		

  		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/datapicker/jquery-ui.css">
  		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/datapicker/jquery-ui.min.css">
  		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/FA4.6/css/font-awesome.min.css">
  		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/datapicker/jquery-ui.structure.css">
  		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/datapicker/jquery-ui.structure.min.css">
  		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/datapicker/jquery-ui.theme.css">
  		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/datapicker/jquery-ui.theme.min.css">
  		<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/datapicker/jquery-ui.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/Highcharts/js/highcharts.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/Highcharts/js/modules/data.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/Highcharts/js/modules/drilldown.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/Highcharts/js/modules/exporting.js"></script>

		
	</head>
	<body>
		<div id="layout" class="col-xs-12 col-md-8 col-md-offset-2">
			<div id="barra" align="center">
				<img align="center" class="img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/barra.png">
			</div>
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
			<?php 
				$this->widget(
					'ext.yiibooster.widgets.TbNavbar',
					array(
						'type' => 'navbar',
						'brand' => '',
						'brandUrl' => '#',
						'collapse' => true,
						'fixed' => false,
						'fluid' => true,
						'items' => array(
							array(
								'class' => 'booster.widgets.TbMenu',
								'type' => 'navbar',
								'items'=>array(
									array('label'=>'Inicio', 'url'=>array('/site/index')),
									array('label'=>'Empresas','visible'=>Yii::app()->user->getState('roles') =='1', 'url'=>array('/empresa/index')),
									array('label'=>'Gestionar Plantas', 'visible'=>Yii::app()->user->getState('roles') =='1',
										'items'=>array(

											array('label'=>'Plantas', 'url'=>array('/plantas/index')),
											array('label'=>'Tipo de Plantas', 'url'=>array('/tipoPlanta/index')),
											//array('label'=>'Metas', 'url'=>array('')),
										),
									),
									array('label'=>'Gestionar Plantas', 'visible'=>Yii::app()->user->getState('roles') =='2',
										'items'=>array(
											array('label'=>'Plantas', 'url'=>array('/plantas/index')),
											array('label'=>'Tipo de Plantas', 'url'=>array('/tipoPlanta/index')),
											array('label'=>'Plantas-Producto', 'url'=>array('/productoPlanta/index')),
											//array('label'=>'Metas', 'url'=>array('')),
										),
									),								
									array('label'=>'Gestionar Productos', 'visible'=>Yii::app()->user->getState('roles') =='1',
										'items'=>array(
											array('label'=>'Rubros', 'url'=>array('/rubros/index')),
											array('label'=>'Marcas', 'url'=>array('/marcas/index')),
											array('label'=>'Medidas', 'url'=>array('/medida/index')),
											array('label'=>'Presentaciones', 'url'=>array('/presentacion/index')),
											array('label'=>'Productos', 'url'=>array('/productos/index')),
											
										),
									),
									array('label'=>'Gestionar Productos', 'visible'=>Yii::app()->user->getState('roles') =='2',
										'items'=>array(
											array('label'=>'Rubros', 'url'=>array('/rubros/index')),
											array('label'=>'Marcas', 'url'=>array('/marcas/index')),
											array('label'=>'Medidas', 'url'=>array('/medida/index')),
											array('label'=>'Presentaciones', 'url'=>array('/presentacion/index')),
											array('label'=>'Productos', 'url'=>array('/productos/index')),	
											
										),
									),								
								array('label'=>'Seguridad', 'visible'=>Yii::app()->user->getState('roles') =='1',
									'items'=>array(
										array('label'=>'Usuarios', 'url'=>array('/usuarios/index')),
										array('label'=>'Perfiles', 'url'=>array('/perfiles/index')),
									),
								),	
									array('label'=>'Reportes','visible'=>Yii::app()->user->getState('roles') =='1', 'url'=>array('/reportes/index')),
									array('label'=>'Reportes','visible'=>Yii::app()->user->getState('roles') =='2', 'url'=>array('/reportes/index')),
									array('label'=>'Reportes','visible'=>Yii::app()->user->getState('roles') =='3', 'url'=>array('/reportes/index')),
									//array('label'=>'Contacto','visible'=>Yii::app()->user->isGuest, 'url'=>array('/site/contact')),
									//array('label'=>'Iniciar Sesión', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
									//array('label'=>'Salir ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
									array('label'=>'Seguimiento', 'visible'=>Yii::app()->user->getState('roles') =='4',
										'items'=>array(
											array('label'=>'Produccion Por Empresa', 'url'=>array('/seguimiento/index')),
											array('label'=>'Produccion Por Empresa/Planta', 'url'=>array('/seguimiento/indexevp')),
											array('label'=>'Produccion Por Regiones', 'url'=>array('/seguimiento/indexreg')),
											array('label'=>'Produccion Por Rubro', 'url'=>array('/seguimiento/indexrub')),
											array('label'=>'Produccion Por Productos', 'url'=>array('/seguimiento/indexpro')),

										),
									),
									array('label'=>'Seguimiento', 'visible'=>Yii::app()->user->getState('roles') =='2',
										'items'=>array(
											//array('label'=>'Produccion Por Empresa', 'url'=>array('/seguimiento/index')),
											array('label'=>'Produccion Por Empresa/Planta', 'url'=>array('/seguimiento/indexevp')),
											//array('label'=>'Produccion Por Regiones', 'url'=>array('/seguimiento/indexreg')),
											array('label'=>'Produccion Por Rubro', 'url'=>array('/seguimiento/indexrub')),
											array('label'=>'Produccion Por Productos', 'url'=>array('/seguimiento/indexpro')),
										),
								),	
									array('label'=>'Base de datos', 'visible'=>Yii::app()->user->getState('roles') =='5',
										'items'=>array(
											array('label'=>'Administracion BD', 'url'=>array('/BD/index')),
										
											
										),
									),											
								),
							),
						
							array(
								'class' => 'booster.widgets.TbMenu',
								'type' => 'navbar',
								'htmlOptions' => array('class' => 'pull-right'),
								'items' => array(

									array('label'=>'Iniciar Sesión', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
									array(
										'label' => Yii::app()->user->name, 'visible'=>!Yii::app()->user->isGuest,
										'url' => '#',
										'items' => array(
											array('label' => 'Perfil', 'url' => array('/perfil/index')),
											'---',
											array('label'=>'Salir', 'url'=>array('/site/logout')),
											
										)
									),
								),
							),
						),
					)
				);	
			?>
		</div>
		<div id="layout" class="col-xs-12 col-md-8 col-md-offset-2">
			<div class="container-fluid" id="page">
				<div class="row">	
					<div id="layout" class="col-xs-12 col-md-12">
						<div id="content">
							<?php echo $content; ?>
						</div>
					</div>
					<div id="layout" class="col-xs-12 col-md-12">
						<div class="back" id="footer">
							<div class="center-block">
								<img align="center" class="img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo-foot.png">
							</div>
							<br>
							<p>&copy; <?php echo date('Y'); ?> - Corporación Venezolana de Alimentos.</p>
							<p>G-20009365-0</p>
						</div><!-- footer -->	
					</div>
				</div>
				
				<div class="clear"></div>		
				
			</div>
		</div>

		
	</body>
</html>

