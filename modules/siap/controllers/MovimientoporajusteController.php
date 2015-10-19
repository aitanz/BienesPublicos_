<?php

namespace app\modules\siap\controllers;

use Yii;
use app\components\AitController;
use app\modules\siap\models\Movimientoporajuste;
use app\modules\siap\models\MovimientoporajusteSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MovimientoporajusteController implements the CRUD actions for Movimientoporajuste model.
 */
class MovimientoporajusteController extends AitController
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

    /**
     * Lists all Movimientoporajuste models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MovimientoporajusteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Movimientoporajuste model.
     * @param integer $id_documento
     * @param integer $id_ajuste
     * @return mixed
     */
    public function actionView($id_documento, $id_ajuste)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_documento, $id_ajuste),
        ]);
    }

    /**
     * Creates a new Movimientoporajuste model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Movimientoporajuste();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_documento' => $model->id_documento, 'id_ajuste' => $model->id_ajuste]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Movimientoporajuste model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_documento
     * @param integer $id_ajuste
     * @return mixed
     */
    public function actionUpdate($id_documento, $id_ajuste)
    {
        $model = $this->findModel($id_documento, $id_ajuste);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_documento' => $model->id_documento, 'id_ajuste' => $model->id_ajuste]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Movimientoporajuste model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_documento
     * @param integer $id_ajuste
     * @return mixed
     */
    public function actionDelete($id_documento, $id_ajuste)
    {
        $this->findModel($id_documento, $id_ajuste)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Movimientoporajuste model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_documento
     * @param integer $id_ajuste
     * @return Movimientoporajuste the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_documento, $id_ajuste)
    {
        if (($model = Movimientoporajuste::findOne(['id_documento' => $id_documento, 'id_ajuste' => $id_ajuste])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
