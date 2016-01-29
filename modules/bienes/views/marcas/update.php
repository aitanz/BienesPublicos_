<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\bienes\models\BienesMarcas */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Bienes Marcas',
]) . ' ' . $model->marca;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bienes Marcas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_marca, 'url' => ['view', 'id' => $model->id_marca]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="bienes-marcas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
