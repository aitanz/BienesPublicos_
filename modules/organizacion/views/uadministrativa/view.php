<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\organizacion\models\OrganizacionUadministrativa */

$this->title = $model->id_unidad;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Organizacion Uadministrativas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organizacion-uadministrativa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_unidad], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_unidad], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_unidad',
            'denominacion',
            'depedencia',
            'id_organizacion',
            'id_categoria',
        ],
    ]) ?>

</div>
