<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\bienes\models\BienesSede */

$this->title = Yii::t('app', 'Create Bienes Sede');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bienes Sedes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bienes-sede-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
