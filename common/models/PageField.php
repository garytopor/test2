<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "page_field".
 *
 * @property integer $id
 * @property string $aliasPage
 * @property string $aliasField
 */
class PageField extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page_field';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['aliasPage', 'aliasField'], 'required'],
            [['aliasPage', 'aliasField'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'aliasPage' => Yii::t('app', 'Alias Page'),
            'aliasField' => Yii::t('app', 'Alias Field'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFields()
    {
        return $this->hasMany(Field::className(), ['aliasField' => 'alias']);
    }

}
