<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\requisiciones\models\Requisicion */

$this->title = Yii::t('app', 'Crear Requisicion');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Requisiciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="requisicion-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', ['model' => $model])?>
                          

</div>
