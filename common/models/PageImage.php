<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;
use common\components\H;

/**
 * This is the model class for table "page_image".
 *
 * @property integer $id
 * @property integer $idPage
 * @property string $type
 * @property string $device
 * @property string $src
 *
 * @property Page $idPage0
 */
class PageImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idPage', 'type', 'device', 'src'], 'required'],
            [['idPage'], 'integer'],
            [['type', 'device'], 'string', 'max' => 50],
            [['src'], 'string', 'max' => 255],
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
            'type' => Yii::t('app', 'Type'),
            'device' => Yii::t('app', 'Device'),
            'src' => Yii::t('app', 'Src'),
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
    public function saveImage($type, $idPage, $file, $device)
    {
        $image = new PageImage();
        $image->idPage = $idPage;
        $image->type = $type;
        $image->device = $device;
        $image->src = $file[0];
        $image->ext = $file[1];
        $image->save();
        return $image;

    }

    public function removeAllImages($type, $idPage)
    {
        $images = PageImage::find()->where(['idPage' => $idPage, 'type' => $type])->all();
        foreach ($images as $image) {
            unlink(Yii::getAlias('@common') . '/static/' . $image->src . '.' . $image->ext );
            $image->delete();
        }
    }

    public function uploadImage($page, $type)
    {
        $file = UploadedFile::getInstanceByName('i18n[' . $type . '][img]');
        $name = $page . '-' . $type;
        $file->saveAs(Yii::getAlias('@common') . '/static/' . $name . '.' . $file->extension);
        return [$name, $file->extension];
    }

    public function setPosition($type, $idPage, $position)
    {
        $image = PageImage::find()
            ->where(['idPage' => $idPage, 'type' => $type, 'device' => 'source'])
            ->one();
        $image->x = $position['x'];
        $image->y = $position['y'];
        $image->h = $position['h'];
        $image->w = $position['w'];
        return $image->save();
    }

    public function cropImage($type, $idPage, $position, $device)
    {
        PageImage::find()
            ->where(['idPage' => $idPage, 'type' => $type, 'device' => $device])
            ->one()->delete();
        $image = PageImage::find()
            ->where(['idPage' => $idPage, 'type' => $type, 'device' => 'source'])
            ->one();
        exec(
            'gm convert ' . Yii::getAlias('@common') . '/static/' . $image->src . '.' . $image->ext .
            ' -crop ' . $image->w . 'x' . $image->h . '+' . $image->x . '+' . $image->y . ' ' .
            Yii::getAlias('@common') . '/static/' . $image->src . '--' . $device . '.' . $image->ext
        );

        PageImage::saveImage($type, $idPage, [$image->src . '--' . $device, $image->ext], $device);

    }
}
