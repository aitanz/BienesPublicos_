<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\requisiciones\models\Requisicion */

$this->title = $model->idrequisicion;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Requisicions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="requisicion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idrequisicion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idrequisicion], [
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
            'idrequisicion',
            'status',
            'fecha',
            'observaciones',
            'tipo',
            'concepto',
            'numcontrol',
            'idefiscal',
            'idtipoproducto',
            'idcoordinacion',
            'idtipopago',
            'statusinformatica',
            'statusadmin',
            'fechainformatica',
            'fechaadmin',
            'motivorechazo:ntext',
            'bitacora',
            'idusuario',
            'dirip',
            'idproveedor',
            'monto',
            'idcuenta',
            'idpuc',
            'puc',
            'idcategoriaprogramatica',
            'categoriaprogramatica',
            'disponible',
            'auxiliar',
            'iddireccion',
            'secuencia',
            'imputacion:boolean',
        ],
    ]) ?>

</div>
