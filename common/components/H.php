<?php

namespace common\components;

use Yii;

/**
 * This is the Helper class
 */
class H
{

    /**
     * @return Html [displays arrays/objects for testing]
     */
    public function p($something)
    {
        echo "<pre>";
        var_dump($something);
        echo "</pre>";
        die();
    }

    /**
     * @return String [return current language]
     */
    public function lang()
    {
        return Yii::$app->language;
    }

    /**
     * @return String [return current language]
     */
    public function langText($lang)
    {
        $langs = [ 'en' => Yii::t('app', 'English'), 'ru' => Yii::t('app', 'Russian'), 'cn' => Yii::t('app', 'Chinese')  ];
        return $langs[$lang];
    }

    /**
     * @return [Array] [array of language codes]
     */
    public function langs()
    {
        return Yii::$app->getUrlManager()->languages;
    }

}
