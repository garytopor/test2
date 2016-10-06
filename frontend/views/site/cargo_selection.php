<?php
use yii\widgets\ListView;

?>
<section class="cargo-section">
    <div class="container">
        <div class="cargo-container">
            <h5>Cargo selection</h5>
            <asside class="sidebar">
                <ul class="menu">
                    <li class="active"><a href="#">Cargo selection</a></li>
                    <li ><a href="#">Our route</a></li>
                    <li><a href="#">Sea, Inland, air service</a></li>
                    <li><a href="#">Dangerous goods</a></li>
                    <li><a href="#">Your questions and our answers</a></li>
                </ul>
            </asside>
            <div class="ul cargo-holder">
                <div class="cargo-tabs tabset">
                    <?php echo ListView::widget([
                        'dataProvider' => $children,
                        'itemView' => 'children/' . $model->childAlias,
                        'layout' => '<div class="cargo-list tab-control">{items}</div>{pager}',
                        'itemOptions' => [
                            'tag' => false,
                        ],
                    ]); ?>
                    <?php echo ListView::widget([
                        'dataProvider' => $children,
                        'itemView' => 'children/cargoo',
                        'layout' => '<div class="tab-body">{items}</div>{pager}',
                        'itemOptions' => [
                            'tag' => false,
                        ],
                    ]); ?>
                    <!--FIRST SLIDER END-->
                </div>
                <div class="content-holder">
                    <p>Dry Van (In other words the 'General Purpose' container) like all other types of containers Is the standardized multlreusable tare Intended for transportation of goods by highway, railway, sea and airtransport.</p>
                    <p>The main convenience of any container Is Its Intermodallty - I.e. possibility of change of the mode of transportation without reloading a cargo from one container to another. Dry Van Is Intended for transportation of commodities In bundles, cartons and boxes, loose cargo, bulk, furniture, etc.</p>
                    <ul class="par-list">
                        <li>
                            <p>20-feet: length
											<span>
												-5.902 м.
											</span>
                            </p>
                            <p>width
											<span>
												- 2,350 м.
											</span>
                            </p>
                            <p>height
											<span>
												- 2,392 м.
											</span>
                            </p>
                            <p>max. payload
											<span>
												-21,8/28,23 tons,
											</span>
                            </p>
                            <p>capacity
											<span>
												- 33,2 м3
											</span>
                            </p>
                        </li>
                        <li>
                            <p>40-feet:
											<span>
												length - 12,032 м,
											</span>
                            </p>
                            <p>width
											<span>
												-  2.350 м.
											</span>
                            </p>
                            <p>height
											<span>
												- 2,390 м,
											</span>
                            </p>
                            <p>max. payload
											<span>
												-26,68/28,7 tons.
											</span>
                            </p>
                            <p>capacity
											<span>
												- 67,6 м3
											</span>
                            </p>
                        </li>
                    </ul>
                </div>
                <div class="banner">
                    <img src="<?php echo Yii::getAlias('@web');?>/images/img6.jpg" alt="image description">
                    <span class="text-holder">Our route</span>
                </div>
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