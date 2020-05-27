<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\Url;

$name = 'we didn\'t find the page you\'re looking for ...';

$this->title = $name;
?>
<div class="site-error">
    <div CLASS="container">
        <p style="font-size: 700%;color: grey;margin-left: 15%;">Sorry</p>
        <p style="font-size: 300%;text-align: center;color: grey"><?= Html::encode($this->title) ?></p>
    </div>

</div>
