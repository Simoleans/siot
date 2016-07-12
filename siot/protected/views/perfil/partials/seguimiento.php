<?php $result = Yii::app()->db->createCommand("SELECT u.*,p.nombre_perfil,p.id_perfil,pl.id_planta,pl.nombre_planta,e.* from usuarios AS u INNER JOIN perfiles AS p ON u.perfil_id=p.id_perfil 
INNER JOIN plantas AS pl ON u.planta_id=pl.id_planta INNER JOIN empresa AS e ON u.empresa_id=e.id_empresa where id_usuario='$usuario'")->queryAll(); ?>






					
<?php foreach ($result as $usu) { ?>
	
<?php if($usu['nombre_perfil']=="ADM. EMPRESA"){$perfil="Administrador de empresa";}else{$perfil=$usu['nombre_perfil'];} ?>
<?php if($usu['id_perfil']=="1"){$msg="El usuario ADMINISTRADOR DEBE PERTENECER A UNA EMPRESA , PERO NO A UNA PLANTA";} ?>
<table border="4">

	<thead>
	<tr>
		<td class="text-center" colspan="5" style="background-color: #F76E6E; font-size: 20px;">Datos personales</td>
	</tr>
		<tr>
		
			<td class="text-center"><strong>Nombre y Apellido</td>
			<td class="text-center"><strong>Cedula</td>
			<td class="text-center"><strong>Correo</td>
			<td class="text-center"><strong>Tlf</td>
			<td class="text-center"><strong>Cargo</td>

		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?php echo $usu['nombre'];?>  <?php echo $usu['apellido']; ?></td>
			<td><?php echo $usu['cedula'];?></td>
			<td><?php echo $usu['correo'];?></td>
			<td><?php echo $usu['telefono'];?></td>
			<td><?php echo $perfil;?></td>
		</tr>
	</tbody>

</table>

<br>

<table border="4">

	<thead>
	<tr>
		<td class="text-center" colspan="2" style="background-color: #F76E6E; font-size: 20px;">Datos asociados a empresa</td>
	</tr>
		<tr>
		
			<td class="text-center"><strong>Empresa</td>
			<td class="text-center"><strong>Planta</td>
		

		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?php echo $usu['razon_social'];?></td>
			<td><?php echo $usu['nombre_planta'];?></td>
			
		</tr>
	</tbody>

</table>


<?php $result = Yii::app()->db->createCommand("SELECT u.*,p.nombre_perfil,p.id_perfil,pl.id_planta,pl.nombre_planta,e.* from usuarios AS u INNER JOIN perfiles AS p ON u.perfil_id=p.id_perfil 
INNER JOIN plantas AS pl ON u.planta_id=pl.id_planta INNER JOIN empresa AS e ON u.empresa_id=e.id_empresa where id_usuario='$usuario'")->queryAll(); ?>




<?php } ?>

<?php 
if(!isset($_GET["page"])){
    $_GET["page"]=1;
}
//Pinta los enlaces del paginador
$this->widget(
    'CLinkPager', 
    array(
        'pages' => $pages,
        'maxButtonCount'=>"3:3", //Rango de links de paginas a mostrar 
        'header' =>"<div class='paginacion'>",
        'footer' =>"</div>",
        'nextPageLabel'=>"Siguiente",
        'prevPageLabel'=>"Anterior",
        "firstPageLabel"=>"Primera",
        "lastPageLabel"=>"Última",
        "selectedPageCssClass"=>"active",
        "hiddenPageCssClass"=>"disable",
        "htmlOptions"=>array("class"=>"pagination"),
    )
);
?>