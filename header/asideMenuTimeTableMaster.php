      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Click here for Profile and Log out">
              <!-- The user image in the navbar-->
              <!--<img src="dist/img/user_kijo.png" class="user-image" alt="User Image">-->
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo firstCapitalLetter(getField('sname')).', '.firstCapitalLetter(getField('fname'));?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?php echo photoProfile(getField('fname').'_'.getField('mname').'_'.getField('sname').'.jpg');?>" class="img-circle" alt="User Image">

                <p><?php echo firstCapitalLetter(getField('sname')).', '.firstCapitalLetter(getField('fname'));?><small><?php echo firstCapitalLetter(getField('role'));?></small></p>
              </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="timeMasterProfile.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
<?php include('header/helpIcon.php'); ?>
        </ul>
      </div>
    </nav>
  </header>
<!-- Left side column. contains the logo and sidebar -->