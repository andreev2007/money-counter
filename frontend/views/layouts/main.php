<?php

/* @var $this \yii\web\View */

/* @var $content string */

use common\models\Type;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use common\components\languageSwitcher;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

</head>
<body>
<?php $this->beginBody() ?>
<?php

$types = Type::find()->all();
?>
<div class="wrap">

    <div id="mySidenav" class="sidenav bg-info">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <ul style="list-style-type: none">
            <li class="nav-item">
                <a class="nav-link" href="<?= Url::toRoute('counter/index') ?>"><?= Yii::t('app', 'About me') ?> <i
                            class="fas fa-user-tie div2"></i></a>
            </li>
            <?php if (!Yii::$app->user->isGuest): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= Url::toRoute('counter/mon') ?>"><?= Yii::t('app', 'Prog money') ?><i
                                class="fas fa-laptop-code div2"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= Url::toRoute('counter/spend') ?>"><?= Yii::t('app', 'Spend') ?> <i
                                class="fas fa-tags div2"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= Url::toRoute('counter/investition') ?>"><?= Yii::t('app', 'Investments') ?> <i
                                class="fas fa-chart-line div2"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= Url::toRoute('counter/types') ?>"><?= Yii::t('app', 'Types') ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= Url::toRoute('counter/characteristics') ?>"><?= Yii::t('app', 'Characteristics') ?> <i
                                class="fas fa-chart-bar div2"></i></a>
                </li>
            <?php endif; ?>
            <?php if (!Yii::$app->user->isGuest): ?>
                <?php if (Yii::$app->user->identity->id === 1): ?>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="<?= Yii::$app->request->hostInfo . '/projects/mon_con/backend/web/index.php/counter/index' ?>">Counter(admin)</a>
                    </li>
                <?php endif; ?>

            <?php endif; ?>
        </ul>
    </div>

    <!--/. Sidebar navigation -->
    <nav class="navbar navbar-expand bg-info text-white">
        <span style="cursor:pointer" onclick="openNav()" class="menu">&#9776; </span>
        <span style="margin-left: 8px;" class="payme"> Payme <i class="fas fa-money-bill-wave"></i></span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <?php if (Yii::$app->user->isGuest) { ?>
                    <li class="login-sign" style="margin-left: 65vw"><a class="nav-link"
                                                                        href="<?= Url::toRoute('/auth/signup') ?>"><?= Yii::t('app', 'Sign up') ?> </a>
                    </li>
                    <li><a class="nav-link" href="<?= Url::toRoute('/auth/login') ?>"><?= Yii::t('app', 'Login') ?></a></li>
                    <?= languageSwitcher::Widget(); ?>
                <?php } else { ?>
                    <?php echo languageSwitcher::Widget(); ?>
                    <a href="" class="logout"></a>
                    <?php echo $menuItems[] = Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                            'Logout (' . Yii::$app->user->identity->name . ')' . '<i class="fas fa-sign-out-alt div3"></i>',
                            ['class' => 'btn btn-danger butt', 'style' => 'font-size: 90%']
                        )
                        . Html::endForm(); ?>
                    <?php
                }
                ?>
            </ul>
        </div>
    </nav>
    <div class="container">
        <?= $content ?>
    </div>
</div>
<footer class="footer bg-info" style="margin-top: 3vw; margin-bottom: -6vw;">
    <div class="container">
        <span class="text-white"><?= Yii::t('app', 'This is website') ?>: mon con</span>
        <span class="text-white" style="float: right"><?= Yii::t('app', 'All rights are reserved by ') ?> <a href="" class="text-white"><b>Daniil Andreev</b></a></span>
    </div>
</footer>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
