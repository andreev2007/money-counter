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
        'public/css/font-awesome.min.css',
        'public/css/style.css',
        'css/styles.css',
        'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css',
        'public/css/animate.min.css',
        'public/css/owl.carousel.css',
        'public/css/owl.theme.css',
        'public/css/owl.transitions.css',
        'public/css/responsive.css',
        'https://fonts.googleapis.com/icon?family=Material+Icons',
        'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300&display=swap',
        'https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'
    ];
    public $js = [
        'https://cdn.jsdelivr.net/npm/vue',
        'https://cdn.jsdelivr.net/npm/chart.js@2.8.0',
        'https://cdn.jsdelivr.net/npm/@mojs/core',
        'https://kit.fontawesome.com/d20d0c5a49.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
