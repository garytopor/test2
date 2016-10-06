<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Field;

/* @var $this yii\web\View */
/* @var $model common\models\City */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="city-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= Html::input('text',  'name', $model->content ? $model->content->val : '', ['class' => 'form-control']); ?>

    <?= Field::getInputLatLon('latLon', $model->latLon); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
