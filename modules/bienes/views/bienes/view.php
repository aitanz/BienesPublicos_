<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use app\modules\bienes\models\BienesSede;
use app\modules\bienes\models\BienesCodigo;

$BienesSede =  new BienesSede;
$BienesCodigo =  new BienesCodigo;

/* @var $this yii\web\View */
/* @var $model app\modules\bienes\models\BienesNCodigoBien */

$this->title = $model->id_codigo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bienes Ncodigo Biens'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bienes-ncodigo-bien-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id_codigo' => $model->id_codigo, 'id_localidad' => $model->id_localidad], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id_codigo' => $model->id_codigo, 'id_localidad' => $model->id_localidad], [
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
            [
              'attribute' => 'id_codigo',
              'value' =>  BienesCodigo::findOne($model->id_codigo)->descripcion
            ],
            [
              'attribute' => 'id_sede',
              'value' =>  BienesSede::findOne($model->id_sede)->nombre
            ],
            'identificacion',
            'nombre',
            'descripcion',
            'valor_unidad',
            'justiprecio',
            'ano_adquisicion',
            'ubicacion',
            'tipo_adquisicion',
            'n_documento',
        ],
    ]) ?>

</div>
