<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Investition */

$this->title = 'Update Investition: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Investitions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="goal-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
