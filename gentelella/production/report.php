<?php
require("verify_session.php");
require("navis.php");
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
                <div class="count">1234</div>
                <h3>Unique Programs</h3>
              </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-file-code-o"></i></div>
                <div class="count">521666</div>
                <h3>Processes</h3>
              </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-sign-in"></i></div>
                <div class="count">23225</div>
                <h3>Logins</h3>
              </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="tile-stats">
                <div class="icon"><i class="fa fa-laptop"></i></div>
                <div class="count">35325</div>
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
                      <h2>Individual Statistics <small>Run in Last Week on student00</small></h2>
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
                          <tr>
                            <th scope="row">10</th>
                            <td>sadams9</td>
                            <td>12-6-17</td>
                            <td>9:02:47</td>
                            <td>student04</td>
                            <td>17</td>
                            <td>258</td>
                            <td>./cnn 28</td>
                            <td>Thursday</td>
                          </tr>
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
