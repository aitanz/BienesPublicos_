<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Controlador;
use app\modules\admin\models\ControladorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ControladorController implements the CRUD actions for Controlador model.
 */
class ControladorController extends Controller
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
        return Yii::getAlias('@admin/views/controlador');
    }

    /**
     * Lists all Controlador models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ControladorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Controlador model.
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
     * Creates a new Controlador model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $modules = Yii::$app->metadata->getModules();
        foreach ($modules as $module)
        {
            echo "Modulo: $module<br />";
            $controllers = Yii::$app->metadata->getControllers($module);
            foreach ($controllers as $controller)
            {
                echo "Controlador: $controller<br />";
                $actions = Yii::$app->metadata->getActions($controller, $module);
                foreach ($actions as $action)
                {
                    echo "Accion: $action<br />";
                }
            }
            echo "<br /><br />";
        }

//        $controllersWithActions = Yii::app()->metadata->getControllersActions('user'); #if no $module param, controllers&actions of application will returned
//        var_dump($controllers); #Get controllers and their actions of module 'user'
//
//        $models = Yii::app()->metadata->getModels(); #You can specify module name as parameter
//        var_dump($models); #Get list of models application 


//        $model = new Controlador();
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id_controlador]);
//        } else {
//            return $this->render('create', [
//                'model' => $model,
//            ]);
//        }
    }

    /**
     * Updates an existing Controlador model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save())
        {
            return $this->redirect(['view', 'id' => $model->id_controlador]);
        }
        else
        {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Controlador model.
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
     * Finds the Controlador model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Controlador the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Controlador::findOne($id)) !== null)
        {
            return $model;
        }
        else
        {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
