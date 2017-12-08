<?php
require("verify_session.php");
require("csv-lib.php");
require("navis.php");
$netids = parse_csv();
$data = get_stats($netids);

print_top();
?>

		<!-- page content -->
		<div class="right_col" role="main">
          <h1 class="title-section">Aggregate Statistics:</h1>
          <!-- top tiles -->
          <div class="row top_tiles">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-users"></i></div>
                <div class="count"><?php echo $data["programs"];?></div>
                <h3>Unique Programs</h3>
              </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-file-code-o"></i></div>
                <div class="count"><?php echo $data["processes"];?></div>
                <h3>Processes</h3>
              </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-sign-in"></i></div>
                <div class="count"><?php echo $data["logins"];?></div>
                <h3>Logins</h3>
              </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-laptop"></i></div>
                <div class="count"><?php echo $data["devices"];?></div>
                <h3>Devices</h3>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Custom Generated Report</h3>
              </div>

              <div class="title_right">
              </div>

              <div class="clearfix"></div>
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Individual Statistics</h2>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>NetID</th>
                            <th>Last Login Time</th>
                            <th>Last Login Date</th>
                            <th>Last Machine Used</th>
                            <th># Logins Today</th>
                            <th># Processes Run Today</th>
                            <th>Most Popular Program Today</th>
                            <th>Most Active Day</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                              $counter = 1;
                              foreach($netids as $netid) {
                                echo '<tr>';
                                echo '<th scope="row">' . $counter . '</th>';
                                echo '<td>' . $netid . '</td>';
                                echo '<td>' . $data[$netid]["recent_login_time"] . '</td>';
                                echo '<td>' . $data[$netid]["recent_login_date"] . '</td>';
                                echo '<td>' . $data[$netid]["recent_login_machine"] . '</td>';
                                echo '<td>' . $data[$netid]["logins"] . '</td>';
                                echo '<td>' . $data[$netid]["processes"] . '</td>';
                                echo '<td>' . $data[$netid]["most_run"] . '</td>';
                                echo '<td>' . $data[$netid]["most_active"] . '</td>';
                                echo '</tr>';
                                $counter += 1;
                              }
                            ?>
                        </tbody>
                      </table>
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
