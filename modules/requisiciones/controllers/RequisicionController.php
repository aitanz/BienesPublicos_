<?php

namespace app\modules\requisiciones\controllers;
use Yii;
use app\modules\requisiciones\models\Requisicion;
use app\modules\requisiciones\models\Unidadmedida;
use app\modules\requisiciones\models\Tipoproducto;
use app\modules\requisiciones\models\Requisiciondeta;
use app\modules\requisiciones\models\RequisicionSearch;
use app\modules\requisiciones\models\Puc;
use app\modules\requisiciones\models\Cuentapresupuestaria;
use app\modules\requisiciones\models\Proveedor;
use app\modules\requisiciones\models\Tipopagos;
use app\modules\requisiciones\models\Producto;
use app\modules\requisiciones\models\Categoriaprogramatica;
use app\modules\requisiciones\models\Coordinacion;
use app\components\AitController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RequisicionController implements the CRUD actions for Requisicion model.
 */
class RequisicionController extends AitController
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

    
		public function actionIndex() {
			$searchModel = new RequisicionSearch();
			$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

			return $this->render('index', [
							'searchModel' => $searchModel,
							'dataProvider' => $dataProvider,]);
		}

    /**
     * Displays a single Requisicion model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', ['model' => $this->findModel($id), ]);
    }

    /**
     * Creates a new Requisicion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {

	$reqDeta = new Requisiciondeta();
	$model = new Requisicion();
	$capro = new Categoriaprogramatica();
	$puc = new Puc();
	$cp = new Cuentapresupuestaria();
	$unidadmedida = new Unidadmedida();
	$tipoproducto = new Tipoproducto();
	$tp = new Tipopagos();
	$prove = new Proveedor();
        $coordinacion = new Coordinacion();
        
         $model->idrequisicion = 1;
         $model->concepto= "concepto fuerza bruta";
         $model->numcontrol= 5;
         $model->fecha= "15-10-2015";
         
         $tipoproducto->descripcion="fuerza bruta";
         $reqDeta->cantidad="bull";
         $reqDeta->descripcion="bull";
         $unidadmedida->descripcion ="bull";
         
         $coordinacion->nombre="fgf";
         $coordinacion->funciones= "amarrar la perra";
         
         $cp->causado = "bull";
         $cp->comprometido = "bull";
         $cp->disponibilidad = "bull";
         $cp->pagado = "bull";
         $cp->precomprometido = "bull";
         $cp->statusaprobacion = 1;
         $cp->tipopartida= 0;
         $cp->montoinicial = "bull";
         
         $tp->descripcion="bull";
      
       
        
        
    

		if($tipoproducto->load(Yii::$app->request->post()) && $tipoproducto->validate() && 
		   $model->load(yii::$app->request->post()) && $model->validate() &&
		   $reqDeta->load(yii::$app->request->post()) && $reqDeta->validate() &&
		   $puc->load(yii::$app->request->post())&& $puc->validate() &&
		   $cp->load(yii::$app->request->post()) && $cp->validate() &&
		   $unidadmedida->load(yii::$app->request->post()) && $unidadmedida->validate())
                       
			  {
			    $tipoproducto->save(); 
                            $model->save();
		            $reqDeta->save() ;
                            $puc->save() ;
		            $cp->save(); 
                            $unidadmedida->save(); 
		             
                            return $this->redirect(['view', ]);
		            
			  }
			      else {
				return $this->render('create', ['model' => $model,  'tipoproducto' => $tipoproducto,
                                                                'requisiciondeta' => $reqDeta,  'puc' => $puc,
                                                                'unidadmedida' => $unidadmedida]);
			     }
		}
                
                
                
                
                
               /* if($tipoproducto->load(Yii::$app->request->post()) && $tipoproducto->validate() && 
		   $model->load(yii::$app->request->post()) && $model->validate() &&
		   $reqDeta->load(yii::$app->request->post()) && $reqDeta->validate() &&
		   $puc->load(yii::$app->request->post())&& $puc->validate() &&
		   $cp->load(yii::$app->request->post()) && $cp->validate() &&
		   $unidadmedida->load(yii::$app->request->post()) && $unidadmedida->validate())
                       
			  {
			    $tipoproducto->save(); 
                            $model->save();
		            $reqDeta->save() ;
                            $puc->save() ;
		            $cp->save(); 
                            $unidadmedida->save(); 
		            
		            
			  }
			      else {
				return $this->render('create', ['model' => $model,  'tipoproducto' => $tipoproducto,
                                                                'requisiciondeta' => $reqDeta,  'puc' => $puc,
                                                                'unidadmedida' => $unidadmedida,]);
			     }*/
                
                
                
                
                public function actionCrearbinesysuministro(){
                         $model = new Requisicion(); 
                         $reqDeta = new Requisiciondeta();
                         $tipoproducto = new Tipoproducto();
                                           
                        $cp = new Cuentapresupuestaria();
                        $unidadmedida = new Unidadmedida();
                        $model->idrequisicion = 0;
                         
                         if($model->load(Yii::$app->request->post()) &&
			    $reqDeta->load(yii::$app->request->post()) &&
                            $tipoproducto->load(yii::$app->request->post()) &&
                            $cp->load(yii::$app->request->post()) &&
                            $cp->load(yii::$app->request->post()))
                           {
				 return $this->redirect(['view', 'id' => $model->idrequisicion]);
			   }
			          else {
				         return $this->render('create', [
					'model' => $model,]);
			          }
                             
                       }

    /**
     * Updates an existing Requisicion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id){
    $model = $this->findModel($id);
    if($model->load(Yii::$app->request->post()) && $model->save()) {
        return $this->redirect(['view', 'id' => $model->idrequisicion]);
	}  else {
		return $this->render('update', ['model' => $model,]);
	    }
    }


    /**
     * Deletes an existing Requisicion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
		public function actionDelete($id) {
			$this->findModel($id)->delete();
			return $this->redirect(['index']);
		}

    /**
     * Finds the Requisicion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Requisicion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
		protected function findModel($id) {
			if(($model = Requisicion::findOne($id)) !== null) {
			  return $model;
			   } else {
				  throw new NotFoundHttpException('The requested page does not exist.');
			  }
		   }

		public function actionBuscarProveedor() {
		  $request = trim($_GET['term']);
		  if ($request != "") {
			$model = Proveedor::find()->select(['(idproveedor||\'-----\'||razonsocial||\'-----\'||rif )
			as value', 'idproveedor as id'])->where(" codigo like '%" . $request . "%' ")->orderBy('idproveedor')
			->limit('20')->asArray()->all();
			$data = array();
			foreach ($model as $prov) {
					$data[$prov['id']] = [
					'value' => $prov['id'],
					'label' => $prov['value'],
					'id' => $prov['id']
					];
				}
				echo json_encode($data);
			} else {

			}
		}

    public function actionGetActividad() {
    $respuestacapro = array('success' => 'false', 'mensaje' => '');
    if (\Yii::$app->request->isAjax && isset($_POST['idcategoriaprogramatica'])) {
        $categoria = Categoriaprogramatica::findOne(\Yii::$app->request->post('idcategoriaprogramatica'));
            if ($categoria) {
                $respuestacapro = array('success' => 'true', 'categoria' => trim($categoria->categoriaprogramatica));
            } else {
                $respuestacapro = array('success' => 'false', 'mensaje' => 'No se encuentra la Categoria Programatica');
            }
        }
        echo json_encode($respuestacapro);
        return;
    }

    public function actionGetPuc() {  //disable
        $return = array('success' => 'false', 'mensaje' => '');
        if (\Yii::$app->request->isAjax && isset($_POST['idtipopago'])) {
          $disponibilidad = Tipopagos::findOne(\Yii::$app->request->post('idtipopago'));
           if ($disponibilidad) {
                $return = array('success' => 'true', 'disponibilidad' => trim($disponibilidad->descripcion));
            } else
                $return = array('success' => 'false', 'mensaje' => 'No se encuentra la Categoria Programatica en la db ');
        }
        echo json_encode($return);
        return;
    }
     
    /*busca la cuenta presupuestaria que esta conformda por categoria +puc*/
    
    public function actionGetUnidad(){
        $return = array('success'=>'false' , 'mensaje'=>'array vacio');
        if(\yii::$app->request->isAjax && \yii::$app->request->post('idcoordinacion')){
            $categoria = Categoriaprogramatica::find()->where(['idcoordinacion'=> \yii::$app->request->post('idcoordinacion')])->one();
            /*$auxiliar = Cuentapresupuestaria::find()
                        ->where(["categoria like=>'%0101000051%' AND puc like=>'%401020700%' AND espadre => false"])
                        ->all();*/
              if($categoria){
                    $return = array('success'=>'true', 'categoria'=> trim($categoria->categoriaprogramatica));
                 }
                    else{
                    $return = array('success'=>'false','mensaje'=>'no se encontro una categoriaprogramatica asociada al parametro');
                 }
        }
            echo json_encode($return);
            return;
    }
    
    
    
    
    /*public function actionGetUnidad() {
        $return = array('success' => 'false', 'mensaje' => '');
        if (\Yii::$app->request->isAjax && isset($_POST['idcategoriaprogramatica'])){
            $categoria = Categoriaprogramatica::findone(\Yii::$app->request->post('idcategoriaprogramatica'));
            $cuenta = Cuentapresupuestaria::find()->where(['idpuc' => '5062','categoria'=>'1001000052'])->one();
            
            if ($cuenta) {
                $return = array('success' => 'true', 'cat' => trim($cuenta->categoria.($cuenta->puc)), 'disponibilidad' => trim($cuenta->disponibilidad . ' BSF'));
            } else {
                $return = array('success' => 'false', 'mensaje' => 'No se encuentra la Categoria Programatica');
            }
        }
            echo json_encode($return);
            return;
    }*/
    

    public function actionGetTipopagoip() {
        $return = array('success' => 'false', 'mensaje' => '');
        if (\Yii::$app->request->isAjax && isset($_POST['idtipopago'])) {
            $tipopago = Tipopagos::findOne(\Yii::$app->request->post('idtipopago'));
            $descripcion = Puc::findOne($tipopago->idpuc);

            if ($descripcion) {
                $return = array('success' => 'true', 'descripcion' => trim($descripcion->descripcion), 'imputacion' => $descripcion->idpuc > 0 ? true : false);
            } else {
                $return = array('success' => 'false', 'mensaje' => 'No se encuentra la Categoria Programatica en la db ');
            }

            echo json_encode($return);
            return;
        }
    }

    //accion para cargar Formularios

    public function actionGetFormulario(){
        $reqDeta = new Requisiciondeta();
        $model = new Requisicion();
	$capro = new Categoriaprogramatica();
	$puc = new Puc();
	$cp = new Cuentapresupuestaria();
	$unidadmedida = new Unidadmedida();
	$tipoproducto = new Tipoproducto();
	$tp = new Tipopagos();
	$prove = new Proveedor();

	if(\yii::$app->request->isAjax &&  isset($_POST['tipo'])){
	    $datos = yii::$app->request->POST('tipo');
            $response = ['success'=>false,'mensaje'=>''];
            if($datos == 0){
              $html = $this->renderPartial("formulario_bienesysuministro", [
		'model' => $model,
		'tipoproducto' => $tipoproducto,
		'reqDeta' => $reqDeta,
		'unidadmedida' => $unidadmedida,
		'capro' => $capro,
		'cp' => $cp,
		'puc' => $puc,
		'model'=> $model, ],true,true);
		$response = ['success'=>true,'mensaje'=>$html];
            }

	    else if($datos == 1){
		$servicio = $this->renderPartial("formulario_servicios",[
		'tp'=>$tp,
		'model'=>$model,
		'capro'=>$capro,
		'reqDeta'=>$reqDeta,
		],true,true);
		$response = ['success'=>true, 'mensaje'=>$servicio];
		}

		else if($datos == 2){
		$administrativa = $this->renderPartial("formulario_administrativa",[
		'tp'=>$tp,
		'capro' => $capro,
		'cp' => $cp,
		'puc' => $puc,
		'model' => $model,
		'proveedor' => $prove,
		'reqDeta'=>$reqDeta,
		],true, true);
        $response = ['success'=>true,'mensaje'=>$administrativa];
        }
      }
        else{
	     return $this->render('create',['model'=>$model]);
        }
    echo json_encode($response);
    return;
			}


    public function actionGetProductopuc(){
        $return = array('success'=>'false', 'mensaje'=>'vacio');
	if(\yii::$app->request->isAjax &&  isset($_POST['idtipoproducto'])){
            $consulta= Tipoproducto::findOne(\yii::$app->request->post('idtipoproducto'));
            $setpuc = Cuentapresupuestaria::find(\yii::$app->request->post('idpuccoordinacion'));
                if($consulta){
		  $return = array('success'=> 'true', 'llamada'=>trim($consulta->puc),
                      'categoria'=>trim($consulta->descripcion),
                      'idpuc'=>trim($consulta->idpuc) ,
                      );
		    }
		  else{
		        $return = array('success'=>'false','mensaje'=>'no se encontro registro');
			  }
  		    echo json_encode($return);
  	            return;
                             
        }
    }
        
  
        
        
        
     }