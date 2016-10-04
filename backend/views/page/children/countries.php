<?php
use common\components\H;
use yii\helpers\Url;
use yii\helpers\Html;
?>
<div class="col-md-3">
    <div class="panel panel-white">
        <div class="panel-heading">
        <h6 class="panel-title"><span class="text-semibold"><?php echo $model->content->val; ?></span></h6>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a href="<?php echo Url::toRoute(['/country/delete', 'id' => $model->id]); ?>" class="btn-delete"><i class="icon-trash"></i></a></li>
                <li><a href="<?php echo Url::toRoute(['/country/update', 'id' => $model->id]); ?>" class="btn-popup"><i class="icon-pencil3"></i></a></li>
            </ul>
        </div>
        </div>

        <div class="panel-body">
            <ul class="media-list">
            <?php foreach ($model->cities as $city): ?>
                <li class="media">
                    <div class="media-body">
                        <h6 class="media-heading text-semibold"><?php echo $city->content->val; ?></h6>
                    </div>
                    <div class="media-right media-middle">
                        <ul class="icons-list text-nowrap">
                            <li><a href="<?php echo Url::toRoute(['/city/delete', 'id' => $city->id]); ?>" class="btn-delete"><i class="icon-trash"></i></a></li>
                            <li><a href="<?php echo Url::toRoute(['/city/update', 'id' => $city->id]); ?>" class="btn-popup"><i class="icon-pencil3"></i></a></li>
                        </ul>
                    </div>
                </li>
            <?php endforeach; ?>
            </ul>
            <?php echo Html::a(Yii::t('app', 'Create City'), ['/city/create', 'idCountry' => $model->id] ,['class' => 'btn btn-primary btn-popup']) ?>
        </div>
    </div>
</div>
