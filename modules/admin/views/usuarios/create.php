<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\SeguridadUsuarios */

$this->title = Yii::t('app', 'Crear Usuarios');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Seguridad Usuarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seguridad-usuarios-create">

    <h1 align="center"><?= Html::encode($this->title) ?></h1>
 

    <?= $this->render('_form', ['model' => $model,]) ?>

</div>
