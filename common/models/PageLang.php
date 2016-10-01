<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "page_lang".
 *
 * @property integer $id
 * @property integer $idPage
 * @property string $lang
 * @property string $type
 * @property string $val
 *
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
            [['idPage', 'lang', 'type', 'val'], 'required'],
            [['idPage'], 'integer'],
            [['val'], 'string'],
            [['lang'], 'string', 'max' => 5],
            [['type'], 'string', 'max' => 50],
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
            'lang' => Yii::t('app', 'Lang'),
            'type' => Yii::t('app', 'Type'),
            'val' => Yii::t('app', 'Val'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPage0()
    {
        return $this->hasOne(Page::className(), ['id' => 'idPage']);
    }

    /**
     * @return boolean
     */
    public function savePost($val, $type, $model, $lang)
    {
        $pageLang = $model->getContentByTypeLang($type, $lang);
        if ($pageLang) {
            $pageLang->val = $val;
        } else {
            $pageLang = new PageLang();
            $pageLang->idPage = $model->id;
            $pageLang->lang = $lang;
            $pageLang->type = $type;
            $pageLang->val = $val;
        }
        return $pageLang->save();

    }
}
