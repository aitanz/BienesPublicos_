<?php

namespace app\modules\organizacion;



use \Yii;

class organizacion extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\organizacion\controllers';

    public function init()
    {
        parent::init();
//        if( !Usuario::hasAccess($this->id) )
//        {
//            \Yii::$app->getResponse()->redirect( \yii\helpers\Url::toRoute("/site/login" ) );
//        }
        \Yii::$app->params['menuItems'] = [
            [
                'label' => 'Inicio', 'url' => \Yii::$app->homeUrl,
                'icon' => 'dashboard',
            ],
         
            [
                'label' => 'Configuración', 'url' => ['/organizacion/'],
                'icon' => 'gear',
            ],
            
            
             [
                'label' => 'Siap', 'url' => ['/siap'],
                'visible' => Yii::$app->user->identity->hasAccess("siap"),
                'icon' => 'table',
            ],



        ];

        // custom initialization code goes here
    }
}
