<?php

namespace app\modules\admin;

use \Yii;

class Admin extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\admin\controllers';

    public function init()
    {
        parent::init();
        if( \Yii::$app->user->isGuest || !\Yii::$app->user->identity->hasAccess($this->id) )
        {
            \Yii::$app->getResponse()->redirect( \yii\helpers\Url::toRoute("/site/login" ) );
        }
        \Yii::$app->params['menuItems'] = [
            [
                'label' => 'Inicio', 'url' => \Yii::$app->homeUrl,
                'icon' => 'dashboard',
            ],
            [
                'label' => 'Administracion', 'url' => '#',
                'icon' => 'users',
                'visible' => Yii::$app->user->identity->isAdmin(),
                'items' => [
                    [
                        'label' => 'Seguridad', 'url' => ['/admin/'],
                        'items' => [
                            [
                                'label' => 'Permisos de Usuarios', 'url' => ['/admin/permisos-usuario']
                            ],
                            [
                                'label' => 'Grupos', 'url' => ['/admin/grupo']
                            ],
                            [
                                'label' => 'Modulos', 'url' => ['/admin/modulo']
                            ],
                                  [
                                'label' => 'Usuarios', 'url' => ['/admin/usuarios']
                            ],
                        ],
                    ],
                ]
            ],
            [
                'label' => 'Siap', 'url' => ['/siap'],
                'visible' => Yii::$app->user->identity->hasAccess("siap"),
                'icon' => 'table',
            ],
        ];
    }
}
