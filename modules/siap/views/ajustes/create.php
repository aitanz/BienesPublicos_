<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\siap\models\Ajustes */

$this->title = Yii::t('app', 'Crear {modelClass}', [
            'modelClass' => 'Ajustes',
        ]);

$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ajustes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ajustes-create">

    <div class="page-head">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php
        echo \yii\widgets\Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]);
        ?>
    </div>

    <?php
    echo $this->render('_form', [
        'model' => $model,
    ]);

//        if( $pagina == 1 )
//        {
//            echo $this->render('_formCompromiso', [
//                'model' => $model,
//            ]);
//        }
//        else if( $pagina == 2 )
//        {
//            echo $this->render('_formCausado', [
//                'model' => $model,
//            ]);
//        }
//        else if( $pagina == 3 )
//        {
//            echo $this->render('_formPago', [
//                'model' => $model,
//            ]);
//        }
    ?>

</div>
