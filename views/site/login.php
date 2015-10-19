<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-login">
    <p>Please fill out the following fields to login:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

    <div class="">
        <div class="login-box-body">
            <div class="form-group has-feedback">
                <?= $form->field($model, 'username', [
                    'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('username'),
                        'class' => 'form-control',
                    ],
                    'template' => '
                    <div class="form-group field-loginform-username required">
                        {input}
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        <div class="help-block"></div>
                    </div>'])->input("text") ?>
            </div>
            <div class="form-group has-feedback">
                <?= $form->field($model, 'password', [
                    'inputOptions' => [
                        'placeholder' => $model->getAttributeLabel('password'),
                        'class' => 'form-control',
                    ],
                    'template' => '
                    <div class="form-group field-loginform-username required">
                        {input}
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        <div class="help-block"></div>
                    </div>'])->passwordInput() ?>
            </div>
            <div class="row">
                <div class="checkbox icheck">
                    <div class="form-group">
                        <?= $form->field($model, 'rememberMe', [])->checkbox() ?>
                    </div>
                </div>
            </div>

            <?php
            /*
            <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
                <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
            </div><!-- /.social-auth-links -->
             * 
             */
            ?>

            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <a href="#">Olvide mi clave</a><br>
                    <a href="#" class="text-center">Registrar nuevo usuario.</a>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
