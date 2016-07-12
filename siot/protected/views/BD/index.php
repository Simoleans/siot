<span class="ez">REPORTES DE LA BASE DE DATOS SIOT
	<a  name="respaldar" class="btn btn-success pull-right"  href="<?=Yii::app()->request->baseUrl?>/bd/respaldar">Respaldar BD</a>
</span>

<script>
$(document).ready(function() {
    $('.example').DataTable();
} );

</script>

<h1>REPORTES</h1>
<a  class="btn btn-danger pull-left" href="<?=Yii::app()->request->baseUrl?>/bd/create">Crear Reporte</a>
<br>
<br>
<?php //'success'  'error'  'notice'            
        $flashMessages = Yii::app()->user->getFlashes();
        if ($flashMessages) {   
                foreach($flashMessages as $key => $message) {
                        echo '<h3><div class="flash-' . $key . '" style="color:red; text-align:center">' . $message . "</div></h3>\n";
                                
                    
                        
                }
        }
                ?>

                <?php //'success'  'error'  'notice'            
        $flashMessages = Yii::app()->user->getFlashes();
        if ($flashMessages) {   
                foreach($flashMessages as $key => $message) {
                        echo '<h3><div class="flash-' . $key . '" style="color:red; text-align:center">' . $message . "</div></h3>\n";
                                
                    
                        
                }
        }
                ?>

<div style="clear:both"></div>
<hr/>

<div class="table-responsive">

<table class="table example table-hover" >
    <tr>
        <th>ID</th>
        <th>USUARIO</th>
        <th>PRODUCTO</th>
        <th>PRODUCCION</th>
        <th>DESCRIPCION</th>
        <th>FECHA</th>
        <th>ACCION</th>
    </tr>
<?php foreach ($usuarios as $usuario) {  if($usuario['descripcion']==NULL){$descripcion="No hay descripcion";}else{$descripcion=$usuario['descripcion'];}?>
    <tr>
        <td><?=$usuario["id_reporte"]?></td>
        <td><?php                    //Se traen los datos del mismo modelo y controlador , con la relacion de criteria
									$nombre = CHtml::encode($usuario->usuario->nombre); 
									$apellido = CHtml::encode($usuario->usuario->apellido); 
									echo $nombre.' '.$apellido;
								?></td>
        <td><?php 
									$id_producto = CHtml::encode($usuario->producto_id);
									$id_producto = Productos::model()->find('id_producto=:id_producto', array('id_producto'=>$id_producto));
									$nombre_producto = $id_producto->nombre_producto;		
									echo $nombre_producto;						
								?></td>
        <td><?=number_format($usuario["produccion"],1,",",".")?> KG</td>
        <td><?=$descripcion?></td>
        <td><?=$usuario["fecha_reporte"]?></td>
        <td>
             <a class="btn btn-warning" <?=CHtml::link("Actualizar",array("update","id"=>$usuario['id_reporte']));?></a>
                
            </a>
        </td>
    </tr>
<?php } ?>
</table>
</div>

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


