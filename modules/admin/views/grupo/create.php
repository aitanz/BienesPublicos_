<?php

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Grupo */

$this->title = Yii::t('app', 'Create Grupo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Grupos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grupo-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
