<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="es">

		<!-- blueprint CSS framework -->
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">

		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
	    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/tables/media/js/jquery.js"></script>

		<title><?php echo CHtml::encode($this->pageTitle); ?></title>

  		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/tables/media/css/jquery.dataTables.css">
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/datapicker/jquery-ui.css">
  		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/datapicker/jquery-ui.min.css">
  		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/FA4.6/css/font-awesome.min.css">
  		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/datapicker/jquery-ui.structure.css">
  		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/datapicker/jquery-ui.structure.min.css">
  		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/datapicker/jquery-ui.theme.css">
  		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/datapicker/jquery-ui.theme.min.css">
  		<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/datapicker/jquery-ui.min.js"></script>
  		<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/datapicker/APIcalendario.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/Highcharts/js/highcharts.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/Highcharts/js/modules/data.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/Highcharts/js/modules/drilldown.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/Highcharts/js/modules/exporting.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/tables/media/js/jquery.dataTables.min.js"></script>

</head>

<script type="text/javascript">
 // Para desaparecer el mensaje flash
setTimeout(function() {
$(".content").fadeOut("slow");
},1400);

function confirmar(index)
        {
    if (!confirm("ALERTA!! va a proceder a vaciar la tabla de bitacora , antes haga un respaldo en PDF, si desea vaciarla de click en ACEPTAR\n de lo contrario de click en CANCELAR.")) {
            return false;
        }else {
    document.location = index;
        return true;
        }
}

$(document).ready(function(){ // buscar en tabla
    // Write on keyup event of keyword input element
    $("#kwd_search").keyup(function(){
        // When value of the input is not blank
        if( $(this).val() != "")
        {
            // Show only matching TR, hide rest of them
            $("#my-table tbody>tr").hide();
            $("#my-table td:contains-ci('" + $(this).val() + "')").parent("tr").show();
        }
        else
        {
            // When there is no input or clean again, show everything back
            $("#my-table tbody>tr").show();
        }
    });
});
// jQuery expression for case-insensitive filter
$.extend($.expr[":"], 
{
    "contains-ci": function(elem, i, match, array) 
    {
        return (elem.textContent || elem.innerText || $(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
    }
});// fin buscar en tabla
</script>

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
								//array('label'=>'Quiénes Somos', 'url'=>array('/site/page', 'view'=>'about')),
								array('label'=>'Empresas','visible'=>Yii::app()->user->getState('roles') =='1', 'url'=>array('/empresa/index')),
								array('label'=>'Gestionar Plantas', 'visible'=>Yii::app()->user->getState('roles') =='1',
									'items'=>array(
										array('label'=>'Tipo de Plantas', 'url'=>array('/tipoPlanta/index')),									
										array('label'=>'Plantas', 'url'=>array('/plantas/index')),
										//array('label'=>'Plantas-Producto', 'url'=>array('/productoPlanta/index')),
										//array('label'=>'Metas', 'url'=>array('')),
									),
								),
								array('label'=>'Gestionar Plantas', 'visible'=>Yii::app()->user->getState('roles') =='2',
									'items'=>array(
										array('label'=>'Tipo de Plantas', 'url'=>array('/tipoPlanta/index')),									
										array('label'=>'Plantas', 'url'=>array('/plantas/index')),
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
											array('label'=>'Status de Empresa', 'url'=>array('/seguimiento/index')),
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

								array('label'=>'Bitacora del sistema', 'url'=>array('/bd/bitacora'), 'visible'=>Yii::app()->user->getState('roles') =='5',
										
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
			
				<div id="layout" class="col-xs-12 col-md-2">
					<div align="center">
						<span class="ez">Menú</span>
						
						<div class="menu_item">
							<?php
								$this->widget('ext.yiibooster.widgets.TbMenu', array(
									'type'=>'list',
									'items'=>$this->menu,
								));
							?>	
						</div>
					</div>
				</div>

				<div id="layout" class="col-xs-12 col-md-10">
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
