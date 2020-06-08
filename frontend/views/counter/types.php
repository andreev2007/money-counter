<?php

use yii\helpers\Url;

/**
 * @var $type \common\models\Type
 */
/** @var \common\models\Investition $recentInvest */
$this->title = 'Types of investitions';
?>
<style>

</style>
<!--main content start-->
<h1 style="text-align: center;margin-top: -2vw; border-bottom: 3px solid teal;padding: 0 0 1% 0;margin-left: 1.5%;margin-right: 1.5%">
    All types</h1>
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <?php /** @var \common\models\Type $types */
                foreach ($types as $type): ?>

                    <a href="<?= Url::toRoute(['counter/type', 'id' => $type->id]) ?>"
                       style="text-decoration: none;font-size: 250%;" class="btn btn-outline-info" data-toggle="tooltip"
                       data-placement="top"
                       title="<?= $type->description ?>">
                        <?= $type->name ?>
                    </a>
                <?php endforeach; ?>
            </div>
            <?=
            $this->render('/partials/sidebar2', [
                'recentInvest' => $recentInvest,
            ]); ?>
        </div>
    </div>
</div>
<!-- end main content-->