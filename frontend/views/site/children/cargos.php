<?php
use common\components\H;
use yii\helpers\Url;
?>

<div class="li">
    <a href="#">
        <strong><img src="<?php echo $model->getImageUrl('img-top', 'desktop') ?>"></strong>
        <span><?php echo $model->getContent('title')->val; ?></span>
    </a>
</div>