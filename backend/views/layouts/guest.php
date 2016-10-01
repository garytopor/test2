<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="login-container">
<<<<<<< HEAD
    <div class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo Url::toRoute('/') ?>"><img src="/backend/web/images/logo_light.png" alt=""></a>

            <ul class="nav navbar-nav pull-right visible-xs-block">
                <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            </ul>

            <ul class="nav navbar-nav pull-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <span><?php echo Yii::$app->language ?></span>
                        <i class="caret"></i>
                    </a>

                    <?php echo Menu::widget([
                        'encodeLabels' => false,
                        'items' => [
                            ['label' => 'en', 'url' => ['/', 'language' => 'en']],
                            ['label' => 'ru', 'url' => ['/', 'language' => 'ru']],
                            ['label' => 'cn', 'url' => ['/', 'language' => 'cn']],
                        ],
                        'options' => [
                            'class' => 'dropdown-menu dropdown-menu-right'
                        ],
                    ]); ?>
                </li>
            </ul>
        </div>
    </div>
=======
>>>>>>> 2d67f6d273f8d839b32b36092c63c69fc8312a8f

    <div class="page-container">
        <div class="page-content">
            <!-- Content area -->
            <div class="content-wrapper">
                <div class="content">
                    <?= Alert::widget() ?>
                    <?= $content ?>
                </div>
            </div>
            <!-- /content area -->

        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>
</div>

<?php $this->endBody() ?>
</html>
<?php $this->endPage() ?>
