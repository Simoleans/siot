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
          $arr =array('index','respaldar','update','create');          //  no access to other user
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

    //funcion que me renderiza al index "admin bd"
   

      public function actionIndex(){

        if (Yii::app()->user->getState('roles') == '5') 
        { 
            $this->layout='//layouts/column1';
        }
             
    $criteria=new CDbCriteria();
    $criteria->order='id_reporte DESC';
    $count=Reportes::model()->count($criteria);
     
    //Le pasamos el total de registros de la tabla
    $pages=new CPagination($count);
     
    // Resultados por página
    $pages->pageSize=13;
 
    $pages->applyLimit($criteria);
    $getUsuarios=Reportes::model()->findAll($criteria);
     
    $this->render('index',array(
                "usuarios"=>$getUsuarios,
                "pages"=>$pages
            ));
}

//crear

public function actionCreate()
{   

     if (Yii::app()->user->getState('roles') == '5') 
        { 
            $this->layout='//layouts/column1';
        }
        $model=new Reportes;

        if(isset($_POST['Reportes']))
        {
            $model->attributes=$_POST['Reportes'];
                if($model->save())
                    Yii::app()->user->setFlash('notice', "Se registro el reporte satisfactoriamente");
                $this->redirect(array('index'));
        }

        $this->render('create',array(
        'model'=>$model,
        ));
}


//modificar 
public function actionUpdate($id) {

 /*$reporte=Reportes::model()->find('id_reporte=:idReporte',
                              array(':idReporte'=>$id));*/

  if (Yii::app()->user->getState('roles') == '5') 
        { 
            $this->layout='//layouts/column1';
        }
        $criteria=new CDbCriteria();
       $model =Reportes::model()->findByPk($id);
       if(isset($_POST['Reportes']))
        {
            $model->attributes=$_POST['Reportes'];
                if($model->save())
                     Yii::app()->user->setFlash('success', "Se modifico satisfactoriamente");
                $this->redirect(array('index'));
        }

    $this->render('update',array(
    'model'=>$model,
    ));
     }

/*public function actionModificar($id=null){
        if($id==null){
            $this->redirect(Yii::app()->request->baseUrl."/bd");
        }
         
        $reportes_form=new Reportes();
        $title="Editar reporte ".$id;
        $reporte=$this->reportes->getUnReporte($id);
         
        if(isset($_POST['Reportes'])){
            $reportes_form->attributes=$_POST['Reportes'];
            if($reportes_form->validate()){
                $produccion=$_POST["Reportes"]["produccion"];
                $descripcion=$_POST["Reportes"]["descripcion"];
                $fecha_reporte=$_POST["Reportes"]["fecha_reporte"];
               
                 
                $this->reportes->mod($id,$produccion,$descripcion,$fecha_reporte);
                $this->refresh();
            }
        }
         
         
        $this->render('_form',array(
                        "title"=>$title,
                        "model"=>$reportes_form,
                        "reporte"=>$reporte[0]
                    ));
    }*/

    public function actionRespaldar()
    {
        
    $this->render('respaldar');
     
    }

}