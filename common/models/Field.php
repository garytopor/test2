<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "field".
 *
 * @property integer $id
 * @property string $alias
 * @property string $type
 *
 * @property FieldLang[] $fieldLangs
 */
class Field extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'field';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'type'], 'required'],
            [['alias', 'type'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'alias' => Yii::t('app', 'Alias'),
            'type' => Yii::t('app', 'Type'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFieldLangs()
    {
        return $this->hasMany(FieldLang::className(), ['idField' => 'id']);
    }
}
