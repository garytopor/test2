<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $alias
 * @property integer $sort
 * @property integer $showInMenu
 * @property string $icon
 *
 * @property CategoryLang[] $categoryLangs
 * @property Page[] $pages
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alias', 'sort'], 'required'],
            [['sort', 'showInMenu'], 'integer'],
            [['alias', 'icon'], 'string', 'max' => 50],
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
            'sort' => Yii::t('app', 'Sort'),
            'showInMenu' => Yii::t('app', 'Show In Menu'),
            'icon' => Yii::t('app', 'Icon'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryLangs()
    {
        return $this->hasMany(CategoryLang::className(), ['idCategory' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPages()
    {
        return $this->hasMany(Page::className(), ['idCategory' => 'id']);
    }

    /**
     * @return [ActiveRecord] [<get the translated content>]
     */
    public function getContent()
    {
        return $this->hasOne(CategoryLang::className(), ['idCategory' => 'id'])->where('lang = :lang', [ ':lang' => Yii::$app->language ]);
    }

    /**
     * @return [Array] [<left menu items for backend>]
     */
    public function getMenu()
    {
        $result = [];
        $categories = Category::findAll(['showInMenu' => 1]);
        foreach ($categories as $category) {
            $items = [];
            foreach ($category->pages as $page) {
                if (!$page->isChild) $items[] = [
                    'label' => $page->getContent('title')->val,
                    'url' => ['page/update', 'id' => $page->id ]
                ];
            }

            $result[] = [
                'label' =>  '<i class="' . $category->icon . '"></i><span>' . $category->content->val.'</span>',
                'url' => '#',
                'items' => $items
            ];
        }
        return $result;
    }
    public function getMenuFront()
    {
        $result = [];
        $categories = Category::findAll(['showInMenu' => 1]);
        foreach ($categories as $category) {
            $result[] = [
                'label' => $category->content->val,
                'url' => '#',

            ];
        }
        return $result;
    }
    public function getMenuBottom()
    {
        $result = [];
        $categories = Category::findAll(['showInMenu' => 1]);
        foreach ($categories as $category) {
            $result[] = [
                'label' => '<strong>'.$category->content->val.'</strong>',
                'url' => '#',

            ];
        }
        $result[] = [
                'label' => '&nbsp;',
                'url' => '#',];
        $result[] = [
                'label' => 'FMS landing',
                'url' => '#',];
        $result[] = [
                'label' => 'Freight managment',
                'url' => '#',];
        return $result;
    }
}
