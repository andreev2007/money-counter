<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\InvestitionType */

$this->title = 'Update Investitions Type: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Investitions Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="investitions-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>