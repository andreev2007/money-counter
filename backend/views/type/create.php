<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\InvestitionType */

$this->title = 'Create Investitions Type';
$this->params['breadcrumbs'][] = ['label' => 'Investitions Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="investitions-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
