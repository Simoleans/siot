<?php 
		if (Yii::app()->user->getState('roles') == '2') 
			{ 
			$this->layout='//layouts/column1';
			}
?>

<div class="view col-md-12" style="background-color: #F6E7E7">
    <table class="table table-brodered" align="center">
      <tr width="100%" bgcolor="#E8F9E9" style="font-family: times new roman">
        <td align="center">
          <b><?php echo CHtml::link(CHtml::encode($data->nombre_producto), 
              array('viewpro', 'id'=>$data->id_producto),
              array('class' => '')); ?></b>
        </td>
      </tr>
    </table>
</div>

