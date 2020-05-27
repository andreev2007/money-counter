<?php
use yii\helpers\Url;
?>
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article class="post">
                    <div class="post-content">
                        <header class="entry-header text-center text-uppercase">
                            <h2><?= $counter->job->title ?></h2>
                            <p> <?= $counter->hours . ' hours ' . $counter->minutes . ' minutes '?></p>
                            <p><?= $counter->price ?></p>
                            <p><?= $counter->getDate() ?></p>
                            <p><?= $counter->job->description ?></p>
                        </header>
                    </div>
                </article>
            </div>
            <?= $this->render('/partials/sidebar', [
                'recent'=>$recent,
            ]);?>
        </div>
    </div>
</div>
<!-- end main content-->