<?php

namespace app\components;

use Yii;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use app\modules\admin\models\SeguridadUsuarios;

class AitController extends Controller
{
    public function beforeAction($action)
    {
        $accion = str_ireplace("action", "", $action->actionMethod);
        try
        {
                if( !SeguridadUsuarios::hasAccess( $this->module->id, $this->id, $accion ) )
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
