<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\GoalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Goals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goal-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Goal', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'category_id',
            'date',
            'price',
            [
                'format' => 'html',
                'label' => 'Image',
                'value' => function($data){
                    return Html::img($data->getImage(), ['width'=>100]);
                }
            ],
            //'is_done',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
