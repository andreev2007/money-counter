<?php

/* @var $this yii\web\View */

use common\models\Bought;
use common\models\Counter;
use common\models\Investition;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Characteristics';

?>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap" rel="stylesheet">
<style>
    * {
        font-family: 'Noto Sans JP', sans-serif;
    }

    .all_money {
        border: 2px solid teal;
        padding: 3% 3% 2% 3%;
        width: 100%;
        border-radius: 10px
    }

    .all_money h3 {
        font-size: 170%;
    }

    .all_money h4 {
        font-size: 130%;
    }

    /*@media screen and(max-width: 1)*/

    .div4 {
        font-size: 14px;
        margin-left: 1%;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="https://cdn.jsdelivr.net/npm/@mojs/core"></script>
<h1 style="text-align: center;margin-top: -2vw; border-bottom: 3px solid teal;padding: 0 0 1% 0;margin-left: 1.5%;margin-right: 1.5%">
    Characteristics</h1>
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php
                $got_stock = ((Investition::find()->sum('got_money') / 100) / 100) * 50;
                $got_prog = Counter::find()->sum('price') - Bought::find()->sum('price');
                $got = Counter::find()->sum('price') - Bought::find()->sum('price') + (((Investition::find()->sum('got_money') / 100) / 100) * 50);
                ?>
                <article class="post" style="border: 2px solid teal;">
                    <div class="post-content">
                        <header class="entry-header text-center text-uppercase">
                            <div class="all_money">
                                <h3 >All my money:</h3>
                                <h4><?= $got ?><i class="fas fa-ruble div4"></i></h4>
                            </div>

                            <br>
                            <div class="col">
                                <h3>Money from stock market <i class="fas fa-chart-line"></i></h3>
                                <h5><?= number_format($got_stock, 1) ?><img style="width: 18px"
                                                                            src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAADPklEQVR4Xu3aT8hVRRjH8c8rLdKgXCUISWEbQxAXYlho4EKENI0MDMt2grQIzP+6DCyUFoG60QIpghQXWogggfSHLGoh6kJJMfB/mEgl9E+e3vuCiO85c+49nO4dz2zu5jnzPL/vPHNn5pkZcp+3oftcvxZAmwH1EZiExdSaVX/jBn7GSVyuL9zhnuqcAvvwYt0B3tXfT/gce/Ad/u3VX50ADmFerwFV+P4rrEX8dt0GGcCI6B1YhT+6oZADgNB9DM/jalUIuQAI3ccxB9erQMgJQOg+0vkfitUjqeUGIESvxtYk9TUvg2WrwG68lxoYHsCjmI5FeDrx29/wJC6l2DeZAe9gXUpQo9jMxq6OuLJu3u0skWV2tW6EyjKgVwAhZjzCz8wSZbEaTMRfZQQGKQNGtMS0iH/8+C1qsSIczRFAaFqBnSXiNuHtXAE8hGt4sEDgJ1iaK4DQ9SWeKRAYZ4RncwbwEV4pEHgCU3MG8CGWFwg8hadyBhB1gfkFAr/HjFwBjMEFTCgQeAALcwXwHL4oEbcNb+UIIEY/NjhFK0DoXoK9OQKIzc2GEmGxBY6dYmltYJC2wmM7x9yVZaOK/akF2n4HEPE9gRfwJqL0ntJm4ZsUw1QAa/BaSYePI7aoo7VfUs/onTpF1APiX/6RFCF32HyKl1O/SQVwBpNTO/0f7eLiZFqVC5ScANzCXHxdZQByAfB751rucBXxYZsDgLN4CT9UFT/oAP7EdmzGzW7EVwFwOrEY2W0cVb6Lau/HeB/nqnx4L9vUKfAGlpU4m4KHC2wu4nzFgGOUf73jejzW9h/xT8V+RjVPBZDir4mqcEoclWxaAJVwFRu3GVDyQKKOi5Eax2u4q9Qp8AFer917dx3Gs5i4Yovrr55bKoB+Owt81nkQ0QLolUCbAYkE2ynQZ/WAg1iQOHiFZqlTYCNeLXH4GMYV2ESB8koNQcf7nyiMxnmg55YKIMVRuxHKeSPUZkACgXYKtFOg+LX4QB+GEmbAf8/Xip7Lb8H6lI6atKlzGYybozilxe3t3S1q9vGy69smxaX4qhNAir++s2kB9N2QNBxQmwENA+87d20G9N2QNBxQmwENA+87d7cB1eCqQX1ATaAAAAAASUVORK5CYII="
                                                                            alt=""/></h5>
                                <canvas id="myChart" width="400" height="400"
                                        data-chart='<?= json_encode(Investition::getDataChart()) ?>'></canvas>
                            </div>
                            <hr style="margin-top: 3vw;background-color: teal;height: 2px">
                            <div class="col" style="margin-top: 3vw">
                                <h3>Money from programming <i class="fas fa-laptop-code"></i></h3>
                                <h5><?= $got_prog ?><img style="width: 18px"
                                                         src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAADPklEQVR4Xu3aT8hVRRjH8c8rLdKgXCUISWEbQxAXYlho4EKENI0MDMt2grQIzP+6DCyUFoG60QIpghQXWogggfSHLGoh6kJJMfB/mEgl9E+e3vuCiO85c+49nO4dz2zu5jnzPL/vPHNn5pkZcp+3oftcvxZAmwH1EZiExdSaVX/jBn7GSVyuL9zhnuqcAvvwYt0B3tXfT/gce/Ad/u3VX50ADmFerwFV+P4rrEX8dt0GGcCI6B1YhT+6oZADgNB9DM/jalUIuQAI3ccxB9erQMgJQOg+0vkfitUjqeUGIESvxtYk9TUvg2WrwG68lxoYHsCjmI5FeDrx29/wJC6l2DeZAe9gXUpQo9jMxq6OuLJu3u0skWV2tW6EyjKgVwAhZjzCz8wSZbEaTMRfZQQGKQNGtMS0iH/8+C1qsSIczRFAaFqBnSXiNuHtXAE8hGt4sEDgJ1iaK4DQ9SWeKRAYZ4RncwbwEV4pEHgCU3MG8CGWFwg8hadyBhB1gfkFAr/HjFwBjMEFTCgQeAALcwXwHL4oEbcNb+UIIEY/NjhFK0DoXoK9OQKIzc2GEmGxBY6dYmltYJC2wmM7x9yVZaOK/akF2n4HEPE9gRfwJqL0ntJm4ZsUw1QAa/BaSYePI7aoo7VfUs/onTpF1APiX/6RFCF32HyKl1O/SQVwBpNTO/0f7eLiZFqVC5ScANzCXHxdZQByAfB751rucBXxYZsDgLN4CT9UFT/oAP7EdmzGzW7EVwFwOrEY2W0cVb6Lau/HeB/nqnx4L9vUKfAGlpU4m4KHC2wu4nzFgGOUf73jejzW9h/xT8V+RjVPBZDir4mqcEoclWxaAJVwFRu3GVDyQKKOi5Eax2u4q9Qp8AFer917dx3Gs5i4Yovrr55bKoB+Owt81nkQ0QLolUCbAYkE2ynQZ/WAg1iQOHiFZqlTYCNeLXH4GMYV2ESB8koNQcf7nyiMxnmg55YKIMVRuxHKeSPUZkACgXYKtFOg+LX4QB+GEmbAf8/Xip7Lb8H6lI6atKlzGYybozilxe3t3S1q9vGy69smxaX4qhNAir++s2kB9N2QNBxQmwENA+87d20G9N2QNBxQmwENA+87d7cB1eCqQX1ATaAAAAAASUVORK5CYII="
                                                         alt=""/></h5>
                                <canvas style="margin-left: -2vw" id="program" width="400" height="400"
                                        data-program='<?= json_encode(Counter::getProgramDataChart()) ?>'></canvas>

                            </div>
                        </header>
                    </div>
                </article>
            </div>


            <?= /** @var Counter $recent */
            /** @var \common\models\Goal $goals */
            /** @var \common\models\Bought $boughts */
            /** @var \common\models\Paid $paids */
            $this->render('/partials/sidebar3', [
                'invests' => $invests,
                'boughts' => $boughts,
                'paids' => $paids,
                'goals' => $goals
            ]); ?>

            <script>
                var ctx = document.getElementById('myChart').getContext('2d');
                var data = JSON.parse(document.getElementById('myChart').dataset.chart);
                var myPieChart = new Chart(ctx, {
                    type: 'pie',
                    data: data,
                    options: {}
                });

                var program = document.getElementById('program').getContext('2d');
                var program_data = JSON.parse(document.getElementById('program').dataset.program);
                var myProgramChart = new Chart(program, {
                    type: 'horizontalBar',
                    data: program_data,
                    options: {}
                });
            </script>
        </div>
    </div>
</div>