			<table class="table" style="text-align: center;">
                            	<tr>
                            		<td align="center" class="warning" style="font-size: 16px"><b>RUBRO</b></td>
                            		<td align="center" class="warning"></td>
                            		<td align="center" class="warning" style="font-size: 16px"><b>Sub-Total</b></td>
                            	</tr>
	                    		<?php foreach ($results1 as $result) 
								{ 
								    $rubro = $result["nombre_rubro"];
								    $prod = intval($result["prod"]);
								    $prod2 [] = intval($result["prod"]);
								    $suma = array_sum($prod2);
								    echo "<tr>";
								    echo "<td width='45%' class='success'><b>$rubro</b></td>";
								    echo "<td class='danger' width='10%'><i class='fa fa-exchange fa-2x success' aria-hidden='true'></i></td>";
								    echo "<td class='success' width='45%'>$prod <b>KG</b></td>";
								    echo "</tr>";
								}
								?>
	                    		
	                    		<tr>
	                    		<td></td>
	                    			<td  class='danger'>
	                    				<b style='font-size: 18px;'>TOTAL</b>
	                    			</td>
	                    			<td class='danger'>
	                    				<?php echo "<b>".$suma.' Kilogramos</b>';?>
	                    			</td>
	                    		</tr>	
	                    		
	        </table>