<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\modules\bienes\models\BienesCategoriau;
use app\modules\organizacion\models\OrganizacionOrganizacion;
$Categoriau =  new BienesCategoriau;
$Organizacion = new OrganizacionOrganizacion;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\organizacion\models\OrganizacionUadministrativaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Unidades Administrativas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organizacion-uadministrativa-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Registrar'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_unidad',
            'denominacion',
            [
              'attribute' => 'id_categoria',
              'value' => function($Categoriau){
              $Ctg = BienesCategoriau::findOne($Categoriau->id_categoria);
              return $Ctg->denominacion;
                },
            ],
            [
              'attribute' => 'id_organizacion',
              'value' => function($Organizacion){
              $Codigo = OrganizacionOrganizacion::findOne($Organizacion->id_organizacion);
              return $Codigo->nombre;
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
