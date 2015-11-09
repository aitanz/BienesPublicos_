<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\SeguridadUsuarios;
use app\modules\admin\models\Persona;
use app\modules\admin\models\SeguridadUsuariosSearch;
use app\components\AitController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
$model = new SeguridadUsuarios();
$person = new Persona();

/**
 * UsuariosController implements the CRUD actions for SeguridadUsuarios model.
 */
class UsuariosController extends AitController
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
     * Lists all SeguridadUsuarios models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SeguridadUsuariosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SeguridadUsuarios model.
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
     * Creates a new SeguridadUsuarios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    { 
        try{
        $model = new SeguridadUsuarios();
          if($model->load(Yii::$app->request->post())) {
                         $model->password = md5($model->password);
                         if($model->save()){
                          Yii::$app->session->setFlash('usuario Registrado');
                         return $this->redirect(['view', 'id' => $model->id_usuario]); 
                         }
           
            
        } 
        
        else {
            return $this->render('create', ['model' => $model ]);
            
        }
        
        }//try
        
        catch(Exception $ex){}
        return false;
    }//create

    /**
     * Updates an existing SeguridadUsuarios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_usuario]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SeguridadUsuarios model.
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
     * Finds the SeguridadUsuarios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SeguridadUsuarios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SeguridadUsuarios::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
    
    public function actionAuto() {
               $request = trim($_POST['keyword']);
               if ($request != "") {
                    $data = array();
                    echo json_encode($request);
                    } 
                     else {
                             $data = array('false' => 'no se encuentra');
                     }
            }
            
            
            /*accion para buscar si existe prsona en formulario crear usuario*/
            
    public function actionBuscarpersona() {
        $return = array('success' => 'false', 'mensaje' =>'');
        if (\yii::$app->request->isAjax) {
            $personas = \app\modules\admin\models\Persona::find()->where(['cedula' => \yii::$app->request->post('cedula')])->one();
            $validar = \app\modules\admin\models\SeguridadUsuarios::find()->where(['cedula' => \yii::$app->request->post('cedula')])->one();
            if($personas){
                $return = array('success' => 'true', 'nombres' => trim($personas->nombres),
                                                     'cedula'=>trim($personas->cedula),
                                                     //'cedulau'=>trim($validar->cedula),
                                                     'apellidos' => trim($personas->apellidos),
                                                     'direccion'=>trim($personas->direccion),
                                                     'fnacimiento'=>trim($personas->fnacimiento),
                                                     'telefono'=>trim($personas->tlf1),
                                                     'correo'=>trim($personas->correoe),
                                                     'sexo'=>trim($personas->sexo));
             }     else {
                         $return = array('false' => 'true', 'mensaje' => 'no se encontro una cedula asociada  al parametro');
                         
                  }
        }
        echo json_encode($return);
    
        return;

    }
    
    
    
    
    public function actionInsertapersona() {
         
           Yii::$app->response->format = 'json';
              
           if(Yii::$app->request->isAjax) {    
                 $cedula = Yii::$app->request->post('cedula');
                 $nombres = Yii::$app->request->post('nombres');
                 $apellidos = Yii::$app->request->post('apellidos');
                 $direccion = Yii::$app->request->post('direccion');
                
                     $person = new \app\modules\admin\models\Persona();
                       $person->cedula = $cedula;
                       $person->nombres= $nombres;
                       $person->apellidos = $apellidos;
                       $person->direccion = $direccion;
                       $person->save();
                        Yii::$app->session->setFlash('success','datos insertados');
                       
                       
             return['mensaje'=>'exito'];
            
                      
           }
                
                else{
                    return['mensajemalo'=>'no guarda'];
                }
              
                 
           }
                         
          
          
       public function actionValidar() {
           
        $return = array('success' => 'false', 'mensaje' =>'');
        if (\yii::$app->request->isAjax) {
            
            $validar = \app\modules\admin\models\SeguridadUsuarios::find()->where(['cedula' => \yii::$app->request->post('cedula')])->one();
            if($validar){
                $return = array('success' => 'true', 'cedulau' => trim($validar->cedula));
                                                     
            }    
            
                    else {
                         $return = array('false' => 'true', 'mensaje' => 'no se encuentra cedula de usuario');
                         
                    }
        }
        echo json_encode($return);
    
        return;
           
           
            }//acction validar
           
           
          
            
            
        }//controller

        
        
        
 