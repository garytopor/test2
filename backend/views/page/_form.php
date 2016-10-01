<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\components\H;
use common\models\Field;

/* @var $this yii\web\View */
/* @var $model common\models\Page */
/* @var $form yii\widgets\ActiveForm */

$langs = H::langs();
?>

<?php $form = ActiveForm::begin(); ?>
<div class="page-form">


    <?php echo $form->field($model, 'createdAt')->textInput(['class' => 'form-control pickadate']) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>


</div>
<div class="row">
    <?php foreach ($langs as $lang): ?>
    <div class="col-md-<?php echo 12 / count($langs); ?>">
        <!-- Horizontal form -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title"><?php echo H::langText($lang) ?></h5>
                <div class="heading-elements">
                    <ul class="icons-list">
                        <li><a data-action="collapse"></a></li>
                        <li><a data-action="close"></a></li>
                    </ul>
                </div>
                <a class="heading-elements-toggle"><i class="icon-more"></i></a>
            </div>
            <div class="panel-body">
                <div class="form-horizontal">
                    <?php foreach ($model->pageFields as $pageField): ?>
                        <div class="form-group">
                            <?php echo Field::getInputLabel($pageField->field, 'control-label col-lg-2') ?>
                            <div class="col-lg-10">
                                <?php echo Field::getInputField($pageField->field, $lang, $model) ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!-- /horizotal form -->
    </div>
    <?php endforeach; ?>
</div>
<?php ActiveForm::end(); ?>
