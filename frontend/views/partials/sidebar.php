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
        <aside class="widget" style="border: 2px solid teal">
            <h3 class="widget-title text-uppercase text-center"></h3>

            <div class="thumb-latest-posts" style="margin-top: -4vw">
                <h1 style="text-align: center; margin-bottom: 1vw;" class="side_last">Last</h1>

                <div class="col" style="width: 200%">

                    <?php /** @var Counter $recent */
                    foreach ($recent as $counter): ?>
                        <div class="p-content">
                            <a class="text-uppercase sidebar_title" style="font-size: 100%"><?= $counter->job->title ?></a>
                            <a class="text-uppercase sidebar_price" style="font-size: 100%"><?= $counter->price . ' ' ?>
                                <i class="fas fa-ruble" style="font-size: 90%"></i>
                            </a>
                            <span class="p-date side_date"
                                  style="font-size: 100%;font-family: 'Open Sans', sans-serif;"><?= $counter->getDate() ?></span>
                        </div>
                        <br>
                    <?php endforeach; ?>
                </div>
            </div>
        </aside>
        <aside class="widget" style="border: 2px solid teal">
            <h3 class="widget-title text-uppercase text-center"></h3>

            <div class="thumb-latest-posts" style="margin-top: -4vw">
                <h1 style="text-align: center; margin-bottom: 3vw;" class="side_money">Money</h1>
                <div class="row">
                    <div class="col-md-6" style="margin-top: -2vw;text-align: center"
                    ">
                    <h3 class="side_collumns">My:</h3>
                    <p style="font-weight: bold;font-family: 'Noto Sans JP', sans-serif;text-align: center;"><?= Counter::find()->sum('price') - Bought::find()->sum('price') ?>
                        <i class="fas fa-ruble" style="font-size: 90%"></i>
                    </p>
                </div>
                <div class="col-md-6" style="margin-top: -2vw;text-align: center">
                    <h3 class="side_collumns">Debt:</h3>
                    <p style="font-weight: bold;font-family: 'Noto Sans JP', sans-serif;text-align: center;">
                        <?php echo Counter::find()->sum('price') - Paid::find()->sum('price') - Bought::find()->sum('price') ?>
                        <i class="fas fa-ruble" style="font-size: 90%"></i>
                    </p>
                </div>
            </div>
    </div>
    </aside>

</div>
