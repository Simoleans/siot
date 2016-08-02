<div class="view">
    <table class="table table-bordered">
      <tr class="warning" align="center">
        <td width="50%"><b><?php echo CHtml::encode($data->getAttributeLabel('nombre_rubro')); ?></b></td>     
      </tr>
      <tr align="center" bgcolor="#E8F9E9" style="font-family: georgia">
        <td>
          <i><b><?php echo CHtml::encode(($data->nombre_rubro)); ?></b></i>
        </td>
      </tr>
      <tr class="info" align="center">
         <td>
              <?php echo CHtml::link(CHtml::encode('Produccion Por Planta'), 
              array('viewrubplanta', 'id'=>$data->id_rubro),
              array('class' => 'btn btn-primary')); ?>
        </td>
      </tr>    
    </table>
</div>
  <br>  
