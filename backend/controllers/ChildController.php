<?php

namespace backend\controllers;

use Yii;
use common\models\Page;
use common\models\PageImage;

class ChildController extends \yii\web\Controller
{

    public function actionUpdate($parentId, $id = null)
    {
        $this->layout = 'guest';
        $parent = $this->findModel($parentId);

        $model = $id ? $this->findModel($id) : new Page();
        $model->idCategory = $parent->idCategory;
        $model->alias = $parent->childAlias;
        $model->isChild = 1;

        if (Page::saveFromPost($model)) die("<script>window.close();</script>");

        return $this->render('update', [
            'model' => $model,
            'parent' => $parent,
        ]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if ($model->isChild) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                foreach ($model->pageLangs as $pageLang) {
                    $pageLang->delete();
                }
                foreach ($model->pageImages as $pageImage) {
                    PageImage::removeImage($pageImage);
                }
                $model->delete();
                $transaction->commit();
            } catch (Exception $e) {
                $transaction->rollBack();
            }
        }
        echo 1;
    }


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

}
