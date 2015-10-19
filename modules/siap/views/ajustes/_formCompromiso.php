<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\siap\models\CuentaPresupuestariaSearch;
use app\modules\siap\models\Cuenta;

/* @var $this yii\web\View */
/* @var $model app\modules\siap\models\Ajustes */
/* @var $form yii\widgets\ActiveForm */
?>

    
<h1>Compromiso</h1>
    
<div class="ajustes-form">

    <?php $form = ActiveForm::begin(); ?>

    <div>
        <?= $form->field($model, 'id_documento')->textInput() ?>
        
        <?= Html::label("Beneficiario") ?>
        <?= Html::input("text", "beneficiario", "", [ 'class' => 'form-control', 'placeholder' => 'Beneficiario...', 'readonly'=>'readonly' ]) ?>
        
        <?= Html::label("Fecha") ?>
        <?= Html::input("text", "fecha", date("d/m/Y"), [ 'class' => 'form-control', 'readonly'=>'readonly' ]) ?>
    </div>

    <div>
        <?= Html::label("Partidas Presupuestarias") ?>
        <?php
            $searchModel = new CuentaPresupuestariaSearch();
            $dataProvider = $searchModel->search('');
//            $dataProvider = new act CActiveDataProvider('C001tProyecto', array(
//                'criteria' => array(
//                    'condition' => 'in_cargado = 1 AND in_activo = 0',
//                ),
//            ));
            echo yii\grid\GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    [
                        'label'=>'PARTIDA PRESUPUESTARIA',
                        'format' => 'raw',
                        'value'=>function($data)
                        {
                            return Html::label( trim($data->categoria).trim($data->puc) );
                        }
                    ],
                    [
                        'label'=>'DESCRIPCION DE PARTIDA',
                        'format' => 'raw',
                        'value'=>function($data)
                        {
                            if( trim($data->descripcionaux) != "" )
                                return Html::label(trim($data->descripcionaux));
                            else
                            {
                                $cuenta = Cuenta::find()->where( "puc like '%".trim($data->puc)."%'")->andWhere( "categoria like '%".trim($data->categoria)."%'" )->one();
                                if( $cuenta )
                                    return Html::label( trim($cuenta->descripcion) );
                                else
                                {
                                    $puc = app\models\Puc::find()->where( "puc like '%".trim($data->puc)."%'")->one();
                                    if( $puc )
                                        return Html::label( trim($puc->descripcion) );
                                    else
                                        return Html::label("N/A");
                                }
                            }
                        }
                    ],
                    [
                        'label'=>'COMPROMETIDO ACTUAL',
                        'format' => 'raw',
                        'value'=>function($data)
                        {
                            return '<div class="input-group">'.
                                Html::input("text", "beneficiario", $data->comprometido, [ 'class' => 'form-control', 'readonly'=>'readonly' ]).
                                '<span class="input-group-addon">Bs</span>.</div>';
                        }
                    ],
                    [
                        'label'=>'AJUSTE',
                        'format' => 'raw',
                        'value'=>function($data)
                        {
                            return '<div class="input-group">'.
                                Html::input("numeric", "ajuste", "0", [ 'class' => 'form-control' ]).
                                '<span class="input-group-addon">Bs</span>.</div>';
                        }
                    ],
                    [
                        'label'=>'NUEVO COMPROMETIDO',
                        'format' => 'raw',
                        'value'=>function($data)
                        {
                            return '<div class="input-group">'.
                                Html::input("text", "nuevoComprometido", "", [ 'class' => 'form-control', 'readonly'=>'readonly' ]).
                                '<span class="input-group-addon">Bs</span>.</div>';
                        }
                    ],
                    [
                        'label'=>'DISPONIBILIDAD',
                        'format' => 'raw',
                        'value'=>function($data)
                        {
                            return '<div class="input-group">'.
                            Html::input("text", "disponibilidad", $data->disponibilidad, [ 'class' => 'form-control', 'readonly' => 'readonly' ]).
                            '<span class="input-group-addon">Bs</span>.</div>';
                        }
                    ],
                ],
            ]);
        ?>
    </div>
    
    <div>
        <?= $form->field($model, 'observacion')->textArea(['maxlength' => 256]) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    
</div>
