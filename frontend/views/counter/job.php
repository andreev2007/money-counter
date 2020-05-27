<?php

/* @var $this yii\web\View */

use common\models\Counter;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Blog of Daniil Andreev';

?>
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php /** @var Counter $counters */
                foreach ($counters as $counter): ?>
                    <article class="post post-list">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="post-thumb">
                                    <a href="<?php echo Url::toRoute(['counter/view','id' => $counter->id]); ?>" class="post-thumb-overlay text-center">
                                        <div class="text-uppercase text-center">View Post</div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6"><?= $counter->job->title?>
                                <div class="post-content">
                                    <header class="entry-header text-uppercase">
                                        <h2><a href="<?php echo Url::toRoute(['counter/job','id' => $counter->id]); ?>"><?= $counter->job->title ?></a></h2>
                                    </header>
                                    <div class="social-share">
                                        <span class="social-share-title pull-left text-capitalize"><?= $counter->getDate(); ?></span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
                <?php
                /** @var Counter $pagination */
                echo LinkPager::widget([
                    'pagination' => $pagination,
                ]);
                ?>
            </div>

            <?= $this->render('/partials/sidebar', [
                'recent' => $recent,
            ]);  ?>
        </div>
    </div>
</div>