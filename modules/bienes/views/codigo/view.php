<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $model app\modules\bienes\models\BienesCodigo */

$this->title = 'Codigo de los Bienes';
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bienes Codigos'), 'url' => ['index']];
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
//'vAlign'=>'middle',
            ], //fin de la columna

    ]); 
    
    ?><!--fin gridview -->
<?= Html::a(Yii::t('app', 'Continuar'), ['index'], ['class' => 'btn btn-success']) ?>
</div>
