<span class="ez">BASE DE DATOS
	<a href="../../siot/adminer.php" class="btn btn-success pull-right" target="_blank">IR a la BD</a>
</span>

<h1>Base de datos</h1>
<?php 
$query = Yii::app()->db->CreateCommand("SHOW TABLES FROM siot")->QueryAll(); ?>


<table border="4">
	<thead style="background-color: #59A3FF">
		<tr>
			<td><strong>Tablas</strong></td>
		</tr>
	</thead>
	<?php foreach($query as $tab){ ?>
	<tbody>
		<tr>
			<td><?php echo CHtml::link(CHtml::encode($tab['Tables_in_siot']),  array('view', 'id'=>($tab['Tables_in_siot']))); ?>
		</tr>
	</tbody>

	<?php } ?>
</table>