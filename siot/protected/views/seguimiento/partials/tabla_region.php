			<table class="table" style="text-align: center;">
								<tr>
									<td colspan="6" style="background-color:#EDECEC;">
										<h4>
											<b style="color:#A32121;"><?php echo $contar;?></b> 
											Datos Encontrados Para Region 
											<b style="color:#A32121; text-transform:uppercase;"><?php echo $region;?></b>
										</h4>
									</td>
								</tr>
                            	<tr>
                            		<td class="warning" style="font-size: 16px"><b>EMPRESA</b></td>
                            		<td class="warning" style="font-size: 16px"><b>PLANTA</b></td>
                            		<td class="warning" style="font-size: 16px"><b>ESTADO</b></td>
                            		<td class="warning" style="font-size: 16px"><b>RUBRO</b></td>
                            		<td class="warning"></td>
                            		<td class="warning" style="font-size: 16px"><b>Sub-Total</b></td>
                            	</tr>
	                    		<?php foreach ($results1 as $result) 
								{ 
									$empresa = $result["razon_social"];
								    $planta = $result["nombre_planta"];
								    $rubro = $result["nombre_rubro"];
								    $estado = $result["estado"];
								    $prod = intval($result["prod"]);
								    $prod2 [] = intval($result["prod"]);
								    $suma = array_sum($prod2);
								    echo "<tr>";
									    echo "<td width='30%' class='success'><b>$empresa</b></td>";
									    echo "<td width='20%' class='success'><b>$planta</b></td>";
									    echo "<td width='10%' class='success'><b>$estado</b></td>";
									    echo "<td width='10%' class='success'><b>$rubro</b></td>";
									    echo "<td class='danger' width='10%'><i class='fa fa-exchange fa-2x success' aria-hidden='true'></i></td>";
									    echo "<td class='success' width='20%'>$prod <b>TN</b></td>";
								    echo "</tr>";
								}
								?>
	                    		<tr>
		                    		<td></td>
		                    		<td></td>
		                    		<td></td>
		                    		<td></td>
	                    			<td  class='danger'>
	                    				<b style='font-size: 18px;'>TOTAL</b>
	                    			</td>
	                    			<td class='danger'>
	                    				<?php echo "<b>".$suma.' Toneladas</b>';?>
	                    			</td>
	                    		</tr>	
	        </table>
