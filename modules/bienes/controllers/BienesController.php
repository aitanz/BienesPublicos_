<?php

namespace app\modules\bienes\controllers;

use Yii;
use app\modules\bienes\models\BienesNCodigoBien;
use app\modules\bienes\models\BienesNCodigoBienSearch;
use app\components\AitController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\bienes\models\BienesLocalidad;

$BienesLocalidad =  new BienesLocalidad;
/**
 * BienesController implements the CRUD actions for BienesNCodigoBien model.
 */
class BienesController extends AitController
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
     * Lists all BienesNCodigoBien models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BienesNCodigoBienSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BienesNCodigoBien model.
     * @param integer $id_codigo
     * @param integer $id_localidad
     * @return mixed
     */
    public function actionView($id_codigo, $id_localidad)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_codigo, $id_localidad),


            //'model' => $this->findModel($id_codigo, find->where('$BienesLocalidad' = $id_localidad),
            //$BienesLocalidad

          //  (['view', 'id_codigo' => $model->id_codigo, 'id_localidad' => $model->id_localidad]);

        ]);
    }

    /**
     * Creates a new BienesNCodigoBien model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BienesNCodigoBien();


        //$model->identificacion= 1;
        //$model->descripcion= 1;
        //$model->valor_unidad= 1;
        //$model->justiprecio= 1;
        $model->ano_adquisicion= '2015-07-08';
        //$model->ubicacion= 1;
        //$model->tipo_adquisicion= 1;
        //$model->n_documento= 1;


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_codigo' => $model->id_codigo, 'id_localidad' => $model->id_localidad]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Updates an existing BienesNCodigoBien model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_codigo
     * @param integer $id_localidad
     * @return mixed
     */
    public function actionUpdate($id_codigo, $id_localidad)
    {
        $model = $this->findModel($id_codigo, $id_localidad);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_codigo' => $model->id_codigo, 'id_localidad' => $model->id_localidad]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing BienesNCodigoBien model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_codigo
     * @param integer $id_localidad
     * @return mixed
     */
    public function actionDelete($id_codigo, $id_localidad)
    {
        $this->findModel($id_codigo, $id_localidad)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BienesNCodigoBien model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_codigo
     * @param integer $id_localidad
     * @return BienesNCodigoBien the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_codigo, $id_localidad)
    {
        if (($model = BienesNCodigoBien::findOne(['id_codigo' => $id_codigo, 'id_localidad' => $id_localidad])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
