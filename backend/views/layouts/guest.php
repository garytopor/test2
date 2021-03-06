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
    <script type="text/javascript">
        var yesNoText = '<?php echo Yii::t("app", "Are you sure you want to delete this item?") ?>';
        var staticServer = '<?php echo Yii::getAlias('@staticUrl/'); ?>';
    </script>

</head>
<body>
<?php $this->beginBody() ?>
<div class="login-container">

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

</div>

<?php $this->endBody() ?>
</html>
<?php $this->endPage() ?>
