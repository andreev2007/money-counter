<?php

use common\models\Bought;
use common\models\Counter;
use common\models\Investition;
use common\models\Paid;
use common\models\Goal;
use yii\helpers\ArrayHelper;
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
                <h1 style="text-align: center; margin-bottom: 1vw;">Last</h1>

                <div class="col" style="width: 200%">

                    <?php /** @var Counter $recentInvest */
                    foreach ($recentInvest as $recInv): ?>
                        <div class="p-content">
                            <a class="text-uppercase" style="font-size: 110%"><?= $recInv->name ?></a>
                            <a class="text-uppercase"
                               style="font-size: 90%">
                                <?php if($recInv->bought <= $recInv->sold){ ?>
                                    <p style="text-align: left;font-size: 130%;">
                                        <p style="font-size: 130%;background: white;color: green;font-family: 'Open Sans', sans-serif;">+<?= $recInv->got_money / 100 ?>
                                        <img style="width: 20px;margin-top: -2px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAADPklEQVR4Xu3aT8hVRRjH8c8rLdKgXCUISWEbQxAXYlho4EKENI0MDMt2grQIzP+6DCyUFoG60QIpghQXWogggfSHLGoh6kJJMfB/mEgl9E+e3vuCiO85c+49nO4dz2zu5jnzPL/vPHNn5pkZcp+3oftcvxZAmwH1EZiExdSaVX/jBn7GSVyuL9zhnuqcAvvwYt0B3tXfT/gce/Ad/u3VX50ADmFerwFV+P4rrEX8dt0GGcCI6B1YhT+6oZADgNB9DM/jalUIuQAI3ccxB9erQMgJQOg+0vkfitUjqeUGIESvxtYk9TUvg2WrwG68lxoYHsCjmI5FeDrx29/wJC6l2DeZAe9gXUpQo9jMxq6OuLJu3u0skWV2tW6EyjKgVwAhZjzCz8wSZbEaTMRfZQQGKQNGtMS0iH/8+C1qsSIczRFAaFqBnSXiNuHtXAE8hGt4sEDgJ1iaK4DQ9SWeKRAYZ4RncwbwEV4pEHgCU3MG8CGWFwg8hadyBhB1gfkFAr/HjFwBjMEFTCgQeAALcwXwHL4oEbcNb+UIIEY/NjhFK0DoXoK9OQKIzc2GEmGxBY6dYmltYJC2wmM7x9yVZaOK/akF2n4HEPE9gRfwJqL0ntJm4ZsUw1QAa/BaSYePI7aoo7VfUs/onTpF1APiX/6RFCF32HyKl1O/SQVwBpNTO/0f7eLiZFqVC5ScANzCXHxdZQByAfB751rucBXxYZsDgLN4CT9UFT/oAP7EdmzGzW7EVwFwOrEY2W0cVb6Lau/HeB/nqnx4L9vUKfAGlpU4m4KHC2wu4nzFgGOUf73jejzW9h/xT8V+RjVPBZDir4mqcEoclWxaAJVwFRu3GVDyQKKOi5Eax2u4q9Qp8AFer917dx3Gs5i4Yovrr55bKoB+Owt81nkQ0QLolUCbAYkE2ynQZ/WAg1iQOHiFZqlTYCNeLXH4GMYV2ESB8koNQcf7nyiMxnmg55YKIMVRuxHKeSPUZkACgXYKtFOg+LX4QB+GEmbAf8/Xip7Lb8H6lI6atKlzGYybozilxe3t3S1q9vGy69smxaX4qhNAir++s2kB9N2QNBxQmwENA+87d20G9N2QNBxQmwENA+87d7cB1eCqQX1ATaAAAAAASUVORK5CYII=" alt=""/></p>
                                    </p>
                                <?php } elseif($recInv->got_money <= 0){ ?>
                                    <p style="text-align: left;font-size: 130%;">
                                        <p style="background: white;color: red;font-size: 130%;font-family: 'Open Sans', sans-serif;">
                                        <?= (($recInv->sold - $recInv->bought) / 100) * ($recInv->price / 100) ?>
                                            <img style="width: 20px;margin-top: -2px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAADPklEQVR4Xu3aT8hVRRjH8c8rLdKgXCUISWEbQxAXYlho4EKENI0MDMt2grQIzP+6DCyUFoG60QIpghQXWogggfSHLGoh6kJJMfB/mEgl9E+e3vuCiO85c+49nO4dz2zu5jnzPL/vPHNn5pkZcp+3oftcvxZAmwH1EZiExdSaVX/jBn7GSVyuL9zhnuqcAvvwYt0B3tXfT/gce/Ad/u3VX50ADmFerwFV+P4rrEX8dt0GGcCI6B1YhT+6oZADgNB9DM/jalUIuQAI3ccxB9erQMgJQOg+0vkfitUjqeUGIESvxtYk9TUvg2WrwG68lxoYHsCjmI5FeDrx29/wJC6l2DeZAe9gXUpQo9jMxq6OuLJu3u0skWV2tW6EyjKgVwAhZjzCz8wSZbEaTMRfZQQGKQNGtMS0iH/8+C1qsSIczRFAaFqBnSXiNuHtXAE8hGt4sEDgJ1iaK4DQ9SWeKRAYZ4RncwbwEV4pEHgCU3MG8CGWFwg8hadyBhB1gfkFAr/HjFwBjMEFTCgQeAALcwXwHL4oEbcNb+UIIEY/NjhFK0DoXoK9OQKIzc2GEmGxBY6dYmltYJC2wmM7x9yVZaOK/akF2n4HEPE9gRfwJqL0ntJm4ZsUw1QAa/BaSYePI7aoo7VfUs/onTpF1APiX/6RFCF32HyKl1O/SQVwBpNTO/0f7eLiZFqVC5ScANzCXHxdZQByAfB751rucBXxYZsDgLN4CT9UFT/oAP7EdmzGzW7EVwFwOrEY2W0cVb6Lau/HeB/nqnx4L9vUKfAGlpU4m4KHC2wu4nzFgGOUf73jejzW9h/xT8V+RjVPBZDir4mqcEoclWxaAJVwFRu3GVDyQKKOi5Eax2u4q9Qp8AFer917dx3Gs5i4Yovrr55bKoB+Owt81nkQ0QLolUCbAYkE2ynQZ/WAg1iQOHiFZqlTYCNeLXH4GMYV2ESB8koNQcf7nyiMxnmg55YKIMVRuxHKeSPUZkACgXYKtFOg+LX4QB+GEmbAf8/Xip7Lb8H6lI6atKlzGYybozilxe3t3S1q9vGy69smxaX4qhNAir++s2kB9N2QNBxQmwENA+87d20G9N2QNBxQmwENA+87d7cB1eCqQX1ATaAAAAAASUVORK5CYII=" alt=""/>
                                        </p>
                                    </p>
                                <?php } ?>
                                </i></a>
                            <span class="date" style="font-size: 100%;font-family: 'Open Sans', sans-serif;"><?= $recInv->getDate() ?></span>
                        </div>
                        <br>
                    <?php endforeach; ?>
                </div>
            </div>
        </aside>
        <aside class="widget" style="border: 2px solid teal">
            <h3 class="widget-title text-uppercase text-center"></h3>

            <div class="thumb-latest-posts" style="margin-top: -4vw">
                <h1 style="text-align: center; margin-bottom: 3vw;">Money</h1>
                <div class="row">
                    <div class="col-md-6" style="margin-top: -2vw;text-align: center"">
                    <h3>Earned:</h3>
                    <p style="font-size: 120%;font-weight: bold;font-family: 'Noto Sans JP', sans-serif;text-align: center;"><?= Investition::find()->sum('got_money') / 100 . ' ' ?>
                        <img style="width: 22px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAADPklEQVR4Xu3aT8hVRRjH8c8rLdKgXCUISWEbQxAXYlho4EKENI0MDMt2grQIzP+6DCyUFoG60QIpghQXWogggfSHLGoh6kJJMfB/mEgl9E+e3vuCiO85c+49nO4dz2zu5jnzPL/vPHNn5pkZcp+3oftcvxZAmwH1EZiExdSaVX/jBn7GSVyuL9zhnuqcAvvwYt0B3tXfT/gce/Ad/u3VX50ADmFerwFV+P4rrEX8dt0GGcCI6B1YhT+6oZADgNB9DM/jalUIuQAI3ccxB9erQMgJQOg+0vkfitUjqeUGIESvxtYk9TUvg2WrwG68lxoYHsCjmI5FeDrx29/wJC6l2DeZAe9gXUpQo9jMxq6OuLJu3u0skWV2tW6EyjKgVwAhZjzCz8wSZbEaTMRfZQQGKQNGtMS0iH/8+C1qsSIczRFAaFqBnSXiNuHtXAE8hGt4sEDgJ1iaK4DQ9SWeKRAYZ4RncwbwEV4pEHgCU3MG8CGWFwg8hadyBhB1gfkFAr/HjFwBjMEFTCgQeAALcwXwHL4oEbcNb+UIIEY/NjhFK0DoXoK9OQKIzc2GEmGxBY6dYmltYJC2wmM7x9yVZaOK/akF2n4HEPE9gRfwJqL0ntJm4ZsUw1QAa/BaSYePI7aoo7VfUs/onTpF1APiX/6RFCF32HyKl1O/SQVwBpNTO/0f7eLiZFqVC5ScANzCXHxdZQByAfB751rucBXxYZsDgLN4CT9UFT/oAP7EdmzGzW7EVwFwOrEY2W0cVb6Lau/HeB/nqnx4L9vUKfAGlpU4m4KHC2wu4nzFgGOUf73jejzW9h/xT8V+RjVPBZDir4mqcEoclWxaAJVwFRu3GVDyQKKOi5Eax2u4q9Qp8AFer917dx3Gs5i4Yovrr55bKoB+Owt81nkQ0QLolUCbAYkE2ynQZ/WAg1iQOHiFZqlTYCNeLXH4GMYV2ESB8koNQcf7nyiMxnmg55YKIMVRuxHKeSPUZkACgXYKtFOg+LX4QB+GEmbAf8/Xip7Lb8H6lI6atKlzGYybozilxe3t3S1q9vGy69smxaX4qhNAir++s2kB9N2QNBxQmwENA+87d20G9N2QNBxQmwENA+87d7cB1eCqQX1ATaAAAAAASUVORK5CYII=" alt=""/>
                    </p>
                </div>
                <div class="col-md-6" style="margin-top: -2vw;text-align: center">
                    <h3>My:</h3>
                    <p style="font-size: 120%;font-weight: bold;font-family: 'Noto Sans JP', sans-serif;text-align: center;">
                        <?= ((Investition::find()->sum('got_money') / 100) /100) * 50  ?>
                        <img style="width: 22px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAADPklEQVR4Xu3aT8hVRRjH8c8rLdKgXCUISWEbQxAXYlho4EKENI0MDMt2grQIzP+6DCyUFoG60QIpghQXWogggfSHLGoh6kJJMfB/mEgl9E+e3vuCiO85c+49nO4dz2zu5jnzPL/vPHNn5pkZcp+3oftcvxZAmwH1EZiExdSaVX/jBn7GSVyuL9zhnuqcAvvwYt0B3tXfT/gce/Ad/u3VX50ADmFerwFV+P4rrEX8dt0GGcCI6B1YhT+6oZADgNB9DM/jalUIuQAI3ccxB9erQMgJQOg+0vkfitUjqeUGIESvxtYk9TUvg2WrwG68lxoYHsCjmI5FeDrx29/wJC6l2DeZAe9gXUpQo9jMxq6OuLJu3u0skWV2tW6EyjKgVwAhZjzCz8wSZbEaTMRfZQQGKQNGtMS0iH/8+C1qsSIczRFAaFqBnSXiNuHtXAE8hGt4sEDgJ1iaK4DQ9SWeKRAYZ4RncwbwEV4pEHgCU3MG8CGWFwg8hadyBhB1gfkFAr/HjFwBjMEFTCgQeAALcwXwHL4oEbcNb+UIIEY/NjhFK0DoXoK9OQKIzc2GEmGxBY6dYmltYJC2wmM7x9yVZaOK/akF2n4HEPE9gRfwJqL0ntJm4ZsUw1QAa/BaSYePI7aoo7VfUs/onTpF1APiX/6RFCF32HyKl1O/SQVwBpNTO/0f7eLiZFqVC5ScANzCXHxdZQByAfB751rucBXxYZsDgLN4CT9UFT/oAP7EdmzGzW7EVwFwOrEY2W0cVb6Lau/HeB/nqnx4L9vUKfAGlpU4m4KHC2wu4nzFgGOUf73jejzW9h/xT8V+RjVPBZDir4mqcEoclWxaAJVwFRu3GVDyQKKOi5Eax2u4q9Qp8AFer917dx3Gs5i4Yovrr55bKoB+Owt81nkQ0QLolUCbAYkE2ynQZ/WAg1iQOHiFZqlTYCNeLXH4GMYV2ESB8koNQcf7nyiMxnmg55YKIMVRuxHKeSPUZkACgXYKtFOg+LX4QB+GEmbAf8/Xip7Lb8H6lI6atKlzGYybozilxe3t3S1q9vGy69smxaX4qhNAir++s2kB9N2QNBxQmwENA+87d20G9N2QNBxQmwENA+87d7cB1eCqQX1ATaAAAAAASUVORK5CYII=" alt=""/>

                    </p>
                </div>
            </div>
    </div>
    </aside>

</div>
