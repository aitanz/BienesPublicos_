<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\bienes\models\BienesLocalidad */

$this->title = Yii::t('app', 'Create Bienes Localidad');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bienes Localidads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bienes-localidad-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>