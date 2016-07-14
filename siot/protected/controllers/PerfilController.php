<?php

class PerfilController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

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
             $arr =array('Index');   // give all access to admin
        }
		else if( Yii::app()->user->getState('roles') =="2")
            {
                $arr =array('Index');   // give all access to staff
            }
        else if( Yii::app()->user->getState('roles') =="3")
            {
                $arr =array('Index');   // give all access to staff
            } 
            else if( Yii::app()->user->getState('roles') =="4")
            {
                $arr =array('Index');   // give all access to staff
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

	public function actionIndex()
    {

        if (Yii::app()->user->getState('roles') == '4') 
        { 
            $this->layout='//layouts/column1';
        }
             
    $criteria=new CDbCriteria();
    $count=Reportes::model()->count($criteria);
     
    //Le pasamos el total de registros de la tabla
    $pages=new CPagination($count);
     
    // Resultados por página
    $pages->pageSize=1;
 
    $pages->applyLimit($criteria);
    $getUsuarios=Reportes::model()->findAll($criteria);
     
    $this->render('index',array(
                "usuarios"=>$getUsuarios,
                "pages"=>$pages
            ));
}
}