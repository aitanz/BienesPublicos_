<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\siap\models\AjustesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Ajustes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ajustes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php
        echo Html::a(Yii::t('app', 'Create {modelClass}', [
                    'modelClass' => 'Ajustes',
                ]), ['create'], ['class' => 'btn btn-success'])
        ?>

        <?php
//            echo Html::a(Yii::t('app', 'Ajuste Compromiso', [
//                    'modelClass' => 'Ajustes',
//                ]), ['create', 'page' => '1'], ['class' => 'btn btn-primary']);
//        
//            echo Html::a(Yii::t('app', 'Ajuste Causado', [
//                    'modelClass' => 'Ajustes',
//                ]), ['create', 'page' => '2'], ['class' => 'btn btn-primary']);
//                    
//            echo Html::a(Yii::t('app', 'Ajuste Pagado', [
//                    'modelClass' => 'Ajustes',
//                ]), ['create', 'page' => '3'], ['class' => 'btn btn-primary']);
        ?>

    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'observacion',
            'id_documento',
            'id_tipo',
            'monto_ajuste',
            'id_usuario_crea',
            // 'id_usuario_reversa',
            // 'fecha_ajuste',
            // 'fecha_reverso_ajuste',
            // 'id_ajuste',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>

</div>
