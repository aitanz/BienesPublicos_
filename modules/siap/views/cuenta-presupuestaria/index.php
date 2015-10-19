<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\siap\models\CuentaPresupuestariaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cuenta Presupuestarias');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuenta-presupuestaria-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Cuenta Presupuestaria',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idcuenta',
            'auxiliar',
            'causado',
            'comprometido',
            'descripcionaux',
            // 'disponibilidad',
            // 'espadre:boolean',
            // 'pagado',
            // 'aumentado',
            // 'disminuido',
            // 'precomprometido',
            // 'sectorgeog',
            // 'statusaprobacion',
            // 'tipopartida',
            // 'montoinicial',
            // 'idcategoriaprogramatica',
            // 'idpuc',
            // 'puc',
            // 'categoria',
            // 'tipocuenta',
            // 'adicional',
            // 'montooriginal',
            // 'observacion',
            // 'proyecto',
            // 'idrecurso',
            // 'fechagaceta',
            // 'extraordinario',
            // 'gaceta',
            // 'idusuario',
            // 'idefiscal',
            // 'corriente',
            // 'capital',
            // 'financiera',
            // 'inversion',
            // 'clase',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
