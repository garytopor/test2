<?php
use common\components\H;
use yii\helpers\Url;
?>
<div class="col-md-2">
    <div class="panel panel-white">
        <div class="panel-heading">
        <h6 class="panel-title"><span class="text-semibold"><?php echo $model->getContent('title')->val; ?></span></h6>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a href="<?php echo Url::toRoute(['/child/delete', 'id' => $model->id]); ?>" class="btn-delete"><i class="icon-trash"></i></a></li>
                <li><a href="<?php echo Url::toRoute(['/child/update', 'id' => $model->id, 'parentId' => $model->parent->id]); ?>" class="btn-popup"><i class="icon-pencil3"></i></a></li>
            </ul>
        </div>
        </div>

        <div class="panel-body">
            <?php echo $model->getField('address')->field->content->val; ?> :
            <?php echo $model->getContent('address')->val; ?> <br/>

            <?php echo $model->getField('tel')->field->content->val; ?> :
            <?php echo $model->getContentByTypeLang('tel', 'i18n')->val; ?> <br/>

            <?php echo $model->getField('email')->field->content->val; ?> :
            <?php echo $model->getContentByTypeLang('email', 'i18n')->val; ?>

        </div>
    </div>
</div>
