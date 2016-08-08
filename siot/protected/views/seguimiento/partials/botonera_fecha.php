<style type="text/css">
	#btn{
		width: 70px;
		text-align: center;
		padding: 4px;
	}
	.div_ancho{
		width: 100%;
		background-color:#F3F3F3;
	}
</style>
<div class="div_ancho">
<form action="#" method="POST">

<div class="row">
	<div class="col-md-2"><hr></div>
	<div class="col-xs-12 col-md-4" align="center">
			<h5>
				<b>
					<?php include("filtroEmpresa.php");?>
				</b>
			</h5>
	</div>
	<div class="col-xs-12 col-md-4" align="center">
			<h5>
				<b>
					<select name="year" style="cursor:pointer; width:220px;" required="required">
						<option value="">SELECCIONE UN AÑO...</option>
						<?php /* Para tomar la fecha del año en curso */
					for($anio=(date("Y")); 2016<=$anio; $anio--) {
				echo "<option value=".$anio.">".$anio."</option>";
						}
				?>
					</select>
				</b>
			</h5>
	</div>
	<div class="col-md-2"><hr></div>
</div>
	<div class="" role="group" align="center">
	    <button type="submit" class="btn btn-primary" name="mes" value="01" id="btn"><i>ENERO</I></button>
	    <button type="submit" class="btn btn-primary" name="mes" value="02" id="btn"><i>FEBRERO</I></button>
	    <button type="submit" class="btn btn-primary" name="mes" value="03" id="btn"><i>MARZO</I></button>
	    <button type="submit" class="btn btn-primary" name="mes" value="04" id="btn"><i>ABRIL</I></button>
	    <button type="submit" class="btn btn-primary" name="mes" value="05" id="btn"><i>MAYO</I></button>
	    <button type="submit" class="btn btn-primary" name="mes" value="06" id="btn"><i>JUNIO</I></button>
	    <button type="submit" class="btn btn-primary" name="mes" value="07" id="btn"><i>JULIO</I></button>
	    <button type="submit" class="btn btn-primary" name="mes" value="08" id="btn"><i>AGOSTO</I></button>
	    <button type="submit" class="btn btn-primary" name="mes" value="09" id="btn"><i>SEPTIEM</I></button>
	    <button type="submit" class="btn btn-primary" name="mes" value="10" id="btn"><i>OCTUBR</I></button>
	    <button type="submit" class="btn btn-primary" name="mes" value="11" id="btn"><i>NOVIEM</I></button>
	    <button type="submit" class="btn btn-primary" name="mes" value="12" id="btn"><i>DICIEM</I></button>
		<hr>
	</div>   
</form>
</div>
