<span class="ez">REPORTES DE LA BASE DE DATOS SIOT
    <a  name="respaldar" class="btn btn-success pull-right"  href="<?=Yii::app()->request->baseUrl?>/bd/respaldar"><i class="fa fa-cog spin fa-spin" aria-hidden="true"></i> Respaldar BD</a>
</span>
<?php //'success'  'error'  'notice'            
        $flashMessages = Yii::app()->user->getFlashes();
        if ($flashMessages) {   
                foreach($flashMessages as $key => $message) {
                        echo '<div class="content flash-' . $key . '" style=" text-align:center">' . $message . "</div>";             
                }
        }
?>
<b><h1 align="center"><i class="fa fa-file-text-o" aria-hidden="true"></i>BITACORA</h1></b>
<div class="row">
    <div class="col-xs-12 col-md-3">
        <a  class="col-xs-12 btn btn-primary" onclick="confirmar('truncate')" ><i class="fa fa-plus-square fa-lg" aria-hidden="true"></i> Limpiar Tabla bitacora</a>
    </div>
    <div class="col-xs-12 col-md-6"></div>
    <div class="col-xs-12 col-md-3">
        <a  name="respaldar" class="col-xs-12 btn btn-danger pull-right"  href="<?=Yii::app()->request->baseUrl?>/bd/pdfbitacora"><i class="fa fa-file-pdf-o fa-lg" aria-hidden="true"></i> PDF general</a>
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
            <th>TABLA</th>
            <th>ACCION</th>
            <th>DESCRIPCION</th>
            <th>FECHA</th>
        </tr>

        <?php foreach ($bitacora as $b)  { ?>
            <tr>
                <td>B-<?=$b["id_bitacora"]?></td>
                <td><?=$b["tabla"]?></td>
                <td><?=$b["accion"]?></td>
                <td><?=$b["descripcion"]?></td>
                <td><?=$b["fecha"]?></td>
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