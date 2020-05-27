<?php

use common\models\Bought;
use common\models\Counter;
use common\models\Paid;
use common\models\Goal;
use yii\helpers\Url;
?>
<style>
    * {
        font-family: 'Noto Sans JP', sans-serif;
    }
</style>
<div class="col-md-4" data-sticky_column>
    <div class="primary-sidebar">
        <aside class="widget" >
            <h3 class="widget-title text-uppercase text-center"></h3>

            <div class="thumb-latest-posts" style="margin-top: -4vw">
                <h1 style="text-align: center; margin-bottom: 1vw;">Last</h1>

                <div class="col" style="width: 200%">

                    <?php /** @var Counter $recent */
                    foreach($recent as $counter): ?>
                        <div class="p-content">
                            <a class="text-uppercase" style="font-size: 110%"><?= $counter->job->title ?></a>
                            <a class="text-uppercase" style="font-size: 90%"><?= $counter->price . ' ' . 'rubles'?></i></a>
                            <span class="p-date" style="font-size: 100%"><?= $counter->getDate() ?></span>
                        </div>
                        <br>
                    <?php endforeach; ?>
                </div>
            </div>
        </aside>
        <aside class="widget" >
            <h3 class="widget-title text-uppercase text-center"></h3>

            <div class="thumb-latest-posts" style="margin-top: -4vw">
                <h1 style="text-align: center; margin-bottom: 3vw;">Money</h1>
                <div class="row">
                    <div class="col-md-6" style="margin-top: -2vw;text-align: center"">
                        <h3>I have:</h3>
                        <p style="font-size: 120%;font-weight: bold;font-family: 'Noto Sans JP', sans-serif;text-align: center;"><?= Counter::find()->sum('price') - Bought::find()->sum('price') . ' ' . 'rubles' ?></i></p>
                    </div>
                    <div class="col-md-6" style="margin-top: -2vw;text-align: center">
                        <h3>Debt:</h3>
                        <p style="font-size: 120%;font-weight: bold;font-family: 'Noto Sans JP', sans-serif;text-align: center;">
                            <?php echo Counter::find()->sum('price') - Paid::find()->sum('price') . ' ' . 'rubles'; ?>
                        </p>
                    </div>
                </div>
            </div>
        </aside>
        <aside class="widget" >
            <h3 class="widget-title text-uppercase text-center"></h3>

            <div class="thumb-latest-posts" style="margin-top: -4vw;">
                <h1 style="text-align: center;">Goals</h1>
                <div class="row">
                    <?php foreach($goals as $goal): ?>
                    <div style="margin-top: 3vh">
                        <p><img src="<?= $goal->getFrontendImage(); ?>" alt=""></p>
                        <h4 style="color: #0b72b8;text-align: center;"><?= $goal->category->title ?></h4>
                        <hr>
                        <h3><?= $goal->title ?></h3>
                        <span style="font-size: 120%;font-weight: bold;font-family: 'Noto Sans JP', sans-serif">
                            <p>Money for <?= $goal->title ?>:</p>
                            <span style="font-size: 120%;font-weight: bold;font-family: 'Noto Sans JP', sans-serif"><?= $goal->price - (Counter::find()->sum('price') - Bought::find()->sum('price')) . ' ' . 'rubles' ?></span>
                        </span>
                        <span style="float: right;font-size: 120%;color: grey;font-family: 'Noto Sans JP', sans-serif"><?= $goal->getDate() ?></span>

                        <?php
                        $got = Counter::find()->sum('price') - Bought::find()->sum('price');
                        ?>
                        <?php if($got >= $goal->price){
                            echo '<p style="background: green;font-size: 160%;border-radius: 5px;color: white;text-align: center;">' . 'You achieved it'. '</p>';
                        } ?>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </aside>


    </div>
</div>
