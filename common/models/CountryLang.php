<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "country_lang".
 *
 * @property integer $id
 * @property integer $idCountry
 * @property string $lang
 * @property string $val
 *
 * @property Country $idCountry0
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
            [['idCountry', 'lang', 'val'], 'required'],
            [['idCountry'], 'integer'],
            [['lang'], 'string', 'max' => 5],
            [['val'], 'string', 'max' => 255],
            [['idCountry'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['idCountry' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'idCountry' => Yii::t('app', 'Id Country'),
            'lang' => Yii::t('app', 'Lang'),
            'val' => Yii::t('app', 'Val'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCountry0()
    {
        return $this->hasOne(Country::className(), ['id' => 'idCountry']);
    }
}
