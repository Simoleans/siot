<?php
if (isset($_POST['buscarp'])) {
		foreach ($_POST['Plantas'] as $var) {
			$idplanta = $var;
		}
		$results1 = Yii::app()->db->createCommand("SELECT plantas.nombre_planta,rubros.*,SUM(produccion) as prod
                            FROM reportes 
                            INNER JOIN productos ON productos.id_producto=reportes.producto_id
                            INNER JOIN rubros ON rubros.id_rubro=productos.rubro_id
                            INNER JOIN producto_planta ON producto_planta.producto_id=productos.id_producto 
                            INNER JOIN plantas ON plantas.id_planta=producto_planta.planta_id 
                            INNER JOIN empresa ON empresa.id_empresa=plantas.empresa_id WHERE plantas.id_planta='".$idplanta."'
                            GROUP BY id_rubro")->queryAll();
		$contar = count($results1);
			foreach ($results1 as $res) {
				$rub []= $res['nombre_rubro'];
				$planta = $res['nombre_planta'];
			}
		if ($contar==0) {
			//require("");
			echo "<div class='alert alert-danger alert-dismissible' role='alert' align='center'>
				  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				  	<span aria-hidden='true'>&times;</span>
				  </button>
					  <b class='badge'>$contar</b> 
					  <b>Resultados Encontrados</b>
				</div>";
		}else{
			require("Partials/HC/HCcolumnabasica.php");
			echo "<div id='empresaplanta'></div>";
			require("Partials/tabla_rub_empresa.php");
		}
}

?>