<?php

namespace common\models;

use Yii;
use yii\helpers\Html;
use common\components\H;

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
    const TYPE_TEXT_VALUE  = 'text';
    const TYPE_TEXT_NAME   = 'Text';
    const TYPE_HTML_VALUE  = 'html';
    const TYPE_HTML_NAME   = 'Html';
    const TYPE_IMAGE_VALUE = 'image';
    const TYPE_IMAGE_NAME  = 'Image';

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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContent()
    {
        return $this->hasOne(FieldLang::className(), ['idField' => 'id'])->where('lang = :lang', [ ':lang' => Yii::$app->language ]);
    }

    /**
     * @return Array
     */
    public static function getTypes()
    {
        return [
            self::TYPE_TEXT_VALUE  => self::TYPE_TEXT_NAME,
            self::TYPE_HTML_VALUE  => self::TYPE_HTML_NAME,
            self::TYPE_IMAGE_VALUE => self::TYPE_IMAGE_NAME,
        ];
    }

    /**
     * @return String
     */
    public static function getTypeName($type, $default = null)
    {
        $types = static::getTypes();
        return isset($types[$type]) ? $types[$type] : $default;
    }


    /**
     * @return Html [return html component by type]
     */
    public function getInputField($field, $lang, $model)
    {
        $input;
        $content = $model->getContentByTypeLang($field->alias, $lang);
        if (!empty($content) && !empty($content->val)) $content = $content->val;

        switch ($field->type) {
            case Field::TYPE_TEXT_VALUE:
                $input = Html::input('text',  $lang . '[' .$field->alias . ']', $content, ['class' => 'form-control']);
                break;
            case Field::TYPE_HTML_VALUE:
                $input = Html::textarea($lang . '[' .$field->alias . ']', $content, ['class' => 'wysihtml5']);
                break;
            case Field::TYPE_IMAGE_VALUE:
                $content = $model->getPageImageByType($field->alias, 'source');
                $crop = '';
                if (!empty($content->src)) {
                    $crop = $content->x . ',' . $content->y . ',' . $content->w . ',' . $content->h;
                    $content = $content->src . '.' . $content->ext;
                }
                $input = Html::fileInput($lang . '[' .$field->alias . '][img]', $content, [
                    'class' => 'field-image', 'accept' => 'image/*', 'crop' => $crop
                ]);
                break;
        }
        return $input;
    }

    /**
     * @return Html [return label by current language]
     */
    public function getInputLabel($field, $css)
    {
        $text = $field->alias;
        if (!empty($field->content) && !empty($field->content->val)) $text = $field->content->val;
        return Html::label($text, '', ['class' => $css]);
    }

}
