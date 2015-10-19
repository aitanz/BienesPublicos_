<?php

namespace app\modules\bienes\controllers;

use Yii;
use app\modules\bienes\models\BienesCodigo;
use app\modules\bienes\models\BienesCodigoSearch;
use app\modules\bienes\models\AjaxMensaje;
use app\components\AitController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\web\response;

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
    public function actionView()
    {
        
    
     
        $searchModel = new BienesCodigoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('view', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
           
        ]);
    }

    /**
     * Displays a single BienesCodigo model.
     * @param integer $id
     * @return mixed
     */
    public function actionIndex()
    {  
       
        return $this->render('index');


    }

    /**
     * Creates a new BienesCodigo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
         
       
        $model = new BienesCodigo();
        $model->padre = 0;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
         
            return $this->redirect(['view', 'id' => $model->id_codigo //crear mensaje con parametro 
            
        
               ]);
                
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
/*
public function actionAjaxMensaje()
{
    $model= new BienesCodigo();
    $model->$this->mensaje;
return $this->render('index',['model'=>$model
    ]);
}*/
  
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_codigo]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
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
