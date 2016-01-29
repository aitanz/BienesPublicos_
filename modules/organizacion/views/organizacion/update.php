<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\organizacion\models\OrganizacionOrganizacion */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Organizacion Organizacion',
]) . ' ' . $model->id_organizacion;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Organizacion Organizacions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_organizacion, 'url' => ['view', 'id' => $model->id_organizacion]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="organizacion-organizacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
