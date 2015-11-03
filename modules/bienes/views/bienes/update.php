<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\bienes\models\BienesNCodigoBien */

$this->title = Yii::t('app', 'Actualizar Bienes: ', [
    'modelClass' => 'Bienes Ncodigo Bien',
]) . ' ' . $model->id_codigo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bienes Ncodigo Biens'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_codigo, 'url' => ['view', 'id_codigo' => $model->id_codigo]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="bienes-ncodigo-bien-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
