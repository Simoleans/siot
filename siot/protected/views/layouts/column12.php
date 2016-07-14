<?php /* @var $this Controller */ ?>
<?php //$this->beginContent('//layouts/main'); ?>
<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="language" content="en">

		<!-- blueprint CSS framework -->
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
		<!--[if lt IE 8]>
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
		<![endif]-->

		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/login.css">

		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	</head>

	<body>
	
		<div id="layout" class="col-xs-12 col-md-8 col-md-offset-2">
			<div id="barra" align="center">
				<img align="center" class="img-responsive" src="<?php echo Yii::app()->request->baseUrl; ?>/images/barra.png">
			</div>		
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
										array('label'=>'Metas', 'url'=>array('')),
									),
								),
								array('label'=>'Gestionar Plantas', 'visible'=>Yii::app()->user->getState('roles') =='2',
									'items'=>array(
										array('label'=>'Plantas', 'url'=>array('/plantas/index')),
										array('label'=>'Tipo de Plantas', 'url'=>array('/tipoPlanta/index')),
										array('label'=>'Metas', 'url'=>array('')),
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
										array('label'=>'Menús', 'url'=>array('')),
										array('label'=>'Perfiles', 'url'=>array('/perfiles/index')),
										array('label'=>'Menú-Perfil', 'url'=>array('')),
									),
								),
								array('label'=>'Seguridad', 'visible'=>Yii::app()->user->getState('roles') =='2',
									'items'=>array(
										array('label'=>'Usuarios', 'url'=>array('/usuarios/index')),
										array('label'=>'Menús', 'url'=>array(''),'visible'=>Yii::app()->user->getState('roles') =='1'),
										array('label'=>'Perfiles', 'url'=>array('/perfiles/index'),'visible'=>Yii::app()->user->getState('roles') =='1'),
										array('label'=>'Menú-Perfil', 'url'=>array(''),'visible'=>Yii::app()->user->getState('roles') =='1'),
									),
								),									
								array('label'=>'Reportes','visible'=>!Yii::app()->user->isGuest, 'url'=>array('/reportes/index')),
								array('label'=>'Contacto','visible'=>Yii::app()->user->isGuest, 'url'=>array('/site/contact')),
								//array('label'=>'Iniciar Sesión', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
								//array('label'=>'Salir ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
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
										array('label' => 'Perfil', 'url' => '#'),
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
