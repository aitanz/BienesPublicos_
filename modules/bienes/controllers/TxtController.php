<?php

namespace app\modules\bienes\controllers;
use Yii;
use app\components\AitController;

class TxtController extends AitController
{
	
    public function actionIndex()
    {
        return $this->render('index');
    }
    
    
      public function actionMuebles() {
        return $this->render('muebles');
    }
    
    
          public function actionMarcas() {
        return $this->render('marcas');
    }
    
    
          public function actionModelos() {
        return $this->render('modelos');

            }
                 public function actionBasicos() {
        return $this->render('basicos');

            }
                 public function actionUnidades() {
        return $this->render('unidades');

            }
                 public function actionSedes() {
        return $this->render('sedes');

            }
            
            
                 public function actionResponsables() {
        return $this->render('responsables');

            }
}