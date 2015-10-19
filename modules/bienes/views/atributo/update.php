<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\bienes\models\BienesAtributo */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Bienes Atributo',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bienes Atributos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="bienes-atributo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
