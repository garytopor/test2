<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Page */
$title = $model->getContent('title')->val;
$this->title = Yii::t('app', 'Update: {title}', [
    'title' => Yii::t('app', $model->getContent('title')->val),
]);
$this->params['breadcrumbs'][] = Yii::t('app', 'Pages');
$this->params['breadcrumbs'][] = $title;
?>
<div class="page-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
