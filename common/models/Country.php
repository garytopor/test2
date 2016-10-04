<?php

namespace common\models;

use Yii;
use yii\data\ActiveDataProvider;
use common\models\CountryLang;
use common\components\H;

/**
 * This is the model class for table "country".
 *
 * @property integer $id
 *
 * @property City[] $cities
 * @property CountryLang[] $countryLangs
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCities()
    {
        return $this->hasMany(City::className(), ['idCountry' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountryLangs()
    {
        return $this->hasMany(CountryLang::className(), ['idCountry' => 'id']);
    }

    /**
     * @return [ActiveRecord] [<get the translated content>]
     */
    public function getContent()
    {
        return $this->hasOne(CountryLang::className(), ['idCountry' => 'id'])->where('lang = :lang', [ ':lang' => Yii::$app->language ]);
    }

    public function getProvider()
    {
        return $dataProvider = new ActiveDataProvider([
            'query' => Country::find()->orderBy('id DESC'),
            'pagination' => [
                'pageSize' => 12,
            ],
        ]);

    }

    public function savePost ($model)
    {
        $post = Yii::$app->request->post();
        if (!empty($post) && !empty($post['name'])) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->save();
                if (!empty($model->content)) $model->content->delete();
                $lang = new CountryLang();
                $lang->idCountry = $model->id;
                $lang->lang = Yii::$app->language;
                $lang->val = $post['name'];
                $lang->save();
                $transaction->commit();
                return true;;
            } catch (Exception $e) {
                $transaction->rollBack();
            }
        }
    }
}
