<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\bienes\models\BienesLocalidad */

$this->title = 'LOCALIDAD';

?>
<div class="bienes-localidad-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_localidad',
            'codigo_localidad',
            'nombre',
            'padre',
            'codigo_completo',
            'id_tipo_localidad',
        ],
    ]) ?>

</div>
