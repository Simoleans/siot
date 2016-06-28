<?php


class BDController extends Controller
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
             $arr =array('');   // give all access to admin
        }
		else if( Yii::app()->user->getState('roles') =="2")
            {
                $arr =array('');   // give all access to staff
            }
        else if( Yii::app()->user->getState('roles') =="3")
            {
                $arr =array('');   // give all access to staff
            } 
            else if( Yii::app()->user->getState('roles') =="4")
            {
                $arr =array('');   // give all access to staff
            }     
        else{
          $arr =array('Index');          //  no access to other user
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
		if (Yii::app()->user->getState('roles') == '5') 
		{ 
			$this->layout='//layouts/column1';
		}
		
		$this->render('index');
	}

}