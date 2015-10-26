<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\bienes\models\BienesCodigo */

$this->title = Yii::t('app', 'Codigo de Bienes');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bienes Codigos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="bienes-codigo-create">

    <h1 align="center"><?= Html::encode('Crear codigo de los Bienes') ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
