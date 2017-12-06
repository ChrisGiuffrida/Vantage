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
                <li><a href="report_generator_upload.php"><i class="fa fa-file-pdf-o"></i>Report Generator<span class="fa fa-minus"></span></a>
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
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Report Generator </h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Upload a CSV File</h2>
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
                    <p>Upload a CSV file with netids for users you would like to generate a report for.  Drag and drop or click to upload.</p>
                    <form action="form_upload.html" class="dropzone"></form>
                    <br />
                    <br />
                    <br />
                    <br />
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
    <!-- Dropzone.js -->
    <script src="../vendors/dropzone/dist/min/dropzone.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>