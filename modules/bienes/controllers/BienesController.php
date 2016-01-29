<?php

namespace app\modules\bienes\controllers;

use Yii;
use app\modules\bienes\models\BienesNCodigoBien;
use app\modules\bienes\models\BienesNCodigoBienSearch;
use app\components\AitController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\bienes\models\BienesCodigo;
use app\models\HtmlHelpers;
$direccion = \yii::$app->user->Identity->id_direccion;
$idusuario = \yii::$app->user->Identity->id_usuario;

$BienesCodigo = new BienesCodigo;
/**
 * BienesController implements the CRUD actions for BienesNCodigoBien model.
 */
class BienesController extends AitController
{
    public $id;
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


    public function actionReportes()
    {
     
      return $this->render('reportes');

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
      public function actionCategoria($id_codigo){
        echo HtmlHelpers::dropDownList(\app\modules\bienes\models\BienesCodigo::className(), 'padre', $id_codigo, 'id_codigo', 'descripcion');
    }

    /*public function actionSubCategoria($id_codigo){
        echo HtmlHelpers::dropDownList(\app\modules\bienes\models\BienesCodigo::className(), 'padre', $id_codigo, 'id_codigo', 'descripcion');
  } */


    public function actionMarcas($id_marca){
        echo HtmlHelpers::dropDownList(\app\modules\bienes\models\BienesModelos::className(),'id_marca', $id_marca,'id_modelo','descripcion');
    }

       
  public function actionOrigen(){ 


            $tipo_adquisicion = yii::$app->request->POST('tipo_adquisicion');     
       
      $prueba = Yii::$app->db->createCommand('SELECT codigo_origen FROM bienes.n_codigo_bien '
        . ' WHERE tipo_adquisicion=:tipo_adquisicion ORDER BY codigo_origen DESC LIMIT 1',[':tipo_adquisicion'=>$tipo_adquisicion])->queryAll();
   
            if($tipo_adquisicion==1){$conver1= 'B-';}
            if($tipo_adquisicion==2){$conver1= 'G-';}
            if($tipo_adquisicion==3){$conver1= 'D-';}        
            if($tipo_adquisicion==4){$conver1= 'E-';}
            if($tipo_adquisicion==5){$conver1= 'H-';}
            if($tipo_adquisicion==6){$conver1= 'F-';}           
            if($tipo_adquisicion==7){$conver1= 'C-';}
            if($tipo_adquisicion==8){$conver1= 'A-';} 
            if($tipo_adquisicion==9){$conver1= 'A-';}        
            if($tipo_adquisicion==10){$conver1='I-';}
          $h='2';
            if ($prueba){
              $prueba=$prueba;
                  $a=$prueba[0];
            $rest = substr($a['codigo_origen'], 2); 
            $conver= (int)$rest;
            $suma= $conver + 1; 
            $final = ($conver1.$suma);
            }
            else{
                $suma=2;
               $final=($conver1.$suma);
                }   

                           $array=['respuesta'=>$final];
                return json_encode($array);
                                     

    }
   
   
   
}
