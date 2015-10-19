<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\bienes\models\BienesNCodigoBien */

$this->title = Yii::t('app', 'Registro de Bienes Muebles');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bienes Ncodigo Biens'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bienes-ncodigo-bien-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
