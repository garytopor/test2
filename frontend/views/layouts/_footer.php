<?php
use yii\widgets\Menu;
use common\models\Category;
$menu = Category::getMenuBottom();
?>
<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <a href="#" class="copy">© 2016, Moro <br> All rights reserved </a>
            <?php echo Menu::widget([
                                'encodeLabels' => false,
                                'items' => $menu,
                                'options' => [
                                    'class' => 'footer-list'
                                ],
                            ]); ?>

            <ul class="contacts-list">
                <li>
                    Tel: <a href="tel:057487259554" class="phone">0574-87259554 </a>
                </li>
                <li>
                    <span class="mail">E-mail: <a href="#">lin@moro.hk</a></span>
                </li>
                <li>&nbsp;</li>
                <li>
                    Rainbow Road, Jiangdong District, Ningbo City on the 11th, Carnival World Trade Room 1101 A Block, China.
                </li>
                <li>
                    <a href="#"><?php echo Yii::t('app', 'all braches on a map');?></a>
                </li>
            </ul>
            <div class="form-holder">
                <form action="" class="footer-form">
                    <fieldset>
                        <h3><?php echo Yii::t('app', 'If you have any question to us,<br> let us contact with you:');?></h3>
                        <div class="row">
                            <input type="text" class="input" placeholder="<?php echo Yii::t('app', 'Your name');?>">
                        </div>
                        <div class="row">
                            <input type="text" class="input" placeholder="<?php echo Yii::t('app', 'E-mail');?>">
                        </div>
                        <div class="row">
                            <input type="text" class="input" placeholder="<?php echo Yii::t('app', 'Company name');?>">
                        </div>
                        <div class="btn-holder">
                            <input type="submit" class="btn" value="<?php echo Yii::t('app', 'Contact with me');?>">
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</footer>