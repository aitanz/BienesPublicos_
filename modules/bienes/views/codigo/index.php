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

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    


        <div class='container'>
        <div class='main row'>
        <div class='col-md-6 column'>
             <span align='left'><?= Html::a(Yii::t('app', 'Crear codigo del Bien'), ['create'], ['class' => 'btn btn-success']) ?></span>
        </div>
        <div class='col-md-6 column'>
             <span align='rigth'><?= Html::a(Yii::t('app', 'Ver'), ['view'], ['class' => 'btn btn-info']) ?></span>
        </div>
        </div>
        </div>
</div>




