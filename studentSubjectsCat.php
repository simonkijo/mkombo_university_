<?php 
	include('config/config.php');
	include('config/functions.php');
	include('header/head.php');
	include('header/asideMenuStudent.php');
	include('data/studentSubjectsCatData.php');
	
	if(logged_in()){
		
	}else{
		header('Location: studentLogin.php');
	}
?>
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar -->
    <section class="sidebar">

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">USER MANAGEMENT</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="student.php"><i class="fa fa-table"></i> <span>Class Time Table</span> </a></li>
        <li class="active"><a href="studentSubjectsCat.php"><i class="fa fa-th"></i> <span>Subjects Catalogue</span> </a></li>
		<!--end of subjects catalog-->
		<li><a href="studentAcademicReport.php"><i class="fa fa-files-o"></i> <span>Academic Reports</span> </a></li>
		<li><a href="diplomaOrbachelor.php"><i class="fa fa-files-o"></i> <span>Payments</span> </a></li>
		<li><a href="searchBook.php"><i class="fa fa-book"></i> <span>Books</span> </a></li>
		<!--end of academic report-->
		<li><a href="studentProfile.php"><i class="fa fa-user"></i> <span>Profile Settings</span></a></li>
		<li><a href="logout.php"><i class="fa fa-user"></i> <span>Sign Out</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Subjects Catalogue<small></small></h1>
      <ol class="breadcrumb">
        <li><a href="student.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Subjects Catalogue</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<?php 	
				if(isset($error_sms)){
					if($error_sms == 'empty'){
						echo "<div class='callout callout-danger displaySms'>
								<h4>ERROR !</h4>
								<p>Please select year and semester</p>
							</div>";
					}
					if($error_sms == 'no_data'){
						echo "<div class='callout callout-info displaySms'>
								<h4>INFORMATION !</h4>
								<p>No Subjects Catalogue Yet</p>
							</div>";
					}
				}
				?>
			</div>
			<div class="col-md-3"></div>
		</div>
		<div class="box box-primary box-height" style="margin-bottom:0;">
			<div class="row" style="margin:2% auto;">
				<form method="post" enctype="multipart/form-data">
				<div class="col-md-3">
					<div class="form-group">
						<label>Year</label><br>
						<select name="year" class="form-control select2"> 
						  <option selected="selected" value="">Select a Year</option>
						  <option value="first">First</option>
						  <option value="second">Second</option>
						  <option value="third">Third</option>
<?php
	$programme = getInfo('programme','student');
		if($programme == 'Bachelor Degree'){
				echo	  '<option value="forth">Forth</option>';
		}
?>						  
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Semester</label><br>
						<select name="semester" class="form-control select2">
						  <option selected="selected" value="">Select a Semester</option>
						  <option value="first">First</option>
						  <option value="second">Second</option>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label></label><br>
						<button type="submit" name="show_subjects" class="btn btn-primary">Show</button>
					</div>
				</div>
				</form>
			</div>
<?php
	if(isset($code) && isset($module) && isset($credit)){
		if(!empty($code) && !empty($module) && !empty($credit)){
	echo	'<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-9">
					<div class="box-body">
						<table id="studentSubjectsCat" class="table table-bordered table-hover">
							<thead>
								<tr>
								  <th>Code</th>
								  <th>Module Title</th>
								  <th>Credit</th>
								</tr>
							</thead>
							<tbody>';
?>
<?php
			for($i=0;$i<$count;$i++){
						echo	'<tr>
								  <td>'.replaceUnderscoreWithSpace($code[$i]).'</td>
								  <td>'.firstCapitalLetter(replaceUnderscoreWithSpace($module[$i])).'</td>
								  <td>'.$credit[$i].'</td>
								</tr>';
			}
		
?>
<?php
				echo		'</tbody>
						</table>
					</div>
				</div>
			</div>';
		}
	}
?>
		</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php 
	include('footer/footer.php');
	include('footer/helpStudent.php');
	include('footer/js.php');
?>