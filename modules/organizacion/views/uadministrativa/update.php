<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\organizacion\models\OrganizacionUadministrativa */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Organizacion Uadministrativa',
]) . ' ' . $model->id_unidad;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Organizacion Uadministrativas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_unidad, 'url' => ['view', 'id' => $model->id_unidad]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="organizacion-uadministrativa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
