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
    const TYPE_TEXT_VALUE          = 'text';
    const TYPE_TEXT_NAME           = 'Text';

    const TYPE_HTML_VALUE          = 'html';
    const TYPE_HTML_NAME           = 'Html';

    const TYPE_IMAGE_VALUE         = 'image';
    const TYPE_IMAGE_NAME          = 'Image';

    const TYPE_EMAIL_VALUE         = 'email';
    const TYPE_EMAIL_NAME          = 'Email';

    const TYPE_CHECKBOX_VALUE      = 'checkbox';
    const TYPE_CHECKBOX_NAME       = 'Checkbox';

    const TYPE_DATE_VALUE          = 'date';
    const TYPE_DATE_NAME           = 'Date';

    const TYPE_TEL_VALUE           = 'tel';
    const TYPE_TEL_NAME            = 'Tel';

    const TYPE_LATLON_VALUE        = 'latlon';
    const TYPE_LATLON_NAME         = 'LatLon';

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
            self::TYPE_TEXT_VALUE       => self::TYPE_TEXT_NAME,
            self::TYPE_HTML_VALUE       => self::TYPE_HTML_NAME,
            self::TYPE_IMAGE_VALUE      => self::TYPE_IMAGE_NAME,
            self::TYPE_EMAIL_VALUE      => self::TYPE_EMAIL_NAME,
            self::TYPE_TEL_VALUE        => self::TYPE_TEL_NAME,
            self::TYPE_CHECKBOX_VALUE   => self::TYPE_CHECKBOX_NAME,
            self::TYPE_DATE_VALUE       => self::TYPE_DATE_NAME,
            self::TYPE_LATLON_VALUE     => self::TYPE_LATLON_NAME,
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
        $content = $model->getContentByTypeLang($field->alias, $lang)->val;

        switch ($field->type) {
            case Field::TYPE_TEXT_VALUE:
                $input = Html::input('text',  $lang . '[' .$field->alias . ']', $content, ['class' => 'form-control']);
                break;
            case Field::TYPE_LATLON_VALUE:
                $input = self::getInputLatLon($lang . '[' .$field->alias . ']', $content);
                break;
            case Field::TYPE_DATE_VALUE:
                $input = Html::input('text',  $lang . '[' .$field->alias . ']', $content, ['class' => 'form-control pickadate']);
                break;
            case Field::TYPE_CHECKBOX_VALUE:
                $input = Html::checkbox( $lang . '[' .$field->alias . ']', $content, ['class' => 'form-control']);
                break;
            case Field::TYPE_EMAIL_VALUE:
                $input = Html::input('email',  $lang . '[' .$field->alias . ']', $content, ['class' => 'form-control', 'pattern' => '[^@]+@[^@]+\.[a-zA-Z]{2,6}']);
                break;
            case Field::TYPE_TEL_VALUE:
                $input = Html::input('tel',  $lang . '[' .$field->alias . ']', $content, ['class' => 'form-control', 'pattern' => '(\+?\d[- .]*){7,13}']);
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
                    'class' => 'field-image', 'accept' => 'image/*', 'crop' => $crop, 'ratio' => $field->imgRatio
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

    /**
     * @return Html [return latlon input with map div]
     */
    public function getInputLatLon($name, $content)
    {
        return Html::input('text',  $name, $content, ['class' => 'form-control', 'id' => 'latLon', 'readonly' => 'readonly']). '<div id="yMap" style="height:300px;"></div>';
    }

}
