<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\modules\bienes\models\BienesLocalidad;
use app\modules\bienes\models\BienesCodigo;

$BienesLocalidad =  new BienesLocalidad;
$BienesCodigo =  new BienesCodigo;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\bienes\models\BienesNCodigoBienSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Bienes Muebles');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bienes-ncodigo-bien-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Crear Bienes Muebles'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
              'attribute' => 'id_codigo',
              'value' => function($BienesCodigo){
              $Codigo = BienesCodigo::findOne($BienesCodigo->id_codigo);
              return $Codigo->descripcion;
                },
            ],
            'identificacion',
            'descripcion',
            // 'valor_unidad',
            // 'justiprecio',
          'ano_adquisicion',
            // 'ubicacion',
            // 'tipo_adquisicion',
            // 'n_documento',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
