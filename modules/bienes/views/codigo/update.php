<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\bienes\models\BienesCodigo */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Bienes Codigo',
]) . ' ' . $model->id_codigo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bienes Codigos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_codigo, 'url' => ['view', 'id' => $model->id_codigo]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="bienes-codigo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
