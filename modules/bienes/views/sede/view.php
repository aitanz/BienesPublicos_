<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\bienes\models\BienesLocalidad;

/* @var $this yii\web\View */
/* @var $model app\modules\bienes\models\BienesSede */

$this->title = 'SEDE';

?>
<div class="bienes-sede-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_sede',
            'nombre',
            [
              'attribute' => 'id_localidad',
              'value' =>  BienesLocalidad::findOne($model->id_localidad)->nombre
            ],
        ],
    ]) ?>

</div>
