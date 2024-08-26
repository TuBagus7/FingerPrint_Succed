<?php
$default_url = '../../../data/tmp/tmp 22';
$tema = '22-dashgumfree_v2';
$url = $default_url . '/' . $tema;
include '../../../include/all_include.php';
include '../../../include/function/session.php';
?>

<link href="<?php echo $url; ?>/assets/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo $url; ?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href="<?php echo $url; ?>/assets/css/style.css" rel="stylesheet">
<link href="<?php echo $url; ?>/assets/css/style-responsive.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/assets/css/zabuto_calendar.css">
<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/assets/js/gritter/css/jquery.gritter.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/assets/lineicons/style.css">

<!-- Custom styles for this template -->
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/style-responsive.css" rel="stylesheet">

<script src="assets/js/chart-master/Chart.js"></script>

</head>

<body>
    <section id="container">
        <header class="header black-bg">

            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <!--logo start-->
            <a href="index.php" class="logo">
                <b>
                    Adminimtrator
                </b>
            </a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu"></div>
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li class="dropdown">
                        <br>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <i class="fa fa-tasks"></i>
                            Menu
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green"><a href="<?php logout(); ?>">Logout</a></p>
                            </li>

                        </ul>
                    </li>
                </ul>
            </div>
        </header>

        <aside>
            <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu" id="nav-accordion">
                    <table>
                        <tr>
                            <td>&nbsp;&nbsp;&nbsp;<img src="<?php echo $avatar; ?>" class="img-circle" width="100"></td>
                            <td>
                                <h5 class="left">&nbsp;&nbsp;Management <br>
                                    <font color="#FFD777">&nbsp;&nbsp;<?php echo $halaman; ?> </font><br>
                                    <font color="#68DFF0">&nbsp;&nbsp;Menu</font>
                                </h5>
                            </td>
                        </tr>
                    </table>
                    <br>

                    <!-- MENU -->
                    <?php
                    $m = new SimpleXMLElement('../../../include/settings/menu.xml', null, true);
                    foreach ($m as $i) {
                        if ($i->t == 's') {
                    ?>
                            <!-- SINGLE -->
                            <li class="">
                                <a href="<?php echo $i->l; ?>">
                                    <i class="<?php echo $i->i; ?>"></i>
                                    <span><?php echo $i->n; ?></span>
                                </a>
                            </li>
                            <!-- /SINGLE -->
                        <?php
                        } else if ($i->t == 'm') {
                            $idmenu = $i->id;
                        ?>
                            <!-- MULTI -->

                            <li class="sub-menu">
                                <a href="javascript:;">
                                    <i class="<?php echo $i->i; ?>"></i>
                                    <span><?php echo $i->n; ?></span>
                                </a>
                                <ul class="sub">
                                    <?php
                                    $m1 = new SimpleXMLElement('../../../include/settings/menu.xml', null, true);
                                    foreach ($m1 as $i1) {
                                        if ($i1->s == "$idmenu" and $i1->t == "sm") {
                                    ?>
                                            <li>
                                                <a class="item" href="<?php echo $i1->l; ?>">
                                                    <i class="<?php echo $i1->i; ?>"></i>
                                                    <?php echo $i1->n; ?></a>
                                            </li>
                                    <?php }
                                    } ?>
                                </ul>
                            </li>
                            <!-- /MULTI -->
                    <?php }
                    } ?>
                    <!-- /MENU -->

                </ul>
            </div>
        </aside>
        <section id="main-content">
            <section class="wrapper site-min-height">
                <h3>
                    <i class="fa fa-angle-right"></i>
                    <?PHP tabelnomin(); ?>
                </h3>
                <div class="row mt">
                    <div class="col-lg-12">
                        <div class="content-panel">
                            <br>

                            <?php include 'halaman.php'; ?>

                            <br>
                        </div>

                    </div>
                </div>

            </section>
            <! --/wrapper -->
        </section>
        <footer class="site-footer">
            <div class="text-center">
                <?php echo $copyright; ?>
                <a href="#" class="go-top">
                    <i class="fa fa-angle-up"></i>
                </a>
            </div>
        </footer>
    </section>

    <script src="<?php echo $url; ?>/assets/js/jquery.js"></script>
    <script src="<?php echo $url; ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?php echo $url; ?>/assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="<?php echo $url; ?>/assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo $url; ?>/assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo $url; ?>/assets/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo $url; ?>/assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?php echo $url; ?>/assets/js/common-scripts.js"></script>

    <script>
        $(function() {
            $('select.styled').customSelect();
        });
    </script>
</body>

</html>