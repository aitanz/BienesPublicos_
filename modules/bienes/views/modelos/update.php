<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\bienes\models\BienesModelos */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Bienes Modelos',
]) . ' ' . $model->descripcion;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bienes Modelos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_modelo, 'url' => ['view', 'id' => $model->id_modelo]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="bienes-modelos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
