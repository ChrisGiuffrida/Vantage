<?php
require("verify_session.php");
require("navis.php");
require("summary.php");
require("machina.php");
$student00 = get_data("student00.cse.nd.edu");
$student01 = get_data("student01.cse.nd.edu");
$student02 = get_data("student02.cse.nd.edu");
$student04 = get_data("student04.cse.nd.edu");

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

print_top();

?>

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
                <div class="x_panel" style="height:700px;">
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
                                    <li  class="summary"><i class="fa fa-users"></i> <?php echo $student00["users"];?> users</li>
                                    <li class="summary"><i class="fa fa-file-code-o"></i> <?php echo $student00["processes"];?> processes</li>
                                    <li class="summary"><i class="fa fa-sign-in"></i> <?php echo $student00["logins"];?> logins</li>
                                    <li class="summary"><i class="fa fa-laptop"></i><?php echo $student00["devices"];?> devices</li>
                                    <li class="summary"><i class="fa fa-tasks"></i> <?php echo $student00["cpu"];?> Avg. CPU%</li>
                                    <li class="summary"><i class="fa fa-clock-o"></i> <?php echo $student00["uptime"];?> days of uptime</li>
                                    <li class="summary"><i class="fa fa-server"></i> <?php echo $student00["num_disks"];?> disks</li>
                                    <li class="summary"><i class="fa fa-server"></i> <?php echo $student00["memory"];;?> Avg. Memory</li>
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
                                <li  class="summary"><i class="fa fa-users"></i> <?php echo $student01["users"]; ?> users</li>
                                <li class="summary"><i class="fa fa-file-code-o"></i> <?php echo $student01["processes"];?> processes</li>
                                <li class="summary"><i class="fa fa-sign-in"></i> <?php echo $student01["logins"];?> logins</li>
                                <li class="summary"><i class="fa fa-laptop"></i><?php echo $student01["devices"];?> devices</li>
                                <li class="summary"><i class="fa fa-tasks"></i> <?php echo $student01["cpu"];?> Avg. CPU%</li>
                                <li class="summary"><i class="fa fa-clock-o"></i> <?php echo $student01["uptime"];?> days of uptime</li>
                                <li class="summary"><i class="fa fa-server"></i> <?php echo $student01["num_disks"];?> disks</li>
                                <li class="summary"><i class="fa fa-server"></i> <?php echo $student01["memory"];?> Avg. Memory</li>
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
                                    <li  class="summary"><i class="fa fa-users"></i> <?php echo $student02["users"];?> users</li>
                                    <li class="summary"><i class="fa fa-file-code-o"></i> <?php echo $student02["processes"];?> processes</li>
                                    <li class="summary"><i class="fa fa-sign-in"></i> <?php echo $student02["logins"];?> logins</li>
                                    <li class="summary"><i class="fa fa-laptop"></i><?php echo $student02["devices"];?> devices</li>
                                    <li class="summary"><i class="fa fa-tasks"></i> <?php echo $student02["cpu"];?> Avg. CPU%</li>
                                    <li class="summary"><i class="fa fa-clock-o"></i> <?php echo $student02["uptime"];?> days of uptime</li>
                                    <li class="summary"><i class="fa fa-server"></i> <?php echo $student02["num_disks"];?> disks</li>
                                    <li class="summary"><i class="fa fa-server"></i> <?php echo $student02["memory"];?> Avg. Memory</li>
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
                                    <li  class="summary"><i class="fa fa-users"></i> <?php echo $student04["users"];?> users</li>
                                    <li class="summary"><i class="fa fa-file-code-o"></i> <?php echo $student04["processes"];?> processes</li>
                                    <li class="summary"><i class="fa fa-sign-in"></i> <?php echo $student04["logins"];?> logins</li>
                                    <li class="summary"><i class="fa fa-laptop"></i><?php echo $student04["devices"];?> devices</li>
                                    <li class="summary"><i class="fa fa-tasks"></i> <?php echo $student04["cpu"];?> Avg. CPU%</li>
                                    <li class="summary"><i class="fa fa-clock-o"></i> <?php echo $student04["uptime"];?> days of uptime</li>
                                    <li class="summary"><i class="fa fa-server"></i> <?php echo $student04["num_disks"];?> disks</li>
                                    <li class="summary"><i class="fa fa-server"></i> <?php echo $student04["memory"];?> Avg. Memory</li>
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
        <?php

print_middle();
print_bottom();
?>