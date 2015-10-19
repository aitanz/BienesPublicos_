<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\siap\models\CuentaPresupuestaria */

$this->title = $model->idcuenta;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cuenta Presupuestarias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuenta-presupuestaria-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idcuenta], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idcuenta], [
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
            'idcuenta',
            'auxiliar',
            'causado',
            'comprometido',
            'descripcionaux',
            'disponibilidad',
            'espadre:boolean',
            'pagado',
            'aumentado',
            'disminuido',
            'precomprometido',
            'sectorgeog',
            'statusaprobacion',
            'tipopartida',
            'montoinicial',
            'idcategoriaprogramatica',
            'idpuc',
            'puc',
            'categoria',
            'tipocuenta',
            'adicional',
            'montooriginal',
            'observacion',
            'proyecto',
            'idrecurso',
            'fechagaceta',
            'extraordinario',
            'gaceta',
            'idusuario',
            'idefiscal',
            'corriente',
            'capital',
            'financiera',
            'inversion',
            'clase',
        ],
    ]) ?>

</div>
