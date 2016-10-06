<?php
use common\components\H;
use yii\helpers\Url;
?>
<li>
    <div class="content-holder">

        <div class="screen-holder"><img src="<?php echo $model->getImageUrl('img-main', 'desktop') ?>" alt="image description"></div>
        <div class="text-holder">
            <span class="date"><?php echo $model->getContentByTypeLang('createdAt', 'i18n')->val; ?></span>
            <strong><?php echo $model->getContent('title')->val; ?></strong>
            <span class="description"><?php echo H::stringLimit($model->getContent('content-top')->val); ?></span>
            <a href="newsitem?id=<?php echo $model->id; ?>" class="link"><?php echo Yii::t('app', 'read more');?></a>
        </div>
    </div>
</li>