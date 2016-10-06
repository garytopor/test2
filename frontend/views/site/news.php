<?php
use yii\widgets\ListView;
?>
<section class="title-section news">
    <div class="container">
        <div class="text-holder">
            <span>12.10.2016</span>
            <strong>The EU Commission <br> closes competition <br> case without finding <br>infringement</strong>
            <a href="#" class="link"><?php echo Yii::t('app', 'read more');?></a>
        </div>
    </div>
</section>
<section class="about-section">
    <div class="main-holder">
        <div class="container">
            <asside class="sidebar">
                <ul class="menu">
                    <li><a href="about"><?php echo Yii::t('app', 'Company history and possibilities');?></a></li>
                    <li ><a href="management"><?php echo Yii::t('app', 'Management');?></a></li>
                    <li><a href="#"><?php echo Yii::t('app', 'Current Jobs');?></a></li>
                    <li><a href="#"><?php echo Yii::t('app', 'Responsibility and security');?></a></li>
                    <li class="active"><a href="#"><?php echo Yii::t('app', 'Company news');?></a></li>
                </ul>
            </asside>
            <div class="content">

                <?php echo ListView::widget([
                    'dataProvider' => $children,
                    'itemView' => 'children/' . $model->childAlias,
                    'layout' => '<ul class="about-list">{items}</ul><div class="pagination-holder"><div class="line">&nbsp;</div>{pager} </div>',
                    'itemOptions' => [
                        'tag' => false,
                    ],

                ]); ?>

            </div>
        </div>
    </div>
</section>
<section class="slider-section">
    <div class="container">
        <h2><?php echo Yii::t('app', 'Our services');?></h2>
        <div class="slider-holder">
            <div class="service-slider">
                <div>
                    <div class="img-holder"><img src="<?php echo Yii::getAlias('@web');?>/images/sr1.jpg" alt="image description"></div>
                    <strong>Cargo shipping</strong>
                    <span>Moro China company provides international sea container transportations of cargoes. Due to its low cost and convenience, they are quite popular, in addition, one of the primary advantages of container transport is a high level of security.</span>
                    <a href="#" class="btn">Learn more</a>
                </div>
                <div>
                    <div class="img-holder"><img src="<?php echo Yii::getAlias('@web');?>/images/sr2.jpg" alt="image description"></div>
                    <strong>Air transportation</strong>
                    <span>Мого China company provides International sea container transportations of cargoes. Due to its low cost and convenience, they are quite popular, in addition, one of the primary advantages of container transport is a high level of security.</span>
                    <a href="#" class="btn">Learn more</a>
                </div>
                <div>
                    <div class="img-holder"><img src="<?php echo Yii::getAlias('@web');?>/images/sr3.jpg" alt="image description"></div>
                    <strong>Trucking service</strong>
                    <span>Мого China company provides international sea container transportations of cargoes. Due to its low cost and convenience, they are quite popular, in addition, one of the primary advantages of container transport is a high level of security.</span>
                    <a href="#" class="btn">Learn more</a>
                </div>
                <div>
                    <div class="img-holder"><img src="<?php echo Yii::getAlias('@web');?>/images/sr1.jpg" alt="image description"></div>
                    <strong>Cargo shipping</strong>
                    <span>Moro China company provides international sea container transportations of cargoes. Due to its low cost and convenience, they are quite popular, in addition, one of the primary advantages of container transport is a high level of security.</span>
                    <a href="#" class="btn">Learn more</a>
                </div>
                <div>
                    <div class="img-holder"><img src="<?php echo Yii::getAlias('@web');?>/images/sr2.jpg" alt="image description"></div>
                    <strong>Air transportation</strong>
                    <span>Мого China company provides International sea container transportations of cargoes. Due to its low cost and convenience, they are quite popular, in addition, one of the primary advantages of container transport is a high level of security.</span>
                    <a href="#" class="btn">Learn more</a>
                </div>
                <div>
                    <div class="img-holder"><img src="<?php echo Yii::getAlias('@web');?>/images/sr3.jpg" alt="image description"></div>
                    <strong>Trucking service</strong>
                    <span>Мого China company provides international sea container transportations of cargoes. Due to its low cost and convenience, they are quite popular, in addition, one of the primary advantages of container transport is a high level of security.</span>
                    <a href="#" class="btn">Learn more</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="partners-section">
    <div class="container">
        <h2><?php echo Yii::t('app', 'Partners');?></h2>
        <ul class="partners-list">
            <li><a href="#"><img src="<?php echo Yii::getAlias('@web');?>/images/pr1.jpg" alt="image description"></a></li>
            <li><a href="#"><img src="<?php echo Yii::getAlias('@web');?>/images/pr2.jpg" alt="image description"></a></li>
            <li><a href="#"><img src="<?php echo Yii::getAlias('@web');?>/images/pr3.jpg" alt="image description"></a></li>
            <li><a href="#"><img src="<?php echo Yii::getAlias('@web');?>/images/pr4.jpg" alt="image description"></a></li>
            <li><a href="#"><img src="<?php echo Yii::getAlias('@web');?>/images/pr5.jpg" alt="image description"></a></li>
        </ul>
    </div>
</section>