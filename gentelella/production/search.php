<?php
require("verify_session.php");
require("navis.php");
print_top();
?>
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <!-- <div class="page-title"> -->
                  <!-- <div class="line"></div> -->
                  <div class="title"></div>
                      <h1 class="text-center text-info">
                          <span class="fa-stack fa-2x">
                              <i class="fa fa-fw fa-sun-o fa-stack-2x"></i>
                              <i class="fa fa-fw fa-rebel fa-stack-1x"></i>
                            </span>
                      </h1> 
                      <h1 class="text-center">Vantage Search</h1>
                  </div>
                <!-- </div> -->
                <div class="clearfix"></div>
                <div class="row">

                </div>
                <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <!-- <h2>Explore <small>user data</small></h2> -->
                        <ul class="nav navbar-right panel_toolbox">
                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                          </li>
                          <!-- <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                              <li><a href="#">Settings 1</a>
                              </li>
                              <li><a href="#">Settings 2</a>
                              </li>
                            </ul>
                          </li>
                          <li><a class="close-link"><i class="fa fa-close"></i></a>
                          </li> -->
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
                        <br />
                        <form id="search" method="GET" action="user.php" data-parsley-validate class="form-horizontal form-label-left">
    
                          <div class="form-group">
                            <label class="label-lg control-label col-md-3 col-sm-3 col-xs-12" for="netid">NetID <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" name="netid" required="required" class="input-lg form-control col-md-7 col-xs-12">
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                              <button type="submit" class="btn btn-lg btn-success">
                                <i class="fa fa-search"></i>&nbsp;&nbsp;Submit
                              </button>
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

<?php 
print_middle();
print_bottom();
?>
