<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "page".
 *
 * @property integer $id
 * @property integer $idCategory
 * @property string $alias
 * @property string $createdAt
 *
 * @property Category $idCategory0
 * @property PageImage[] $pageImages
 * @property PageLang[] $pageLangs
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idCategory', 'alias'], 'required'],
            [['idCategory'], 'integer'],
            [['createdAt'], 'safe'],
            [['alias'], 'string', 'max' => 50],
            [['idCategory'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['idCategory' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'idCategory' => Yii::t('app', 'Id Category'),
            'alias' => Yii::t('app', 'Alias'),
            'createdAt' => Yii::t('app', 'Created At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCategory0()
    {
        return $this->hasOne(Category::className(), ['id' => 'idCategory']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPageImages()
    {
        return $this->hasMany(PageImage::className(), ['idPage' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPageLangs()
    {
        return $this->hasMany(PageLang::className(), ['idPage' => 'id']);
    }

    /**
     * @return [ActiveRecord] [<get the translated content by type (title, keywords, content ...)>]
     */
    public function getContent($type)
    {
        return $this->hasOne(PageLang::className(), ['idPage' => 'id'])
            ->where(
                'lang = :lang and type = :type',
                [ ':lang' => Yii::$app->language, ':type' => $type ]
            )->one();
    }

}
