<?php

namespace app\modules\bienes;

class Bienes extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\bienes\controllers';

    public function init()
    {
        parent::init();

        // custom initialization code goes here
         \Yii::$app->params['menuItems'] = [
          
            [
                'label' => 'Bienes', 'url' => ['/bienes'],
                'icon' => 'table',
            ],
        ];
        // Rnd of custom
    }
}
