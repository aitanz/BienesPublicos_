<?php

namespace app\modules\admin\controllers;

use Yii;
use app\components\AitController;
use app\modules\admin\models\Controlador;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ControladorController implements the CRUD actions for Controlador model.
 */
class ControladorController extends AitController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function getViewPath()
    {
        return Yii::getAlias('@admin/views/controlador');
    }

    /**
     * Lists all Controlador models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->redirect('/admin/modulo');
    }

    /**
     * Displays a single Controlador model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Controlador model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        return $this->redirect('/admin/modulo');
    }

    /**
     * Updates an existing Controlador model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        return $this->redirect('/admin/modulo');
    }

    /**
     * Deletes an existing Controlador model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        return $this->redirect('/admin/modulo');
    }

    /**
     * Finds the Controlador model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Controlador the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Controlador::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
