<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use app\modules\bienes\models\BienesSede;
use app\modules\bienes\models\BienesCodigo;
use app\modules\organizacion\models\OrganizacionUadministrativa;

$BienesSede =  new BienesSede;
$BienesCodigo =  new BienesCodigo;
$UAdministrativa = new OrganizacionUadministrativa;

/* @var $this yii\web\View */
/* @var $model app\modules\bienes\models\BienesNCodigoBien */

$this->title = BienesCodigo::findOne($model->id_codigo)->codigo_completo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bienes Ncodigo Biens'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bienes-ncodigo-bien-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app','Volver'),['create'],['class'=>'btn btn-info'])?>
        <?= Html::a(Yii::t('app', 'Update'),
                ['update', 'id_codigo' => $model->id_codigo,
                    'id_direccion'=> $model->id_direccion,
                    'identificacion'=> $model->identificacion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'),
                ['delete', 'id_codigo' => $model->id_codigo,
                    'id_direccion'=> $model->id_direccion,
                    'identificacion'=> $model->identificacion], ['class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
              'attribute' => 'nombre',
              'value' =>  BienesCodigo::findOne($model->id_codigo)->descripcion
            ],
            [
              'attribute' => 'Sede',
              'value' =>  BienesSede::findOne($model->id_sede)->nombre
            ],
            'identificacion',
            'descripcion',
            'valor_unidad',
            'justiprecio',
            'ano_adquisicion',
            'ubicacion',
             [
              'attribute' => 'tipo_adquisicion',
              'value' => app\modules\bienes\models\BienesAdquisicion::findOne($model->tipo_adquisicion)->descripcion
            ],
         
            
            
           // [
            // 'attribute' => 'id_uadministrativa',
       //       'value' =>  OrganizacionUadministrativa::findOne($model->id_uadministrativa)->denominacion
         //   ],

        ],
    ]) ?>

</div>
<style>
.btn-info::before {
	/*--ajuste de icono de crear--*/
    content: "\f0a8 ";
    font-family: FontAwesome;
    color: #5A5A5B;

}
</style>
