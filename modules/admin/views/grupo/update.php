<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Grupo */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Grupo',
]) . ' ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Grupos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_grupo, 'url' => ['view', 'id' => $model->id_grupo]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="grupo-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
