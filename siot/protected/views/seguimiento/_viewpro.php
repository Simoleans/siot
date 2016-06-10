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
              <?php echo CHtml::link(CHtml::encode('Ver Produccion'), 
              array('viewpro', 'id'=>$data->id_producto),
              array('class' => 'btn btn-primary')); ?>
          
        </td>
      </tr>
    </table>
</div>