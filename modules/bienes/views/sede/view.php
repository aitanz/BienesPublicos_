<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\bienes\models\BienesLocalidad;

/* @var $this yii\web\View */
/* @var $model app\modules\bienes\models\BienesSede */

$this->title = $model->id_sede;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bienes Sedes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bienes-sede-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_sede], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_sede], [
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
            'id_sede',
            'nombre',
            [
              'attribute' => 'id_localidad',
              'value' =>  BienesLocalidad::findOne($model->id_localidad)->nombre
            ],
        ],
    ]) ?>

</div>
