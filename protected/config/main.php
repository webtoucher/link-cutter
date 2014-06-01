<?php

return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Укоротитель ссылок',

    // preloading 'log' component
    'preload' => array('log'),

    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),

    'modules' => array(
        'gii'=>array(
            'class' => 'system.gii.GiiModule',
            'password' => '123456',
            'ipFilters' => array('127.0.0.1'),
        ),
    ),

    // application components
    'components' => array(
        'urlManager' => array(
            'urlFormat' => 'path',
            'rules' => array(
                'gii' => 'gii/default/index',
                '<link:\w+>' => array('site/link', 'caseSensitive' => false),
            ),
        ),
        'db'=>array(
            'connectionString' => 'sqlite:' . dirname(__FILE__) . '/../data/database.db',
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
                // uncomment the following to show log messages on web pages
                /*
                array(
                    'class' => 'CWebLogRoute',
                ),
                */
            ),
        ),
    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'creator' => 'webtoucher',
    ),
);