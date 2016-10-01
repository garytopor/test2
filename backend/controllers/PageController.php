<?php

namespace backend\controllers;

use Yii;
use common\models\Page;
use common\models\PageField;
use common\models\PageLang;
use common\models\PageImage;
use common\models\Field;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\H;
use yii\web\UploadedFile;

/**
 * PageController implements the CRUD actions for Page model.
 */
class PageController extends Controller
{
    /**
     * @inheritdoc
     */
/*    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Page models.
     * @return mixed
     */
/*    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Page::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Page model.
     * @param integer $id
     * @return mixed
     */
/*    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Page model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Page();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Page model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $post = Yii::$app->request->post();

        if (!empty($post)) {
            //H::p(uniqid());
            //H::p(UploadedFile::getInstanceByName('i18n[img-top][img]')->extension);
            //H::p($post);

            $langs = H::langs();
            $fields = $model->pageFields;

            $transaction = Yii::$app->db->beginTransaction();
            try {
                foreach ($fields as $field) {
                    $type = $field->aliasField;
                    if ($field->field->i18n) {
                        foreach ($langs as $lang) PageLang::savePost($post[$lang][$type], $type, $model, $lang);
                    } else {
                        if (!empty(UploadedFile::getInstanceByName('i18n['.$type.'][img]'))) {
                            PageImage::removeAllImages($type, $model->id);
                            $file = PageImage::uploadImage($model->alias, $type);
                            PageImage::saveImage($type, $model->id, $file, 'source');
                        }
                        if (isset($post['i18n'][$type]['x'])) {
                            PageImage::setPosition($type, $model->id, $post['i18n'][$type]);
                            PageImage::cropImage($type, $model->id, $post['i18n'][$type], 'desktop');
                        }
                    }
                }
                $transaction->commit();
            } catch (Exception $e) {
                $transaction->rollBack();
                throw $e;
            }

        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Page model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
/*    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
*/
    /**
     * Finds the Page model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Page the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Page::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionFields()
    {
        $pages  = Page::find()->all();
        $fields = Field::find()->all();
        foreach ($pages as $page) {
            foreach ($fields as $field) {
                $model = new PageField();
                $model->aliasPage = $page->alias;
                $model->aliasField = $field->alias;
                $model->save();
            }
        }
    }
}
