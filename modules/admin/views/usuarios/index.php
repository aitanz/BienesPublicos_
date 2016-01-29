<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\SeguridadUsuariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$data = new app\modules\admin\models\Direccion;

$this->title = Yii::t('app', 'Seguridad Usuarios');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seguridad-usuarios-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Seguridad Usuarios'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'cedula',
             'login',
            [
              'attribute' => 'id_direccion',
              'value' => function($data){
              $Codigo = app\modules\admin\models\Direccion::findOne($data->id_direccion);
              return $Codigo->nombre;
                },
            ],
           
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
