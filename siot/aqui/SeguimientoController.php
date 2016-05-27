<?php


class SeguimientoController extends Controller
{
	
	public $layout='//layouts/column2';
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
             $arr =array('index','view','create','update','admin', 'delete');   // give all access to admin
        }
		else 
			if( Yii::app()->user->getState('roles') =="2")
                {
                        $arr =array('indexrub','ViewRub', 'IndexPro', 'ViewPro','Index');   // give all access to staff
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

    //funcion que me renderiza al index "Produccion por empresa"
    public function actionIndex()
	{

		$dataProvider=new CActiveDataProvider('Empresa');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	//funcion que me renderiza al modulo "Produccion empresa vs empresa"
	public function actionIndexEvE()
	{

		$model=new Empresa;

		$this->render('indexeve',array(
			'model'=>$model,
		));

	}
	//funcion que me renderiza al index "indexpro"
    public function actionIndexPro()
	{
		$dataProvider=new CActiveDataProvider('Productos');
		$this->render('indexpro',array(
			'dataProvider'=>$dataProvider,
		));
	}
	//funcion que renderiza a la vista viewpro.php recibiendo el id
	public function actionViewPro($id)
	{
		$this->render('viewpro',array(
		'model'=>$this->loadModelProductos($id),
		));
	}
	//funcion que me renderiza al index "indexrub"
    public function actionIndexRub()
	{
		$model=new Rubros;


		$dataProvider=new CActiveDataProvider('Rubros');
		$this->render('indexrub',array(
			'dataProvider'=>$dataProvider,
			'model'=>$model,

		));
		
	}
	//funcion que renderiza a la vista viewrub recibiendo el id
	public function actionViewRub($id)
	{
		$this->render('viewrub',array(
		'model'=>$this->loadModelRubros($id),
		));
	}

	public function loadModelRubros($id)
	{
		$model=Rubros::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	} 

	public function loadModelProductos($id)
	{
		$model=Productos::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}



}