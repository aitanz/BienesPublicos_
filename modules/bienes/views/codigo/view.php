<?php

use yii\helpers\Html;

use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $model app\modules\bienes\models\BienesCodigo */

$this->title = 'Codigo de los Bienes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bienes-codigo-view">

    <h1><?= Html::encode($this->title) ?></h1>

   
  

<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_codigo',
            'codigo',
            'descripcion',
            'padre',
            'codigo_completo',

           // ['class' => 'yii\grid\ActionColumn'],// acciones de la columna 
            ], //fin de la columna

    ]); 
    
    ?><!--fin gridview -->
<?= Html::a(Yii::t('app', 'Continuar'), ['index'], ['class' => 'btn btn-success']) ?>
</div>
