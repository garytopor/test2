<?php

namespace common\models\forms;

//use back\models\Setting;
use Yii;
use yii\swiftmailer\Mailer;

/**
 * Форма для расчета стоимости доставки
 */
class CalculateDelivery extends Form
{
    /**
     * @var string Название компаниий
     */
    public $companyName;

    /**
     * @var string Контактное лицо
     */
    public $contactName;

    /**
     * @var string $email
     */
    public $email;

    /**
     * @var string Номер телефона
     */
    public $phone;

    /**
     * @var string Откуда
     */
    public $destinationFrom;

    /**
     * @var string Куда
     */
    public $destinationTo;

    /**
     * @var string Тип груза
     */
    public $cargoType;

    /**
     * @var string Параметры груза
     */
    public $cargoParams;

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [
            [
                ['companyName', 'contactName', 'email', 'phone', 'destinationFrom', 'destinationTo', 'cargoType', 'cargoParams'],
                'required'
            ],
            [
                'email',
                'email',
                'message' => Yii::t('app', 'Type correct e-mail'),
            ],
        ];
    }

    /**
     * @inheritDoc
     */
    public function attributeLabels()
    {
        return [
            'companyName' => Yii::t('app', 'company name'),
            'contactName' => Yii::t('app', 'contact name'),
            'email' => Yii::t('app', 'e-mail'),
            'phone' => Yii::t('app', 'phone number'),
            'destinationFrom' => Yii::t('app', 'destination from'),
            'destinationTo' => Yii::t('app', 'destination to'),
            'cargoType' => Yii::t('app', 'cargo type'),
            'cargoParams' => Yii::t('app', 'cargo quantity, weight and size'),
        ];
    }

    /**
     * Отправляет форму
     *
     * @return bool Результат отправления
     */
    public function sendForm()
    {
        if(!$this->validate()) {
            return false;
        }

        /* @var Mailer $mailer */
        $mailer = Yii::$app->getMailer();
        $message = $mailer->compose('admins/calculateDelivery', [
            'model' => $this,
        ]);
        return $message
            //->setTo(Setting::getValueByID(Setting::ID_ADMIN_EMAIL))
            ->setTo('rabdavinci@yandex.ru')
            ->setFrom('rabdavinci@yandex.ru')
            ->send();
    }
}