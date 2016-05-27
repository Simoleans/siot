<?php

class SiteController extends Controller
{
	public $layout='//layouts/column1';
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}
	
	public function accessRules() 
	{
	  return array(
		array('allow',
		  'actions'=>array('captcha'),
		  'users'=>array('*'),
		),
	  );
	}	

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	 


	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}	
	
	
	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	public function actionStats()
	{
		$response = array();
		// collect all the unique dates
		$dates = array();
		$models=Reportes::model()->findAll(array());
		foreach($models as $model)
		array_push($dates, $model->fecha_reporte);
		// why not also format the dates for display?
		$response["dates"] = array();
		foreach($dates as $date) {
		$datetime = new DateTime($date);
		array_push($response["dates"], $datetime->format("d-m-Y"));
		}

		// count the visitors and the visits for each day

		$response["producto_id"] = array();
		$response["produccion"] = array();
		//$response["usuario_id"] = array();
	
		foreach($dates as $date) {
		$produccion = '';
		$producto = '';
		$id = '';



		$fecha_reporte = Reportes::model()->findAllByAttributes(array("fecha_reporte"=>$date));
		foreach($fecha_reporte as $registro)
		$produccion += $registro->produccion;
		$id = $registro->producto_id;
		

		array_push($response["produccion"], $produccion);
		array_push($response["producto_id"], $id);
	
		}
		echo json_encode($response);
	}	

}