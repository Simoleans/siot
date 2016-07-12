<?php $usuario = Yii::app()->user->getId();?>	

<?php $result = Yii::app()->db->createCommand("SELECT u.*,p.nombre_perfil,p.id_perfil,pl.id_planta,pl.nombre_planta,e.razon_social,e.id_empresa from usuarios AS u INNER JOIN perfiles AS p ON u.perfil_id=p.id_perfil 
INNER JOIN plantas AS pl ON u.planta_id=pl.id_planta INNER JOIN empresa AS e ON u.empresa_id=e.id_empresa where id_usuario='$usuario'")->queryAll(); ?>






					
<?php foreach ($result as $usu) { ?>
	
<?php if($usu['nombre_perfil']=="ADM. EMPRESA"){$perfil="Administrador de empresa";}else{$perfil=$usu['nombre_perfil'];} ?>
<?php if($usu['id_perfil']=="1"){$msg="El usuario ADMINISTRADOR DEBE PERTENECER A UNA EMPRESA, PERO NO A UNA PLANTA";} ?>
<table border="4">

	<thead>
	<tr>
		<td class="text-center" colspan="5" style="background-color: #F76E6E; font-size: 15px;">Datos personales</td>
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
		<td class="text-center" colspan="2" style="background-color: #F76E6E; font-size: 15px;">Datos asociados a empresa</td>
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

<h1>Reportes hechos por ti</h1>

<div style="clear:both"></div>
<hr/>

<div class="table-responsive">

<table class="table example table-hover" >
    <tr>
        <th>ID</th>
       
        <th>PRODUCTO</th>
        <th>PRODUCCION</th>
        <th>DESCRIPCION</th>
        <th>FECHA</th>
       
    </tr>

    <?php $usuarios = Yii::app()->db->createCommand("SELECT r.*,p.id_producto,p.nombre_producto from reportes AS r INNER JOIN productos AS p ON r.producto_id=p.id_producto where usuario_id='$usuario'")->queryAll(); ?>
    

<?php foreach ($usuarios as $usuario) {  if($usuario['descripcion']==NULL){$descripcion="No hay descripcion";}else{$descripcion=$usuario['descripcion'];}?>
    <tr>
    
        <td><?=$usuario["id_reporte"]?></td>
        
        <td><?php echo $usuario["nombre_producto"] ?></td>	
							
        <td><?=number_format($usuario["produccion"],1,",",".")?> KG</td>
        <td><?=$descripcion?></td>
        <td><?=$usuario["fecha_reporte"]?></td>
        
    </tr>
<?php } ?>
</table>
</div>


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
        'maxButtonCount'=>"2:2", //Rango de links de paginas a mostrar 
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

