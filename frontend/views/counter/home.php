<?php

/* @var $this yii\web\View */

use common\models\Bought;
use common\models\Counter;
use common\models\Investition;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'About me';

?>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
<style>
    * {
        font-family: 'Noto Sans JP', sans-serif;
    }

</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="https://cdn.jsdelivr.net/npm/@mojs/core"></script>
<h1 style="text-align: center;margin-top: -2vw; border-bottom: 3px solid teal;padding: 0 0 1% 0;margin-left: 1.5%;margin-right: 1.5%"><?= Yii::t('app', 'About me') ?></h1>
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-6"><img style="width: 120%"
                                       src="data:image/jpeg;base64,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"
                                       alt=""></div>
            <div class="col-md-6">
                <h1><?= Yii::t('app', 'My name\'s Daniil') ?></h1>
                <p>
                    <?= Yii::t('app', 'Hi as I said before I am Daniil Andreev.I was born in Russia,but in current moment
     live in Montenegro,I lived on Bali, studied in their school I know english very well.
     Now I am 12 years old. I am a programmer, investor, english teacher. I try to succeed in all my work.') ?>
                </p>
            </div>
        </div>
    </div>

</div>
<h1 style="text-align: center;margin-top: 3vw; border-bottom: 3px solid teal;padding: 0 0 1% 0;margin-left: 1.5%;margin-right: 1.5%">
    <?= Yii::t('app', 'My dreams') ?></h1>
<div class="container" style="margin-top: 2vw;">
    <div class="row">
        <div class="col">
            <div class="card" style="width: 22rem;height: 30rem;border: 2px solid orange;background: none;">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-university"
                                              style="color: orange;font-size: 530%;margin-left: 27.5%;"></i></h5>
                    <p class="card-text"><?= Yii::t('app', 'First of all my dream is to get education in one of the best universities - Stanford.') ?></p>
                    <a href="https://www.stanford.edu" class="card-link btn btn-outline-warning">Stanford Website</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 22rem;height: 30rem;border: 2px solid darkcyan;background: none;">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-coins"
                                              style="color: darkcyan;font-size: 530%;margin-left: 27.5%;"></i></h5>
                    <p class="card-text"><?= Yii::t('app', 'Second of all my main dream is to earn one trillion of dollars.') ?></p>
                    <a href="https://www.forbes.com" class="card-link btn btn-outline-info" style="margin-top: 3rem">Forbes website</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 22rem;height: 30rem;border: 2px solid green;background: none;">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-brain"
                                              style="color: green;font-size: 530%;margin-left: 27.5%;"></i></h5>
                    <p class="card-text"><?= Yii::t('app', 'Third of all I want to be a very smart person.I want to learn science, business, economics.') ?></p>
                    <a href="https://www.businessinsider.com/smartest-person-in-the-world-2011-12"
                       class="card-link btn btn-outline-success"><?= Yii::t('app', 'Smartest people') . ' website'?></a>
                </div>
            </div>
        </div>
    </div>
</div>