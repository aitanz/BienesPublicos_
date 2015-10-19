<?php

namespace app\controllers;

use Yii;
use app\modules\siap\models\AccionGrupo;
use app\modules\siap\models\AccionGrupoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AccionGrupoController implements the CRUD actions for AccionGrupo model.
 */
class AccionGrupoController extends Controller
{

    public function getViewPath()
    {
        return Yii::getAlias(Yii::$app->getViewPath().'/Administracion/seguridad/accion-grupo');
    }
    
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
     * Lists all AccionGrupo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AccionGrupoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AccionGrupo model.
     * @param integer $id_accion
     * @param integer $id_controlador
     * @param integer $id_grupo
     * @return mixed
     */
    public function actionView($id_accion, $id_controlador, $id_grupo)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_accion, $id_controlador, $id_grupo),
        ]);
    }

    /**
     * Creates a new AccionGrupo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AccionGrupo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_accion' => $model->id_accion, 'id_controlador' => $model->id_controlador, 'id_grupo' => $model->id_grupo]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AccionGrupo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_accion
     * @param integer $id_controlador
     * @param integer $id_grupo
     * @return mixed
     */
    public function actionUpdate($id_accion, $id_controlador, $id_grupo)
    {
        $model = $this->findModel($id_accion, $id_controlador, $id_grupo);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_accion' => $model->id_accion, 'id_controlador' => $model->id_controlador, 'id_grupo' => $model->id_grupo]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AccionGrupo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_accion
     * @param integer $id_controlador
     * @param integer $id_grupo
     * @return mixed
     */
    public function actionDelete($id_accion, $id_controlador, $id_grupo)
    {
        $this->findModel($id_accion, $id_controlador, $id_grupo)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AccionGrupo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_accion
     * @param integer $id_controlador
     * @param integer $id_grupo
     * @return AccionGrupo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_accion, $id_controlador, $id_grupo)
    {
        if (($model = AccionGrupo::findOne(['id_accion' => $id_accion, 'id_controlador' => $id_controlador, 'id_grupo' => $id_grupo])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
