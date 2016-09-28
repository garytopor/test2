<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "page_lang".
 *
 * @property integer $id
 * @property integer $idPage
 * @property integer $idLang
 * @property string $type
 * @property string $val
 *
 * @property Lang $idLang0
 * @property Page $idPage0
 */
class PageLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idPage', 'idLang', 'type', 'val'], 'required'],
            [['idPage', 'idLang'], 'integer'],
            [['val'], 'string'],
            [['type'], 'string', 'max' => 50],
            [['idLang'], 'exist', 'skipOnError' => true, 'targetClass' => Lang::className(), 'targetAttribute' => ['idLang' => 'id']],
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
            'idLang' => Yii::t('app', 'Id Lang'),
            'type' => Yii::t('app', 'Type'),
            'val' => Yii::t('app', 'Val'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdLang0()
    {
        return $this->hasOne(Lang::className(), ['id' => 'idLang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPage0()
    {
        return $this->hasOne(Page::className(), ['id' => 'idPage']);
    }
}
