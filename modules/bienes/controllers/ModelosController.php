<?php

namespace app\modules\bienes\controllers;

use Yii;
use app\modules\bienes\models\BienesModelos;
use app\modules\bienes\models\BienesModelosSearch;
use app\components\AitController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\Model;
use yii\widgets\Pjax;
use yii\helpers\Html;
use yii\web\Response;
use yii\widgets\ActiveForm;


/**
 * ModelosController implements the CRUD actions for BienesModelos model.
 */
class ModelosController extends AitController
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
     * Lists all BienesModelos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BienesModelosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BienesModelos model.
     * @param integer $id
     * @return mixed
     */
   public function actionView($id)
    {
         $model = $this->findModel($id);
    return $this->renderAjax('view', [
        'model' => $model,
    ]);
    }

    /**
     * Creates a new BienesModelos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
   public function actionCreate($submit= false)
    {
         $model = new BienesModelos();
       if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) && $submit == false) {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return ActiveForm::validate($model);
    }
 
    if ($model->load(Yii::$app->request->post())) {
        if ($model->save()) {
            $model->refresh();
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'message' => '¡Guardado Éxitosamente!',
            ];
        } else {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }
 
    return $this->renderAjax('create', [
        'model' => $model,
    ]);
}

    /**
     * Updates an existing BienesModelos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id, $submit = false)
    {
         $model = $this->findModel($id);
 
    if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post()) && $submit == false) {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return ActiveForm::validate($model);
    }
 
    if ($model->load(Yii::$app->request->post())) {
        if ($model->save()) {
            $model->refresh();
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'message' => '¡Guardado Éxitosamente!',
            ];
        } else {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
    }
 
    return $this->renderAjax('update', [
        'model' => $model,
    ]);
    }

    /**
     * Deletes an existing BienesModelos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BienesModelos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BienesModelos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BienesModelos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
