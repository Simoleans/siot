<?php

class PlantasController extends Controller
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
			'postOnly + delete', // we only allow deletion via POST request
		);
	}
	
	public function accessRules()
    {
        
        if( Yii::app()->user->getState('roles') =='1')
        {
             $arr =array('index','view','create','update','admin', 'delete', 'SelectMunicipio','SelectParroquia','pdf');   // give all access to admin
        }
		else 
			if( Yii::app()->user->getState('roles') =="2")
                {
                        $arr =array('index','view', 'create', 'update','admin', 'delete', 'SelectMunicipio','SelectParroquia','pdf');   // give all access to staff
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
		if (Yii::app()->user->getState('roles') == '1') 
		{ 
			$this->layout='//layouts/column1';
		}
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
		if (Yii::app()->user->getState('roles') == '5') 
		{ 
			$this->layout='//layouts/column1';
		}

		$model=new Plantas;
		
		if(isset($_POST['Plantas'])){
			$model->attributes=$_POST['Plantas'];

			try{// aqui empieza el try
				
					if($model->save()){
						$this->redirect(array('view','id'=>$model->id_planta));
					}else{
						Yii::app()->user->setFlash('notice', "RELLENE TODOS LOS CAMPOS");
						$this->render('create',array( // Esto no lo puedes quitar por que despues el formulario no funciona
							'model'=>$model,
						));
					}
					
			}catch(Exception $e){//catch que manda al index con el flash, tapando el error feo de SQL 
					Yii::app()->user->setFlash('notice', "Planta existente");
					$dataProvider=new CActiveDataProvider('Plantas');
					$this->render('index',array(
						'dataProvider'=>$dataProvider,
					));

			}//aqui cierra el catch, te manda al index con ese mensaje cuando se registra, fino, pero si la pones igual, sigue saliendo el mismo mensaje
			//la idea es que tambien valide que si ya existe, salga un flash que ya existe el registro
		}else{

			$this->render('create',array( // Esto no lo puedes quitar por que despues el formulario no funciona
				'model'=>$model,
			));
			
		}
				 	
	  }

	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Plantas']))
		{
			$model->attributes=$_POST['Plantas'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_planta));
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
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		if (Yii::app()->user->getState('roles') == '1') 
		{ 
			$this->layout='//layouts/column1';
		}
		$dataProvider=new CActiveDataProvider('Plantas');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionPdf($id)//pdf
{

  
		$dataProvider=new CActiveDataProvider('Plantas');
		$this->render('pdf',array(
			'model'=>$this->loadModel($id),
		));
}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Plantas('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Plantas']))
			$model->attributes=$_GET['Plantas'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Plantas the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Plantas::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Plantas $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='plantas-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionSelectMunicipio()
	{
		$id_uno = $_POST['Plantas']['estado_id'];
		$lista = Municipio::model()->findAll('estado_id =:id_uno',array('id_uno'=>$id_uno));
		$lista = CHtml::listData($lista,'id_municipio','municipio');
		
		echo CHtml::tag('option',array('value'=>''),'SELECCIONE MUNICIPIO...', true);
		
		foreach ($lista as $valor => $municipio){
			echo CHtml::tag('option',array('value'=>$valor),CHtml::encode($municipio), true );
			
		}
	}

	public function actionSelectParroquia()
	{
		$id_dos = $_POST['Plantas']['municipio_id'];
		$lista = Parroquia::model()->findAll('municipio_id =:id_dos',array('id_dos'=>$id_dos));
		$lista = CHtml::listData($lista,'id_parroquia','parroquia');
		
		echo CHtml::tag('option',array('value'=>''),'SELECCIONE PARROQUIA...', true);
		
		foreach ($lista as $valor => $municipio){
			echo CHtml::tag('option',array('value'=>$valor),CHtml::encode($municipio), true );
			
		}
	}	
	
}
