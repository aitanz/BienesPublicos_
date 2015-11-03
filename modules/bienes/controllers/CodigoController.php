<?php

namespace app\modules\bienes\controllers;

use Yii;
use app\modules\bienes\models\BienesCodigo;
use app\modules\bienes\models\BienesCodigoSearch;
use app\components\AitController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use yii\web\Response;
class CodigoController extends AitController
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
     * Lists all BienesCodigo models.
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
     * Displays a single BienesCodigo model.
     * @param integer $id
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BienesCodigoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new BienesCodigo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
 public function actionCreate($submit= false)
    {
        $model = new BienesCodigo();
        $model->padre=0;

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
/*
public function actionAjaxMensaje()
{
    $model= new BienesCodigo();
    $model->$this->mensaje;
return $this->render('index',['model'=>$model
    ]);
}*/
  
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
     * Deletes an existing BienesCodigo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    protected function findModel($id)
    {
        if (($model = BienesCodigo::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
