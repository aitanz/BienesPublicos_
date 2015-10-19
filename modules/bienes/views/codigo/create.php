<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\bienes\models\BienesCodigo */

$this->title = Yii::t('app', 'Dirección de Bienes');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bienes Codigos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="bienes-codigo-create">

    <h1><?= Html::encode('Create Bienes Codigo') ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
