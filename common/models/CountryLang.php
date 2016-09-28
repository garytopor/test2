<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "country_lang".
 *
 * @property integer $id
 * @property integer $country_id
 * @property integer $lang_id
 * @property string $val
 */
class CountryLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country_id', 'lang_id', 'val'], 'required'],
            [['country_id', 'lang_id'], 'integer'],
            [['val'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'country_id' => Yii::t('app', 'Country ID'),
            'lang_id' => Yii::t('app', 'Lang ID'),
            'val' => Yii::t('app', 'Val'),
        ];
    }
}
