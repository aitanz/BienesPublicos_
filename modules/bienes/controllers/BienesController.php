<?php

namespace app\modules\bienes\controllers;

use Yii;
use app\modules\bienes\models\BienesNCodigoBien;
use app\modules\bienes\models\BienesNCodigoBienSearch;
use app\components\AitController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\bienes\models\BienesCodigo;
$direccion = \yii::$app->user->Identity->id_direccion;
$idusuario = \yii::$app->user->Identity->id_usuario;

$BienesCodigo = new BienesCodigo;
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
    public function actionView($id_codigo, $id_direccion, $identificacion)
    {
        return $this->render('view', [
            'model' => BienesNCodigoBien::findOne(['id_codigo'=>$id_codigo,'id_direccion'=> $id_direccion, 'identificacion'=> $identificacion]),


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


        // $model->nombre= '1';
        // $model->descripcion= 'esta es la descripcion';
        // $model->valor_unidad= 1;
        // $model->justiprecio= 1;
        // $model->ano_adquisicion= 'XXXX-XX-XX';
        // $model->ubicacion= 1;
        // $model->tipo_adquisicion= 1;
        // $model->n_documento= 1;
        // $model->id_sede= 1;
        // $model->identificacion= 1;
        // $model->id_codigo = 2;
        // $model->id_localidad = 2;


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_codigo' => $model->id_codigo, 'id_direccion' => $model->id_direccion, 'identificacion'=>$model->identificacion]);
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
    public function actionUpdate($id_codigo, $id_direccion, $identificacion)
    {
        $model = BienesNCodigoBien::findOne(['id_codigo'=>$id_codigo,'id_direccion'=> $id_direccion, 'identificacion'=> $identificacion]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_codigo' => $model->id_codigo, 'id_direccion' => $model->id_direccion, 'identificacion'=>$model->identificacion]);
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
    public function actionDelete($id_codigo, $id_direccion, $identificacion)
    {
        BienesNCodigoBien::findOne(['id_codigo'=>$id_codigo,
            'id_direccion'=> $id_direccion, 
            'identificacion'=> $identificacion])->delete();

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
    protected function findModel($id_codigo)
    {
        if (($model = BienesNCodigoBien::findOne(['id_codigo' => $id_codigo])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    // THE CONTROLLER
  public function actionGetSubcat() {
      $out = [];
      if (isset($_POST['depdrop_parents'])) {
          $parents = $_POST['depdrop_parents'];
          if ($parents != null) {
              $cat_id = $parents[0];
              $out = self::getSubCatList($cat_id);
              // the getSubCatList function will query the database based on the
              // cat_id and return an array like below:
              // [
              //    ['id'=>'<sub-cat-id-1>', 'name'=>'<sub-cat-name1>'],
              //    ['id'=>'<sub-cat_id_2>', 'name'=>'<sub-cat-name2>']
              // ]
              echo Json::encode(['output'=>$out, 'selected'=>'id_codigo', 'descripcion']);
              return;
          }
      }
      echo Json::encode(['output'=>'', 'selected'=>'']);
  }

  public function actionProd() {
      $out = [];
      if (isset($_POST['depdrop_parents'])) {
          $ids = $_POST['depdrop_parents'];
          $cat_id = empty($ids[0]) ? null : $ids[0];
          $subcat_id = empty($ids[1]) ? null : $ids[1];
          if ($cat_id != null) {
             $data = self::getProdList($cat_id, $subcat_id);
              /**
               * the getProdList function will query the database based on the
               * cat_id and sub_cat_id and return an array like below:
               * / [
               *      'out'=>[
               *          ['id'=>'<prod-id-1>', 'name'=>'<prod-name1>'],
               *          ['id'=>'<prod_id_2>', 'name'=>'<prod-name2>']
               *       ],
               *       'selected'=>'<prod-id-1>'
               *  ]
               */

             echo Json::encode(['output'=>$data['out'], 'selected'=>$data['selected']]);
             return;
          }
      }
      echo Json::encode(['output'=>'', 'selected'=>'']);
  }



}
