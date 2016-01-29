<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\bienes\models\BienesMarcas */

$this->title = $model->marca;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bienes Marcas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bienes-marcas-view">

    <h1><?= Html::encode($this->title) ?></h1>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_marca',
            'marca',
            'fabricante',
        ],
    ]) ?>

</div>
