<?php

namespace app\controllers;

use Yii;
use app\models\UsuarioGrupo;
use app\models\UsuarioGrupoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsuarioGrupoController implements the CRUD actions for UsuarioGrupo model.
 */
class UsuarioGrupoController extends Controller
{

    public function getViewPath()
    {
        return Yii::getAlias(Yii::$app->getViewPath().'/Administracion/seguridad/usuario-grupo');
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
     * Lists all UsuarioGrupo models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsuarioGrupoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UsuarioGrupo model.
     * @param integer $id_grupo
     * @param integer $id_usuario
     * @return mixed
     */
    public function actionView($id_grupo, $id_usuario)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_grupo, $id_usuario),
        ]);
    }

    /**
     * Creates a new UsuarioGrupo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UsuarioGrupo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_grupo' => $model->id_grupo, 'id_usuario' => $model->id_usuario]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing UsuarioGrupo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_grupo
     * @param integer $id_usuario
     * @return mixed
     */
    public function actionUpdate($id_grupo, $id_usuario)
    {
        $model = $this->findModel($id_grupo, $id_usuario);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_grupo' => $model->id_grupo, 'id_usuario' => $model->id_usuario]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing UsuarioGrupo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_grupo
     * @param integer $id_usuario
     * @return mixed
     */
    public function actionDelete($id_grupo, $id_usuario)
    {
        $this->findModel($id_grupo, $id_usuario)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UsuarioGrupo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_grupo
     * @param integer $id_usuario
     * @return UsuarioGrupo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_grupo, $id_usuario)
    {
        if (($model = UsuarioGrupo::findOne(['id_grupo' => $id_grupo, 'id_usuario' => $id_usuario])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
