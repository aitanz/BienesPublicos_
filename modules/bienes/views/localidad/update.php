<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\bienes\models\BienesLocalidad */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Bienes Localidad',
]) . ' ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bienes Localidads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_localidad, 'url' => ['view', 'id' => $model->id_localidad]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="bienes-localidad-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
