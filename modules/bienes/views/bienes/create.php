<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\bienes\models\BienesNCodigoBien */

$this->title = Yii::t('app', 'Registro de Bienes Muebles');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bienes Ncodigo Biens'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bienes-ncodigo-bien-create">
<?= Html::a(Yii::t('app','Volver'),['index'],['class'=>'btn btn-info', 'style'=>'before:'])?>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<style>
.btn-info::before {
	/*--ajuste de icono de crear--*/
    content: "\f0a8 ";
    font-family: FontAwesome;
    color: #5A5A5B;
}
</style>