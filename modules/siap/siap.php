<?php

namespace app\modules\siap;

use \Yii;


class siap extends \yii\base\Module
{
    public $controllerNamespace = 'app\modules\siap\controllers';

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
                'label' => 'Administracion', 'url' => '#',
                'visible' => !\Yii::$app->user->isGuest && Yii::$app->user->identity->isAdmin(),
                'icon' => 'users',
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
                'label' => 'Configuración', 'url' => ['/organizacion/'],
                'icon' => 'gear',
            ],
            [
                'label' => 'Tesoreria', 'url' => '#',
                'icon' => 'btc',
                'items' => [
                    [
                        'label' => 'Pago de Proveedores', 'url' => ['/siap/tesoreria/pago-proveedores'],
                    ],
                ]
            ],
            [
                'label' => 'Requisiciones', 'url' => 'http://siap.anz/OpenSiap/',
                'icon' => 'table',
            ],
                //label de bienes
            [
                'label' => 'Bienes', 'url' => ['/bienes/'],
                'icon' => 'table',

                //'visible' => Usuario::hasAccess($this->id, "bienes"),


            ],



        ];

        // custom initialization code goes here
    }
}
