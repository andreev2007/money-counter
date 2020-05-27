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
<h1 style="text-align: center;margin-top: -2vw">Overview</h1>

<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <?php /** @var Counter $counters */
                foreach ($counters as $counter): ?>
                    <article class="post">
                        <div class="post-content" >
                            <header class="entry-header text-center text-uppercase">
                                <h2 style="text-align: left;"><?= $counter->job->title; ?></h2>
                                <hr>
                                <p style="text-align: left;font-weight: bold;font-family: 'Noto Sans JP', sans-serif;font-size: 140%"><?= $counter->price . ' ' . 'rubles' ?></p>
                                <div id="settings" style="text-align: left;width: 60%">
                                        <?= $counter->job->description ?>
                                </div>
                                <p style="text-align: right;color: grey; font-size: 120%"><?= $counter->getDate() ?></p>
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