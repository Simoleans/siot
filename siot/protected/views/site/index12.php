<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<span class="ez">Bienvenidos al <?php echo CHtml::encode(Yii::app()->name); ?>.</span>
<div class="pd-inner">
	<div class='col-sm-4'>
		<div class="panel panel-primary">
			<div class="panel-heading">Info Data</div>
			<div class="panel-body">

				<?php
				
					$this->widget(
						'booster.widgets.TbHighCharts',
						array(
							'options' => array(
								'title' => array(
									'text' => 'Plantas : Estado Anzoategui',
									'x' => -20 //center
								),
								'series' => array(
									[
										'title' => 'hola', 
										'data' => [1, 2, 3, 4, 5, 1, 2, 1, 4, 3, 1, 5]
									]
								)
							)
						)
					);
				?>	
			</div>
		</div>
	</div>

	<div class='col-sm-4'>
		<div class="panel panel-primary">
			<div class="panel-heading">Info Data</div>
			<div class="panel-body">

			<?php
				
				$this->widget(
					'booster.widgets.TbHighCharts',
					array(
						'options' => array(
							'style' => array(
								'fontFamily' => 'serif',
							),
							
							'chart' => array(
								'type' => 'column',
							),	
						
							'title' => array(
								'text' => 'Producción Mensual por Rubro',
								'x' => -20 //center
							),
							'subtitle' => array(
								'text' => 'Año: 2016',
								'x' -20
							),
							'xAxis' => array(
								'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
							),
							'yAxis' => array(
								'title' => array(
									'text' =>  'Cantidad (Tm)',
								),
								'plotLines' => [
									[
										'value' => 0,
										'width' => 1,
										'color' => '#808080'
									]
								],
							),
							'tooltip' => array(
								'valueSuffix' => 'Tm'
							),
							'legend' => array(
								'layout' => 'vertical',
								'align' => 'right',
								'verticalAlign' => 'middle',
								'borderWidth' => 1,
								'shadow' => false
							),
							'series' => array(
								[
									'name' => 'London',
									'data' => [3.9, 11.2, 7.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
								]
							)
						)
					)
				);
			?>	
			</div>
		</div>
	</div>


	<div class='col-sm-4'>
		<div class="panel panel-primary">
			<div class="panel-heading">Info Data</div>
			<div class="panel-body">

				<?php
				
					$this->widget(
						'booster.widgets.TbHighCharts',
							array('options'=>array( 
								'chart' => array(
									'type' => 'pie',
								),
								'title'=> array('text'=>'Usuarios por Explorador'),
								'tooltip'=>array('formatter'=> 'js:function() { 
									return "<b>"+this.point.name+"</b>: "+Math.round(this.percentage)+"%"
								  }'),

								'credits' => array('enabled' => true),
								'exporting' => array('enabled' => true),
								'plotOptions'=>array('pie'=> array('allowPointSelect'=>true,'cursor'=>'pointer',
									'dataLabels'=>array('enabled'=>true),
									'showInLegend'=>true)
								),
							   'series' => array (
									array (
										'type' => 'pie',
										'name' => 'Browser share',
										'data' => array (
											array('Firefox', 44.2),
											array('IE7', 26.6),
											array('IE6', 20),
											array('Chrome', 3.1),
											array('Other', 5.4)
										)
									)
								)
							)
						)
												
					);
				?>	
			</div>
		</div>
	</div>
	<div class='col-sm-12'><br></div>
</div>










