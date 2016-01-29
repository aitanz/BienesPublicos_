<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\bienes\models\BienesMarcas */

$this->title = Yii::t('app', 'Create Bienes Marcas');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bienes Marcas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bienes-marcas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
