<?php

$params = array_merge(
        require(__DIR__ . '/../../common/config/params.php'), require(__DIR__ . '/../../common/config/params-local.php'), require(__DIR__ . '/params.php'), require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'jp',
    'defaultRoute' => 'home/default/index',
    'modules' => [
        'home' => [
            'class' => 'frontend\modules\home\home',
        ],
		'account' => [
            'class' => 'frontend\modules\account\account',
        ]
    ],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'baseUrl' => '/',
        ],
        'user' => [
            'identityClass' => 'app\models\Account',
            'loginUrl' => ['/login'],
            'enableAutoLogin' => false,
        ],
        'session' => [
            'name' => 'PHPFRONTSESSID',
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                //login
                '/login' => 'account/default/login',
                //front end
				'/search.html' => 'home/default/search',
                //'/<keyword:[a-zA-Z0-9_-]+>-<id:[0-9]+>.html' => 'home/default/detail',
                '/<rewrite:[a-zA-Z0-9_-]+>.html' => 'home/category/index',
				'/download/<rewrite:[a-zA-Z0-9_-]+>.html' => 'home/posts/index',
				'/download-option/<rewrite:[a-zA-Z0-9_-]+>.html' => 'home/posts/option',
				'/<slug:[a-zA-Z0-9_-]+>/<rewrite:[a-zA-Z0-9_-]+>.html' => 'home/category/subcate',
				'/<slug:[a-zA-Z0-9_-]+>/<xample:[a-zA-Z0-9_-]+>/<rewrite:[a-zA-Z0-9_-]+>.html' => 'home/category/childcate',
            ]
        ]
    ],
    'params' => $params,
];
