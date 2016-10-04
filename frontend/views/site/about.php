<section class="about-section">
    <div class="container">
        <div class="top-holder">
            <div class="content">
                <?php echo $model->getContent('content-top')->val;?>
            </div>
            <div class="visual">
                <img src="http://static.dev/<?php echo $model->getPageImageByType('img-top', 'source')->src.'.'.$model->getPageImageByType('img-top', 'source')->ext; ?>" alt="image description">
            </div>
        </div>
    </div>
    <div class="main-holder">
        <div class="container">
            <div class="content-holder">
                <asside class="sidebar">
                    <ul class="menu">
                        <li class="active"><a href="#">Company history and possibilities</a></li>
                        <li><a href="#">Managment</a></li>
                        <li><a href="#">Current Jobs</a></li>
                        <li><a href="#">Responsibility and security</a></li>
                        <li><a href="#">Company news</a></li>
                    </ul>
                </asside>
                <div class="text">
                    <?php echo $model->getContent('content-main')->val;?>
                </div>
            </div>
            <div class="img-holder" style="background: http://static.dev/<?php echo $model->getPageImageByType('img-main', 'source')->src.'.'.$model->getPageImageByType('img-main', 'source')->ext; ?>">
                <img src="http://static.dev/<?php echo $model->getPageImageByType('img-main', 'source')->src.'.'.$model->getPageImageByType('img-main', 'source')->ext; ?>" alt="image description">
            </div>
            <div class="content-holder down">
                <div class="text">
                    <?php echo $model->getContent('content-bottom')->val;?>
                </div>
            </div>
            <div class="line">&nbsp;</div>
        </div>
    </div>
</section>
<section class="slider-section">
    <div class="container">
        <h2>Our services</h2>
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
        <h2>Partners</h2>
        <ul class="partners-list">
            <li><a href="#"><img src="<?php echo Yii::getAlias('@web');?>/images/pr1.jpg" alt="image description"></a></li>
            <li><a href="#"><img src="<?php echo Yii::getAlias('@web');?>/images/pr2.jpg" alt="image description"></a></li>
            <li><a href="#"><img src="<?php echo Yii::getAlias('@web');?>/images/pr3.jpg" alt="image description"></a></li>
            <li><a href="#"><img src="<?php echo Yii::getAlias('@web');?>/images/pr4.jpg" alt="image description"></a></li>
            <li><a href="#"><img src="<?php echo Yii::getAlias('@web');?>/images/pr5.jpg" alt="image description"></a></li>
        </ul>
    </div>
</section>