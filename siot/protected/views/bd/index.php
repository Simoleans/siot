<span class="ez">REPORTES DE LA BASE DE DATOS SIOT
    <a  name="respaldar" class="btn btn-success pull-right"  href="<?=Yii::app()->request->baseUrl?>/bd/respaldar"><i class="fa fa-cog spin fa-spin" aria-hidden="true"></i> Respaldar BD</a>
</span>

<b><h1 align="center"><i class="fa fa-file-text-o" aria-hidden="true"></i>REPORTES</h1></b>
<?php //'success'  'error'  'notice'            
        $flashMessages = Yii::app()->user->getFlashes();
        if ($flashMessages) {   
                foreach($flashMessages as $key => $message) {
                        echo '<div class="flash-' . $key . ' content" style=" text-align:center">' . $message . "</div>";             
                }
        }
?>
<div class="row">
    <div class="col-md-3">
        <a  class="col-xs-12 btn btn-primary" href="<?=Yii::app()->request->baseUrl?>/bd/create"><i class="fa fa-plus-square fa-lg" aria-hidden="true"></i> Crear Reporte</a>
    </div>
    <div class="col-xs-12 col-md-6"></div>
    <div class="col-md-3">
        <a  name="respaldar" class="col-xs-12 btn btn-danger"  href="<?=Yii::app()->request->baseUrl?>/bd/pdf"><i class="fa fa-file-pdf-o fa-lg" aria-hidden="true"></i> PDF General</a>
    </div>
</div>
<br>
<div class="form-group has-primary has-feedback">
    <div class="col-sm-12">
      <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i>
</span>
        <input type="text" class="form-control" id="kwd_search" value="" placeholder="Busqueda...." aria-describedby="inputGroupSuccess2Status">
      </div>
    </div>
</div>
<br><br>
<div class="table-responsive">
    <table id="my-table" class="table table-hover" cellspacing="0" width="100%" style="background-color: #F5F4F4; text-transform: uppercase">
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
                <td>RE-<?=$usuario["id_reporte"]?></td>
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
                <td><?=date("d-m-Y",strtotime($usuario["fecha_reporte"]))?></td>
                <td>    
                     <a class="btn btn-warning" <?=CHtml::link("Actualizar",array("update","id"=>$usuario['id_reporte']));?></a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
<h5 align="center">
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
</h5>

