<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'language' => 'es',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
        'siap' => [
            'class' => 'app\modules\siap\siap',
        ],
        'admin' => [
            'class' => 'app\modules\admin\Admin',
        ],
        'bienes' => [
            'class' => 'app\modules\bienes\Bienes',
        ],

        'requisiciones'=>[
              'class'=> 'app\modules\requisiciones\Requisiciones',
        ],

        'organizacion'=>[
              'class'=> 'app\modules\organizacion\organizacion',
        ],

        'reportico' => [
            'class' => 'reportico\reportico\Module' ,
            'controllerMap' => [
                            'reportico' => 'reportico\reportico\controllers\ReporticoController',
                            'mode' => 'reportico\reportico\controllers\ModeController',
                            'ajax' => 'reportico\reportico\controllers\AjaxController',
                        ]
            ],



        'gridview' => [
'class' => '\kartik\grid\Module',
                            ],
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'bxAWYPARaQalynx-3cFm_gMZFHK2JpIM',
        ],
        'metadata' => [
            'class' => 'app\components\Metadata',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\modules\admin\models\SeguridadUsuarios',
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
        'db' => require(__DIR__ . '/db.php'),
        'assetManager' => [
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'js' => []
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js' => []
                ],
                'yii\bootstrap\BootstrapAsset' => [
                    'css' => [],
                ],
            ],
        ],
    ],
    'params' => $params,
    'aliases' => [
        '@modelsPath' => '@app/models',
        '@modulePath' => '@app/modules',
        '@siap' => '@app/modules/siap',
        '@admin' => '@app/modules/admin',
        '@bienes' => '@app/modules/Bienes',
        '@requisiciones' => '@app/modules/Requisiciones',


    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}


return $config;
