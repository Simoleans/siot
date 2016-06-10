<?php

class UsuariosController extends Controller
{
/**
* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
* using two-column layout. See 'protected/views/layouts/column2.php'.
*/
public $layout='//layouts/column2';

/**
* @return array action filters
*/
public function filters()
{
return array(
'accessControl', // perform access control for CRUD operations
);
}

/**
* Specifies the access control rules.
* This method is used by the 'accessControl' filter.
* @return array access control rules
*/
/*
*/

	public function accessRules()
    {
        
        if( Yii::app()->user->getState('roles') =='1')
        {
             $arr =array('index','view','SelectPlanta','create','update','admin', 'delete');   // give all access to admin
        }
		else 
			if( Yii::app()->user->getState('roles') =="2")
                {
                        $arr =array('');   // give all access to staff
                }
                else
                {
          $arr = array('');          //  no access to other user
        }
                
        return array(                   
                array('allow', // allow authenticated user to perform 'create' and 'update' actions
                                'actions'=>$arr,
                                'users'=>array('@'),
                        ),
                                                
                        array('deny',  // deny all users
                                'users'=>array('*'),
                        ),
                );
    }

/**
* Displays a particular model.
* @param integer $id the ID of the model to be displayed
*/
public function actionView($id)
{
$this->render('view',array(
'model'=>$this->loadModel($id),
));
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
$model=new Usuarios;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Usuarios']))
{
$model->attributes=$_POST['Usuarios'];
$model->contraseña=md5($model->contraseña);
if($model->save())
$this->redirect(array('view','id'=>$model->id_usuario));
}

$this->render('create',array(
'model'=>$model,
));
}

/**
* Updates a particular model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id the ID of the model to be updated
*/
public function actionUpdate($id)
{
    $model=$this->loadModel($id);

    // Uncomment the following line if AJAX validation is needed
    // $this->performAjaxValidation($model);

    if(isset($_POST['Usuarios']))
    {
        
    $clave =$model->contraseña;
    $model->attributes=$_POST['Usuarios'];
    
    if($model->contraseña != $clave) {
        $model->contraseña=md5($model->contraseña);
    } 
    else {
        $model->password = $clave;
    }
    
    if($model->save())
    $this->redirect(array('view','id'=>$model->id_usuario));
    }

    $this->render('update',array(
    'model'=>$model,
    ));

}

/**
* Deletes a particular model.
* If deletion is successful, the browser will be redirected to the 'admin' page.
* @param integer $id the ID of the model to be deleted
*/
public function actionDelete($id)
        {
                try {
                        
                        
                $this->loadModel($id)->delete();

                // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
                if(!isset($_GET['ajax']))
                        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
                
                } catch (CDbException $e) {
                        
                        Yii::app()->user->setFlash('error', "Existen Participantes asociados a este Evento, debe primero eliminarlos  para posteriormente eliminar el Evento");
                                
                        $this->render('view',array(
                                        'model'=>$this->loadModel($id),
                        ));
                        
                }
        }
/**
* Lists all models.
*/
public function actionIndex()
{
$dataProvider=new CActiveDataProvider('Usuarios');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new Usuarios('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['Usuarios']))
$model->attributes=$_GET['Usuarios'];

$this->render('admin',array(
'model'=>$model,
));
}

/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
$model=Usuarios::model()->findByPk($id);
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}

/**
* Performs the AJAX validation.
* @param CModel the model to be validated
*/
protected function performAjaxValidation($model)
{
if(isset($_POST['ajax']) && $_POST['ajax']==='usuarios-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}

	public function actionSelectPlanta()
	{
		$id_uno = $_POST['Usuarios']['empresa_id'];
		$lista = Plantas::model()->findAll('empresa_id =:id_uno',array('id_uno'=>$id_uno));
		$lista = CHtml::listData($lista,'id_planta','nombre_planta');
		
		echo CHtml::tag('option',array('value'=>''),'SELECCIONE PLANTA...', true);
		
		foreach ($lista as $valor => $planta){
			echo CHtml::tag('option',array('value'=>$valor),CHtml::encode($planta), true );
			
		}
	}

}
