<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\bienes\models\BienesCategoria */
/* @var $form yii\widgets\ActiveForm */


$this->title = 'CATEGORIA';
?>

<div class="bienes-categoria-view">

     <h1><?= Html::encode($this->title) ?></h1>
    
<?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_categoria',
            'descripcion',
                             ],
    ]) ?>
</div>


