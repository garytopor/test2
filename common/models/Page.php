<?php

namespace common\models;

use Yii;
use common\models\PageLang;
use common\models\PageImage;
use common\components\H;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "page".
 *
 * @property integer $id
 * @property integer $idCategory
 * @property string $alias
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
    public function getPageImageByType($type, $device)
    {
        return $this->hasOne(PageImage::className(), ['idPage' => 'id'])
            ->where(
                'type = :type and device = :device',
                [ ':type' => $type, ':device' => $device ]
            )->one();
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
        $result = $this->hasOne(PageLang::className(), ['idPage' => 'id'])
            ->where(
                'lang = :lang and type = :type',
                [ ':lang' => Yii::$app->language, ':type' => $type ]
            )->one();
        if (!$result) $result = new PageLang();
        return $result;
    }

    /**
     * @return [ActiveRecord] [<get the translated content by type (title, keywords, content ...)>]
     */
    public function getContentByTypeLang($type, $lang)
    {
        $result = $this->hasOne(PageLang::className(), ['idPage' => 'id'])
            ->where(
                'lang = :lang and type = :type',
                [ ':lang' => $lang, ':type' => $type ]
            )->one();
        if (!$result) $result = new PageLang();
        return $result;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Page::className(), ['childAlias' => 'alias']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPageFields()
    {
        return $this->hasMany(PageField::className(), ['aliasPage' => 'alias']);
    }

    public function getField($field)
    {
        $result = $this->hasOne(PageField::className(), ['aliasPage' => 'alias'])
            ->where(
                'aliasField = :field',
                [ ':field' => $field ]
            )->one();
        if (!$result) $result = new PageField();
        return $result;
    }


    public function saveFromPost($model)
    {
        $post = Yii::$app->request->post();

        if (!empty($post)) {
            $langs = H::langs();
            $fields = $model->pageFields;

            $transaction = Yii::$app->db->beginTransaction();
            try {
                if (!$model->id) $model->save();
                PageLang::deleteAll(['idPage' => $model->id]);
                foreach ($fields as $field) {
                    $type = $field->aliasField;
                    if ($field->field->i18n) {
                        foreach ($langs as $lang) PageLang::savePost($post[$lang][$type], $type, $model, $lang);
                    } else {
                        if (!empty(UploadedFile::getInstanceByName('i18n['.$type.'][img]'))) {
                            PageImage::removeAllImages($type, $model->id);
                            $file = PageImage::uploadImage($model->alias, $type);
                            PageImage::saveImage($type, $model->id, $file, 'source');
                        }
                        if (isset($post['i18n'][$type]['x'])) {
                            PageImage::setPosition($type, $model->id, $post['i18n'][$type]);
                            PageImage::cropImage($type, $model->id, $post['i18n'][$type], PageImage::DEVICE_DESKTOP_VALUE);
                            PageImage::cropImage($type, $model->id, $post['i18n'][$type], PageImage::DEVICE_MOBILE_VALUE);
                        } else {
                            if (isset($post['i18n'][$type])) PageLang::savePost($post['i18n'][$type], $type, $model, 'i18n');
                        }
                    }
                }
                $transaction->commit();
                return true;
            } catch (Exception $e) {
                $transaction->rollBack();
                throw $e;
                return false;
            }

        }
    }

    public function getChildrenList($childAlias)
    {
        return new ActiveDataProvider([
            'query' => Page::find()->where(['alias' => $childAlias])->orderBy('id DESC'),
            'pagination' => [
                'pageSize' => 12,
            ],
        ]);;
    }

}
