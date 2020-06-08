<?php

/* @var $this yii\web\View */

use common\models\Counter;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Payment';

?>
<style>
    * {
        font-family: 'Noto Sans JP', sans-serif;
    }

</style>
<h1 class="prog_overview" style="text-align: center;margin-top: -2vw;border-bottom: 3px solid teal;padding: 0 0 1% 0;margin-left: 1.5%;margin-right: 1.5%"><?= Yii::t('app', 'Overview') ?></h1>
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <?php /** @var Counter $counters */
                foreach ($counters as $counter): ?>
                    <article class="post" style="border: 2px solid teal">
                        <div class="post-content">
                            <header class="entry-header text-center text-uppercase">
                                <h2 style="text-align: left;" class="prog_title"><?= $counter->job->title; ?></h2>
                                <hr style="background-color: teal;height: 0.5px">

                                <p style="text-align: left;font-weight: bold;font-family: 'Noto Sans JP', sans-serif;" class="prog_price"><?= $counter->price ?>
                                    <i class="fas fa-ruble" style="font-size: 80%"></i></p>
                                <div id="settings" style="text-align: left;" class="prog_desc">
                                    <?= $counter->job->description ?>
                                </div>
                                <p style="text-align: right;color: grey;" class="prog_date"><?= $counter->getDate() ?></p>
                            </header>
                        </div>
                    </article>


                <?php endforeach ?>

                <?php
                /** @var Counter $pagination */
                echo LinkPager::widget([
                    'pagination' => $pagination,
                ]);
                ?>
            </div>
            <?= /** @var Counter $recent */
            /** @var \common\models\Goal $goals */
            /** @var \common\models\Bought $boughts */
            /** @var \common\models\Paid $paids */
            $this->render('/partials/sidebar', [
                'recent' => $recent,
                'goals' => $goals,
                'boughts' => $boughts,
                'paids' => $paids
            ]); ?>
        </div>
    </div>
</div>
