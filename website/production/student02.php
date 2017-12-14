<?php
require("verify_session.php");
require("navis.php");
require("machina.php");
$array = get_data("student02.cse.nd.edu");
print_top();
?>


        <!-- page content -->
        <div class="right_col" role="main">
          <h1 class="title-right">student02</h1>
          <h1 class="title-section">Daily Stats:</h1>
          <!-- top tiles -->
          <div class="row top_tiles">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-users"></i></div>
                <div class="count"><?php echo $array["users"]?></div>
                <h3>Users</h3>
              </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-file-code-o"></i></div>
                <div class="count"><?php echo $array["processes"]?></div>
                <h3>Processes</h3>
              </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-sign-in"></i></div>
                <div class="count"><?php echo $array["logins"]?></div>
                <h3>Logins</h3>
              </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-laptop"></i></div>
                <div class="count"><?php echo $array["devices"]?></div>
                <h3>Devices</h3>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-tasks"></i></div>
                  <div class="count"><?php echo $array["cpu"]?>%</div>
                  <h3>Avg. CPU %</h3>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-clock-o"></i></div>
                  <div class="count"><?php echo $array["uptime"]?></div>
                  <h3>Uptime</h3>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-server"></i></div>
                  <div class="count"><?php echo $array["num_disks"]?></div>
                  <h3># of Disks</h3>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-folder-open-o"></i></div>
                  <div class="count"><?php echo $array["memory"]?></div>
                  <h3>Avg. Memory</h3>
                </div>
              </div>
            </div>

          <!-- OUR GRAPHS! -->
          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Processes <small>Average vs. Past Week</small></h2>
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
                  <canvas id="bar_processes"></canvas>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Average Users <small>All Time vs. Past Week</small></h2>
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
                  <canvas id="bar_logins"></canvas>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Average Daily CPU %<small>Over Past Week</small></h2>
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
                  <canvas id="line_performance"></canvas>
                </div>
              </div>
            </div>          
                
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Total Processes Run by Grade<small>For Today</small></h2>
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
                        <canvas id="doughnut_process"></canvas>
                      </div>
                    </div>
                  </div>
                </div> <!-- ./row -->
                <div class="clearfix"></div>
                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Process Leaderboard <small>Last Week on student02</small></h2>
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
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>NetID</th>
                                <th>Number of Processes Run</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td><?php echo $array["pleader"][0][0]?></td>
                                <td><?php echo $array["pleader"][0][1]?></td>
                              </tr>
                              <tr>
                                <th scope="row">2</th>
                                <td><?php echo $array["pleader"][1][0]?></td>
                                <td><?php echo $array["pleader"][1][1]?></td>
                              </tr>
                              <tr>
                                <th scope="row">3</th>
                                <td><?php echo $array["pleader"][2][0]?></td>
                                <td><?php echo $array["pleader"][2][1]?></td>
                              </tr>
                              <tr>
                                <th scope="row">4</th>
                                <td><?php echo $array["pleader"][3][0]?></td>
                                <td><?php echo $array["pleader"][3][1]?></td>
                              </tr>
                              <tr>
                                <th scope="row">5</th>
                                <td><?php echo $array["pleader"][4][0]?></td>
                                <td><?php echo $array["pleader"][4][1]?></td>
                              </tr>
                              <tr>
                                <th scope="row">6</th>
                                <td><?php echo $array["pleader"][5][0]?></td>
                                <td><?php echo $array["pleader"][5][1]?></td>
                              </tr>
                              <tr>
                                <th scope="row">7</th>
                                <td><?php echo $array["pleader"][6][0]?></td>
                                <td><?php echo $array["pleader"][6][1]?></td>
                              </tr>
                              <tr>
                                <th scope="row">8</th>
                                <td><?php echo $array["pleader"][7][0]?></td>
                                <td><?php echo $array["pleader"][7][1]?></td>
                              </tr>
                              <tr>
                                <th scope="row">9</th>
                                <td><?php echo $array["pleader"][8][0]?></td>
                                <td><?php echo $array["pleader"][8][1]?></td>
                              </tr>
                              <tr>
                                <th scope="row">10</th>
                                <td><?php echo $array["pleader"][9][0]?></td>
                                <td><?php echo $array["pleader"][9][1]?></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div> 

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Login Leaderboard <small>Last Week on student02</small></h2>
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
                              <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>NetID</th>
                                    <th>Number of Logins</th>
                                  </tr>
                                </thead>
                                <tbody>
                                </thead>
                                <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td><?php echo $array["logleader"][0][0]?></td>
                                <td><?php echo $array["logleader"][0][1]?></td>
                              </tr>
                              <tr>
                                <th scope="row">2</th>
                                <td><?php echo $array["logleader"][1][0]?></td>
                                <td><?php echo $array["logleader"][1][1]?></td>
                              </tr>
                              <tr>
                                <th scope="row">3</th>
                                <td><?php echo $array["logleader"][2][0]?></td>
                                <td><?php echo $array["logleader"][2][1]?></td>
                              </tr>
                              <tr>
                                <th scope="row">4</th>
                                <td><?php echo $array["logleader"][3][0]?></td>
                                <td><?php echo $array["logleader"][3][1]?></td>
                              </tr>
                              <tr>
                                <th scope="row">5</th>
                                <td><?php echo $array["logleader"][4][0]?></td>
                                <td><?php echo $array["logleader"][4][1]?></td>
                              </tr>
                              <tr>
                                <th scope="row">6</th>
                                <td><?php echo $array["logleader"][5][0]?></td>
                                <td><?php echo $array["logleader"][5][1]?></td>
                              </tr>
                              <tr>
                                <th scope="row">7</th>
                                <td><?php echo $array["logleader"][6][0]?></td>
                                <td><?php echo $array["logleader"][6][1]?></td>
                              </tr>
                              <tr>
                                <th scope="row">8</th>
                                <td><?php echo $array["logleader"][7][0]?></td>
                                <td><?php echo $array["logleader"][7][1]?></td>
                              </tr>
                              <tr>
                                <th scope="row">9</th>
                                <td><?php echo $array["logleader"][8][0]?></td>
                                <td><?php echo $array["logleader"][8][1]?></td>
                              </tr>
                              <tr>
                                <th scope="row">10</th>
                                <td><?php echo $array["logleader"][9][0]?></td>
                                <td><?php echo $array["logleader"][9][1]?></td>
                              </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>             

                </div>

                <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Most Popular Processes <small>Last Week on student02</small></h2>
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
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Process Name</th>
                                <th>Number of Times Run</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td><?php echo $array["procleader"][0][0]?></td>
                                <td><?php echo $array["procleader"][0][1]?></td>
                              </tr>
                              <tr>
                                <th scope="row">2</th>
                                <td><?php echo $array["procleader"][1][0]?></td>
                                <td><?php echo $array["procleader"][1][1]?></td>
                              </tr>
                              <tr>
                                <th scope="row">3</th>
                                <td><?php echo $array["procleader"][2][0]?></td>
                                <td><?php echo $array["procleader"][2][1]?></td>
                              </tr>
                              <tr>
                                <th scope="row">4</th>
                                <td><?php echo $array["procleader"][3][0]?></td>
                                <td><?php echo $array["procleader"][3][1]?></td>
                              </tr>
                              <tr>
                                <th scope="row">5</th>
                                <td><?php echo $array["procleader"][4][0]?></td>
                                <td><?php echo $array["procleader"][4][1]?></td>
                              </tr>
                              <tr>
                                <th scope="row">6</th>
                                <td><?php echo $array["procleader"][5][0]?></td>
                                <td><?php echo $array["procleader"][5][1]?></td>
                              </tr>
                              <tr>
                                <th scope="row">7</th>
                                <td><?php echo $array["procleader"][6][0]?></td>
                                <td><?php echo $array["procleader"][6][1]?></td>
                              </tr>
                              <tr>
                                <th scope="row">8</th>
                                <td><?php echo $array["procleader"][7][0]?></td>
                                <td><?php echo $array["procleader"][7][1]?></td>
                              </tr>
                              <tr>
                                <th scope="row">9</th>
                                <td><?php echo $array["procleader"][8][0]?></td>
                                <td><?php echo $array["procleader"][8][1]?></td>
                              </tr>
                              <tr>
                                <th scope="row">10</th>
                                <td><?php echo $array["procleader"][9][0]?></td>
                                <td><?php echo $array["procleader"][9][1]?></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div> 
                    
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="x_panel">
                          <div class="x_title">
                            <h2>Leaderboard <small>Last Week on student02</small></h2>
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
                              <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Peak CPU %</th>
                                  </tr>
                                </thead>
                                <tbody>
                              <tr>
                                <th scope="row">1</th>
                                <td><?php echo $array["cpuleader"][0][0]?></td>
                                <td><?php echo $array["cpuleader"][0][1]?></td>
                              </tr>
                              <tr>
                                <th scope="row">2</th>
                                <td><?php echo $array["cpuleader"][1][0]?></td>
                                <td><?php echo $array["cpuleader"][1][1]?></td>
                              </tr>
                              <tr>
                                <th scope="row">3</th>
                                <td><?php echo $array["cpuleader"][2][0]?></td>
                                <td><?php echo $array["cpuleader"][2][1]?></td>
                              </tr>
                              <tr>
                                <th scope="row">4</th>
                                <td><?php echo $array["cpuleader"][3][0]?></td>
                                <td><?php echo $array["cpuleader"][3][1]?></td>
                              </tr>
                              <tr>
                                <th scope="row">5</th>
                                <td><?php echo $array["cpuleader"][4][0]?></td>
                                <td><?php echo $array["cpuleader"][4][1]?></td>
                              </tr>
                              <tr>
                                <th scope="row">6</th>
                                <td><?php echo $array["cpuleader"][5][0]?></td>
                                <td><?php echo $array["cpuleader"][5][1]?></td>
                              </tr>
                              <tr>
                                <th scope="row">7</th>
                                <td><?php echo $array["cpuleader"][6][0]?></td>
                                <td><?php echo $array["cpuleader"][6][1]?></td>
                              </tr>
                              <tr>
                                <th scope="row">8</th>
                                <td><?php echo $array["cpuleader"][7][0]?></td>
                                <td><?php echo $array["cpuleader"][7][1]?></td>
                              </tr>
                              <tr>
                                <th scope="row">9</th>
                                <td><?php echo $array["cpuleader"][8][0]?></td>
                                <td><?php echo $array["cpuleader"][8][1]?></td>
                              </tr>
                              <tr>
                                <th scope="row">10</th>
                                <td><?php echo $array["cpuleader"][9][0]?></td>
                                <td><?php echo $array["cpuleader"][9][1]?></td>
                              </tr>
                                </tbody>
                              </table>
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

    <script type="text/javascript">
          Chart.defaults.global.defaultFontFamily = '"Libre Franklin", -apple-system, "Helvetica Neue", Roboto, Arial, "Droid Sans", sans-serif';

    if ($('#bar_processes').length ){ 
        var ctx = document.getElementById("bar_processes");

        var bar_processes = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            datasets: [{
            label: 'On Average',
            backgroundColor: "#26B99A",
            data: <?php echo json_encode($array["avgprocgraph"]); ?>
            }, {
            label: 'This Week',
            backgroundColor: "#03586A",
            data: <?php echo json_encode($array["weekprocgraph"]); ?>
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

    if ($('#doughnut_process').length ){ 
        var ctx = document.getElementById("doughnut_process");
        var data = {
          labels: [
            "Sophomore",
            "Junior",
            "Senior"
          ],
          datasets: [{
            data: <?php echo json_encode($array["processes_donut"]); ?>,
            backgroundColor: [
              "#9B59B6",
              "#26B99A",
              "#3498DB"
            ],
            hoverBackgroundColor: [
              "#B370CF",
              "#36CAAB",
              "#49A9EA"
            ]

          }]
        };

        var canvasDoughnut = new Chart(ctx, {
          type: 'doughnut',
          tooltipFillColor: "rgba(51, 51, 51, 0.55)",
          data: data
        });
       
      } 
    
    if ($('#bar_logins').length ){ 
        var ctx = document.getElementById("bar_logins");
        var bar_logins = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
            datasets: [{
            label: 'On Average',
            backgroundColor: "#26B99A",
            data: <?php echo json_encode($array["avglogingraph"]); ?>
            }, {
            label: 'This Week',
            backgroundColor: "#03586A",
            data: <?php echo json_encode($array["weeklogingraph"]); ?>
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

    if ($('#line_performance').length ){  
        
          var ctx = document.getElementById("line_performance");
          var line_performance = new Chart(ctx, {
            type: 'line',
            data: {
              labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
              datasets: [{
                label: "Average CPU Over Time",
                backgroundColor: "rgba(38, 185, 154, 0.31)",
                borderColor: "rgba(38, 185, 154, 0.7)",
                pointBorderColor: "rgba(38, 185, 154, 0.7)",
                pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
                pointHoverBackgroundColor: "#fff",
                pointHoverBorderColor: "rgba(220,220,220,1)",
                pointBorderWidth: 1,
                data: <?php echo json_encode($array["alltimecpugraph"]); ?>
              }, {
                label: "Average CPU Past Week",
                backgroundColor: "rgba(3, 88, 106, 0.3)",
                borderColor: "rgba(3, 88, 106, 0.70)",
                pointBorderColor: "rgba(3, 88, 106, 0.70)",
                pointBackgroundColor: "rgba(3, 88, 106, 0.70)",
                pointHoverBackgroundColor: "#fff",
                pointHoverBorderColor: "rgba(151,187,205,1)",
                pointBorderWidth: 1,
                data: <?php echo json_encode($array["weekcpugraph"]); ?>
              }]
            },
          });
        
        }
    </script>
	
  <?php
  print_bottom();
  ?>
