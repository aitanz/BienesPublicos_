<?php

namespace app\modules\admin\controllers;

use Yii;
use app\components\AitController;
use app\modules\admin\models\Acciones;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AccionesController implements the CRUD actions for Acciones model.
 */
class AccionesController extends AitController
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
        return Yii::getAlias('@admin/views/acciones');
    }

    /**
     * Lists all Acciones models.
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->redirect('/admin/modulo');
    }

    /**
     * Displays a single Acciones model.
     * @param integer $id_accion
     * @param integer $id_controlador
     * @return mixed
     */
    public function actionView($id_accion, $id_controlador)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_accion, $id_controlador),
        ]);
    }

    /**
     * Creates a new Acciones model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        return $this->redirect('/admin/modulo');
    }

    /**
     * Updates an existing Acciones model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_accion
     * @param integer $id_controlador
     * @return mixed
     */
    public function actionUpdate($id_accion, $id_controlador)
    {
        return $this->redirect('/admin/modulo');
    }

    /**
     * Deletes an existing Acciones model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_accion
     * @param integer $id_controlador
     * @return mixed
     */
    public function actionDelete($id_accion, $id_controlador)
    {
        return $this->redirect('/admin/modulo');
    }

    /**
     * Finds the Acciones model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_accion
     * @param integer $id_controlador
     * @return Acciones the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_accion, $id_controlador)
    {
        if (($model = Acciones::findOne(['id_accion' => $id_accion, 'id_controlador' => $id_controlador])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
