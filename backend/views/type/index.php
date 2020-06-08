<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Investitions Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="investitions-type-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Investitions Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'investition_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
