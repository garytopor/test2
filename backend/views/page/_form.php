<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\components\H;
use common\models\Field;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model common\models\Page */
/* @var $form yii\widgets\ActiveForm */

$langs = H::langs();
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
<div class="row">
    <div class="col-md-12">
        <!-- Horizontal form -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title"><?php echo H::langText(Yii::$app->language) ?></h5>
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
                        <?php if ($pageField->field->i18n): ?>
                        <div class="form-group">
                            <?php echo Field::getInputLabel($pageField->field, 'control-label col-lg-2') ?>
                            <div class="col-lg-10">
                                <?php echo Field::getInputField($pageField->field, Yii::$app->language, $model) ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!-- /horizotal form -->
    </div>

    <div class="col-md-12">
        <!-- Horizontal form -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title"><?php echo Yii::t('app', 'No translatable fields') ?></h5>
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
                        <?php if (!$pageField->field->i18n): ?>
                        <div class="form-group">
                            <?php echo Field::getInputLabel($pageField->field, 'control-label col-lg-2') ?>
                            <div class="col-lg-10">
                                <?php echo Field::getInputField($pageField->field, 'i18n', $model) ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; ?>

                    <div class="form-group">
                        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>

                </div>
            </div>
        </div>
        <!-- /horizotal form -->
    </div>

    <?php if ($model->childAlias): ?>
    <div class="col-md-12">
        <!-- Horizontal form -->
        <div class="panel panel-flat">
            <div class="panel-heading">
                <h5 class="panel-title"><?php echo Yii::t('app', ucfirst($model->childAlias)) ?></h5>
                <div class="heading-elements">
                    <?php echo Html::a(Yii::t('app', 'Create'), ['/child/update', 'parentId' => $model->id] ,['class' => 'btn btn-primary btn-popup heading-btn']) ?>
                </div>
                <a class="heading-elements-toggle"><i class="icon-more"></i></a>

            </div>
            <div class="panel-body">

                <div class="row">
                    <?php echo ListView::widget([
                        'dataProvider' => $children,
                        'itemView' => 'children/' . $model->childAlias,
                        'layout' => '{summary}<div class="row">{items}</div>{pager}',
                    ]); ?>
                </div>
            </div>
        </div>
        <!-- /horizotal form -->
    </div>
    <?php endif; ?>
</div>

<?php ActiveForm::end(); ?>
