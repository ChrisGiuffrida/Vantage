<?php
require("verify_session.php");
require("navis.php");
require("user_data.php");
$data = get_data($_GET["netid"]);
print_top();

function potentially_print_edit_button() {

  if ($_GET["netid"] == $_SESSION["netid"]) {
    echo '<a class="btn btn-success" href="settings.php"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a></br>';
  }
}
?>


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
                      <?php
                      potentially_print_edit_button();
                      ?>

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
                          <h2>Number of Processes per Day <small>(Last Week)</small></h2>
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
                                <?php
                                  for ($i = 0; $i < count($data["recent_logins"]); $i++) {
                                    echo '<tr>';
                                    $i_1 = $i + 1;
                                    echo '  <td>' . $i_1 . '</td>';
                                    echo '  <td>' . $data["recent_logins"][$i][0] . '</td>';
                                    echo '  <td>' . $data["recent_logins"][$i][1] . '</td>';
                                    echo '  <td>' . $data["recent_logins"][$i][2] . '</td>';
                                    echo '  <td>' . $data["recent_logins"][$i][3] . '</td>';
                                    echo '</tr>';
                                  }
                                ?>
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

       <?php
       print_middle();
       ?>
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


<?php
print_bottom();
?>
