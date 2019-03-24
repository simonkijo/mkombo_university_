<?php 
	include('config/config.php');
	include('config/functions.php');
	include('header/head.php');
	include('header/asideMenuLecturer.php');
	include('data/moduleAssignmentData.php');
	
	if(logged_in()){
		
	}else{
		header('Location: staffLogin.php');
	}
?>
  <aside class="main-sidebar">
    <section class="sidebar">

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">USER MANAGEMENT</li>
		<li><a href="lecturer.php"><i class="fa fa-files-o"></i> <span>Student Marks</span> </a></li>
<?php 
	$hod = getRoleField('hod');
	if(isset($hod) && !empty($hod)){
		if($hod == 'YES'){
			echo '<li class="active"><a href="moduleAssignment.php"><i class="fa fa-book"></i> <span>Module Assignment</span> </a></li>';
		}
	}
?>
		<li><a href="lecturerProfile.php"><i class="fa fa-user"></i> <span>Profile Settings</span></a></li>
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
      <h1>Module Assignment<small></small></h1>
      <ol class="breadcrumb">
        <li><a href="lecturer.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Module Assignment</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<?php 
				if(isset($success)){
					if($success[1] == 'success'){
						echo "<div class='callout callout-success displaySms'>
								<h4>Successfully !</h4>
								<p> Successful Submitted.</p>
							</div>";
					}
					if($success[2] == 'fail'){
						echo "<div class='callout callout-danger displaySms'>
								<h4>ERROR !</h4>
								<p> Sorry something went wrong, try to insert again.</p>
							</div>";
					}
				}
				?>
			</div>
			<div class="col-md-3"></div>
		</div>
		<div class="box box-primary box-height" style="margin-bottom:0;">
			<form method="post" enctype="multipart/form-data">
				<div class="row" style="margin:2% auto;">
					<div class="col-md-3">
						<div class="form-group">
							<label>Year</label><br>
							<select name="year" class="form-control select2"> 
							  <option selected="selected" value="">Select a year</option>
							  <option value="first">First</option>
							  <option value="second">Second</option>
							  <option value="third">Third</option>
<?php
			if(getRoleField('programme') == 'Bachelor Degree'){
					echo	  '<option value="forth">Forth</option>';
			}else{
				
			}
?>							  
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Semester</label><br>
							<select name="semester" class="form-control select2">
							  <option selected="selected" value="">Select a semester</option>
							  <option value="first">First</option>
							  <option value="second">Second</option>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label></label><br>
							<button type="submit" name="sv_mAssign" class="btn btn-primary">Show</button>
						</div>
					</div>
				</div>
			</form>
<?php
	if(isset($module) || isset($f_) || isset($m_) || isset($s_)){
			if(!empty($module) && !empty($f_) && !empty($m_) && !empty($s_)){
	echo	'<form method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10">
					<div class="box-body">
						<table id="moduleAssignment" class="table table-bordered table-hover">
							<thead>
								<tr>
								  <th>Name</th>
								  <th>Module Title</th>
								</tr>
							</thead>
							<tbody>';
?>
<?php
				for($i=0;$i<count($f_);$i++){
						echo	'<tr>
								  <td>'.$f_[$i].' '.$m_[$i].' '.$s_[$i].'</td>
								  <td>
										<div class="form-group">
											<div class="col-sm-11">
											<select name="module_title_'.($i+1).'[]" class="form-control select2" multiple="multiple" data-placeholder="Select a Module">';
?>
<?php	
							foreach($module as $mod){
										echo  '<option>'.replaceUnderscoreWithSpace($mod).'</option>';
							}
?>
<?php											
									echo	'</select>
											</div>
										 </div>
								  </td>
								</tr>';
				}
		
?>	
<?php							
				echo		'</tbody>
						</table>
					</div>				
				</div>
				<div class="col-md-1"></div>
			</div>
			<div class="row">
				<div class="col-md-3">
					
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label></label><br>
						<button type="submit" name="sv_assign" class="btn btn-primary">Save</button>
					</div>
				</div>
			</div>
			</form>';
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
	include('footer/helpLecturer.php');
	include('footer/js.php');
?>