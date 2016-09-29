<?php

use yii\helpers\Html;
//use back\models\Language;

/**
 * Письмо о новом запросе для расчета стоимости
 * доставки
 *
 * @var yii\web\View $this
 * @var yii\mail\MessageInterface $message
 * @var app\models\forms\CalculateDelivery $model
 */

$message->setSubject('New request to calculate delivery rate');
$lang = Yii::$app->language;
Yii::$app->language = Language::ALIAS_EN;
?>

<p>
    New request to calculate delivery rate:

    <?php foreach($model->attributes() as $attr): ?>
        <br>
        <b><?= ucfirst($model->getAttributeLabel($attr)) ?>:</b>
        <?= Html::encode($model->$attr) ?>
    <?php endforeach; ?>
</p>

<?php
Yii::$app->language = $lang;
?>