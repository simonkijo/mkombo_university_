<?php 
include('include/books_top.php');

?>
      <div class="row">
        <div class="col-md-4">
		
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="dist/img/user_julius.jpg" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $full_name; ?></h3>

              <p class="text-muted text-center">Librarian</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Full name</b> <a class="pull-right"><?php echo $full_name; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Email address</b> <a class="pull-right"><?php echo $the_email; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Phone</b> <a class="pull-right"><?php echo $the_phone; ?></a>
                </li>
				
				<li class="list-group-item">
                  <b>Position</b> <a class="pull-right"><?php echo $the_position; ?></a>
                </li>
				<li class="list-group-item">
                  <b>index</b> <a class="pull-right">120120</a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		  </div>  
  <div class="col-md-8">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab"></a></li>
			
             <li><a href="#settings" data-toggle="tab">Settings</a></li>
            </ul>
			 <div class="tab-pane" id="settings">
			  <div> <?php echo $display; ?></div>
                <form class="form-horizontal" method="post">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Full Name</label>
                   
				   <div class="col-sm-10 error_fname  has-feedback">
                      <input type="text" class="form-control fname" name="fname" placeholder="Name">
					  	   <span class="glyphicon glyphicon-user b form-control-feedback " ></span>
                      <span class="help-block fname_error"></span>
					</div>
                  </div>
               
                  <div class="form-group ">
                    <label for="inputName" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10 has-feedback error_email">
                      <input type="email" class="form-control email" name="email" placeholder="email">
					   <span class="glyphicon glyphicon-envelope b form-control-feedback " ></span>
                      <span class="help-block email_error"></span>
					</div>
                  </div>
				    <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Phone</label>

                    <div class="col-sm-10 error_phone  has-feedback">
                      <input type="text" class="form-control phone" name="phone" id="phoneValidate" placeholder="phone">
                      <span class="glyphicon glyphicon-phone b form-control-feedback " ></span>
					 <span class="help-block phone_error"></span>
					</div>
                  </div>
             	   
			      <div class="form-group ">
                    <label for="inputSkills" class="col-sm-2 control-label">Password</label>

                    <div class="col-sm-10 has-feedback error_password">
                      <input type="password" class="form-control password" name="password" placeholder="password" maxlength="16" minlength="8">
                       <span class="glyphicon glyphicon-lock b form-control-feedback " ></span>
					  <span class="help-block  password_error"></span>
					</div>
                  </div>
				  
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Confirm </label>

                    <div class="col-sm-10 has-feedback error_repassword">
                      <input type="password" class="form-control repassword" name="repassword" placeholder="repassword" maxlength="16" minlength="8">
                       <span class="glyphicon glyphicon-lock b form-control-feedback " ></span>
					  <span class="help-block repassword_error"></span>
					</div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                          <input type="checkbox"> I agree to make changes to this account</a>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                     <input type="submit" name="setting" class="btn btn-primary change" value="Submit" >
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
		<?php 
include('include/financial_bottom.php');
?>
