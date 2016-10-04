<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "city_lang".
 *
 * @property integer $id
 * @property integer $idCity
 * @property string $lang
 * @property string $val
 */
class CityLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idCity', 'lang', 'val'], 'required'],
            [['idCity'], 'integer'],
            [['lang'], 'string', 'max' => 5],
            [['val'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'idCity' => Yii::t('app', 'Id City'),
            'lang' => Yii::t('app', 'Lang'),
            'val' => Yii::t('app', 'Val'),
        ];
    }
}
