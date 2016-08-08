<div class="view col-md-12">
    <table class="table table-brodered" align="center">
    <tr class="warning" align="center">
        <td style="font-family: georgia">
          <b><?php echo CHtml::encode($data->getAttributeLabel('nombre_producto')); ?></b>
        </td>     
      </tr>
      <tr bgcolor="#E8F9E9" style="font-family: georgia">
        <td align="center">
          <i><b><?php echo CHtml::encode(($data->nombre_producto)); ?></b></i>
        </td>
      </tr>
      <tr class="info" align="center">
        <td>
              <?php echo CHtml::link(CHtml::encode('Ver Graficas'), 
              array('viewpro', 'id'=>$data->id_producto),
              array('class' => 'btn btn-primary')); ?>
<a  name="respaldar" class="btn btn-danger pull-right"  href="pdf/id/<?php echo $data->id_producto?>"><i class="fa fa-file-pdf-o fa-lg" aria-hidden="true"></i> Reporte en PDF</a>
          
        </td>
      </tr>
    </table>
</div>