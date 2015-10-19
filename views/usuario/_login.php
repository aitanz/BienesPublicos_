<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
$form = ActiveForm::begin([
    'id' => 'login-form-modal',
    'action' => ['/site/login'],
]);
?>

<div class="modal modal-danger" id="loginModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Iniciar Sesión</h4>
            </div>
            <div class="modal-body">

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

                    <a href="#">Olvide mi clave</a><br>
                    <a href="#" class="text-center">Registrar nuevo usuario.</a>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cancelar</button>
                <?= Html::submitButton("Iniciar Sesión", ['class' => 'btn btn-outline']) ?>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="md-overlay"></div>

<?php ActiveForm::end(); ?>
<script>
    $(function() {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>