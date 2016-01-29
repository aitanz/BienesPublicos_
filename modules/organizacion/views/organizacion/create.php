<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\organizacion\models\OrganizacionOrganizacion */

$this->title = Yii::t('app', 'Create Organizacion Organizacion');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Organizacion Organizacions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="organizacion-organizacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
