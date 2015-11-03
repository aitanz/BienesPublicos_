<?php

namespace app\modules\bienes\controllers;

use yii\web\Controller;
use app\models\HtmlHelpers;

class DependentDropdownController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

    public function actionDepartamento($id_codigo){
        echo HtmlHelpers::dropDownList(\app\modules\bienes\models\BienesCodigo::className(), 'padre', $id_codigo, 'id_codigo', 'descripcion');
    }

    public function actionLocalidad($id_codigo){
        echo HtmlHelpers::dropDownList(\app\modules\bienes\models\BienesCodigo::className(), 'padre', $id_codigo, 'id_codigo', 'descripcion');
    }
}