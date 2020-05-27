<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Counter */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="counter-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'hours')->textInput() ?>

    <?= $form->field($model, 'minutes')->textInput() ?>


    <?= $form->field($model, 'date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
