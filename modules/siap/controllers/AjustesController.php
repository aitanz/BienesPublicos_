<?php

namespace app\modules\siap\controllers;

use Yii;
use app\components\AitController;
use app\modules\siap\models\Ajustes;
use app\modules\siap\models\AjustesSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AjustesController implements the CRUD actions for Ajustes model.
 */
class AjustesController extends AitController
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
   * Lists all Ajustes models.
   * @return mixed
   */
  public function actionIndex()
  {
    $searchModel = new AjustesSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
    ]);
  }

  /**
   * Displays a single Ajustes model.
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
   * Creates a new Ajustes model.
   * If creation is successful, the browser will be redirected to the 'view' page.
   * @return mixed
   */
  public function actionCreate()
  {
    $model = new Ajustes();
    if ($model->load(Yii::$app->request->post()) && $model->save()) {
      return $this->redirect(['view', 'id_documento' => $model->id_documento, 'id_ajuste' => $model->id_ajuste]);
    }
    else {
      return $this->render('create', [
                  'model' => $model//, 'pagina' => Yii::$app->request->get('page')
      ]);
    }
  }

  /**
   * Updates an existing Ajustes model.
   * If update is successful, the browser will be redirected to the 'view' page.
   * @param integer $id_documento
   * @param integer $id_ajuste
   * @return mixed
   */
  public function actionUpdate($id_documento, $id_ajuste)
  {
    $model = $this->findModel($id_documento, $id_ajuste);

    //        if ($model->load(Yii::$app->request->post()) && $model->save()) {
    if ($model->load(Yii::$app->request->post()) && $model->update(true, ['fecha' => $model->id_documento])) {
      return $this->redirect(['view', 'id_documento' => $model->id_documento, 'id_ajuste' => $model->id_ajuste]);
    }
    else {
      return $this->render('update', [
                  'model' => $model,
      ]);
    }
  }

  /**
   * Deletes an existing Ajustes model.
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
   * Finds the Ajustes model based on its primary key value.
   * If the model is not found, a 404 HTTP exception will be thrown.
   * @param integer $id_documento
   * @param integer $id_ajuste
   * @return Ajustes the loaded model
   * @throws NotFoundHttpException if the model cannot be found
   */
  protected function findModel($id_documento, $id_ajuste)
  {
    if (($model = Ajustes::findOne(['id_documento' => $id_documento, 'id_ajuste' => $id_ajuste])) !== null) {
      return $model;
    }
    else {
      throw new NotFoundHttpException('The requested page does not exist.');
    }
  }

  /**
   * Envía la información del documento consultado hacia la vista y crea un nuevo ajuste de acuerdo a las opciones. 
   * @return type
   * @throws CHttpException
   */
  public function actionCargarDocumento()
  {
//    if (\Yii::$app->request->isAjax) {
// para la Validación de usuario
    if (true) {
//      \Yii::$app->response->format = \yii\console\Response::FORMAT_JSON;
      $documento = \Yii::$app->request->post('documento');
      $tipoMovimiento = \Yii::$app->request->post('tipoMovimiento');
      $tipoAjuste = \Yii::$app->request->post('tipoAjuste');
      if (\Yii::$app->request->post('OrdenCompra')) {
        $ordenCompra = \app\modules\siap\models\OrdenCompra::find()->where(['idordencompra' => $documento])->one();
        $ajuste = new \app\modules\siap\models\Ajustes();
        // Validar datos
        // Fecha
          
        

        // Cargar datos al modelo
        $atributos = [
            'id_tipo_ajuste' => 1,
            'fecha_ajuste' => date('Y-m-d'),
            'id_usuario_crea' => 1,
            'idefiscal' => $ordenCompra->idefiscal,
            'concepto' => $ordenCompra->fecha . ' cambia a ' . \Yii::$app->request->post('Ajustes')['fecha_ajuste'],
            'observacion' => \Yii::$app->request->post('Ajustes')['observacion'],
            'reversado' => '0',
        ];

        $ajuste->setAttributes($atributos);

        
        // Guardar el ajuste 
        $ajuste->save();
        return $this->render('create', ['model' => new \app\modules\siap\models\Ajustes()
        ]);
      }

      switch ($tipoMovimiento) {
        case 5: //ORDEN DE COMPRA
          $ordenCompra = \app\modules\siap\models\OrdenCompra::find()->where(['idordencompra' => $documento])->one();
          if ($ordenCompra) {
            if ($ordenCompra->status != 2) {
              return json_encode([ 'success' => false, 'mensaje' => 'La orden de compra no ha sido imputada.']);
            }

            $proveedor = \app\modules\siap\models\Proveedor::findOne($ordenCompra->idproveedor);
            $provider = new \yii\data\ActiveDataProvider([
                'query' => \app\modules\siap\models\OrdenCompraDetalleSearch::find()->where('idordencompra = ' . $ordenCompra->idordencompra),
            ]);

            $unidadSolicitante = \app\modules\siap\models\Coordinacion::findOne($ordenCompra->idcordinacion);
            $render = $this->renderFile(Yii::$app->basePath . '/views/ajustes/_ordenCompra.php', [
                'ordenCompra' => $ordenCompra,
                'proveedor' => $proveedor,
                'provider' => $provider,
                'tipoModificacion' => $tipoAjuste,
                'unidadSolicitante' => $unidadSolicitante,
            ]);
            return json_encode([ 'success' => true, 'mensaje' => 'Orden de pago cargada con éxito.', 'html' => $render]);
          }
          else {
            return json_encode([ 'success' => false, 'mensaje' => 'No se consiguió la Orden de Compra.']);
          }
          break;
        case 6: //ORDEN DE PAGO
          return json_encode([ 'success' => true, 'mensaje' => 's']);
          break;

        case 11: //ORDEN DE SERVICIO
          return json_encode([ 'success' => true, 'mensaje' => 's']);
          break;

        case 12: //PAGO DIRECTO
          return json_encode([ 'success' => true, 'mensaje' => 's']);
          break;

        case 13: //PAGO DE NOMINA
          return json_encode([ 'success' => true, 'mensaje' => 's']);
          break;

        case 20: //PAGADO
          return json_encode([ 'success' => true, 'mensaje' => 's']);
          break;

        default:
          return json_encode([ 'success' => false, 'mensaje' => 'Disculpe, por ahora no esta disponible la edicion de este tipo de documentos.']);
          break;
      }
    }
    else {
      throw new CHttpException(403, "Usted no se encuentra autorizado para realizar esta accion");
    }
  }

}
