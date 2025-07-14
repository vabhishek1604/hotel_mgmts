<?php

$params = require __DIR__ . '/params.php';
$db     = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'defaultRoute' => 'web/index',
    'timeZone' => 'Asia/Calcutta',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'components' => [
        'i18n' => [
            'translations' => [
                'app' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    // 'sourcelanguage' => 'en-Us',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
        'formatter' => [
            //            'defaultTimeZone' => 'UTC',
            'timeZone' => 'Asia/Kolkata',
            'dateFormat' => 'php:d-m-Y',
            'datetimeFormat' => 'php:d-m-Y H:i',
            'timeFormat' => 'php:H:i',
            'nullDisplay' => '-'
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'DNG123018',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\Users',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        //        'log' => [
        //
        //            'traceLevel' => YII_DEBUG ? 3 : 0,
        //            'flushInterval' => 1,
        //            'targets' => [
        //
        //                [
        //
        //                    'class' => 'yii\log\FileTarget',
        //                    'categories' => ['my_category'],
        //                    'exportInterval' => 1,
        //                    'logFile' => '@app/runtime/logs/my.log',
        //                ],
        //            ],
        //        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                'admin' => 'site/login',
                'home' => 'web/index',
                'aboutus' => 'web/aboutus',
                //                'projects' => 'web/properties', 
                'projects/<type:[a-zA-Z0-9-.]+>/' => 'web/properties/',
                'projectdetail/<slug:[a-zA-Z0-9-.]+>/' => 'web/propertydetail/',
                'contactus' => 'web/contactus',
                'pagecontent' => 'pagecontent/index',
                'addpagecontent' => 'pagecontent/create',
                'myproject' => 'project/index',
                'addproject' => 'project/index',
                'myproperties' => 'projectavail/index',
                'addproperty' => 'projectavail/create',
                'propertyimg' => 'projectimg/index',
                'addpropertyimage' => 'projectimg/create',
                'banners' => 'slider/index',
                'addbanner' => 'slider/create',
            ],
        ],
    ],
    'modules' => [
        'gridview' => [
            'class' => '\kartik\grid\Module'
        ]
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][]      = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][]    = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;