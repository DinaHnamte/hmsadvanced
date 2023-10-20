<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'hospital\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'modules' => [
        'rbac' => [
            'class' => 'yii2mod\rbac\Module',
        ],
        'auth' => [
            'class' => '..\common\modules\auth\Module',
        ],
        'patient' => [
            'class' => 'hospital\modules\patient\Module',
        ],
        'opd' => [
            'class' => 'hospital\modules\opd\Module',
        ],
        'ipd' => [
            'class' => 'hospital\modules\ipd\Module',
        ],
        'icd10' => [
            'class' => 'hospital\modules\icd10\Module',
        ],
        'doctor' => [
            'class' => 'hospital\modules\doctor\Module',
        ],
        'medicine' => [
            'class' => 'hospital\modules\medicine\Module',
        ],
        'admin' => [
            'class' => 'hospital\modules\admin\Module',
        ],
        'diseases' => [
            'class' => 'hospital\modules\diseases\Module',
        ],
        'tenantadmin' => [
            'class' => 'hospital\modules\tenantadmin\Module',
        ],
    ],
    'params' => $params,
];
