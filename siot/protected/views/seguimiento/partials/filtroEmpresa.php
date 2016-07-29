
					<?php 
							$lista1 = Yii::app()->db->createCommand("SELECT id_empresa,razon_social FROM empresa Where id_empresa<>999")->queryAll();
							?>
							<select name="empresa[]" style="cursor:pointer; width:220px;" required>
								<option value="">SELECCIONE EMPRESA...</option>
							<?php foreach ($lista1 as $lista) {
								$id=$lista['id_empresa'];
								$empresa2=$lista['razon_social'];
							?>
								<option value="<?php echo $id;?>"><?php echo $empresa2;?></option>
					<?php }?>
							</select>

