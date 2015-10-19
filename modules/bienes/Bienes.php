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
                'label' => 'Dashboard', 'url' => \Yii::$app->homeUrl,
                'icon' => 'dashboard',
            ],
            [
                'label' => 'Bienes', 'url' => ['/bienes/bienes'],
                'icon' => 'table',
            ],
        ];
        // Rnd of custom
    }
}
