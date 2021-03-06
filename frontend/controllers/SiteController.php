<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use common\models\forms\CalculateDelivery;
use common\models\Page;
use yii\web\NotFoundHttpException;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {

        $model = Page::find()->where(['alias' => 'home'])->one();
        return $this->render('index',
            [
                'model' => $model,
            ]);
    }

    public function actionAbout()
    {
        $model = Page::find()->where(['alias' => 'company_history_and_possibilities'])->one();
        return $this->render('about',
            [
                'model' => $model,
            ]);
    }

    public function actionManagement()
    {
        $model = Page::find()->where(['alias' => 'managment'])->one();
        return $this->render('management',
            [
                'model' => $model,
                'children' => $model->childAlias ? $model->getChildrenList($model->childAlias) : [],
            ]);
    }
    public function actionNews()
    {
        $model = Page::find()->where(['alias' => 'company_news'])->one();

        return $this->render('news',
            [
                'model' => $model,
                'children' => $model->childAlias ? $model->getChildrenNewsFront($model->childAlias) : [],
            ]);
    }
    public function actionCargo_selection()
    {
        $model = Page::find()->where(['alias' => 'cargo_selection'])->one();
        return $this->render('cargo_selection',
            [
                'model' => $model,
                'children' => $model->childAlias ? $model->getChildrenList($model->childAlias) : [],
            ]);
    }
    public function actionNewsitem($id)
    {

        $parentId =7;
        $parent = $this->findModel($parentId);
        $model = $id ? $this->findModel($id) : new Page();
        $model->idCategory = $parent->idCategory;
        $model->alias = $parent->childAlias;
        $model->isChild = 1;

        return $this->render('newsitem', [
            'model' => $model,
            'parent' => $parent,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = Page::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionCalculate()
    {
        $req = Yii::$app->getRequest();
        $model = new CalculateDelivery();
        if(!$req->getIsAjax() || !$model->load($req->post())) {
            throw new BadRequestHttpException();
        }

        if(!$model->sendForm()) {
            $errors = [];
            foreach($model->getErrors() as $attr => $attrErrors) {
                $errors = array_merge($errors, $attrErrors);
            }
            //$message = Yii::t('app', 'An error occurred');
            $message = 'error is here';
            $message .= "\n" . implode("\n", $errors);
            throw new BadRequestHttpException($message);
        }

        //return Yii::t('app', 'Your request has been sent successfully');
        return 'Your request has been sent successfully';
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */


    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
