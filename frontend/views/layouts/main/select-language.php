<?php

use yii\bootstrap\Html;

if(\Yii::$app->language == 'en'):
    echo Html::a('En', array_merge(
        \Yii::$app->request->get(),
        [\Yii::$app->controller->route, 'language' => 'en']
    ));
else:
    echo Html::a('Рус', array_merge(
        \Yii::$app->request->get(),
        [\Yii::$app->controller->route, 'language' => 'ru']
    ));
endif;