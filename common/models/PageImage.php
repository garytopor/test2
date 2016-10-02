<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;
use common\components\H;
use common\components\ImageHelper;

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
    const DEVICE_SOURCE_VALUE   = 'source';
    const DEVICE_SOURCE_NAME    = 'Source';

    const DEVICE_DESKTOP_VALUE  = 'desktop';
    const DEVICE_DESKTOP_NAME   = 'Desktop';

    const DEVICE_MOBILE_VALUE   = 'mobile';
    const DEVICE_MOBILE_NAME    = 'Mobile';

    const MOBILE_MAX_WIDTH      = 800;

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
    public function getPage()
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
            self::removeImage($image);
        }
    }

    public function removeImage($image)
    {
        @unlink(Yii::getAlias('@common') . '/static/' . $image->src . '.' . $image->ext );
        $image->delete();
    }

    public function uploadImage($page, $type)
    {
        $file = UploadedFile::getInstanceByName('i18n[' . $type . '][img]');
        $name = $page . '-' . $type . '-' . uniqid();
        $file->saveAs(Yii::getAlias('@common') . '/static/' . $name . '.' . $file->extension);
        return [$name, $file->extension];
    }

    public function setPosition($type, $idPage, $position)
    {
        $image = PageImage::find()
            ->where(['idPage' => $idPage, 'type' => $type, 'device' => self::DEVICE_SOURCE_VALUE])
            ->one();
        $image->x = $position['x'];
        $image->y = $position['y'];
        $image->h = $position['h'];
        $image->w = $position['w'];
        return $image->save();
    }

    public function cropImage($type, $idPage, $position, $device)
    {
        $model = PageImage::find()
            ->where(['idPage' => $idPage, 'type' => $type, 'device' => $device])
            ->one();
        if ($model) self::removeImage($model);
        $image = PageImage::find()
            ->where(['idPage' => $idPage, 'type' => $type, 'device' => self::DEVICE_SOURCE_VALUE])
            ->one();

        $source = Yii::getAlias('@common') . '/static/' . $image->src;
        $file = $image->page->alias . '-' . $image->type . '--' . $device . '-' . uniqid();
        $result = Yii::getAlias('@common') . '/static/' . $file;
        exec(
            'gm convert ' . $source . '.' . $image->ext .
            ' -crop ' . $image->w . 'x' . $image->h . '+' . $image->x . '+' . $image->y . ' ' .
            $result . '.' . $image->ext
        );

        if ($image->w > self::MOBILE_MAX_WIDTH && $device == self::DEVICE_MOBILE_VALUE) {
            exec(
                'gm convert ' . $result . '.' . $image->ext .
                ' -resize ' . self::MOBILE_MAX_WIDTH . 'x ' .
                $result . '.' . $image->ext
            );
        }

        PageImage::saveImage($type, $idPage, [$file, $image->ext], $device);

    }
}
