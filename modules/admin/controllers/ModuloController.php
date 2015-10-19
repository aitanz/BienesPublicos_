<?php

namespace app\modules\admin\controllers;

use Yii;
use app\components\AitController;
use app\modules\admin\models\Modulo;
use app\modules\admin\models\ModuloSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ModuloController implements the CRUD actions for Modulo model.
 */
class ModuloController extends AitController
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
        return Yii::getAlias('@admin/views/modulo');
    }

    /**
     * Lists all Modulo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ModuloSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Modulo model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Modulo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $models = [];
        $searchModel = new ModuloSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $modules = Yii::$app->metadata->getModules();
        foreach ($modules as $module)
        {
            $modulo = Modulo::findOne( ['descripcion' => $module] );
            if( $modulo == null )
            {
                $modulo = new Modulo();
                $modulo->descripcion = strtoupper($module);
                try
                {
                    $modulo->save();
                }
                catch(\Exception $ex){
                    $models[] = $modulo;
                    $modulo = null;
                }
            }
            if( $modulo )
            {
                //echo "Modulo: $module<br />";
                $controllers = Yii::$app->metadata->getControllers($module);
                foreach ($controllers as $controller)
                {
                    $controlador = \app\modules\admin\models\Controlador::findOne( [ 'descripcion'=>$controller, 'id_modulo'=>$modulo->id_modulo ] );
                    if( $controlador == null )
                    {
                        $controlador = new \app\modules\admin\models\Controlador();
                        $controlador->id_modulo = $modulo->id_modulo;
                        $controlador->descripcion = strtoupper( str_ireplace("controller", "", $controller) );
                        try
                        {
                            $controlador->save();
                        }
                        catch(\Exception $ex){
                            $models[] = $controlador;
                            $controlador = null;
                        }
                    }
                    if( $controlador )
                    {
                        $actions = Yii::$app->metadata->getActions($controller, $module);
                        foreach ($actions as $action)
                        {
                            $accion = \app\modules\admin\models\Acciones::findOne( ['id_controlador'=>$controlador->id_controlador, 'descripcion'=>$action] );
                            if( $accion == null )
                            {
                                $accion = new \app\modules\admin\models\Acciones();
                                $accion->id_controlador = $controlador->id_controlador;
                                $accion->descripcion = strtoupper($action);
                                try{
                                    $accion->save();
                                }
                                catch(\Exception $ex){
                                    $models[] = $accion;
                                }
                            }
                        }
                    }
                }
            }
        }
        return $this->actionIndex();
    }

    /**
     * Updates an existing Modulo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        return $this->redirect('/admin/modulo');
    }

    /**
     * Deletes an existing Modulo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        return $this->redirect('/admin/modulo');
    }

    /**
     * Finds the Modulo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Modulo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Modulo::findOne($id)) !== null)
        {
            return $model;
        }
        else
        {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
