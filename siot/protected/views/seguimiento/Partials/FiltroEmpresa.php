<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
	'id'=>'usuarios-form',
	'enableAjaxValidation'=>false,
)); ?>	
<?php echo $form->errorSummary($model); ?>
		<table class="table-striped pull-right" align="center">
			<tr>
				<td>
					<?php 
							$lista1 = Yii::app()->db->createCommand("SELECT id_empresa,razon_social FROM Empresa Where id_empresa<>999")->queryAll();
							?>
							<select name="empresa[]" style="width:190px; color:#210202; cursor:pointer; font-family:georgia:">
								<option value="">SELECCIONE EMPRESA...</option>
							<?php foreach ($lista1 as $lista) {
								$id=$lista['id_empresa'];
								$empresa=$lista['razon_social'];
							?>
								<option value="<?php echo $id;?>"><?php echo $empresa;?></option>
					<?php }?>
					</select>
				</td>
				<td>
					<button type="submit" class="btn btn-danger" name="buscar" data-toggle="tooltip" data-placement="bottom" title="BUSCAR">
						<i class="glyphicon glyphicon-search"></i>
					</button>
				</td>
			</tr>
		</table>	
<?php $this->endWidget(); ?>