<?php

use yii\helpers\Html;

use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model app\modules\bienes\models\BienesCodigo */

$this->title = 'Codigo de los Bienes';
?>
<div class="bienes-codigo-view">

    <h1><?= Html::encode($this->title) ?></h1>

   <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
              
            'id_codigo',
            'codigo',
            'descripcion',
            'padre',
            'codigo_completo',

        ],
    ]) ?>


</div>


