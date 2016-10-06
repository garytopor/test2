<?php
use common\components\H;
use yii\helpers\Url;
?>

<li>
    <strong><?php echo $model->getContentByTypeLang('fio', 'i18n')->val; ?></strong>
    <span class="text"><?php echo $model->getContent('post')->val; ?></span>
    <span class="phone">Tel: <a href="tel:<?php echo $model->getContentByTypeLang('tel', 'i18n')->val; ?> "><?php echo $model->getContentByTypeLang('tel', 'i18n')->val; ?></a></span>
    <span class="mail">E-mail: <a href="mailto::<?php echo $model->getContentByTypeLang('email', 'i18n')->val; ?>"><?php echo $model->getContentByTypeLang('email', 'i18n')->val; ?></a></span>
</li>