<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<style>
    @media screen and (min-width: 1255px) and (max-width: 1600px){
        .log-navbar {
            margin-left: 60vw;
        }

        .logo {
            margin-left: 5vw;
        }

        .logout {
            margin-left: 60vw;
        }
    }

    @media screen and (min-width: 1000px) and (max-width: 1255px){
        .log-navbar {
            margin-left: 52vw;
        }

        .logo {
            margin-left: 3vw;
        }

        .logout {
            margin-left: 50vw;
        }
    }

    .nav-link {
        color: white;
    }

    .nav-link:hover {
        color: lightgrey;
        transition: 0.5s;
    }

    .butt {
        background: none;
        border: none;
        height: 10px;

    }
</style>
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

<div class="wrap">
    <nav class="navbar navbar-expand bg-info text-white">
        <a class="navbar-brand logo" href="#" style="color: white;">PayMe</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?= Url::toRoute('counter/index') ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= Url::toRoute('counter/spend') ?>">Spends</a>
                </li>

                <?php if (Yii::$app->user->isGuest){ ?>
                    <li class="log-navbar"><a class="nav-link" href="<?= Url::toRoute('/auth/signup') ?>">Signup</a></li>
                    <li><a class="nav-link" href="<?= Url::toRoute('/auth/login') ?>">Login</a></li>
                <?php } else { ?>
                    <a href="" class="logout"></a>
                    <?php echo $menuItems[] =  Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                            'Logout (' . Yii::$app->user->identity->name . ')',
                            ['class' => 'nav-link butt']
                        )
                        . Html::endForm()
                    ;?>
                    <i class="material-icons" style="margin-top: 9px">logout</i>
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



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
