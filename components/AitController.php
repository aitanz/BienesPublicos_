<?php

namespace app\components;

use Yii;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use app\models\Usuario;

class AitController extends Controller
{
    public function beforeAction($action)
    {
        $accion = str_ireplace("action", "", $action->actionMethod);
        try
        {
                if( !Usuario::hasAccess( $this->module->id, $this->id, $accion ) )
                {
                    throw new ForbiddenHttpException("No tiene permisos para ver esta pagina.");
                }
        }
        catch (Exception $ex)
        {
            $this->redirect(['/site/index']);
        }
        return true;
    }
}


?>
