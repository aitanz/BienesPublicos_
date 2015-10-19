<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\components\AitBreadCrumbs;
use app\assets\AppAsset;
use app\components\AitMenu;

AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <link href="css/site.css" rel="stylesheet">
        <link href="css/overrides.css" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <?php $this->beginBody() ?>
        <div class="wrapper" id="contenido">

            <header class="main-header">
                <!-- Logo -->
                <a href="<?= yii\helpers\Url::to(['/site/index']) ?>" class="logo"></a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>

                    <div style="font-size: 9px; width: 150px; float: left; text-align: left; top: 3px; margin-top: 1%;font-family: 'Open Sans',sans-serif;">
                        Gobierno Bolivariano y Revolucionario de Anzoátegui
                    </div>

                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">

                            <?php if (!Yii::$app->user->isGuest): ?>
                                <!-- Messages: style can be found in dropdown.less-->
                                <li class="dropdown messages-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-envelope"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="header">No tiene mensajes</li>
                                        <li></li>
                                        <li class="footer"><a href="#">Ver todos los mensajes</a></li>
                                    </ul>
                                </li>

                                <!-- Notifications: style can be found in dropdown.less -->
                                <li class="dropdown notifications-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-bell"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="header">No tiene notificaciones</li>
                                        <li>
                                        </li>
                                        <li class="footer"><a href="#">Ver Todo</a></li>
                                    </ul>
                                </li>

                                <!-- Tasks: style can be found in dropdown.less -->
                                <li class="dropdown tasks-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-flag"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="header">Sin tareas pendientes</li>
                                        <li>
                                        </li>
                                        <li class="footer">
                                            <a href="#">Ver Todas las Tareas</a>
                                        </li>
                                    </ul>
                                </li>
                            <?php endif; ?>

                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?= (!Yii::$app->user->isGuest && isset(Yii::$app->user->avatar) ) ? Yii::$app->user->avatar : "images/user-icon.png" ?>" class="user-image" alt="User Image">
                                    <span class="hidden-xs"><?= !Yii::$app->user->isGuest ? Yii::$app->user->identity->persona0->nombres . " " . Yii::$app->user->identity->persona0->apellidos : "Invitado" ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?= (!Yii::$app->user->isGuest && isset(Yii::$app->user->avatar) ) ? Yii::$app->user->avatar : "images/user-icon.png" ?>" class="img-circle" alt="User Image" style="background-color: #fff;">
                                        <p>
                                            <?= !Yii::$app->user->isGuest ? Yii::$app->user->identity->persona0->nombres . " " . Yii::$app->user->identity->persona0->apellidos : "Invitado" ?>
                                            <small><?= !Yii::$app->user->isGuest ? "Miembro desde " : "" ?></small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <li class="user-body">
                                        <div class="text-center">
                                            <?php if (Yii::$app->user->isGuest): ?>
                                                <a class="md-trigger" data-toggle="modal" data-target="#loginModal" href="#">Entrar</a>
                                            <?php else: ?>
                                                <a href="#">Amigos</a>
                                            <?php endif; ?>
                                        </div>
                                    </li>
                                    <?php if (!Yii::$app->user->isGuest): ?>
                                        <!-- Menu Footer-->
                                        <li class="user-footer">
                                            <div class="pull-left">
                                                <a href="#" class="btn btn-default btn-flat">Perfil</a>
                                            </div>
                                            <div class="pull-right">
                                                <a href="<?= yii\helpers\Url::to(["/site/logout"]) ?>" class="btn btn-default btn-flat">Salir</a>
                                            </div>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </li>

                            <li>
                                <img class="logo-derecho-cintillo" src="images/logo-derecho.png" />
                            </li>
                        </ul>
                    </div>

                </nav>
            </header>

            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?= (!Yii::$app->user->isGuest && isset(Yii::$app->user->avatar) ) ? Yii::$app->user->avatar : "images/user-icon.png" ?>" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?= !Yii::$app->user->isGuest ? Yii::$app->user->identity->persona0->nombres . " " . Yii::$app->user->identity->persona0->apellidos : "Invitado" ?></p>
                            <a href="#"><img src="images/state_online.png" alt="Status" /> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Buscar...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <?php
                    if( isset(Yii::$app->params['menuItems']) && !empty(Yii::$app->params['menuItems']) )
                    {
                        echo AitMenu::widget([
                            'options' => ['class' => 'sidebar-menu'],
                            'encodeLabels' => false, //allows you to use html in labels
                            'activateParents' => true,
                            'items' => Yii::$app->params['menuItems'],
                        ]);
                    }
                    else
                    {
                        echo AitMenu::widget([
                            'options' => ['class' => 'sidebar-menu'],
                            'encodeLabels' => false, //allows you to use html in labels
                            'activateParents' => true,
                            'items' => [
                                ['label' => 'MENU PRINCIPAL', 'options' => [ 'class' => 'header']],
                                ['label' => 'Centro de Aten. y Soporte', 'url' => 'http://sagt.anz/otrs/index.pl',
                                    'icon' => 'phone',
    //                                'options' => [ 'class' => 'treeview'],
    //                                'items' => [
    //                                    ['label' => 'New Arrivals', 'url' => ['#']],
    //                                    ['label' => 'Most Popular', 'url' => ['#']],
    //                                ]
                                ],
                                ['label' => 'Siap', 'url' => ['/siap'],
                                    'icon' => 'table',
                                ],
                                ['label' => 'Wiki', 'url' => 'http://wiki.anz/',
                                    'icon' => 'book',
                                ],
                                ['label' => 'Sigoca', 'url' => 'http://sigoca.anz',
                                    'icon' => 'tasks',
                                ],
                                ['label' => 'Correo Interno', 'url' => 'http://correo.anz',
                                    'icon' => 'envelope-o',
                                ],
                                ['label' => 'Pagina Web De La Gobernacion', 'url' => 'http://www.anzoategui.gob.ve',
                                    'icon' => 'globe',
                                ],
                            /* ['label' => 'Pagina Web De La Gobernacion', 'url' => ['http://www.anzoategui.gob.ve'],
                              'icon' => 'globe',
                              ],
                              /*['label' => 'About', 'url' => ['/site/about']],
                              ['label' => 'Contact', 'url' => ['/site/contact']],
                              Yii::$app->user->isGuest ?
                              ['label' => 'Login', 'url' => ['/site/login']] :
                              ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                              'url' => ['/site/logout'],
                              'linkOptions' => ['data-method' => 'post']], */
                            ],
                        ]);
                    }
                    ?>


                    <?php
                    /*
                      <ul class="sidebar-menu">
                      <li class="header">LABELS</li>
                      <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
                      <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
                      <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
                      </ul>
                     * */
                    ?>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?= Html::encode($this->title) ?>
                    </h1>
                    <?=
                    AitBreadCrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]);
                    ?>
                </section>

                <!-- Main content -->
                <section class="content">
                    <?= $content ?>

                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 1.1
                </div>
                <strong>Copyleft &copy; 2015 <a href="#">Dirección de Automatización, Informática y Telecomunicaciones</a>.</strong>
            </footer>

        </div><!-- ./wrapper -->

        <?php /******** LOGIN MODAL*******/ ?>
        <?php if (Yii::$app->user->isGuest): ?>
            <?=
            $this->render('//usuario/_login', [
                'model' => new app\models\LoginForm(),
            ])
            ?>
        <?php endif; ?>

        <?php $this->endBody() ?>
        <?php $this->registerJsFile(Yii::$app->request->baseUrl.'/js/funciones.js'); ?>
        <?php $this->registerJsFile(Yii::$app->request->baseUrl.'/js/blockUI/jquery.blockUI.js'); ?>
    </body>
</html>
<?php $this->endPage() ?>
