<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "field_lang".
 *
 * @property integer $id
 * @property integer $idField
 * @property string $lang
 * @property string $val
 *
 * @property Field $idField0
 */
class FieldLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'field_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idField', 'lang', 'val'], 'required'],
            [['idField'], 'integer'],
            [['lang'], 'string', 'max' => 5],
            [['val'], 'string', 'max' => 255],
            [['idField'], 'exist', 'skipOnError' => true, 'targetClass' => Field::className(), 'targetAttribute' => ['idField' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'idField' => Yii::t('app', 'Id Field'),
            'lang' => Yii::t('app', 'Lang'),
            'val' => Yii::t('app', 'Val'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdField0()
    {
        return $this->hasOne(Field::className(), ['id' => 'idField']);
    }
}
