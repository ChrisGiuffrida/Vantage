<?php
    require("verify_session.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Vantage // Settings</title>

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
                      <li><a href="#">student00</a></li>
                      <li><a href="#">student01</a></li>
                      <li><a href="#">student02</a></li>
                      <li><a href="#">student03</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-user"></i>Users<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Your Data</a></li>
                      <li><a href="#">Search</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-flash"></i>Live Data<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Users</a></li>
                      <li><a href="#">Machines</a></li>
                      <li><a href="#">Search</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-hourglass"></i>Historical Data<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Users</a></li>
                      <li><a href="#">Machines</a></li>
                      <li><a href="#">Search</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-exchange"></i>Compare<span class="fa fa-minus"></span></a>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Information</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-user"></i>Account<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="login.html">Log In</a></li>
                      <li><a href="login.html#signup">Sign Up</a></li>
                    </ul>
                  <li><a><i class="fa fa-paper-plane"></i>Contact Us<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Brandon Fite</a></li>
                      <li><a href="#">Chris Giuffrida</a></li>
                      <li><a href="#">Thomas Krill</a></li>
                      <li><a href="#">Anthony Luc</a></li>
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
                        <i class="fa fa-cog fa-fw"></i><span>  Settings</span>
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
          <div class="">
              <div class="page-title">
                <div class="title_left">
                  <h3>Account Settings</h3>
                </div>
                <div class="title_right">
                </div>
              </div>
              </div>
              <div class="clearfix"></div>
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Update Account</h2>
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
                      <br />
                      <form id="update" data-parsley-validate method="POST" action="update-account.php" class="form-horizontal form-label-left">
  
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name 
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="first" value="<?php echo $_SESSION["first"]?>" type="text" id="first" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name 
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="last" value="<?php echo $_SESSION["last"]; ?>" type="text" id="last" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="email" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="email" value="<?php echo $_SESSION["email"]; ?>" id="email" class="form-control col-md-7 col-xs-12" type="email" required="required">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone">Phone 
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input name="phone" value="<?php echo $_SESSION["phone"]; ?>" type="text" id="phone" required="required" class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                          <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" class="btn btn-success">Update</button>
                          </div>
                        </div>
  
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Delete Account</h2>
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
                        <br />
                        <form id="delete" method="POST" action="delete-account.php" data-parsley-validate class="form-horizontal form-label-left">
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <button type="submit" class="btn btn-danger">Delete Account</button>
                            </div>
                          </div>
    
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
          </div>
        </div>
        


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
