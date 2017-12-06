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
                            <th>Number of Logins Today</th>
                            <th>Number of Processes Run Today</th>
                            <th>Student Machine</th>
                            <th>Last Login Time</th>
                            <th>Most Popular Program Today</th>
                            <th>Most Active Day</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>tkrill</td>
                            <td>12</td>
                            <td>321</td>
                            <td>student00</td>
                            <td>11-7-17</td>
                            <td>ps aux</td>
                            <td>Sunday</td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>cgiuffri</td>
                            <td>15</td>
                            <td>456</td>
                            <td>student01</td>
                            <td>12-5-17</td>
                            <td>./db</td>
                            <td>Monday</td>
                          </tr>
                          <tr>
                            <th scope="row">3</th>
                            <td>bfite</td>
                            <td>23</td>
                            <td>173</td>
                            <td>student04</td>
                            <td>12-4-17</td>
                            <td>./pg fifo 9</td>
                            <td>Monday</td>
                          </tr>
                          <tr>
                            <th scope="row">4</th>
                            <td>aluc</td>
                            <td>7</td>
                            <td>99</td>
                            <td>student01</td>
                            <td>12-3-17</td>
                            <td>./who</td>
                            <td>Wednesday</td>
                          </tr>
                          <tr>
                            <th scope="row">5</th>
                            <td>pfalvey</td>
                            <td>6</td>
                            <td>501</td>
                            <td>student00</td>
                            <td>12-6-17</td>
                            <td>./program.py</td>
                            <td>Tuesday</td>
                          </tr>
                          <tr>
                            <th scope="row">6</th>
                            <td>rshultz</td>
                            <td>8</td>
                            <td>401</td>
                            <td>student02</td>
                            <td>12-9-17</td>
                            <td>ps aux</td>
                            <td>Sunday</td>
                          </tr>
                          <tr>
                            <th scope="row">7</th>
                            <td>showley1</td>
                            <td>3</td>
                            <td>50</td>
                            <td>student02</td>
                            <td>12-5-17</td>
                            <td>who</td>
                            <td>Sunday</td>
                          </tr>
                          <tr>
                            <th scope="row">8</th>
                            <td>asmith</td>
                            <td>6</td>
                            <td>34</td>
                            <td>student04</td>
                            <td>12-3-17</td>
                            <td>./fractals</td>
                            <td>Sunday</td>
                          </tr>
                          <tr>
                            <th scope="row">9</th>
                            <td>nribera</td>
                            <td>5</td>
                            <td>101</td>
                            <td>student01</td>
                            <td>12-5-17</td>
                            <td>sleep 1</td>
                            <td>Sunday</td>
                          </tr>
                          <tr>
                            <th scope="row">10</th>
                            <td>sadams9</td>
                            <td>17</td>
                            <td>258</td>
                            <td>student04</td>
                            <td>12-6-17</td>
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
