<section class="title-section news item" style="background: url(<?php echo $model->getImageUrl('img-top', 'desktop') ?>) no-repeat;-webkit-background-size: cover;
    background-size: cover;">
    <div class="container">
        <div class="text-holder">
            <span><?php echo $model->getContentByTypeLang('createdAt', 'i18n')->val; ?></span>
            <strong><?php echo $model->getContent('title')->val; ?></strong>
            <a href="news" class="link">&lt; <?php echo Yii::t('app', 'back to news');?></a>
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
                    <li class="active"><a href="news"><?php echo Yii::t('app', 'Company news');?></a></li>
                </ul>
            </asside>
            <div class="text">
                <p>Ningbo Rui-speed international freight forwarders Ltd. is a sea, air and land transport as an integrated international freight forwarding companies. In 2005, the prototype of the company in Ningbo; then, in the development of the SAR Shenzhen, vitality and charm of Shanghai, Qingdao; today, is planning to close to Ben Thanh Tianjin and Xiamen, two of the sea. </p>
                <p>Our company has the right to direct booking and comprehensive global agency network, with operations in every corner of the world, where the core business is focused on romantic European Russia, Britain, France, Finland, Spain, as well as Southeast Asia, Thailand, Malaysia, Vietnam and the Philippines and other countries exotic, as well as the United States, the Middle East and Australia, totaling about it, there are a total of Division I business relationships with more than 50 countries. </p>
                <p>After five years of growth, our company has been formed FCL (FCL), LCL (LCL) import and export freight forwarders, air cargo import and export freight forwarders, container inland transportation and door to door service, customs clearance services in Eastern Europe and Russia, Continental bridge transport services and customs declaration, inspection, insurance agents, etc. all aspects of logistics service system, and a determined effort from the coast into the inland city of the Chinese coast, out Neixiu China, to the wider world and become a link global freight forwarders people trusted to provide door to door transport services. </p>
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