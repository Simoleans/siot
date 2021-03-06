<?php


class BDController extends Controller
{
	
	
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
          $arr =array('index','respaldar','update','create','pdf','bitacora','pdfbitacora','truncate');          //  no access to other user
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

public function actionBitacora(){// index de bitacora

        if (Yii::app()->user->getState('roles') == '5') 
        { 
            $this->layout='//layouts/column1';
        }
       
    $criteria=new CDbCriteria();
    $criteria->order='id_bitacora DESC';
    $count= Bitacora::model()->count($criteria);
    


     
    //Le pasamos el total de registros de la tabla
    $pages=new CPagination($count);
     
    // Resultados por página
    $pages->pageSize=13;
 
    $pages->applyLimit($criteria);
    $getBitacora=Bitacora::model()->findAll($criteria);
     
    $this->render('bitacora',array(
                "bitacora"=>$getBitacora,
                "pages"=>$pages
            ));
}


public function actionPdf()//pdf
{

    $model= new Reportes;
    $criteria=new CDbCriteria();
    $getUsuarios=Reportes::model()->findAll($criteria);
$this->render('pdf',array(
'model'=>$model,
'usuarios'=>$getUsuarios,
));
} // fin controlador PDF

public function actionPdfBitacora()//pdf de bitacora
{

    $model= new Bitacora;
  $criteria=new CDbCriteria();
   $getBitacora=Bitacora::model()->findAll($criteria);
$this->render('pdfbitacora',array(
'model'=>$model,
'bitacora'=>$getBitacora,
));
}//fin pdf bitacora


public function actionCreate()//crear
{   

     if (Yii::app()->user->getState('roles') == '5') 
        { 
            $this->layout='//layouts/column1';
        }
    
        $model=new Reportes;
        date_default_timezone_set("America/Caracas");
        $model->fecha_reporte=date('Y-m-d');
        

        if(isset($_POST['Reportes']))
        {

            $model->attributes=$_POST['Reportes'];
                if ($model->descripcion=="") {
                    $model->descripcion = "Sin Observaciones";
                }
                if($model->save())
                    Yii::app()->user->setFlash('success', "Se registro el reporte satisfactoriamente");
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


    public function actionRespaldar()
    {

         if (Yii::app()->user->getState('roles') == '5') 
        { 
            $this->layout='//layouts/column1';
            
        }
        
    $this->render('respaldar');
     
    }

    public function actionTruncate()
    {
 try{
         if (Yii::app()->user->getState('roles') == '5') 
        { 
            $this->layout='//layouts/column1';
            
        }
        $this->render('truncate');

     }catch(Exception $e){  

        Yii::app()->user->setFlash('notice', "Se vacio la tabla bitacora");
        $this->redirect(array('bitacora'));
    }
  }

}


