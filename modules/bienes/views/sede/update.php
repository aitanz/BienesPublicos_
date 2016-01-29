<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\bienes\models\BienesSede */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Bienes Sede',
]) . ' ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bienes Sedes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_sede, 'url' => ['view', 'id' => $model->id_sede]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="bienes-sede-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
