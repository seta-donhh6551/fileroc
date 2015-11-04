<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

use \yii\web\Request;

return [
    'id' => 'app-backend',
    'language' => 'jp',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'posts' => [
            'class' => 'backend\modules\posts\posts',
        ],
        'account' => [
            'class' => 'app\modules\account\Account',
        ],
        'category' => [
            'class' => 'backend\modules\category\category',
        ],
		'comment' => [
            'class' => 'backend\modules\comment\comment',
        ],
        'users' => [
            'class' => 'backend\modules\users\users',
        ],
        'gii' => 'yii\gii\Module',
    ],
    'components' => [
        'request' => [
            'baseUrl' => '/system',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                //System
                //login
                '/login' => '/account/default/login',
                '/logout' => '/account/default/logout',
            ]
        ],
        'user' => [
            'identityClass' => 'common\models\AdminUser',
            'loginUrl' => ['/account/default/login'],
            'enableAutoLogin' => true,
        ],
        'session' => [
            'name' => 'PHPBACKSESSID',
            'savePath' => __DIR__ . '/../runtime',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages',
                    'sourceLanguage' => 'jp',
                    'fileMap' => [
                        'app' => 'app.php',
                        'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
    ],
    'params' => $params,
    'aliases' => [
        '$calendar' => '@vendor/php_calendar/classes',
    ],
];
