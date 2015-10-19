<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\siap\models\Ajustes */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Ajustes',
]) . ' ' . $model->id_documento;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ajustes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_documento, 'url' => ['view', 'id_documento' => $model->id_documento, 'id_ajuste' => $model->id_ajuste]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ajustes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
