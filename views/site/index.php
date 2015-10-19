<div class="row">
    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-orange index-image">
                <a target="_blank" href="http://sagt.anz/otrs/index.pl"><img src="images/logos/logoOTRS.png" title="Centro De Atencion y Soporte" /></a>
            </span>
            <div class="info-box-content">
                <a href="http://sagt.anz/otrs/index.pl"><h4><b>Asistencia técnica.</b></h4></a>
                <a href="http://sagt.anz/otrs/index.pl"><span class="info-box-text">Centro De Atencion y Soporte</span></a>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
    
    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-black-active index-image">
                <a target="_blank" href="<?= yii\helpers\Url::to(['/siap']) ?>"><img src="images/logos/logoSIAP.png" title="Siap" /></a>
            </span>
            <div class="info-box-content">
                <a href="<?= yii\helpers\Url::to(['/siap']) ?>"><h4><b>Siap</b></h4></a>
                <a href="<?= yii\helpers\Url::to(['/siap']) ?>"><span class="info-box-text">Sistema integrado de administración publica.</span></a>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>
    
    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-red-active index-image">
                <a target="_blank" href="http://wiki.anz"><img src="images/logos/logoWiki.png" title="Internet" /></a>
            </span>
            <div class="info-box-content">
                <a href="http://wiki.anz"><h4><b>Wiki</b></h4></a>
                <a href="http://wiki.anz"><span class="info-box-text">Documentación en linea de los sistemas y servicios electrónicos.</span></a>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
</div>

<div class="row dash-cols">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-blue-gradient index-image">
                <a target="_blank" href="http://sigoca.anz"><img class="lista-aplicaciones" src="images/logos/logoSIGOCA.png" title="SIGOCA" /></a>
            </span>
            <div class="info-box-content">
                <a href="http://sigoca.anz"><h4><b>SIGOCA</b></h4></a>
                <a href="http://sigoca.anz"><span class="info-box-text">Sistema de gestión para el gobierno de calle.</span></a>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->
    
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="info-box">
            <span class="info-box-icon bg-gray-active index-image">
                <a target="_blank" href="https://correo.anz/"><img class="lista-aplicaciones" src="images/logos/logoMAIL.png" title="Correo Interno" /></a>
            </span>
            <div class="info-box-content">
                <a href="https://correo.anz/"><h4><b>Correo Interno</b></h4></a>
                <a href="https://correo.anz/"><span class="info-box-text">Buzón interno de mensajería institucional.</span></a>
            </div><!-- /.info-box-content -->
        </div><!-- /.info-box -->
    </div><!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>
</div>
    
<?php
/* @var $this yii\web\View */
$this->title = 'Intranet';
?>
