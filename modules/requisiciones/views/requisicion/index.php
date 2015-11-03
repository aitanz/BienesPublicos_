<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\widgets\AlertBlock;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\requisiciones\models\RequisicionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Requisicions');
$this->params['breadcrumbs'][] = $this->title;
 
?>
<div class="requisicion-index">

    <h1><?= Html::encode($this->title) ?></h1>
 
  
    
    <?=  AlertBlock::widget([
    'useSessionFlash' => true,
    'type' => AlertBlock::TYPE_GROWL]);?>
    
    <!--echo $this->render('_search', ['model' => $searchModel]); -->
           
    <p>
        <?= Html::a(Yii::t('app', 'Create Requisicion'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idrequisicion',
            'status',
            'fecha',
            'observaciones',
            'tipo',
            // 'concepto',
            // 'numcontrol',
            // 'idefiscal',
            // 'idtipoproducto',
            // 'idcoordinacion',
            // 'idtipopago',
            // 'statusinformatica',
            // 'statusadmin',
            // 'fechainformatica',
            // 'fechaadmin',
            // 'motivorechazo:ntext',
            // 'bitacora',
            // 'idusuario',
            // 'dirip',
            // 'idproveedor',
            // 'monto',
            // 'idcuenta',
            // 'idpuc',
            // 'puc',
            // 'idcategoriaprogramatica',
            // 'categoriaprogramatica',
            // 'disponible',
            // 'auxiliar',
            // 'iddireccion',
            // 'secuencia',
            // 'imputacion:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
