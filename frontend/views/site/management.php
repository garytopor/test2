<?php
use yii\widgets\ListView;
?>
<section class="about-section">
    <div class="container">
        <div class="top-holder">
            <div class="content">
                <?php echo $model->getContent('content-top')->val;?>
            </div>
            <div class="visual">
                <img src="<?php echo Yii::getAlias('@staticUrl').'/'.$model->getPageImageByType('img-top', 'source')->src.'.'.$model->getPageImageByType('img-top', 'source')->ext; ?>" alt="image description">
            </div>
        </div>
    </div>
    <div class="main-holder">
        <div class="container">
            <asside class="sidebar">
                <ul class="menu">
                    <li><a href="#"><?php echo Yii::t('app', 'Company history and possibilities');?></a></li>
                    <li class="active"><a href="#"><?php echo Yii::t('app', 'Management');?></a></li>
                    <li><a href="#"><?php echo Yii::t('app', 'Current Jobs');?></a></li>
                    <li><a href="#"><?php echo Yii::t('app', 'Responsibility and security');?></a></li>
                    <li><a href="#"><?php echo Yii::t('app', 'Company news');?></a></li>
                </ul>
            </asside>
            <div class="text">
                <?php echo $model->getContent('content-main')->val;?>
                <strong class="title"><?php echo Yii::t('app', 'Please contact us:');?></strong>

                    <?php echo ListView::widget([
                        'dataProvider' => $children,
                        'itemView' => 'children/' . $model->childAlias,
                        'layout' => '<ul class="contacts-list">{items}</ul>{pager}',
                        'itemOptions' => [
                            'tag' => false,
                        ],
                    ]); ?>


            </div>
            <div class="line">&nbsp;</div>
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