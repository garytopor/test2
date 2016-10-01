<?php

use common\models\forms\CalculateDelivery;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/**
 * Попап для рассчета
 * стоимости доставки
 *
 * @var app\components\View $this
 */

$model = new CalculateDelivery();
?>

<div class="btn-popup">
    <a href="#" class="close-popup">Close</a>
        <fieldset>
        <?php
        $form = ActiveForm::begin([
            'action' => Url::toRoute('site/calculate'),
            'id' => 'calculate-form',
            'method' => 'POST',
            'enableAjaxValidation' => false,
            'enableClientValidation' => true,
            'validateOnBlur' => true,
            'options' => [
                'class' => 'main-form',
            ],
            'fieldConfig' => [
                'template' => '<div class="row">{input}</div>{error}',

            ],
        ]);

        foreach($model->attributes() as $attr) {
            echo $form->field($model, $attr)->textInput(
                [
                'placeholder' => $model->getAttributeLabel($attr),
                'class' => 'input',
                ]
            );
        }
        ?>
        <div class="row btn-holder"><input type="submit" class="btn" value="send request"></div>
        </fieldset>
        <?php $form->end(); ?>


</div>

