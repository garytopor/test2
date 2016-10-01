<?php
use yii\widgets\Menu;
use common\models\Category;
$menu = Category::getMenuFront();
?>
<header id="header">
    <div class="container">
        <div class="header-content">
            <strong class="logo"><a href="#">Moro</a></strong>
            <div class="header-info">
                <div class="row-holder">
                    <div class="row">
                        <a href="#" class="link">FMS landing </a>
                        <a href="#" class="link">Freight managment</a>
                        <ul class="language-list">

                            <?php echo Menu::widget([
                                'encodeLabels' => false,
                                'items' => [
                                    ['label' => 'english', 'url' => ['/', 'language' => 'en']],
                                    ['label' => '简体中文', 'url' => ['/', 'language' => 'cn']],
                                    ['label' => 'русский', 'url' => ['/', 'language' => 'ru']],
                                ],
                                'options' => [
                                    'class' => 'language-list'
                                ],
                            ]); ?>
                        </ul>
                    </div>
                    <nav id="nav">
                        <div class="desctop">
                            <div class="popup-container">
                                <button class="btn open-popup"><?php echo Yii::t('app', 'Count delivery')?></button>

                            </div>
                            <?php echo Menu::widget([
                                'encodeLabels' => false,
                                'items' => $menu,
                                'options' => [
                                    'class' => 'default-list'
                                ],
                            ]); ?>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <a class="mob-btn" href="#"><span></span></a>
        <div class="mobile-content">
            <div class="mobile-nav-container">
                <nav id="nav" class="mobile">
                    <div class="back"><a href="#"> < back</a></div>
                    <ul>
                        <li class="has-drop">
                            <a href="about.html">about company</a>
                            <div class="drop">
                                <ul>
                                    <li><a href="about.html">company history and possibilities</a></li>
                                    <li><a href="about.html">managment</a></li>
                                    <li><a href="about.html">current jobs</a></li>
                                    <li><a href="about.html">responsibility and security</a></li>
                                    <li><a href="about.html">company news</a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="building.html">our services</a>
                        </li>
                        <li>
                            <a href="solutions.html">clients and partners</a>
                        </li>
                        <li class="has-drop">
                            <a href="catalog-group-begin.html">contacts</a>
                        </li>
                    </ul>
                </nav>
                <div class="info-holder">
                    <div class="tel-holder">
                        <span>contact us:</span>
                        <a href="tel:+74959025806" class="tel">0574-87259554 </a>
                    </div>
                </div>
            </div>
        </div>
        <?=$this->render('_calcPopup')?>
    </div>

    <form action="#" class="popup-form">
        <fieldset>
            <div class="input-holder">
                <input type="text" placeholder="Managment">
            </div>
            <input type="submit" value="search">
        </fieldset>
    </form>
</header>