<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
                'application.helpers.*',
                'application.modules.user.*',
                'application.modules.user.models.*',
                'application.modules.category.*',
                'application.components.ImageHandler.CImageHandler',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
                'user',
                'admin',
                'category',
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'337778',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),
	),

	// application components
	'components'=>array(
		'user'=>array(
                        'class' => 'WebUser',
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
                'authManager' => array(
                    // Будем использовать свой менеджер авторизации
                    'class' => 'PhpAuthManager',
                    // Роль по умолчанию.
                    'defaultRoles' => array('guest'),
                ),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
                        'showScriptName'=>false,
			'urlFormat'=>'path',
			'rules'=>array(
                                'admin'=>'/admin/main',
                                'admin/<module:\w+>'=>'<module>/admin/default',
                                'admin/<module:\w+>/<controller:\w+>'=>'<module>/admin/<controller>',
                                'admin/<module:\w+>/<controller:\w+>/<action:\w+>'=>'<module>/admin/<controller>/<action>',
                                'admin/<module:\w+>/<controller:\w+>/<action:\w+>/*'=>'<module>/admin/<controller>/<action>',
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
                /*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
                */
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=services',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '337778',
			'charset' => 'utf8',
		),
		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
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
                'ih'=>array(
                    'class'=>'CImageHandler',
                ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
                'frontendLanguage'=>'ru',
                'backendLanguage'=>'ru',
                'googleMapsApiKey'=>'AIzaSyCTrL3tqXz5w20hqgoO2eiIqcAWiY6oUJ4',
                'currency' => array('UAH', 'USD', 'EUR'),
                'minPostcode' => 10001,
                'toolBarAdminUserData' => array(
                    array(
                        'Bold', 'Italic', 'Underline', '-', 'RemoveFormat',
                    ),
                    array(
                        'NumberedList', 'BulletedList', '-', 'JustifyLeft',
                        'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'Table',
                    ),
                    array(
                            'Source',
                    ),
                ),
                'toolBarUserData' => array(
                    array(
                        'Bold', 'Italic', 'Underline', '-', 'RemoveFormat',
                    ),
                    array(
                        'NumberedList', 'BulletedList', '-', 'JustifyLeft',
                        'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'Table',
                    ),
                ),
	),
);