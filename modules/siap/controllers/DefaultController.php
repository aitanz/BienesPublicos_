<?php

namespace app\modules\siap\controllers;

use app\components\AitController;

class DefaultController extends AitController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
