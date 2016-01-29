<?php

namespace app\modules\bienes;
use \Yii;
class Bienes extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\bienes\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
         \Yii::$app->params['menuItems'] = [
              [
                'label' => 'Inicio', 'url' => \Yii::$app->homeUrl,
                'icon' => 'dashboard',
            ],
          
            [
                'label' => 'Bienes', 'url' => ['/bienes'],
                'icon' => 'table',
            ],
             
                [
                'label' => 'Siap', 'url' => ['/siap'],
                'visible' => Yii::$app->user->identity->hasAccess("siap"),
                'icon' => 'table',
            ],
             
        ];
        // Rnd of custom
    }
}



