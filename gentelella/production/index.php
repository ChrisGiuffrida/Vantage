<?php
require("verify_session.php");
require("summary.php");

function print_ticker($change) {
  if ($change > 0) {
    echo '<i class="green"><i class="fa fa-sort-asc"></i>';
  }
  elseif ($change < 0) {
    echo '<i class="red"><i class="fa fa-sort-desc"></i>';
  }
  else {
    echo '<i class="blue"><i class="fa fa-sort"></i>';
  }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Vantage</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.css" rel="stylesheet">

    <!-- Google Fonts -->
	  <link href="https://fonts.googleapis.com/css?family=Libre+Franklin:400,400i,700,700i" rel="stylesheet">	
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-rebel"></i> <span>Vantage</span></a>
            </div>

            <div class="clearfix"></div>

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a href="index.php"><i class="fa fa-home"></i>Summary<span class="fa fa-minus"></span></a>
                </li>
                <li><a><i class="fa fa-server"></i>Machines<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="student00.php">student00</a></li>
                    <li><a href="student01.php">student01</a></li>
                    <li><a href="student02.php">student02</a></li>
                    <li><a href="student04.php">student04</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-user"></i>Users<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="user.php">Your Data</a></li>
                    <li><a href="search.php">Search</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-file-pdf-o"></i>Report Generator<span class="fa fa-minus"></span></a>
              </ul>
            </div>
            <div class="menu_section">
              <h3>Information</h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-paper-plane"></i>Contact Us<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="mailto:bfite@nd.edu">Brandon Fite</a></li>
                    <li><a href="mailto:cgiuffri@nd.edu">Chris Giuffrida</a></li>
                    <li><a href="mailto:tkrill@nd.edu">Thomas Krill</a></li>
                    <li><a href="mailto:aluc@nd.edu">Anthony Luc</a></li>
                  </ul>
                </li>
              </li>
              </ul>
            </div>

          </div>
        </div>
      </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/user.png" alt="">
                    <?php echo $_SESSION["first"] . " " . $_SESSION["last"]; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <!-- <li><a href="javascript:;"><i class="fa fa-user fa-fw"></i>  Profile</a></li> -->
                    <li>
                      <a href="settings.php">
                        <!-- <span class="badge bg-red pull-right">50%</span> -->
                        <i class="fa fa-cog fa-fw"></i><span>  Account Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;"><i class="fa fa-question fa-fw"></i>  Help</a></li>
                    <li><a href="log-out.php"><i class="fa fa-sign-out fa-fw"></i>  Log Out</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-users"></i> Total Users</span>
              <div class="count"><?php echo $total_users; ?></div>
              <span class="count_bottom">                
                <?php print_ticker($total_users_change); echo $total_users_change; ?>% </i> from yesterday
              </span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-file-code-o"></i> Total Processes</span> 
              <div class="count"><?php echo $total_processes; ?></div>
              <span class="count_bottom">
                <?php print_ticker($total_processes_change); echo $total_processes_change; ?>% </i> from yesterday
              </span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-sign-in"></i> Total Logins</span>
              <div class="count green"><?php echo $total_logins; ?></div>
              <span class="count_bottom">
                <?php print_ticker($total_logins_change); echo $total_logins_change; ?>% </i> from yesterday
              </span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-laptop"></i> Total Devices</span>
              <div class="count"><?php echo $total_devices; ?></div>
              <span class="count_bottom">
                <?php print_ticker($total_devices_change); echo $total_devices_change; ?>% </i> from yesterday
              </span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-file-code-o"></i> Your Processes</span>
              <div class="count"><?php echo $your_processes; ?></div>
              <span class="count_bottom">
                <?php print_ticker($your_processes_change); echo $your_processes_change; ?>% </i> from yesterday
              </span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-sign-in"></i> Your Logins</span>
              <div class="count"><?php echo $your_logins; ?></div>
              <span class="count_bottom">
                <?php print_ticker($your_logins_change); echo $your_logins_change; ?>% </i> from yesterday
              </span>
            </div>
          </div>

        <!-- page content -->
        <div class="right" role="main">
          <div class="">
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="height:600px;">
                  <div class="x_title">
                    <h1>Summary</h1>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div class="row">

                      <div class="col-md-12">

                        <!-- price element -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="pricing">
                            <div class="title">
                              <h2></h2>
                              <h1>student00</h1>
                            </div>
                            <div class="x_content">
                              <div class="">
                                <div class="pricing_features">
                                  <ul class="list-unstyled text-left">
                                    <li><i class="fa fa-times text-danger"></i> 2 years access <strong> to all storage locations</strong></li>
                                    <li><i class="fa fa-times text-danger"></i> <strong>Unlimited</strong> storage</li>
                                    <li><i class="fa fa-check text-success"></i> Limited <strong> download quota</strong></li>
                                    <li><i class="fa fa-check text-success"></i> <strong>Cash on Delivery</strong></li>
                                    <li><i class="fa fa-check text-success"></i> All time <strong> updates</strong></li>
                                    <li><i class="fa fa-times text-danger"></i> <strong>Unlimited</strong> access to all files</li>
                                    <li><i class="fa fa-times text-danger"></i> <strong>Allowed</strong> to be exclusing per sale</li>
                                  </ul>
                                </div>
                              </div>
                              <div class="pricing_footer">
                                <a href="student00.php" class="btn btn-success btn-block" role="button">More Info <span></span></a>
                                <p>
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- price element -->

                        <!-- price element -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="pricing">
                          <div class="title">
                            <h2></h2>
                            <h1>student01</h1>
                          </div>
                          <div class="x_content">
                            <div class="">
                              <div class="pricing_features">
                                <ul class="list-unstyled text-left">
                                  <li><i class="fa fa-times text-danger"></i> 2 years access <strong> to all storage locations</strong></li>
                                  <li><i class="fa fa-times text-danger"></i> <strong>Unlimited</strong> storage</li>
                                  <li><i class="fa fa-check text-success"></i> Limited <strong> download quota</strong></li>
                                  <li><i class="fa fa-check text-success"></i> <strong>Cash on Delivery</strong></li>
                                  <li><i class="fa fa-check text-success"></i> All time <strong> updates</strong></li>
                                  <li><i class="fa fa-times text-danger"></i> <strong>Unlimited</strong> access to all files</li>
                                  <li><i class="fa fa-times text-danger"></i> <strong>Allowed</strong> to be exclusing per sale</li>
                                </ul>
                              </div>
                            </div>
                            <div class="pricing_footer">
                              <a href="student01.php" class="btn btn-success btn-block" role="button">More Info <span></span></a>
                              <p>
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- price element -->

                      <!-- price element -->
                      <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="pricing">
                            <div class="title">
                              <h2></h2>
                              <h1>student02</h1>
                            </div>
                            <div class="x_content">
                              <div class="">
                                <div class="pricing_features">
                                  <ul class="list-unstyled text-left">
                                    <li><i class="fa fa-times text-danger"></i> 2 years access <strong> to all storage locations</strong></li>
                                    <li><i class="fa fa-times text-danger"></i> <strong>Unlimited</strong> storage</li>
                                    <li><i class="fa fa-check text-success"></i> Limited <strong> download quota</strong></li>
                                    <li><i class="fa fa-check text-success"></i> <strong>Cash on Delivery</strong></li>
                                    <li><i class="fa fa-check text-success"></i> All time <strong> updates</strong></li>
                                    <li><i class="fa fa-times text-danger"></i> <strong>Unlimited</strong> access to all files</li>
                                    <li><i class="fa fa-times text-danger"></i> <strong>Allowed</strong> to be exclusing per sale</li>
                                  </ul>
                                </div>
                              </div>
                              <div class="pricing_footer">
                                <a href="student02.php" class="btn btn-success btn-block" role="button">More Info <span></span></a>
                                <p>
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- price element -->

                        <!-- price element -->
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="pricing">
                            <div class="title">
                              <h2></h2>
                              <h1>student04</h1>
                            </div>
                            <div class="x_content">
                              <div class="">
                                <div class="pricing_features">
                                  <ul class="list-unstyled text-left">
                                    <li><i class="fa fa-times text-danger"></i> 2 years access <strong> to all storage locations</strong></li>
                                    <li><i class="fa fa-times text-danger"></i> <strong>Unlimited</strong> storage</li>
                                    <li><i class="fa fa-check text-success"></i> Limited <strong> download quota</strong></li>
                                    <li><i class="fa fa-check text-success"></i> <strong>Cash on Delivery</strong></li>
                                    <li><i class="fa fa-check text-success"></i> All time <strong> updates</strong></li>
                                    <li><i class="fa fa-times text-danger"></i> <strong>Unlimited</strong> access to all files</li>
                                    <li><i class="fa fa-times text-danger"></i> <strong>Allowed</strong> to be exclusing per sale</li>
                                  </ul>
                                </div>
                              </div>
                              <div class="pricing_footer">
                                <a href="student04.php" class="btn btn-success btn-block" role="button">More Info <span></span></a>
                                <p>
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- price element -->

                        

                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.js"></script>
	
  </body>
</html>
