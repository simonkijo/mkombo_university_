<?php 
session_start();
//echo $_SESSION['busar'];
if(!isset($_SESSION['username'])){ header("location:staffLogin.php");}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MU | MKOMBO UNIVERSITY</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
<!-- SlimScroll -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="dist/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="dist/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/mkombo.min.css">
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
<style>
.bg{position: absolute;//background-color: #00aa00;width: 60%;//height: 50%;margin-left: 10%;//visibility: hidden;}
.title{padding-left:30%;padding-top:2%;}.test{background-color:red;}
</style>
<body class="hold-transition skin-blue sidebar-mini">  
<div class="wrapper">
  <!-- Main Header -->
  <header class="main-header">
    <!-- Logo -->
	<div name="id"></div>
    <a href="starter.html" class="logo">
	 <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>M</b>U</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Mkombo</b> University</span>
         </a>
        <!-- Header Navbar -->
           <nav class="navbar navbar-static-top" role="navigation">
         <!-- Sidebar toggle button-->
             <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
           <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
               <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                 <!-- The user image in the navbar-->
                 <img src="dist/img/user_julius.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Julius</span>
            </a>
       <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="dist/img/user_julius.jpg" class="img-circle" alt="User Image">

                <p>
                  Julius Mungaya - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->

              <!-- Menu Footer-->
           <li class="user-footer">
                <div class="pull-left">
                  <a href="profile_storekeeper.php" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="login_storekeeper.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>-->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

     <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
          <li class="header">HEADER</li>
             <!-- Optionally, you can add icons to the links -->
              <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Home</a></li>
                     <li class="treeview">
                     <li class="treeview">
                     <a href="#"><i class="fa fa-link"></i> <span>Store</span> <i class="fa fa-angle-left pull-right"></i></a>
                   <ul class="treeview-menu">
		<li><a href="classrooms_enter_record.php">
		<i class="fa fa-circle-o text-red"></i> <span>Enter record</span></a></li>
		<li><a href="classrooms_detail_only.php">
		<i class="fa fa-circle-o text-red"></i> <span>Detail</span></a></li>
		<li><a href="classrooms_detail.php">
		<i class="fa fa-circle-o text-red"></i> <span>Update</span></a></li>
		    </ul>
                </li> </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper" style="padding-bottom:0%; height:30%">
 <div class="box ss">
    <div class="box-header ">
              <h3 class="box-title"> VIEW STORE RECORD WIZARD</h3>
      
            </div>
            <!-- /.box-header -->
			<?php
			 /* $id =$_GET['id'];
		       $conn=mysql_connect("localhost","root","") or die("not connected");
	           $select_db=mysql_select_db('mkombo',$conn);
	            mysql_query("DELETE books WHERE id='xxxxxxxxxxxxx' ") or die(mysql_error());//card_id="$_POST['password']" AND your_full_name="$_POST['username']");
               mysql_close($conn);
                             */
			 ?>
            <div class="box-body">
			<!--<div class="col-md-1">aaaaa</div>-->
			<div class="col-md-12">
			<div class="row" style="margin:3%; margin-top:0%;">
              <table id="example1" class="table table-bordered table-striped">
               <thead><tr ><th>ID</th><th>NAME</th><th>NO:CHAIRS</th><th>DESCRIPTION</th><th>STATUS</th> </tr></thead>
			   <tbody>	
				<?php 
				
             	$conn=mysql_connect("localhost","root","") or die("not connected");
	            $select_db=mysql_select_db('mkombo_university',$conn);
	            $result=mysql_query("SELECT * FROM classrooms") or die(mysql_error());//card_id="$_POST['password']" AND your_full_name="$_POST['username']");
                while($row=mysql_fetch_array($result))
                {   $id=$row['id'];
			        $name=$row['name'];
	 		        $no_chairs=$row['no_chairs'];
			        $description=$row['description'];
			        $status=$row['status'];
                     echo '<tr>';
			         echo '<td>' . $id.'</td><td>'.$name.'</td><td>'. $no_chairs.'</td><td>'.$description.'</td><td>'.$status.'</td>';
			         echo '</tr>';
		      }
           mysql_close($conn);
             
				?>
          
                </tbody> </table>
			  </div>
                 </div>
            <!-- /.box-body -->
          </div>
          <!-- 	<div class="col-md-2"></div> -->
			</div>
	  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">Simon Kijo and Julius Mungaya</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript::;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript::;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>

<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable({
		"ordering": false
		
	});
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>
