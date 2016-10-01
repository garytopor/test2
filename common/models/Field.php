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
    const TYPE_TEXT_VALUE = 'text';
    const TYPE_TEXT_NAME  = 'Text';
    const TYPE_HTML_VALUE = 'html';
    const TYPE_HTML_NAME  = 'Html';

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
            self::TYPE_TEXT_VALUE => self::TYPE_TEXT_NAME,
            self::TYPE_HTML_VALUE => self::TYPE_HTML_NAME,
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

        switch ($field->type) {
            case Field::TYPE_TEXT_VALUE:
                $input = Html::input('text', $field->alias, $model->getContentByTypeLang($field->alias, $lang)->val, ['class' => 'form-control']);
                break;
            case Field::TYPE_HTML_VALUE:
                $input = Html::textarea($field->alias);
                break;
        }
        return $input;
    }

    /**
     * @return Html [return label by current language]
     */
    public function getInputLabel($field, $css)
    {
        return Html::label($field->content->val, '', ['class' => $css]);
    }

}
