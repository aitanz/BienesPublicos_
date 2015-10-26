<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;



use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $searchModel app\modules\bienes\models\BienesCodigoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
    

    
$this->title = Yii::t('app', 'Bienes Codigos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bienes-codigo-index">
   <h1 align="center">Codigo de los Bienes<h1>
    <!--<h1><?= Html::encode($this->title) ?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <br><br>


        <div class='container'>
        <div class='row'>
        <div class='col-md-3 column'>
           <span ><?= Html::a(Yii::t('app', 'Crear'), ['create'], ['class' => 'btn btn-success btn-lg']) ?></span>
        </div>
        <div class='col-md-3 column'>
             <span><?= Html::a(Yii::t('app', 'Ver'), ['view'], ['class' => 'btn btn-info btn-lg']) ?></span>
        </div>
        </div>
        </div>
</div>




