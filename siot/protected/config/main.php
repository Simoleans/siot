<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
Yii::setPathOfAlias('booster', dirname(__FILE__) . DIRECTORY_SEPARATOR . '../extensions/yiibooster');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Sistema de Control de Producción',
	'language'=>'es',
    'sourceLanguage'=>'es',
    'charset'=>'utf-8',
	
	// preloading 'log' component
	'preload'=>array('log','yiibooster'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		
		'gii'=>array(
			'generatorPaths' => array('booster.gii'),
			'class'=>'system.gii.GiiModule',
			'password'=>'123456',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),	
		
	),

	// application components
	'components'=>array(
		'yiibooster' => array(
		'class' => 'ext.yiibooster.components.Booster',
		'responsiveCss' => true,
		),

		'user'=>array(
			// enable cookie-based authentication
			'class' => 'WebUser',
			'allowAutoLogin'=>true,
		),

		// uncomment the following to enable URLs in path-format
		
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/

		'ePdf' => array(
 'class' => 'ext.yii-pdf.EYiiPdf',
 'params' => array(
 'mpdf' => array(
 'librarySourcePath' => 'application.vendor.mpdf.*',
 'constants' => array(
 '_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
 ),
 'class'=>'mpdf', // the literal class filename to be loaded from the vendors folder
 /*'defaultParams' => array( // More info: http://mpdf1.com/manual/index.php?tid=184
 'mode' => '', // This parameter specifies the mode of the new document.
 'format' => 'A4', // format A4, A5, ...
 'default_font_size' => 0, // Sets the default document font size in points (pt)
 'default_font' => '', // Sets the default font-family for the new document.
 'mgl' => 15, // margin_left. Sets the page margins for the new document.
 'mgr' => 15, // margin_right
 'mgt' => 16, // margin_top
 'mgb' => 16, // margin_bottom
 'mgh' => 9, // margin_header
 'mgf' => 9, // margin_footer
 'orientation' => 'P', // landscape or portrait orientation
 )*/
 ),
 ),
 ),
//...
		
		'urlManager'=>array(
		'urlFormat'=>'path',
		'showScriptName'=>false,
		'caseSensitive'=>false,
		),		

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>YII_DEBUG ? null : 'site/error',
		),

		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
	),
);
