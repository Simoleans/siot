<?php
	$this->layout='//layouts/column1';
	$id = $model->id_planta;
    $nombre = $model->nombre_planta;
  //consulta para traerme la produccion por producto mediante el id sociado a la tabla reportes

//validaciones
    if ($model->cap_ope==NULL) {$model->cap_ope="Vacio";}
		if ($model->cap_alm==NULL) {$model->cap_alm="Vacio";}  
		if ($model->cap_inst==NULL) {$model->cap_inst="Vacio";} 
		if ($model->alm_seco==NULL) {$model->alm_seco="Vacio";}
		if ($model->alm_frio==NULL) {$model->alm_frio="Vacio";}
		if ($model->alm_silo==NULL) {$model->alm_silo="Vacio";}
		if ($model->longitud==NULL) {$model->longitud="Vacio";}
		if ($model->latitud==NULL) {$model->latitud="Vacio";}   
		if ($model->descripcion==NULL) {$model->descripcion="Sin Descripcion";}
		if ($model->cant_lineas==0) {$model->estatus_lineas="NO";$model->activo="NO";}
		if ($model->cant_empleados==NULL) {$model->cant_empleados=0;}  
		//fin validaciones 
     $results = Yii::app()->db->createCommand("SELECT p.*,e.estado,pa.parroquia,m.municipio,em.razon_social,tp.nombre_tipo FROM plantas AS p INNER JOIN estado AS e ON p.estado_id=e.id_estado
     INNER JOIN municipio AS m ON p.municipio_id=m.id_municipio INNER JOIN parroquia AS pa ON p.parroquia_id=pa.id_parroquia INNER JOIN empresa AS em ON p.empresa_id=em.id_empresa INNER JOIN tipo_planta AS tp on p.tipo_id=tp.id_tipo  WHERE id_planta='".$id."'")->queryAll(); // traigo las plantas con municipios y parroquias
        $contar = count($results);

$pdf = Yii::createComponent('application.extensions.mpdf.mpdf');
$html='<h3 style="text-align:center;">Ficha descriptiva de planta '.$nombre.'</h3>
<table cellspacing="0" width="100%"  border="1" class="table" align="center">
<tr>
<td WIDTH="50"  HEIGHT="50" style="background-color: #FF6262"><strong>NOMBRE</strong></td>
<td colspan="5">'.$nombre.'</td><
/tr>';
foreach($results as $pl){
$html.='<tr>
				<td  WIDTH="50"  HEIGHT="50" style="background-color: #FF6262"><strong>ESTADO</strong></td>
				<td WIDTH="50"  HEIGHT="50" >'.$pl["estado"].'</td>
				<td WIDTH="50"  HEIGHT="50"  style="background-color: #FF6262"><strong>MUNICIPIO</strong></td>
				<td WIDTH="50"  HEIGHT="50" >'.$pl["municipio"].'</td>
				<td WIDTH="50"  HEIGHT="50"  style="background-color: #FF6262"><strong>PARROQUIA</strong></td>
				<td WIDTH="50"  HEIGHT="50" >'.$pl["parroquia"].'</td>
		</tr>
			<tr><td colspan="6" WIDTH="40"  HEIGHT="40" style="background-color: #FF6262"><center><strong>ORGANISMO RESPONSABLE</strong></center></td></tr>
			<tr><td colspan="6"><center>'.$pl["razon_social"].'</center></td></tr>
	<tr>
			<td style="background-color: #FF6262" rowspan="4"><strong>CAPACIDADES</strong></td>
		<td>
			<tr>
				<td><strong>Operativa:</strong></td>
				<td colspan ="4">'.$model->cap_ope.' <strong>TM/MES</strong></td>
			</tr>
			<tr>
					<td><strong>Instalada:</strong></td>
					<td colspan ="4">'.$model->cap_inst.' <strong>TM/MES</strong></td>
			</tr>
			<tr>
					<td><strong>Almacenamiento:</strong></td>
					<td colspan ="4">'.$model->cap_alm.' <strong>TM</strong></td>
			</tr>
		</td>
	</tr>
	<tr>
	<td colspan="6" style="background-color: #FF6262" WIDTH="40"  HEIGHT="40"><strong><center>ALMACENAMIENTO</center></strong></td></tr>
	<tr>
	<td colspan="2"><strong><center>SECO</center></strong></td>
	<td colspan="2"><strong><center>SILO</center></strong></td>
	<td colspan="2"><strong><center>FRIO</center></strong></td>
	</tr>
	<tr>
	<td colspan="2"><center>'.$model->alm_seco.'</center></td>
	<td colspan="2"><center>'.$model->alm_silo.'</center></td>
	<td colspan="2"><center>'.$model->alm_frio.'</center></td>
	</tr>
	<tr>
	<td WIDTH="50"  HEIGHT="50" style="background-color: #FF6262"><strong>NUMERO DE TRABAJADORES</strong></td>
	<td>'.$model->cant_empleados.' Trabajadores</td>
	<td WIDTH="50"  HEIGHT="50" style="background-color: #FF6262"><strong>CANTIDAD DE LINEAS</strong></td>
	<td>'.$model->cant_lineas.' Lineas</td>
	<td WIDTH="50"  HEIGHT="50" style="background-color: #FF6262"><strong>ESTATUS DE LINEAS</strong></td>
	<td>'.$model->estatus_lineas.' Lineas</td>
	</tr>
	<tr>
	<td colspan="6" style="background-color: #FF6262" WIDTH="40"  HEIGHT="40"><strong><center>COORDENADAS</center></strong></td></tr>
	<tr>
	<td colspan="3"><strong><center>LONGITUD</center></strong></td>
	<td colspan="3"><strong><center>LATITUD</center></strong></td>
	</tr>
	<tr>
	<td colspan="3"><center>'.$model->longitud.'</center></td>
	<td colspan="3"><center>'.$model->latitud.'</center></td>
	</tr>
	<tr>
	<td WIDTH="50"  HEIGHT="50" style="background-color: #FF6262"><strong>STATUS DE PLANTA</strong></td>
	<td >'.$model->activo.' </td>
	<td WIDTH="50"  HEIGHT="50" style="background-color: #FF6262" colspan="2"><strong>TIPO DE PLANTA</strong></td>
	<td colspan="2">'.$pl["nombre_tipo"].' </td>
	</tr>
	<tr>
	<td colspan="6" style="background-color: #FF6262" WIDTH="40"  HEIGHT="40"><strong><center>DESCRIPCION</center></strong></td>
	</tr>
	<tr>
	<td colspan="6"><center>'.$model->descripcion.'</center></td>
	</tr>
			';
	}

 $query=Yii::app()->db->createCommand("SELECT n.*,p.*,m.*,presentacion.* from producto_planta AS p 
		INNER JOIN productos AS n ON p.producto_id=n.id_producto  
		INNER JOIN marcas AS m ON m.id_marca=n.marca_id
		INNER JOIN presentacion AS presentacion  ON presentacion.id_presentacion=n.presentacion_id
		 where p.planta_id = '$id'")->queryAll();
	 $contar = count($query);
	?>	
<?php if ($contar>0){

	$html.='<tr><td colspan="6" style="background-color: #FF6262" WIDTH="40"  HEIGHT="40"><strong><center>PRODUCTOS ASOCIADOS A ESTA PLANTA</center></strong></td></tr>
	<tr>
	<td colspan="2" ><strong><center>Nombre</center></strong></td>
	<td colspan="2" ><strong><center>Presentacion</center></strong></td>
	<td colspan="2" ><strong><center>Marca</center></strong></td>
	</tr>';
foreach($query as $pro){
	$html.='<tr>
	<td colspan="2" ><center>'.$pro["nombre_producto"].'</center></td>
	<td colspan="2" ><center>'.$pro["nombre_presentacion"].'</center></td>
	<td colspan="2" ><center>'.$pro["nombre_marca"].'</center></td>
	</tr>';
}
}else{

	$html.='<tr><td colspan="6" style="background-color: #FF6262" WIDTH="40"  HEIGHT="40"><strong><center>PRODUCTOS ASOCIADOS A ESTA PLANTA</center></strong></td></tr>
	<tr>
	<td colspan="2" ><strong><center>Nombre</center></strong></td>
	<td colspan="2" ><strong><center>Presentacion</center></strong></td>
	<td colspan="2" ><strong><center>Marca</center></strong></td>
	</tr>

	<tr>
	<td colspan="6"><strong><center>NO HAY PRODUCTO ASOCIADO  LA PLANTA '.$nombre.'</center></strong></td></tr>';
}

 $perfil=Yii::app()->db->createCommand("SELECT p.id_planta,u.*,pe.nombre_perfil FROM plantas AS p INNER JOIN usuarios AS u ON p.id_planta=u.planta_id INNER JOIN perfiles AS pe ON u.perfil_id=pe.id_perfil WHERE p.id_planta = '$id'")->queryAll();
	 $contar = count($query);

$html.='<tr><td colspan="6" style="background-color: #FF6262" WIDTH="40"  HEIGHT="40"><strong><center>USUARIOS DE LA PLANTA '.$nombre.'</center></strong></td></tr>
	<tr>
	<td><strong><center>Nombre</center></strong></td>
	<td><strong><center>Apellido</center></strong></td>
	<td><strong><center>Usuario</center></strong></td>
	<td><strong><center>Cargo</center></strong></td>
	<td><strong><center>Correo</center></strong></td>
	<td><strong><center>Telefono</center></strong></td>
	</tr>';
foreach($perfil AS $pe){
	$html.='<tr>
	<td><center>'.$pe["nombre"].'</center></td>
	<td><center>'.$pe["apellido"].'</center></td>
	<td><center>'.$pe["usuario"].'</center></td>
	<td><center>'.$pe["nombre_perfil"].'</center></td>
	<td><center>'.$pe["correo"].'</center></td>
	<td><center>'.$pe["telefono"].'</center></td>
	</tr>';
}
	$html.='</table>';

  	

      


      
$header='<img src="'.Yii::app()->request->baseUrl.'/images/barra.png"/> <hr>';
$mpdf=new mPDF('win-1252','LETTER','','',15,15,25,12,5,7);
$mpdf->SetHTMLHeader($header);
$mpdf->SetTitle('Ficha-Planta');
//$mpdf->SetProtection(array(), 'SIOT', 'siot');
$mpdf->SetAuthor('SIOT');
$mpdf->SetCreator('HernandezYBarrios');
$mpdf->SetFooter(' {DATE j/m/Y}|Página {PAGENO}/{nbpg}|MinPPAL-SIOT');
$mpdf->WriteHTML($html);
$mpdf->Output('reportes'.date('Y-m-d').'.pdf','I');
exit;
?>