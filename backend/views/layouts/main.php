<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\widgets\Menu;
use yii\helpers\Url;
use common\models\Category;

$menu = Category::getMenu();

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
    <div class="navbar navbar-default header-highlight">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo Url::toRoute('/') ?>"><img src="images/logo_light.png" alt=""></a>

            <ul class="nav navbar-nav visible-xs-block">
                <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
                <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
            </ul>
        </div>

        <div class="navbar-collapse collapse" id="navbar-mobile">
            <ul class="nav navbar-nav">
                <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
            </ul>

            <div class="navbar-right">
                <ul class="nav navbar-nav">
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

                    <li class="dropdown dropdown-user">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                            <span><?php echo Yii::$app->user->identity->username ?></span>
                            <i class="caret"></i>
                        </a>

                        <?php echo Menu::widget([
                            'encodeLabels' => false,
                            'items' => [
                                ['label' => '<i class="icon-cog5"></i> ' . Yii::t('app', 'Settings'), 'url' => ['site/settings']],
                                ['label' => '<i class="icon-switch2"></i> ' . Yii::t('app', 'Logout'), 'url' => ['site/logout']],
                            ],
                            'options' => [
                                'class' => 'dropdown-menu dropdown-menu-right'
                            ],
                        ]); ?>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    <div class="page-container">
        <div class="page-content">
            <?php NavBar::begin(); NavBar::end(); ?>

            <!-- Main sidebar -->
            <div class="sidebar sidebar-main">
                <div class="sidebar-content">
                    <!-- Main navigation -->
                    <div class="sidebar-category sidebar-category-visible">
                        <div class="category-content no-padding">
                            <?php echo Menu::widget([
                                'encodeLabels' => false,
                                'items' => $menu,
                                'options' => [
                                    'class' => 'navigation navigation-main navigation-accordion'
                                ],
                            ]); ?>
                        </div>
                    </div>
                    <!-- /main navigation -->

                </div>
            </div>
            <!-- /main sidebar -->

            <!-- Content area -->
            <div class="content-wrapper">

                <!-- Page header -->
                <div class="page-header">
                    <div class="page-header-content">
                        <div class="page-title">
                            <h4><i class="icon-arrow-left52 position-left"></i> <?php echo $this->title ?> </h4>
                        </div>
                    </div>

                    <div class="breadcrumb-line breadcrumb-line-component">
                        <?php echo Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]) ?>
                    </div>
                </div>
                <!-- /page header -->

                <div class="content">
                    <?= Alert::widget() ?>
                    <?= $content ?>
                </div>
            </div>
            <!-- /content area -->

        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
