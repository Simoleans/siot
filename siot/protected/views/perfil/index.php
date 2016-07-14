<h1 align="center">TU PERFIL DE USUARIO</h1>

<?php $usuario = Yii::app()->user->getId();?>	

<?php if(Yii::app()->user->getState('roles') =='1'){}?>



<?php if(Yii::app()->user->getState('roles') =='3'){


	require_once('partials/analista.php'); }?>


<?php if(Yii::app()->user->getState('roles') =='4'){


	require_once('partials/seguimiento.php'); }?>
