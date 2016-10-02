<?php

use yii\helpers\Html;

$title = $parent->getContent('title')->val;
$this->title = Yii::t('app', $model->id ? 'Update: {title}' : 'Create: {title}', [
    'title' => Yii::t('app', $parent->getContent('title')->val),
]);
$this->params['breadcrumbs'][] = Yii::t('app', 'Pages');
$this->params['breadcrumbs'][] = $title;

?>
<div class="page-create">

    <?= $this->render('_form', [
        'model' => $model,
        'parent' => $parent,
    ]) ?>

</div>
