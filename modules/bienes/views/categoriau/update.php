<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\bienes\models\BienesCategoriau */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Bienes Categoriau',
]) . ' ' . $model->id_categoria_adm;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bienes Categoriaus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_categoria_adm, 'url' => ['view', 'id' => $model->id_categoria_adm]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="bienes-categoriau-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
