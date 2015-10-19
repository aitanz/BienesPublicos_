<?php

use yii\helpers\Html;
use yii\grid\GridView;

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

            'id_codigo',
            'id_localidad',
            'identificacion',
            'nombre',
            'descripcion',
            // 'valor_unidad',
            // 'justiprecio',
            // 'ano_adquisicion',
            // 'ubicacion',
            // 'tipo_adquisicion',
            // 'n_documento',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
