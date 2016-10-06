<?php

namespace common\models;

use Yii;
use common\models\CityLang;

/**
 * This is the model class for table "city".
 *
 * @property integer $id
 * @property integer $idCountry
 * @property string $lat
 * @property string $lon
 *
 * @property Country $idCountry0
 * @property CityLang[] $cityLangs
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idCountry', 'lat', 'lon'], 'required'],
            [['idCountry'], 'integer'],
            [['lat', 'lon'], 'number'],
            [['idCountry'], 'exist', 'skipOnError' => true, 'targetClass' => Country::className(), 'targetAttribute' => ['idCountry' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'idCountry' => Yii::t('app', 'Id Country'),
            'latLon' => Yii::t('app', 'LatLon'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCountries()
    {
        return $this->hasOne(Country::className(), ['id' => 'idCountry']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCityLangs()
    {
        return $this->hasMany(CityLang::className(), ['idCity' => 'id']);
    }

    /**
     * @return [ActiveRecord] [<get the translated content>]
     */
    public function getContent()
    {
        return $this->hasOne(CityLang::className(), ['idCity' => 'id'])->where('lang = :lang', [ ':lang' => Yii::$app->language ]);
    }

    public function savePost($model)
    {
        $post = Yii::$app->request->post();
        if (!empty($post) && !empty($post['name'])) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->latLon = $post['latLon'];
                $model->save();
                if($model->content) $model->content->delete();
                $lang = new CityLang();
                $lang->idCity = $model->id;
                $lang->lang = Yii::$app->language;
                $lang->val = $post['name'];
                $lang->save();
                $transaction->commit();
                return true;
            } catch (Exception $e) {
                $transaction->rollBack();
            }
            return false;
        }
    }

}
