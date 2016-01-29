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
use yii\db\Query;
use app\models\HtmlHelpers;
use app\models\HtmlHelpers2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;



/**
 * RequisicionController implements the CRUD actions for Requisicion model.
 */
class RequisicionController extends AitController
{
   public $variablecategoria ;
   
 
   
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
                    'dataProvider' => $dataProvider]);
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


        $model = new Requisicion();
        $reqDeta = new Requisiciondeta();
        $unidadmedida = new Unidadmedida();
        $tipoproducto = new Tipoproducto();
        $tp = new Tipopagos();
        $coordinacion = new Coordinacion();
        $model->numcontrol = 1;
        $model->tipo = 0;
        $model->status = 5;


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $mensaje = Yii::$app->session->setFlash('success', 'Datos de Requisicion Guardados..');
            return $this->redirect(['view', 'id' => $model->idrequisicion]);
        } else {
            return $this->render('create', ['model' => $model, 'requisiciondeta' => $reqDeta]);
        }
    }

    /**
     * Updates an existing Requisicion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
     public function actionUpdate($id) {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idrequisicion]);
        } else {
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
        if (($model = Requisicion::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
     protected function findModel2($id) {
        if (($model = Requisiciondeta::findAll($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionBuscarProveedor() {
        $request = trim($_GET['term']);
        if ($request != "") {
            $model = Proveedor::find()->select(['(idproveedor||\'-----\'||razonsocial||\'-----\'||rif as value', 'idproveedor as id'])->where(" codigo like '%" . $request . "%' ")->orderBy('idproveedor')
            ->limit('20')->asArray()->all();
            $data = array();
            foreach ($model as $prov) {
              $data[$prov['id']] = ['value' => $prov['id'],'label' => $prov['value'],'id' => $prov['id'] ];
            }
            echo json_encode($data);
        } 
            else {
            
            }
    }

    public function actionGetActividad() {
    $respuestacapro = array('success' => 'false', 'mensaje' => '');
    if (\Yii::$app->request->isAjax && isset($_POST['idcategoriaprogramatica'])) {
        $categoria = Categoriaprogramatica::findOne(\Yii::$app->request->post('idcategoriaprogramatica'));
        if ($categoria) {
            $respuestacapro = array('success' => 'true', 'categoria' => trim($categoria->categoriaprogramatica));
        }   else {
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
        $return = array('success' => 'false', 'mensaje' =>'');
        $idcoordinacion = yii::$app->request->post('idcoordinacion');
            if (\yii::$app->request->isAjax && \yii::$app->request->post('idcoordinacion')) {
                 echo  HtmlHelpers::dropDownList(Categoriaprogramatica::className(),'idcoordinacion',$idcoordinacion,'idcategoriaprogramatica','descripcion');    
            }
    
    }
    
    
    
        
    public function actionGetUnidadservicios() {
        $return = array('success' => 'false', 'mensaje' =>'');
        $idcoordinacion = yii::$app->request->post('idcoordinacion');
            if (\yii::$app->request->isAjax && \yii::$app->request->post('idcoordinacion')) {
                 echo  HtmlHelpers::dropDownList(Categoriaprogramatica::className(),'idcoordinacion',$idcoordinacion,'idcategoriaprogramatica','descripcion');    
            }
    
 
    }
    
    
     /* action para consultar disponibilidad de la cuenta  */
     public function actionCuentapresupuestaria(){
        $matriz = array('success' => 'false', 'mensaje' =>'');
    
        if (\yii::$app->request->isAjax && \Yii::$app->request->post()){
                $idcuenta = Yii::$app->request->post('idcuenta');
                $cuenta = Cuentapresupuestaria::find()->where(['idcuenta'=>$idcuenta ])->one(); //consulta a la tabla cuentpresupuestaria 
                if($cuenta){
                 $matriz= array('success'=>'true' , 'disponibilidad'=>trim($cuenta->disponibilidad));
                }
                        
                    else{
                        $matriz = array('mensaje '=>'no se encuentra parametro en bd');
                    }
           } 
         echo json_encode($matriz);
        
         return;
    }
    
    
    public function actionVariable(){
     
        $categoria= \Yii::$app->request->post('categoria');
        $puc= \Yii::$app->request->post('puc');
     
       echo  HtmlHelpers2::dropDownList(Cuentapresupuestaria::className(),'categoria',$categoria  ,'puc',$puc, 'idcuenta','auxiliar');    
 
       }
    
    
       
         public function actionVariable2(){
     
        $categoria= \Yii::$app->request->post('categoria');
        $puc= \Yii::$app->request->post('puc');
     
       echo  HtmlHelpers2::dropDownList(Cuentapresupuestaria::className(),'categoria',$categoria  ,'puc',$puc, 'idcuenta','auxiliar');    
 
       }
    
    
    
    
   
    

    
    
    
    
    public function actionGetTipopagoip() {
        $return = array('success' => 'false', 'mensaje' => '');
        if (\Yii::$app->request->isAjax &&  Yii::$app->request->post('idtipopago')) {
            $tipopago = Tipopagos::findOne(\Yii::$app->request->post('idtipopago'));
            $descripcion = Puc::findOne($tipopago->idpuc);

            if ($descripcion) {
                $return = array('success' => 'true','puc'=>$tipopago->puc, 'descripcion' => trim($descripcion->descripcion), 'imputacion' => $descripcion->idpuc > 0 ? true : false);
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

	if(\yii::$app->request->isAjax ){
	    $datos = yii::$app->request->POST('tipo');
            $response = ['success'=>false,'mensaje'=>''];
            if($datos == 0){
              $bienes = $this->renderPartial("formulario_bienesysuministro",['requisiciondeta' => $reqDeta->cantidad],false,true);
		$response = ['success'=>true,'mensaje'=>$bienes];
            }

	    else if($datos == 1){
		$servicio = $this->renderPartial("formulario_servicios",[
		'tp'=>$tp,
		'model'=>$model,
		
		'reqDeta'=>$reqDeta,
		],false,true);
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
		],false, true);
        $response = ['success'=>true,'mensaje'=>$administrativa];
        }
      }
        else{
	     return $this->render('create',['model'=>$model]);
        }
    echo json_encode($response);
    return;
			}


    public function actionGetProductopuc() {
        
        $return = array('success' => 'false', 'mensaje' => 'vacio');
        if (\yii::$app->request->isAjax && Yii::$app->request->post('idtipoproducto')) {
            $consulta = Tipoproducto::findOne(\yii::$app->request->post('idtipoproducto'));
            $setpuc = Cuentapresupuestaria::find(\yii::$app->request->post('idpuccoordinacion'));
            if ($consulta) {
                $return = array('success' => 'true', 'llamada' => trim($consulta->puc),
                                                     'categoria' => trim($consulta->descripcion),
                                                     'idpuc' => trim($consulta->idpuc));
            } else {
                $return = array('success' => 'false', 'mensaje' => 'no se encontro registro');
            }
            echo json_encode($return);
            return;
        }
    }

    
    public function actionEnviarproductos(){
            Yii::$app->response->format = 'json';
            $return = array('success'=>'false','mensaje'=>'');
            if(Yii::$app->request->post()){
            $contenedor = Yii::$app->request->post();
            $cant = Yii::$app->request->post('cantidad');
            $des =  Yii::$app->request->post('descripcion');
            $reqDeta = new \app\modules\requisiciones\models\Requisiciondeta();
            $longitud = count($contenedor['inputs']);
            $ultimo = end($contenedor['inputs']);
            $requisicion_id= $ultimo['value'];
             
                for($i=0; $i<$longitud; $i++){
                    if($longitud = 3 ){
                        $variable1=  $contenedor['inputs'][0]['value'];
                        $variable2=  $contenedor['inputs'][1]['value']; 
                        $idunidadmedida= $contenedor['inputs'][3]['value'];
                        Yii::$app->db->createCommand()->batchInsert('requisiciondeta', ['cantidad', 'descripcion','idunidadmedida','idrequisicion'], [
                        [$variable1, $variable2, $idunidadmedida,$requisicion_id],])->execute();
                         Yii::$app->session->setFlash('success', 'requisicion# '.$requisicion_id.' Creada con Exito');
                       
                    }//fila1
                    if($longitud = 6 ){
                        $variable3= $contenedor['inputs'][4]['value'];
                        $variable4= $contenedor['inputs'][5]['value'];
                        $idunidadmedida2 = $contenedor['inputs'][7]['value'];
                        Yii::$app->db->createCommand()->batchInsert('requisiciondeta', ['cantidad', 'descripcion', 'idunidadmedida' ,'idrequisicion'], [
                        [$variable3, $variable4, $idunidadmedida2 ,$requisicion_id],])->execute();
                         Yii::$app->session->setFlash('success', 'requisicion # '.$requisicion_id.' Creada con Exito');
                    }//fila2
                    
                    if($longitud = 9){
                        $variable6= $contenedor['inputs'][8]['value'];
                        $variable7= $contenedor['inputs'][9]['value']; 
                        $idunidadmedida3 = $contenedor['inputs'][11]['value'];
                        Yii::$app->db->createCommand()->batchInsert('requisiciondeta', ['cantidad', 'descripcion','idunidadmedida' ,'idrequisicion'], [
                        [$variable6, $variable7, $idunidadmedida3  ,$requisicion_id],])->execute();
                         Yii::$app->session->setFlash('success', 'requisicion # '.$requisicion_id.' Creada con Exito');
                        }//fila3
                        
                        
                    if($longitud = 12){
                        $variable8= $contenedor['inputs'][12]['value'];
                        $variable9= $contenedor['inputs'][13]['value']; 
                        $idunidadmedida4 = $contenedor['inputs'][15]['value'];
                        Yii::$app->db->createCommand()->batchInsert('requisiciondeta', ['cantidad', 'descripcion','idunidadmedida' ,'idrequisicion'], [
                        [$variable8, $variable9, $idunidadmedida4  ,$requisicion_id],])->execute();
                         Yii::$app->session->setFlash('success', 'requisicion # '.$requisicion_id.' Creada con Exito');
                        }
                        
                        
                        
                }//for
                  
            } //post
             
    }//funcion envia producto     
            
                                                

      
    
    public function actionSend(){
              $return = array('success' => 'false', 'mensaje' => 'vacio');
              $model = new Requisicion();
              Yii::$app->response->format = 'json';
              $direction = \yii::$app->user->Identity->id_direccion;
              
            if(\Yii::$app->request->post() && !empty($model)) {    
                $fecha = Yii::$app->request->post('fecha');
                $concepto = Yii::$app->request->post('concepto');
                $tipo = 0;
                $monto = Yii::$app->request->post('monto');
                $secuencia = Yii::$app->request->post('secuencia');
                $ip = Yii::$app->getRequest()->getUserIP();
              
                $model->numcontrol = 1;
                $model->status = 5;
                $model->fecha = $fecha;
                $model->concepto = $concepto;
                $model->tipo = $tipo;
                $model->monto = $monto;
                $model->iddireccion= $direction;
                $model->dirip = $ip;
                $model->secuencia = $secuencia;
               
                if($model->validate()){
                    $model->save();
                    return $this->redirect(['view', 'id' => $model->idrequisicion]);
                     Yii::$app->session->setFlash('success', 'Requisicion Creada con Exito....');
                }
                    else{
                           return['mnsajemalvado'=>'joder'];
                     }
                }
                
                else{
                    return['mensajemalo'=>'no guardarequisicion'];
                }
              
        }//action send
        
     
    public function actionControl(){
            
            //consulta secuencia por direccion
            $return = array('success'=>'false','mensaje'=>'');
            $direction = \yii::$app->user->Identity->id_direccion;
	      $query = new Query;
              $query->select('max(secuencia) as secuencia')
              ->from('requisicion')
              ->where(['iddireccion'=> $direction])
              ->orderBy('secuencia DESC')
              ->limit(1);
               $command = $query->createCommand();
               $data = $command->queryone();
               
               //consulta idrequisicion
              $query = new Query;
              $query->select('max(idrequisicion) as idrequisicion')
              ->from('requisicion')
              ->orderBy('idrequisicion DESC')
              ->limit(1);
               $command = $query->createCommand();
               $idrequisicion = $command->queryone();
               
                $return = array('success' => 'true', 'secuencia' => $data , 'idrequisicion'=>$idrequisicion);
                
                 echo json_encode($return);
                   return;
            
        }
        
        
    public function actionEnviardetalles(){
     
      $return = array('success'=>'false' ,  'mensaje'=>'');
        if(Yii::$app->request->post() &&  Yii::$app->request->isAjax){
         $contenedordetalles = Yii::$app->request->post();
         $long = count($contenedordetalles['datos']);
         $ultimo = end($contenedordetalles['datos']);
         $idrequisicion_detalles= $ultimo['value'];
         $reqDeta = new Requisiciondeta(); 
            for($i=0; $i< $long; $i++){
                if($i ==2){
                    $variable1=  $contenedordetalles['datos'][0]['value'];
                    $variable2=  $contenedordetalles['datos'][1]['value'];
                    Yii::$app->db->createCommand()->batchInsert('requisiciondeta', ['cantidad', 'descripcion','idrequisicion'], [
                    [$variable1, $variable2,$idrequisicion_detalles],])->execute();
                    Yii::$app->session->setFlash('success', 'detalles cargados1...');
                   
                }
                if($i ==4){
                    $variable3=  $contenedordetalles['datos'][2]['value'];
                    $variable4=  $contenedordetalles['datos'][3]['value'];
                    Yii::$app->db->createCommand()->batchInsert('requisiciondeta', ['cantidad', 'descripcion','idrequisicion'], [
                    [$variable3, $variable4,$idrequisicion_detalles],])->execute();
                    Yii::$app->session->setFlash('success', 'detalles cargados2...');
                }
                        
                if($i ==6){
                    $variable5=  $contenedordetalles['datos'][4]['value'];
                    $variable6=  $contenedordetalles['datos'][5]['value']; 
                    Yii::$app->db->createCommand()->batchInsert('requisiciondeta', ['cantidad', 'descripcion','idrequisicion'], [
                    [$variable5, $variable6,$idrequisicion_detalles],])->execute();
                    Yii::$app->session->setFlash('success', 'detalles cargados3...');
                    }
                    
                 if($i ==8){
                    $variable7=  $contenedordetalles['datos'][6]['value'];
                    $variable8=  $contenedordetalles['datos'][7]['value']; 
                    Yii::$app->db->createCommand()->batchInsert('requisiciondeta', ['cantidad', 'descripcion','idrequisicion'], [
                    [$variable7, $variable8,$idrequisicion_detalles],])->execute();
                    Yii::$app->session->setFlash('success', 'detalles cargados4...');
                    }
                    
                 if($i ==10){
                    $variable9=  $contenedordetalles['datos'][8]['value'];
                    $variable10=  $contenedordetalles['datos'][9]['value']; 
                    Yii::$app->db->createCommand()->batchInsert('requisiciondeta', ['cantidad', 'descripcion','idrequisicion'], [
                    [$variable9, $variable10, $idrequisicion_detalles],])->execute();
                    Yii::$app->session->setFlash('success', 'detalles cargados4...');
                    }
                    
                    
             }//for
          
        }//post
        
    }//action enviar detalles
    
    
    public function actionRequisicionservicios_send(){
        
            $model = new Requisicion();
            $direction = \yii::$app->user->Identity->id_direccion;
           
              if(\Yii::$app->request->post() && !empty($model)) {    
                $fecha = Yii::$app->request->post('fecha');
                $concepto = Yii::$app->request->post('concepto');
                $idtipopago = Yii::$app->request->post('idtipopago');
                $secuencia = Yii::$app->request->post('secuencia');
                
                $model->numcontrol = 1;
                $model->status = 5;
                $model->tipo = 1;
                $model->fecha = $fecha;
                $model->concepto = $concepto;
                $model->idtipopago = $idtipopago;
                $model->secuencia = $secuencia;
                $model->iddireccion= $direction;
              
                if($model->validate()){
                        $model->save();
                        return $this->redirect(['view', 'id' => $model->idrequisicion]);
                        Yii::$app->session->setFlash('success', 'Requisicion Servicios Creada con Exito....');
                    }
                    
                }
                
               
        
    }
    
      
    public function actionXxx(){
        $return = array('success'=>'false' ,  'mensaje'=>'');
        if(Yii::$app->request->post() &&  Yii::$app->request->isAjax){ 
        $idcategoriaprogramatica = Yii::$app->request->post('idcategoriaprogramatica'); 
        
        $findcategoria = Categoriaprogramatica::find()->where(['idcategoriaprogramatica'=>$idcategoriaprogramatica])->one();
            if ($findcategoria) {
                $return = array('success' => 'true', 'categoria' => trim($findcategoria->categoriaprogramatica));
            }
   
         echo json_encode($return);
         return;
              
    }
    
    
  }
                 

  
  
  
     }   