<?php

use yii\bootstrap\Html;

if(\Yii::$app->language == 'ru'):
    echo Html::a('Рус', array_merge(
        \Yii::$app->request->get(),
        [\Yii::$app->controller->route, 'language' => 'ru']
    ));
else:
    echo Html::a('En', array_merge(
        \Yii::$app->request->get(),
        [\Yii::$app->controller->route, 'language' => 'en']
    ));
endif;