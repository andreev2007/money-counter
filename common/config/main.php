<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@app' => '@common/'
    ],
    'bootstrap' => [
        'languageSwitcher',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\dbManager',
            'cache' => 'cache',
        ],
        'languageSwitcher' => [
            'class' => 'common\components\languageSwitcher',
        ],
    ],
];
