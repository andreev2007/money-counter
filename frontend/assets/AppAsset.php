<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'public/css/style.css',
        'public/css/font-awesome.min.css',
        'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css',
        'public/css/animate.min.css',
        'public/css/owl.carousel.css',
        'public/css/owl.theme.css',
        'public/css/owl.transitions.css',
        'public/css/responsive.css',
        'https://fonts.googleapis.com/icon?family=Material+Icons',
        'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300&display=swap',
        'https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap',
    ];
    public $js = [
        'https://cdn.jsdelivr.net/npm/vue'
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
