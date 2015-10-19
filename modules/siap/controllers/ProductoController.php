<?php

namespace app\modules\siap\controllers;

use Yii;
use app\components\AitController;
use app\modules\siap\models\Producto;
use app\modules\siap\models\ProductoSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;
use yii\helpers\Json;

/**
 * ProductoController implements the CRUD actions for Producto model.
 */
class ProductoController extends AitController {

    public function behaviors() {
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
     * Lists all Producto models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new ProductoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Producto model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Producto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Producto();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idproducto]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Producto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idproducto]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Producto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Producto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Producto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Producto::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionListaProductos2() {
        $out['success'] = false;
        $out['html'] = "";
        if (\Yii::$app->request->isAjax) {
            //\Yii::$app->response->format = \yii\console\Response::FORMAT_JSON;
            $buscar = \Yii::$app->request->post('buscar');
            $productos = ProductoSearch::find()->select(['idproducto', 'descripcion'])->where('descripcion ILIKE \'%'.$buscar.'%\'')->all();
            foreach ($productos as $producto )
                $out['html'] = $out['html'] . "<li value=\"$producto->idproducto\">$producto->descripcion</li>";
            $out['success'] = true;
        }
        echo Json::encode($out);
    }

    public function actionListaProductos($search = null, $id = null) {
        $out = ['more' => false];
        if (!is_null($search)) {
//            $productos = ProductoSearch::find()->select(['idproducto', 'descripcion'])->where('descripcion ILIKE \'%'.$search.'%\'')->all();
//            $data = [];
//            foreach ($productos as $producto )
//                $data[ trim($producto->idproducto) ] = trim($producto->descripcion);
//            $out['results'] = $data;
            $query = new Query;
            $query->select('idproducto as id, descripcion as text')
                    ->from('producto')
                    ->where("descripcion ILIKE '%" . $search . "%'")
                    ->limit(20);
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out['results'] = array_values($data);
            
        } elseif ($id > 0) {
            $producto = Producto::findOne($id);
            if( $producto )
                $out['results'] = ['id' => $id, 'text' => $producto->descripcion];// City::find($id)->name];
        } else {
            $out['results'] = ['id' => 0, 'text' => 'No se encontraron resultados.'];
        }
        echo Json::encode($out);
    }
    
    public function actionInformacionProducto()
    {
        $out['success'] = false;
        if (\Yii::$app->request->isAjax) {
            //\Yii::$app->response->format = \yii\console\Response::FORMAT_JSON;
            $buscar = \Yii::$app->request->post('producto');
            $producto = ProductoSearch::findOne($buscar);
            if( $producto )
            {
                $out['pruducto'] = $producto;
                $out['success'] = true;
            }
        }
        echo Json::encode($out);
    }

}
