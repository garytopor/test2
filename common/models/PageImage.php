<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "page_image".
 *
 * @property integer $id
 * @property integer $idPage
 * @property string $type
 * @property string $device
 * @property string $src
 *
 * @property Page $idPage0
 */
class PageImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idPage', 'type', 'device', 'src'], 'required'],
            [['idPage'], 'integer'],
            [['type', 'device'], 'string', 'max' => 50],
            [['src'], 'string', 'max' => 255],
            [['idPage'], 'exist', 'skipOnError' => true, 'targetClass' => Page::className(), 'targetAttribute' => ['idPage' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'idPage' => Yii::t('app', 'Id Page'),
            'type' => Yii::t('app', 'Type'),
            'device' => Yii::t('app', 'Device'),
            'src' => Yii::t('app', 'Src'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPage0()
    {
        return $this->hasOne(Page::className(), ['id' => 'idPage']);
    }
}
