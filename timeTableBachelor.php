<?php
	include('config/config.php');
	include('config/functions.php');
	include('header/head.php');
	include('header/asideMenuTimeTableMaster.php');
	include('data/courseOption.php');
	include('data/venueSelection.php');
	include('data/moduleLoad.php');
	include('data/timeTableData.php');
	
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
        <li><a href="timeTableMaster.php"><i class="fa fa-th"></i> <span>Venue Management</span> </a></li>
		<li class="active treeview">
          <a href="#"><i class="fa fa-table"></i> <span>Class Time Table</span> <i class="fa fa-angle-left pull-right"></i></a>
          <ul class="treeview-menu">
			<li class="active"><a href="timeTableBachelor.php"><i class="fa fa-book"></i> <span>Bachelor Degree</span> </a></li>
			<li><a href="timeTableDiploma.php"><i class="fa fa-book"></i> <span>Ordinary Diploma</span> </a></li>
          </ul>
        </li>
		<!--end of class time table-->
		<li><a href="timeMasterProfile.php"><i class="fa fa-user"></i> <span>Profile Settings</span></a></li>
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
      <h1>Class Time Table<small></small></h1>
      <ol class="breadcrumb">
        <li><a href="timeTableMaster.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Class Time Table</li>
		<li class="active">Bachelor Degree</li>
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
							<h4>SUCCESSFULLY !</h4>
							<p> Class Time Table created successfully.</p>
						</div>";
						header('Location:timeTableBachelor.php');
				}else if($success[1] == 'fail'){
					echo "<div class='callout callout-danger displaySms'>
						<h4>ERROR !</h4>
						<p>Sorry something went wrong, try again.</p>
					</div>";
				}else if($success[3] == 'no_selected'){
					echo "<div class='callout callout-danger displaySms'>
						<h4>ERROR !</h4>
						<p>Please select year, semester and course</p>
					</div>";
				}else if($success[2] == 'empty'){
					echo "<div class='callout callout-danger displaySms'>
						<h4>ERROR !</h4>
						<p>Please Fill the Field.</p>
					</div>";
				}else if($success[4] == 'time_table_created'){
					echo "<div class='callout callout-info'>
						<h4>INFORMATION !</h4>
						<p>The Class Time Table for ".$year." year, ".$semester." semester and ".$course." course already created. If you want to edit click <a href='timeTableBachelorEdit.php'>HERE</a></p>
					</div>";
				}	
			}
			if(isset($error_sms_m) || isset($error_sms_t) || isset($error_sms_w) || isset($error_sms_th) || isset($error_sms_f)){
				if(count($error_sms_m) != 0){
					echo "<div class='callout callout-danger'>
						<h4>ERROR !</h4>";
						foreach($error_sms_m as $m){
							echo '<p>'.$m.'</p>';
						}
					echo "</div>";
				}
				if(count($error_sms_t) != 0){
					echo "<div class='callout callout-danger'>
						<h4>ERROR !</h4>";
						foreach($error_sms_t as $t){
							echo '<p>'.$t.'</p>';
						}
					echo "</div>";
				}
				if(count($error_sms_w) != 0){
					echo "<div class='callout callout-danger'>
						<h4>ERROR !</h4>";
						foreach($error_sms_w as $w){
							echo '<p>'.$w.'</p>';
						}
					echo "</div>";
				}
				if(count($error_sms_th) != 0){
					echo "<div class='callout callout-danger'>
						<h4>ERROR !</h4>";
						foreach($error_sms_th as $th){
							echo '<p>'.$th.'</p>';
						}
					echo "</div>";
				}
				if(count($error_sms_f) != 0){
					echo "<div class='callout callout-danger'>
						<h4>ERROR !</h4>";
						foreach($error_sms_f as $f){
							echo '<p>'.$f.'</p>';
						}
					echo "</div>";
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
					<?php
						if(isset($_POST['year']) && !empty($_POST['year'])){
							echo '<option selected="selected" value="'.$_POST['year'] .'">'.$_POST['year'].'</option>';
						}else{
							echo '<option selected="selected" value="">Select a year</option>';
						}
					?>		  
							  <option value="first">First</option>
							  <option value="second">Second</option>
							  <option value="third">Third</option>
							  <option value="forth">Forth</option>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Semester</label><br>
							<select name="semester" class="form-control select2">
					<?php
						if(isset($_POST['semester']) && !empty($_POST['semester'])){
							echo '<option selected="selected" value="'.$_POST['semester'] .'">'.$_POST['semester'].'</option>';
						}else{
							echo '<option selected="selected" value="">Select a semester</option>';
						}
					?>	  
							  <option value="first">First</option>
							  <option value="second">Second</option>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Course</label><br>
							<select name="course" class="form-control select2">
					<?php
						if(isset($_POST['course']) && !empty($_POST['course'])){
								echo '<option selected="selected">'.$_POST['course'].'</option>';
							}else{
								echo '<option selected="selected" value="">Select a Course</option>';
							}
						if(isset($course1)){
							foreach($course1 as $c){
									echo  '<option>'.$c.'</option>';
							}
						}
					?>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label></label><br>
							<button type="submit" name="sv_time_b" class="btn btn-primary">Show</button>
						</div>
					</div>
					<!-- -->
				</div>
			
		<?php
		if(isset($success) || isset($error_sms_m) || isset($error_sms_t) || isset($error_sms_w) || isset($error_sms_th) || isset($error_sms_f)){
			if($success[2] == 'empty' || $success[1] == 'fail' || count($error_sms_m) != 0 || count($error_sms_t) != 0 || count($error_sms_w) != 0 || count($error_sms_th) != 0 || count($error_sms_f) != 0){
				$programme = 'Bachelor Degree';
				$course = $_POST['course'];
				$year = $_POST['year'];
				$semester = $_POST['semester'];
				
				if($course != '' && $year != '' && $semester != ''){
					$query = "SELECT `module_title` FROM `mkombo_university`.`modules` WHERE `course`='".$course."' AND `year`='".$year."' AND `semister`='".$semester."' AND `programme`='".$programme."'";
					$query_run = mysql_query($query);
					while($row = mysql_fetch_array($query_run)){
						$data[] = $row['module_title'];
					}
				}
			}
		}
		if(isset($data)){
			echo '<div class="row">
					<div class="col-md-12">
						<div class="box-body">
							<table id="time_table" class="table table-bordered table-hover">
								<thead>
									<tr>
									  <th>Module Title</th>
									  <th>Day</th>
									  <th>Time</th>
									  <th>Venue</th>
									</tr>
								</thead>
								<tbody>';
						for($i=0;$i<count($data);$i++){ 
								echo '<tr>
										<td style="width:25%;">
											<div class="form-group">
												<select name="module[]" class="form-control select2">';
									if(isset($_POST['module']) && !empty($_POST['module'])){
										echo '<option selected="selected">'.$_POST['module'][$i].'</option>';
									}else{
										echo '<option value="">Select a Module</option>';
									}
											echo	'<option>'.replaceUnderscoreWithSpace($data[$i]).'</option>
												</select>
											</div>
										</td> 
										<td style="width:25%;">
											<div class="form-group">
												<select name="day_'.$i.'[]" multiple="multiple" class="form-control select2" data-placeholder="Select Day">';
									if(isset($_POST['day_'.$i]) && !empty($_POST['day_'.$i])){	
										for($j=0;$j<count($_POST['day_'.$i]);$j++){
											echo  '<option selected="selected">'.$_POST['day_'.$i][$j].'</option>';
										}
									}
											echo  '<option>Monday</option>
												  <option>Tuesday</option>
												  <option>Wednesday</option>
												  <option>Thursday</option>
												  <option>Friday</option>
												</select>
											</div>
										</td> 
										<td style="width:25%;">
											<div class="form-group">
												<select name="time_'.$i.'[]" multiple="multiple" class="form-control select2" data-placeholder="Select Time">';
									if(isset($_POST['time_'.$i]) && !empty($_POST['time_'.$i])){	
										for($j=0;$j<count($_POST['time_'.$i]);$j++){
											echo  '<option selected="selected">'.$_POST['time_'.$i][$j].'</option>';
										}
									}			  
											echo  '<option>8:00-8:50</option>
												  <option>8:00-8:50</option>
												  <option>8:00-8:50</option>
												  <option>8:00-9:40</option>
												  <option>8:00-9:40</option>
												  <option>8:00-9:40</option>
												  <option>8:00-10:30</option>
												  <option>8:00-10:30</option>
												  <option>8:00-10:30</option>
												  <option>8:50-9:40</option>
												  <option>8:50-9:40</option>
												  <option>8:50-9:40</option>
												  <option>8:50-10:30</option>
												  <option>8:50-10:30</option>
												  <option>8:50-10:30</option>
												  <option>8:50-11:20</option>
												  <option>8:50-11:20</option>
												  <option>8:50-11:20</option>
												  <option>9:40-10:30</option>
												  <option>9:40-10:30</option>
												  <option>9:40-10:30</option>
												  <option>9:40-11:20</option>
												  <option>9:40-11:20</option>
												  <option>9:40-11:20</option>
												  <option>9:40-12:10</option>
												  <option>9:40-12:10</option>
												  <option>9:40-12:10</option>
												  <option>10:30-11:20</option>
												  <option>10:30-11:20</option>
												  <option>10:30-11:20</option>
												  <option>10:30-12:10</option>
												  <option>10:30-12:10</option>
												  <option>10:30-12:10</option>
												  <option>10:30-13:00</option>
												  <option>10:30-13:00</option>
												  <option>10:30-13:00</option>
												  <option>11:20-12:10</option>
												  <option>11:20-12:10</option>
												  <option>11:20-12:10</option>
												  <option>11:20-13:00</option>
												  <option>11:20-13:00</option>
												  <option>11:20-13:00</option>
												  <option>11:20-13:50</option>
												  <option>11:20-13:50</option>
												  <option>11:20-13:50</option>
												  <option>12:10-13:00</option>
												  <option>12:10-13:00</option>
												  <option>12:10-13:00</option>
												  <option>12:10-13:50</option>
												  <option>12:10-13:50</option>
												  <option>12:10-13:50</option>
												  <option>12:10-14:40</option>
												  <option>12:10-14:40</option>
												  <option>12:10-14:40</option>
												  <option>13:00-13:50</option>
												  <option>13:00-13:50</option>
												  <option>13:00-13:50</option>
												  <option>13:00-14:40</option>
												  <option>13:00-14:40</option>
												  <option>13:00-14:40</option>
												  <option>13:00-15:30</option>
												  <option>13:00-15:30</option>
												  <option>13:00-15:30</option>
												  <option>13:50-14:40</option>
												  <option>13:50-14:40</option>
												  <option>13:50-14:40</option>
												  <option>13:50-15:30</option>
												  <option>13:50-15:30</option>
												  <option>13:50-15:30</option>
												  <option>13:50-16:20</option>
												  <option>13:50-16:20</option>
												  <option>13:50-16:20</option>
												  <option>14:40-15:30</option>
												  <option>14:40-15:30</option>
												  <option>14:40-15:30</option>
												  <option>14:40-16:20</option>
												  <option>14:40-16:20</option>
												  <option>14:40-16:20</option>
												  <option>14:40-17:10</option>
												  <option>14:40-17:10</option>
												  <option>14:40-17:10</option>
												  <option>15:30-16:20</option>
												  <option>15:30-16:20</option>
												  <option>15:30-16:20</option>
												  <option>15:30-17:10</option>
												  <option>15:30-17:10</option>
												  <option>15:30-17:10</option>
												  <option>15:30-18:00</option>
												  <option>15:30-18:00</option>
												  <option>15:30-18:00</option>
												  <option>16:20-17:10</option>
												  <option>16:20-17:10</option>
												  <option>16:20-17:10</option>
												  <option>16:20-18:00</option>
												  <option>16:20-18:00</option>
												  <option>16:20-18:00</option>
												  <option>16:20-18:50</option>
												  <option>16:20-18:50</option>
												  <option>16:20-18:50</option>
												  <option>17:10-18:00</option>
												  <option>17:10-18:00</option>
												  <option>17:10-18:00</option>
												  <option>17:10-18:50</option>
												  <option>17:10-18:50</option>
												  <option>17:10-18:50</option>
												  <option>17:10-19:40</option>
												  <option>17:10-19:40</option>
												  <option>17:10-19:40</option>
												  <option>18:00-18:50</option>
												  <option>18:00-18:50</option>
												  <option>18:00-18:50</option>
												  <option>18:00-19:40</option>
												  <option>18:00-19:40</option>
												  <option>18:00-19:40</option>
												  <option>18:00-20:30</option>
												  <option>18:00-20:30</option>
												  <option>18:00-20:30</option>
												  <option>18:50-19:40</option>
												  <option>18:50-19:40</option>
												  <option>18:50-19:40</option>
												  <option>18:50-20:30</option>
												  <option>18:50-20:30</option>
												  <option>18:50-20:30</option>
												  <option>18:50-21:20</option>
												  <option>18:50-21:20</option>
												  <option>18:50-21:20</option>
												  <option>19:40-20:30</option>
												  <option>19:40-20:30</option>
												  <option>19:40-20:30</option>
												  <option>19:40-21:20</option>
												  <option>19:40-21:20</option>
												  <option>19:40-21:20</option>
												  <option>19:40-22:10</option>
												  <option>19:40-22:10</option>
												  <option>19:40-22:10</option>
												  <option>20:30-21:20</option>
												  <option>20:30-21:20</option>
												  <option>20:30-21:20</option>
												  <option>20:30-22:10</option>
												  <option>20:30-22:10</option>
												  <option>20:30-22:10</option>
												  <option>20:30-23:00</option>
												  <option>20:30-23:00</option>
												  <option>20:30-23:00</option>
												</select>
											</div>
										</td>
										<td style="width:25%;">
											<div class="form-group">
												<select name="venue_'.$i.'[]" multiple="multiple" class="form-control select2" data-placeholder="Select Venue">';
									if(isset($_POST['venue_'.$i]) && !empty($_POST['venue_'.$i])){	
										for($j=0;$j<count($_POST['venue_'.$i]);$j++){
											echo  '<option selected="selected">'.$_POST['venue_'.$i][$j].'</option>';
										}
									}			
												foreach($res as $s){
													echo '<option>'.$s.'</option>';
												} 
										echo	'</select>
											</div>
										</td>
									</tr>';
						}	
						echo	'</tbody>
							</table>
						</div>
					</div>
				</div>';
			
				echo '<div class="row">
					<div class="col-md-6"></div>
					<div class="col-md-3">
						<div class="form-group">
							<label></label><br>
							<button type="submit" name="sv_time_b_md" class="btn btn-primary">Create</button>
						</div>
					</div>
				</div>';
			}
		?>
</form>
		</div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php 
	include('footer/footer.php');
	include('footer/helpTimeMaster.php');
	include('footer/js.php');
?>