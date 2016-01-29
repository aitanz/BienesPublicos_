<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\bienes\models\BienesCategoriau */

$this->title = Yii::t('app', 'Create Bienes Categoriau');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bienes Categoriaus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bienes-categoriau-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
