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
             $arr =array('SelectPlanta','IndexEvp');   // give all access to admin
        }
		else if( Yii::app()->user->getState('roles') =="2")
            {
                $arr =array('indexrub','SelectPlanta','ViewRub','ViewRubPlanta', 'IndexPro', 'ViewPro','IndexEvp','IndexReg','ViewProPlanta','Index');   // give all access to staff
            }
        else if( Yii::app()->user->getState('roles') =="3")
            {
                $arr =array('');   // give all access to staff
            }    
        else{
          $arr =array('indexrub','SelectPlanta','ViewRub','ViewRubPlanta', 'IndexPro', 'ViewPro','IndexEvp','IndexReg','ViewProPlanta','Index','pdf');          //  no access to other user
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
		if (Yii::app()->user->getState('roles') == '4') 
		{ 
			$this->layout='//layouts/column1';
		}elseif(Yii::app()->user->getState('roles') == '2'){
			$this->layout='//layouts/column1';
		}
		$dataProvider=new CActiveDataProvider('Empresa');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function actionPdf($id)//pdf
{

  
		$dataProvider=new CActiveDataProvider('Productos');
		$this->render('pdf',array(
			'model'=>$this->loadModelProductos($id),
		));
} // fin controlador PDF
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
		if (Yii::app()->user->getState('roles') == '4') 
		{ 
			$this->layout='//layouts/column1';
		}elseif(Yii::app()->user->getState('roles') == '2'){
			$this->layout='//layouts/column1';
		}
		$dataProvider=new CActiveDataProvider('Productos');
		$this->render('indexpro',array(
			'dataProvider'=>$dataProvider,
		));
	}
	//funcion que renderiza a la vista viewpro.php recibiendo el id
	public function actionViewPro($id)
	{	
		if (Yii::app()->user->getState('roles') == '4') 
		{ 
			$this->layout='//layouts/column1';
		}elseif(Yii::app()->user->getState('roles') == '2'){
			$this->layout='//layouts/column1';
		}
		$this->render('viewpro',array(
		'model'=>$this->loadModelProductos($id),
		));
	}
	//funcion que me renderiza al index "indexrub"
    public function actionIndexRub()
	{
		if (Yii::app()->user->getState('roles') == '4') 
		{ 
			$this->layout='//layouts/column1';
		}elseif(Yii::app()->user->getState('roles') == '2'){
			$this->layout='//layouts/column1';
		}
		$model=new Rubros;

		$dataProvider=new CActiveDataProvider('Rubros');
		$this->render('indexrub',array(
			'dataProvider'=>$dataProvider,
			'model'=>$model,
		));
		
	}
	//funcion que renderiza a la vista viewrub recibiendo el id
	public function actionViewRub()
	{	

		if (Yii::app()->user->getState('roles') == '4') 
		{ 
			$this->layout='//layouts/column1';
		}elseif(Yii::app()->user->getState('roles') == '2'){
			$this->layout='//layouts/column1';
		}
		$model=new Empresa;
		
		$this->render('viewrub',array(
		'model'=>$model,
		
		));
	}
	//funcion que renderiza a la vista viewproplanta.php recibiendo el id
	public function actionViewRubPlanta($id)
	{	
		if (Yii::app()->user->getState('roles') == '4') 
		{ 
			$this->layout='//layouts/column1';
		}elseif(Yii::app()->user->getState('roles') == '2'){
			$this->layout='//layouts/column1';
		}
		$this->render('viewrubplanta',array(
		'model'=>$this->loadModelRubros($id),
		));
	}
	//funcion que me renderiza al index "indexevp"
    public function actionIndexEvp()
	{
		$model=new Plantas;
		$dataProvider=new CActiveDataProvider('Empresa');
		$this->render('indexevp',array(
			'dataProvider'=>$dataProvider,
			'model'=>$model,
		));
		
	}
	//funcion que me renderiza al index "indexreg"
    public function actionIndexReg()
	{
		if (Yii::app()->user->getState('roles') == '4') 
		{ 
			$this->layout='//layouts/column1';
		}elseif(Yii::app()->user->getState('roles') == '2'){
			$this->layout='//layouts/column1';
		}
		$model=new Estado;
		$dataProvider=new CActiveDataProvider('Empresa');
		$this->render('indexreg');
		
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
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='usuarios-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	//Filtro de busqueda para planta 
	public function actionSelectPlanta()
	{
		$id_uno = $_POST['Plantas']['empresa_id'];
		$lista = Plantas::model()->findAll('empresa_id =:id_uno',array('id_uno'=>$id_uno));
		$lista = CHtml::listData($lista,'id_planta','nombre_planta');
		
		echo CHtml::tag('option',array('value'=>''),'SELECCIONE PLANTA...', true);
		
		foreach ($lista as $valor => $planta){
			echo CHtml::tag('option',array('value'=>$valor),CHtml::encode($planta), true );
			
		}
	}



}