<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\siap\models\CuentaPresupuestaria */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Cuenta Presupuestaria',
]) . ' ' . $model->idcuenta;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cuenta Presupuestarias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idcuenta, 'url' => ['view', 'id' => $model->idcuenta]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cuenta-presupuestaria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
