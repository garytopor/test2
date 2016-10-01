<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app', 'Login');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin(); ?>

    <div class="panel panel-body login-form">

        <div class="text-center">
            <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
            <h5 class="content-group"><?php echo Yii::t('app', 'Login to your account') ?> <small class="display-block"><?php echo Yii::t('app', 'Enter your credentials below') ?> </small></h5>
        </div>

        <div class="form-group has-feedback has-feedback-left">
            <?php echo Html::activeTextInput($model, 'username', [ 'placeholder' => Yii::t('app', 'Username'), 'class' => 'form-control' ]); ?>
            <div class="form-control-feedback">
                <i class="icon-user text-muted"></i>
            </div>
        </div>

        <div class="form-group has-feedback has-feedback-left">
            <?php echo Html::activePasswordInput($model, 'password', [ 'placeholder' => Yii::t('app', 'Password'), 'class' => 'form-control' ]); ?>
            <div class="form-control-feedback">
                <i class="icon-lock2 text-muted"></i>
            </div>
        </div>

        <?= $form->field($model, 'rememberMe')->checkbox() ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Login').'<i class="icon-circle-right2 position-right"></i>', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
        </div>

    </div>

<?php ActiveForm::end(); ?>
