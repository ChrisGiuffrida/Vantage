<?php
require("verify_session.php");
require("user_data.php");
$data = get_data($_SESSION["netid"]);
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
                <h3>User Profile</h3>
              </div>

            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>User Report <small>Activity report</small></h2>
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
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img class="img-responsive avatar-view" src="images/user.png" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
                      <h3><?php echo $data["demographics"][0][1]?> <?php echo $data["demographics"][0][0]?></h3>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-fw fa-graduation-cap user-profile-icon"></i> <?php echo $data["demographics"][0][2]?>
                        </li>

                        <li>
                          <i class="fa fa-fw fa-calendar user-profile-icon"></i> <?php echo $data["demographics"][0][3]?>
                        </li>

                        <li class="m-top-xs">
                          <i class="fa fa-envelope fa-fw  user-profile-icon"></i>
                          <a href="mailto:<?php echo $data["demographics"][0][4]?>@nd.edu" target="_blank"> <?php echo $data["demographics"][0][4]?>@nd.edu</a>
                        </li>
                      </ul>

                      <a class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                      <br />

                      <!-- start skills -->
                      <hr></hr>
                      <ul class="list-unstyled user_data">
                        <li>
                          <h4>Favorite Machine:</h4>
                            <p><?php echo $data["favorite"]; ?></p>
                        </li>
                        <li>
                          <h4>Most Run Process:</h4>
                            <code><?php echo $data["most_run"]; ?></code>
                        </li>
                        <li>
                          <h4>Most Active Day:</h4>
                            <p><?php echo $data["most_active"]; ?></p>
                        </li>
                      </ul>
                      <!-- end of skills -->

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                      <div class="profile_title">
                        <div class="col-md-6">
                          <h2>User Activity Report</h2>
                        </div>
                        <div class="col-md-6">
                        </div>
                      </div>
                      <!-- start of user-activity-graph -->
                      <canvas id="user_processes" style="width:100%; height:140px !important;"></canvas>
                      <!-- end of user-activity-graph -->

                      <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Recent Logins</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Recent Processes</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Top Processes</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                            <!-- start user projects -->
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Date</th>
                                  <th>Time</th>
                                  <th>Machine</th>
                                  <th>Host</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>1</td>
                                  <td><?php echo $data["recent_logins"][0][0]; ?></td>
                                  <td><?php echo $data["recent_logins"][0][1]; ?></td>
                                  <td><?php echo $data["recent_logins"][0][2]; ?></td>
                                  <td><?php echo $data["recent_logins"][0][3]; ?></td>
                                </tr>
                                <tr>
                                  <td>2</td>
                                  <td><?php echo $data["recent_logins"][1][0]; ?></td>
                                  <td><?php echo $data["recent_logins"][1][1]; ?></td>
                                  <td><?php echo $data["recent_logins"][1][2]; ?></td>
                                  <td><?php echo $data["recent_logins"][1][3]; ?></td>
                                </tr>
                                <tr>
                                  <td>3</td>
                                  <td><?php echo $data["recent_logins"][2][0]; ?></td>
                                  <td><?php echo $data["recent_logins"][2][1]; ?></td>
                                  <td><?php echo $data["recent_logins"][2][2]; ?></td>
                                  <td><?php echo $data["recent_logins"][2][3]; ?></td>
                                </tr>
                                <tr>
                                  <td>4</td>
                                  <td><?php echo $data["recent_logins"][3][0]; ?></td>
                                  <td><?php echo $data["recent_logins"][3][1]; ?></td>
                                  <td><?php echo $data["recent_logins"][3][2]; ?></td>
                                  <td><?php echo $data["recent_logins"][3][3]; ?></td>
                                </tr>
                                <tr>
                                  <td>5</td>
                                  <td><?php echo $data["recent_logins"][4][0]; ?></td>
                                  <td><?php echo $data["recent_logins"][4][1]; ?></td>
                                  <td><?php echo $data["recent_logins"][4][2]; ?></td>
                                  <td><?php echo $data["recent_logins"][4][3]; ?></td>
                                </tr>
                              </tbody>
                            </table>
                            <!-- end user projects -->

                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                            <!-- start user projects -->
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Date</th>
                                  <th>Time</th>
                                  <th>Command</th>
                                  <th>Machine</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>1</td>
                                  <td><?php echo $data["recent_processes"][0][0]; ?></td>
                                  <td><?php echo $data["recent_processes"][0][1]; ?></td>
                                  <td><?php echo $data["recent_processes"][0][2]; ?></td>
                                  <td><?php echo $data["recent_processes"][0][3]; ?></td>
                                </tr>
                                <tr>
                                  <td>2</td>
                                  <td><?php echo $data["recent_processes"][1][0]; ?></td>
                                  <td><?php echo $data["recent_processes"][1][1]; ?></td>
                                  <td><?php echo $data["recent_processes"][1][2]; ?></td>
                                  <td><?php echo $data["recent_processes"][1][3]; ?></td>
                                </tr>
                                <tr>
                                  <td>3</td>
                                  <td><?php echo $data["recent_processes"][2][0]; ?></td>
                                  <td><?php echo $data["recent_processes"][2][1]; ?></td>
                                  <td><?php echo $data["recent_processes"][2][2]; ?></td>
                                  <td><?php echo $data["recent_processes"][2][3]; ?></td>
                                </tr>
                                <tr>
                                  <td>4</td>
                                  <td><?php echo $data["recent_processes"][3][0]; ?></td>
                                  <td><?php echo $data["recent_processes"][3][1]; ?></td>
                                  <td><?php echo $data["recent_processes"][3][2]; ?></td>
                                  <td><?php echo $data["recent_processes"][3][3]; ?></td>
                                </tr>
                                <tr>
                                  <td>5</td>
                                  <td><?php echo $data["recent_processes"][4][0]; ?></td>
                                  <td><?php echo $data["recent_processes"][4][1]; ?></td>
                                  <td><?php echo $data["recent_processes"][4][2]; ?></td>
                                  <td><?php echo $data["recent_processes"][4][3]; ?></td>
                                </tr>
                              </tbody>
                            </table>
                            <!-- end user projects -->

                          </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                            <!-- start user projects -->
                            <table class="data table table-striped no-margin">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Command</th>
                                  <th>Count</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>1</td>
                                  <td><?php echo $data["top_processes"][0][0]; ?></td>
                                  <td><?php echo $data["top_processes"][0][1]; ?></td>
                                </tr>
                                <tr>
                                  <td>2</td>
                                  <td><?php echo $data["top_processes"][1][0]; ?></td>
                                  <td><?php echo $data["top_processes"][1][1]; ?></td>
                                </tr>
                                <tr>
                                  <td>3</td>
                                  <td><?php echo $data["top_processes"][2][0]; ?></td>
                                  <td><?php echo $data["top_processes"][2][1]; ?></td>
                                </tr>
                                <tr>
                                  <td>4</td>
                                  <td><?php echo $data["top_processes"][3][0]; ?></td>
                                  <td><?php echo $data["top_processes"][3][1]; ?></td>
                                </tr>
                                <tr>
                                  <td>5</td>
                                  <td><?php echo $data["top_processes"][4][0]; ?></td>
                                  <td><?php echo $data["top_processes"][4][1]; ?></td>
                                </tr>
                              </tbody>
                            </table>
                            <!-- end user projects -->
                          </div>
                        </div>
                      </div>
                    </div>
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
    <!-- morris.js -->
    <script src="../vendors/raphael/raphael.min.js"></script>
    <script src="../vendors/morris.js/morris.min.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <script type="text/javascript" >      
        console.log(<?php echo json_encode($data["user_graph"]); ?>);

        if ($('#user_processes').length ){ 
        var ctx = document.getElementById("user_processes");
        var user_processes = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            datasets: [{
            label: 'Total Processes',
            backgroundColor: "#26B99A",
            data: <?php echo json_encode($data["user_graph"]); ?>
            }]
        },

        options: {
            scales: {
            yAxes: [{
                ticks: {
                beginAtZero: true
                }
            }]
            },
            legend: {
                display: false,
                position: 'right',
        labels: {
          fontColor: 'rgb(255, 99, 132)'
        }
        }
        }
        });
    }
    </script>


  </body>
</html>