<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Bought */

$this->title = 'Update Bought: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Boughts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bought-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
