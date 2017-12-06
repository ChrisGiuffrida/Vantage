<?php
    require("verify_session.php");
    require("navis.php");
    print_top();
?>

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
                            <input name="first" value="<?php echo $_SESSION["first"]; ?>" type="text" id="first" required="required" class="form-control col-md-7 col-xs-12">
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
        
<?php
print_middle();
print_bottom();
?>
