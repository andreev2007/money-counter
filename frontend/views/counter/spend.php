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
<h1 style="text-align: center;border-bottom: 3px solid teal;padding: 0 0 1% 0;margin-left: 1.5%;margin-right: 1.5%">
    Spends</h1>

<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <?php /** @var Counter $boughts */
                foreach ($boughts as $bought): ?>
                    <article class="post" style="border: 2px solid teal">
                        <div class="post-content">
                            <header class="entry-header text-center text-uppercase">
                                <h2 style="text-align: left;"><?= $bought->title; ?></h2>
                                <p style="text-align: left;font-weight: bold;font-family: 'Noto Sans JP', sans-serif;font-size: 140%"><?= $bought->price . '' . ' <img style="width: 22px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAADPklEQVR4Xu3aT8hVRRjH8c8rLdKgXCUISWEbQxAXYlho4EKENI0MDMt2grQIzP+6DCyUFoG60QIpghQXWogggfSHLGoh6kJJMfB/mEgl9E+e3vuCiO85c+49nO4dz2zu5jnzPL/vPHNn5pkZcp+3oftcvxZAmwH1EZiExdSaVX/jBn7GSVyuL9zhnuqcAvvwYt0B3tXfT/gce/Ad/u3VX50ADmFerwFV+P4rrEX8dt0GGcCI6B1YhT+6oZADgNB9DM/jalUIuQAI3ccxB9erQMgJQOg+0vkfitUjqeUGIESvxtYk9TUvg2WrwG68lxoYHsCjmI5FeDrx29/wJC6l2DeZAe9gXUpQo9jMxq6OuLJu3u0skWV2tW6EyjKgVwAhZjzCz8wSZbEaTMRfZQQGKQNGtMS0iH/8+C1qsSIczRFAaFqBnSXiNuHtXAE8hGt4sEDgJ1iaK4DQ9SWeKRAYZ4RncwbwEV4pEHgCU3MG8CGWFwg8hadyBhB1gfkFAr/HjFwBjMEFTCgQeAALcwXwHL4oEbcNb+UIIEY/NjhFK0DoXoK9OQKIzc2GEmGxBY6dYmltYJC2wmM7x9yVZaOK/akF2n4HEPE9gRfwJqL0ntJm4ZsUw1QAa/BaSYePI7aoo7VfUs/onTpF1APiX/6RFCF32HyKl1O/SQVwBpNTO/0f7eLiZFqVC5ScANzCXHxdZQByAfB751rucBXxYZsDgLN4CT9UFT/oAP7EdmzGzW7EVwFwOrEY2W0cVb6Lau/HeB/nqnx4L9vUKfAGlpU4m4KHC2wu4nzFgGOUf73jejzW9h/xT8V+RjVPBZDir4mqcEoclWxaAJVwFRu3GVDyQKKOi5Eax2u4q9Qp8AFer917dx3Gs5i4Yovrr55bKoB+Owt81nkQ0QLolUCbAYkE2ynQZ/WAg1iQOHiFZqlTYCNeLXH4GMYV2ESB8koNQcf7nyiMxnmg55YKIMVRuxHKeSPUZkACgXYKtFOg+LX4QB+GEmbAf8/Xip7Lb8H6lI6atKlzGYybozilxe3t3S1q9vGy69smxaX4qhNAir++s2kB9N2QNBxQmwENA+87d20G9N2QNBxQmwENA+87d7cB1eCqQX1ATaAAAAAASUVORK5CYII=" alt=""/>' ?></p>
                                <p style="text-align: right;color: grey; font-size: 120%"><?= $bought->getDate() ?></p>
                            </header>
                        </div>
                    </article>
                <?php endforeach ?>
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
            ]); ?></div>
    </div>
</div>