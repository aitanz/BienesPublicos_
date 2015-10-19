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
                <a href="index2.html" class="logo"></a>

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
                                        <span class="label label-success">4</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="header">Tiene 4 mensajes</li>
                                        <li>
                                            <!-- inner menu: contains the actual data -->
                                            <ul class="menu">
                                                <li><!-- start message -->
                                                    <a href="#">
                                                        <div class="pull-left">
                                                            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                                        </div>
                                                        <h4>
                                                            Support Team
                                                            <small><i class="fa fa-clock"></i> 5 mins</small>
                                                        </h4>
                                                        <p>Why not buy a new awesome theme?</p>
                                                    </a>
                                                </li><!-- end message -->
                                                <li>
                                                    <a href="#">
                                                        <div class="pull-left">
                                                            <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                                        </div>
                                                        <h4>
                                                            AdminLTE Design Team
                                                            <small><i class="fa fa-clock"></i> 2 hours</small>
                                                        </h4>
                                                        <p>Why not buy a new awesome theme?</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="pull-left">
                                                            <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                                        </div>
                                                        <h4>
                                                            Developers
                                                            <small><i class="fa fa-clock"></i> Today</small>
                                                        </h4>
                                                        <p>Why not buy a new awesome theme?</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="pull-left">
                                                            <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                                                        </div>
                                                        <h4>
                                                            Sales Department
                                                            <small><i class="fa fa-clock"></i> Yesterday</small>
                                                        </h4>
                                                        <p>Why not buy a new awesome theme?</p>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <div class="pull-left">
                                                            <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                                                        </div>
                                                        <h4>
                                                            Reviewers
                                                            <small><i class="fa fa-clock"></i> 2 days</small>
                                                        </h4>
                                                        <p>Why not buy a new awesome theme?</p>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="footer"><a href="#">Ver todos los mensajes</a></li>
                                    </ul>
                                </li>

                                <!-- Notifications: style can be found in dropdown.less -->
                                <li class="dropdown notifications-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-bell"></i>
                                        <span class="label label-warning">10</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="header">Tiene 10 notificaciones</li>
                                        <li>
                                            <!-- inner menu: contains the actual data -->
                                            <ul class="menu">
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-users text-red"></i> 5 new members joined
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-user text-red"></i> You changed your username
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="footer"><a href="#">Ver Todo</a></li>
                                    </ul>
                                </li>

                                <!-- Tasks: style can be found in dropdown.less -->
                                <li class="dropdown tasks-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-flag"></i>
                                        <span class="label label-danger">9</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="header">Tiene 1 tarea</li>
                                        <li>
                                            <!-- inner menu: contains the actual data -->
                                            <ul class="menu">
                                                <li><!-- Task item -->
                                                    <a href="#">
                                                        <h3>
                                                            Alguna tarea pendiente
                                                            <small class="pull-right">20%</small>
                                                        </h3>
                                                        <div class="progress xs">
                                                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                                <span class="sr-only">20% Complete</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li><!-- end task item -->
                                            </ul>
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
                                                <a href="<?= yii\helpers\Url::toRoute("site/logout") ?>" class="btn btn-default btn-flat">Salir</a>
                                            </div>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </li>

                            <?php if (!Yii::$app->user->isGuest): ?>
                                <li>
                                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                                </li>
                            <?php endif; ?>

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

            <?php if (!Yii::$app->user->isGuest): ?>
                <!-- Control Sidebar -->
                <aside class="control-sidebar control-sidebar-dark">
                    <!-- Create the tabs -->
                    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i style="color:#FFF" class="fa fa-home"></i></a></li>
                        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i style="color:#FFF" class="fa fa-gears"></i></a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- Home tab content -->
                        <div class="tab-pane" id="control-sidebar-home-tab">
                            <h3 class="control-sidebar-heading">Actividad Reciente</h3>
                            <ul class="control-sidebar-menu">
                                <li>
                                    <a href="javascript::;">
                                        <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                                        <div class="menu-info">
                                            <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                                            <p>Will be 23 on April 24th</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href = "javascript::;">
                                        <i class = "menu-icon fa fa-user bg-yellow"></i>
                                        <div class = "menu-info">
                                            <h4 class = "control-sidebar-subheading">Frodo Updated His Profile</h4>
                                            <p>New phone +1(800)555-1234</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href = "javascript::;">
                                        <i class = "menu-icon fa fa-envelope-o bg-light-blue"></i>
                                        <div class = "menu-info">
                                            <h4 class = "control-sidebar-subheading">Nora Joined Mailing List</h4>
                                            <p>nora@example.com</p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href = "javascript::;">
                                        <i class = "menu-icon fa fa-file-code-o bg-green"></i>
                                        <div class = "menu-info">
                                            <h4 class = "control-sidebar-subheading">Cron Job 254 Executed</h4>
                                            <p>Execution time 5 seconds</p>
                                        </div>
                                    </a>
                                </li>
                            </ul><!--/.control-sidebar-menu-->

                            <h3 class = "control-sidebar-heading">Tasks Progress</h3>
                            <ul class = "control-sidebar-menu">
                                <li>
                                    <a href = "javascript::;">
                                        <h4 class = "control-sidebar-subheading">
                                            Custom Template Design
                                            <span class = "label label-danger pull-right">70%</span>
                                        </h4>
                                        <div class = "progress progress-xxs">
                                            <div class = "progress-bar progress-bar-danger" style = "width: 70%"></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href = "javascript::;">
                                        <h4 class = "control-sidebar-subheading">
                                            Update Resume
                                            <span class = "label label-success pull-right">95%</span>
                                        </h4>
                                        <div class = "progress progress-xxs">
                                            <div class = "progress-bar progress-bar-success" style = "width: 95%"></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href = "javascript::;">
                                        <h4 class = "control-sidebar-subheading">
                                            Laravel Integration
                                            <span class = "label label-warning pull-right">50%</span>
                                        </h4>
                                        <div class = "progress progress-xxs">
                                            <div class = "progress-bar progress-bar-warning" style = "width: 50%"></div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href = "javascript::;">
                                        <h4 class = "control-sidebar-subheading">
                                            Back End Framework
                                            <span class = "label label-primary pull-right">68%</span>
                                        </h4>
                                        <div class = "progress progress-xxs">
                                            <div class = "progress-bar progress-bar-primary" style = "width: 68%"></div>
                                        </div>
                                    </a>
                                </li>
                            </ul><!--/.control-sidebar-menu-->

                        </div><!--/.tab-pane-->

                        <!--Settings tab content-->
                        <div class = "tab-pane" id = "control-sidebar-settings-tab">
                            <form method = "post">
                                <h3 class = "control-sidebar-heading">Configuracion General</h3>
                                <div class = "form-group">
                                    <label class = "control-sidebar-subheading">
                                        Report panel usage
                                        <input type = "checkbox" class = "pull-right" checked>
                                    </label>
                                    <p>
                                        Some information about this general settings option
                                    </p>
                                </div><!--/.form-group-->

                                <div class = "form-group">
                                    <label class = "control-sidebar-subheading">
                                        Allow mail redirect
                                        <input type = "checkbox" class = "pull-right" checked>
                                    </label>
                                    <p>
                                        Other sets of options are available
                                    </p>
                                </div><!--/.form-group-->

                                <div class = "form-group">
                                    <label class = "control-sidebar-subheading">
                                        Expose author name in posts
                                        <input type = "checkbox" class = "pull-right" checked>
                                    </label>
                                    <p>
                                        Allow the user to show his name in blog posts
                                    </p>
                                </div><!--/.form-group-->

                                <h3 class = "control-sidebar-heading">Chat Settings</h3>

                                <div class = "form-group">
                                    <label class = "control-sidebar-subheading">
                                        Show me as online
                                        <input type = "checkbox" class = "pull-right" checked>
                                    </label>
                                </div><!--/.form-group-->

                                <div class = "form-group">
                                    <label class = "control-sidebar-subheading">
                                        Turn off notifications
                                        <input type = "checkbox" class = "pull-right">
                                    </label>
                                </div><!--/.form-group-->

                                <div class = "form-group">
                                    <label class = "control-sidebar-subheading">
                                        Delete chat history
                                        <a href = "javascript::;" class = "text-red pull-right"><i class = "fa fa-trash-o"></i></a>
                                    </label>
                                </div><!--/.form-group-->
                            </form>
                        </div><!--/.tab-pane-->
                    </div>
                </aside><!--/.control-sidebar-->

                <!--Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
                <div class="control-sidebar-bg"></div>
            <?php endif; ?>
        </div><!-- ./wrapper -->

        <?php /*         * ******* LOGIN MODAL********* */ ?>
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
