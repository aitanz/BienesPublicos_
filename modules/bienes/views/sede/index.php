<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\bienes\models\BienesLocalidad;


/* @var $this yii\web\View */
/* @var $searchModel app\modules\bienes\models\BienesSedeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Bienes Sedes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bienes-sede-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Bienes Sede'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_sede',
            'nombre',
            [
              'attribute' => 'id_localidad',
              'value' => function($BienesLocalidad){
              $Localidad = BienesLocalidad::findOne($BienesLocalidad->id_localidad);
              return $Localidad->nombre;
            },

            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
