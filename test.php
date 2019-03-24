<?php 
	error_reporting('E_NOTICE');
	include('config/config.php');
	include('config/functions.php');
	include('data/venueData.php');
	include('data/timeTableData.php');
	include('data/moduleData.php');
	include('data/moduleOption.php');
	
	/*if(isset($success)){
		echo $success[0].' '.$success[1];
	}*/
	//echo regGenerator();
	
	/*$query ="SELECT `subject_taken` FROM `mkombo_university`.`academic_info` WHERE `reg_no`='160219088199'";
	$res = mysql_query($query);
	$w = mysql_result($res,0,'subject_taken');
	printSubjects($w);*/
	
	//if($_SERVER['REQUEST_METHOD'] == 'POST'){
		//$subject_taken[] = $_POST['subject_taken'];
		
		//$bn = loopElements($subject_taken);
		//$qr = "UPDATE `mkombo_university`.`academic_info` SET `subject_taken`='".$bn."' WHERE `reg_no`='160219088199'";
		//mysql_query($qr);
	//}
	
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MU | MKOMBO UNIVERSITY</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="dist/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="dist/css/ionicons.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/mkombo.min.css">
  <!-- skin-blue -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
</head>
<body>
<!--<form method="post" enctype="multipart/form-data">
<div class="row">
	<div class="col-md-5">
		<div class="form-group">
		<label>Subjects Taken</label><br>
		<select name="subject_taken[]" class="form-control select2" multiple="multiple" data-placeholder="Select a Subject" style="width:100%;">
		  <option>Physics</option>
		  <option>Chemistry</option>
		  <option>Biology</option>
		  <option>Civics</option>
		  <option>History</option>
		  <option>Kiswahili</option>
		  <option>Geography</option>
		  <option>Mathematics</option>
		  <option>English</option>
		</select>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-4">
		<button type="submit" class="btn btn-primary">REGISTER</button>
	</div>
</div>
</form>-->
<!--<form method="post" enctype="multipart/form-data">
			<div class="row" style="margin:2% auto;">
				<div class="col-md-3">
					<div class="form-group">
						<label>Venue Title:</label>
						<div class="form-group another_input">
						  <input type="text" class="form-control" name="venue[]"><br>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label></label><br>
						<a class="btn btn-primary addBtn">Add another</a>
					</div>
				</div>
			</div>
			<div class="row" style="margin:2% auto;">
				<div class="col-md-3">
					<div class="form-group">
						<label></label><br>
						<button type="submit" name="venue_btn" class="btn btn-primary">Save</button>
					</div>
				</div>
			</div>
			</form>-->
<form method="post" enctype="multipart/form-data">
			<div class="row" style="margin:2% auto;">
				<div class="col-md-3">
					<div class="form-group">
						<label>Year:</label><br>
						<select name="year" id="year" class="form-control select2"> 
						  <option selected="selected" value="">Select a year</option>
						  <option value="first">First</option>
						  <option value="second">Second</option>
						  <option value="third">Third</option>
						  <option value="forth">Forth</option>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Semester:</label><br>
						<select name="semester" id="semister" class="form-control select2">
						  <option selected="selected" value="">Select a semester</option>
						  <option value="first">First</option>
						  <option value="second">Second</option>
						</select>
					</div>
				</div>
			</div>
			
			<div class="row" style="margin:1% auto; border-bottom:1px dotted #3c8dbc;">
				<div class="col-md-2">
					<label>Monday:</label>
				</div>
				<div class="col-md-10">
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label>Module Title:</label><br>
								<select name="module_title_1" class="form-control select2 results">
								  <option selected="selected">NO LESSON</option>
								  
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="bootstrap-timepicker">
								<div class="form-group">
								  <label>Start Time:</label>
								  <div class="input-group">
									<input type="text" name="start_time[]" class="form-control timepicker">
									<div class="input-group-addon">
									  <i class="fa fa-clock-o"></i>
									</div>
								  </div>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="bootstrap-timepicker">
								<div class="form-group">
								  <label>End Time:</label>
								  <div class="input-group">
									<input type="text" name="end_time[]" class="form-control timepicker">
									<div class="input-group-addon">
									  <i class="fa fa-clock-o"></i>
									</div>
								  </div>
								</div>
							 </div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label>Venue:</label><br>
								<select name="venue[]" class="form-control select2"> 
								  <option selected="selected">T1</option>
								  <option>T2</option>
								  <option>A1</option>
								  <option>Lab D1</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<select name="module_title[]" class="form-control select2">
								  <option selected="selected">NO LESSON</option>
								  <option>Embeded Systems</option>
								  <option>Teletraffic Engineering</option>
								  <option>User interface Design</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="bootstrap-timepicker">
								<div class="form-group">
								  <div class="input-group">
									<input type="text" name="start_time[]" class="form-control timepicker">
									<div class="input-group-addon">
									  <i class="fa fa-clock-o"></i>
									</div>
								  </div>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="bootstrap-timepicker">
								<div class="form-group">
								  <div class="input-group">
									<input type="text" name="end_time[]" class="form-control timepicker">
									<div class="input-group-addon">
									  <i class="fa fa-clock-o"></i>
									</div>
								  </div>
								</div>
							 </div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<select name="venue[]" class="form-control select2"> 
								  <option selected="selected">T1</option>
								  <option>T2</option>
								  <option>A1</option>
								  <option>Lab D1</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<select name="module_title[]" class="form-control select2">
								  <option selected="selected">NO LESSON</option>
								  <option>Embeded Systems</option>
								  <option>Teletraffic Engineering</option>
								  <option>User interface Design</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="bootstrap-timepicker">
								<div class="form-group">
								  <div class="input-group">
									<input type="text" name="start_time[]" class="form-control timepicker">
									<div class="input-group-addon">
									  <i class="fa fa-clock-o"></i>
									</div>
								  </div>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="bootstrap-timepicker">
								<div class="form-group">
								  <div class="input-group">
									<input type="text" name="end_time[]" class="form-control timepicker">
									<div class="input-group-addon">
									  <i class="fa fa-clock-o"></i>
									</div>
								  </div>
								</div>
							 </div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<select name="venue[]" class="form-control select2"> 
								  <option selected="selected">T1</option>
								  <option>T2</option>
								  <option>A1</option>
								  <option>Lab D1</option>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row" style="margin:1% auto; border-bottom:1px dotted #3c8dbc;">
				<div class="col-md-2">
					<label>Tuesday:</label>
				</div>
				<div class="col-md-10">
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label>Module Title:</label><br>
								<select name="module_title[]" class="form-control select2">
								  <option selected="selected">NO LESSON</option>
								  <option>Embeded Systems</option>
								  <option>Teletraffic Engineering</option>
								  <option>User interface Design</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="bootstrap-timepicker">
								<div class="form-group">
								  <label>Start Time:</label>
								  <div class="input-group">
									<input type="text" name="start_time[]" class="form-control timepicker">
									<div class="input-group-addon">
									  <i class="fa fa-clock-o"></i>
									</div>
								  </div>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="bootstrap-timepicker">
								<div class="form-group">
								  <label>End Time:</label>
								  <div class="input-group">
									<input type="text" name="end_time[]" class="form-control timepicker">
									<div class="input-group-addon">
									  <i class="fa fa-clock-o"></i>
									</div>
								  </div>
								</div>
							 </div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label>Venue:</label><br>
								<select name="venue[]" class="form-control select2"> 
								  <option selected="selected">T1</option>
								  <option>T2</option>
								  <option>A1</option>
								  <option>Lab D1</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<select name="module_title[]" class="form-control select2">
								  <option selected="selected">NO LESSON</option>
								  <option>Embeded Systems</option>
								  <option>Teletraffic Engineering</option>
								  <option>User interface Design</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="bootstrap-timepicker">
								<div class="form-group">
								  <div class="input-group">
									<input type="text" name="start_time[]" class="form-control timepicker">
									<div class="input-group-addon">
									  <i class="fa fa-clock-o"></i>
									</div>
								  </div>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="bootstrap-timepicker">
								<div class="form-group">
								  <div class="input-group">
									<input type="text" name="end_time[]" class="form-control timepicker">
									<div class="input-group-addon">
									  <i class="fa fa-clock-o"></i>
									</div>
								  </div>
								</div>
							 </div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<select name="venue[]" class="form-control select2"> 
								  <option selected="selected">T1</option>
								  <option>T2</option>
								  <option>A1</option>
								  <option>Lab D1</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<select name="module_title[]" class="form-control select2">
								  <option selected="selected">NO LESSON</option>
								  <option>Embeded Systems</option>
								  <option>Teletraffic Engineering</option>
								  <option>User interface Design</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="bootstrap-timepicker">
								<div class="form-group">
								  <div class="input-group">
									<input type="text" name="start_time[]" class="form-control timepicker">
									<div class="input-group-addon">
									  <i class="fa fa-clock-o"></i>
									</div>
								  </div>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="bootstrap-timepicker">
								<div class="form-group">
								  <div class="input-group">
									<input type="text" name="end_time[]" class="form-control timepicker">
									<div class="input-group-addon">
									  <i class="fa fa-clock-o"></i>
									</div>
								  </div>
								</div>
							 </div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<select name="venue[]" class="form-control select2"> 
								  <option selected="selected">T1</option>
								  <option>T2</option>
								  <option>A1</option>
								  <option>Lab D1</option>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row" style="margin:1% auto; border-bottom:1px dotted #3c8dbc;">
				<div class="col-md-2">
					<label>Wednesday:</label>
				</div>
				<div class="col-md-10">
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label>Module Title:</label><br>
								<select name="module_title[]" class="form-control select2">
								  <option selected="selected">NO LESSON</option>
								  <option>Embeded Systems</option>
								  <option>Teletraffic Engineering</option>
								  <option>User interface Design</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="bootstrap-timepicker">
								<div class="form-group">
								  <label>Start Time:</label>
								  <div class="input-group">
									<input type="text" name="start_time[]" class="form-control timepicker">
									<div class="input-group-addon">
									  <i class="fa fa-clock-o"></i>
									</div>
								  </div>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="bootstrap-timepicker">
								<div class="form-group">
								  <label>End Time:</label>
								  <div class="input-group">
									<input type="text" name="end_time[]" class="form-control timepicker">
									<div class="input-group-addon">
									  <i class="fa fa-clock-o"></i>
									</div>
								  </div>
								</div>
							 </div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label>Venue:</label><br>
								<select name="venue[]" class="form-control select2"> 
								  <option selected="selected">T1</option>
								  <option>T2</option>
								  <option>A1</option>
								  <option>Lab D1</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<select name="module_title[]" class="form-control select2">
								  <option selected="selected">NO LESSON</option>
								  <option>Embeded Systems</option>
								  <option>Teletraffic Engineering</option>
								  <option>User interface Design</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="bootstrap-timepicker">
								<div class="form-group">
								  <div class="input-group">
									<input type="text" name="start_time[]" class="form-control timepicker">
									<div class="input-group-addon">
									  <i class="fa fa-clock-o"></i>
									</div>
								  </div>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="bootstrap-timepicker">
								<div class="form-group">
								  <div class="input-group">
									<input type="text" name="end_time[]" class="form-control timepicker">
									<div class="input-group-addon">
									  <i class="fa fa-clock-o"></i>
									</div>
								  </div>
								</div>
							 </div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<select name="venue[]" class="form-control select2"> 
								  <option selected="selected">T1</option>
								  <option>T2</option>
								  <option>A1</option>
								  <option>Lab D1</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<select name="module_title[]" class="form-control select2">
								  <option selected="selected">NO LESSON</option>
								  <option>Embeded Systems</option>
								  <option>Teletraffic Engineering</option>
								  <option>User interface Design</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="bootstrap-timepicker">
								<div class="form-group">
								  <div class="input-group">
									<input type="text" name="start_time[]" class="form-control timepicker">
									<div class="input-group-addon">
									  <i class="fa fa-clock-o"></i>
									</div>
								  </div>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="bootstrap-timepicker">
								<div class="form-group">
								  <div class="input-group">
									<input type="text" name="end_time[]" class="form-control timepicker">
									<div class="input-group-addon">
									  <i class="fa fa-clock-o"></i>
									</div>
								  </div>
								</div>
							 </div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<select name="venue[]" class="form-control select2"> 
								  <option selected="selected">T1</option>
								  <option>T2</option>
								  <option>A1</option>
								  <option>Lab D1</option>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row" style="margin:1% auto; border-bottom:1px dotted #3c8dbc;">
				<div class="col-md-2">
					<label>Thursday:</label>
				</div>
				<div class="col-md-10">
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label>Module Title:</label><br>
								<select name="module_title[]" class="form-control select2">
								  <option selected="selected">NO LESSON</option>
								  <option>Embeded Systems</option>
								  <option>Teletraffic Engineering</option>
								  <option>User interface Design</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="bootstrap-timepicker">
								<div class="form-group">
								  <label>Start Time:</label>
								  <div class="input-group">
									<input type="text" name="start_time[]" class="form-control timepicker">
									<div class="input-group-addon">
									  <i class="fa fa-clock-o"></i>
									</div>
								  </div>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="bootstrap-timepicker">
								<div class="form-group">
								  <label>End Time:</label>
								  <div class="input-group">
									<input type="text" name="end_time[]" class="form-control timepicker">
									<div class="input-group-addon">
									  <i class="fa fa-clock-o"></i>
									</div>
								  </div>
								</div>
							 </div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label>Venue:</label><br>
								<select name="venue[]" class="form-control select2"> 
								  <option selected="selected">T1</option>
								  <option>T2</option>
								  <option>A1</option>
								  <option>Lab D1</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<select name="module_title[]" class="form-control select2">
								  <option selected="selected">NO LESSON</option>
								  <option>Embeded Systems</option>
								  <option>Teletraffic Engineering</option>
								  <option>User interface Design</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="bootstrap-timepicker">
								<div class="form-group">
								  <div class="input-group">
									<input type="text" name="start_time[]" class="form-control timepicker">
									<div class="input-group-addon">
									  <i class="fa fa-clock-o"></i>
									</div>
								  </div>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="bootstrap-timepicker">
								<div class="form-group">
								  <div class="input-group">
									<input type="text" name="end_time[]" class="form-control timepicker">
									<div class="input-group-addon">
									  <i class="fa fa-clock-o"></i>
									</div>
								  </div>
								</div>
							 </div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<select name="venue[]" class="form-control select2"> 
								  <option selected="selected">T1</option>
								  <option>T2</option>
								  <option>A1</option>
								  <option>Lab D1</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<select name="module_title[]" class="form-control select2">
								  <option selected="selected">NO LESSON</option>
								  <option>Embeded Systems</option>
								  <option>Teletraffic Engineering</option>
								  <option>User interface Design</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="bootstrap-timepicker">
								<div class="form-group">
								  <div class="input-group">
									<input type="text" name="start_time[]" class="form-control timepicker">
									<div class="input-group-addon">
									  <i class="fa fa-clock-o"></i>
									</div>
								  </div>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="bootstrap-timepicker">
								<div class="form-group">
								  <div class="input-group">
									<input type="text" name="end_time[]" class="form-control timepicker">
									<div class="input-group-addon">
									  <i class="fa fa-clock-o"></i>
									</div>
								  </div>
								</div>
							 </div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<select name="venue[]" class="form-control select2"> 
								  <option selected="selected">T1</option>
								  <option>T2</option>
								  <option>A1</option>
								  <option>Lab D1</option>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row" style="margin:1% auto; border-bottom:1px dotted #3c8dbc;">
				<div class="col-md-2">
					<label>Friday:</label>
				</div>
				<div class="col-md-10">
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label>Module Title:</label><br>
								<select name="module_title[]" class="form-control select2">
								  <option selected="selected">NO LESSON</option>
								  <option>Embeded Systems</option>
								  <option>Teletraffic Engineering</option>
								  <option>User interface Design</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="bootstrap-timepicker">
								<div class="form-group">
								  <label>Start Time:</label>
								  <div class="input-group">
									<input type="text" name="start_time[]" class="form-control timepicker">
									<div class="input-group-addon">
									  <i class="fa fa-clock-o"></i>
									</div>
								  </div>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="bootstrap-timepicker">
								<div class="form-group">
								  <label>End Time:</label>
								  <div class="input-group">
									<input type="text" name="end_time[]" class="form-control timepicker">
									<div class="input-group-addon">
									  <i class="fa fa-clock-o"></i>
									</div>
								  </div>
								</div>
							 </div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label>Venue:</label><br>
								<select name="venue[]" class="form-control select2"> 
								  <option selected="selected">T1</option>
								  <option>T2</option>
								  <option>A1</option>
								  <option>Lab D1</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<select name="module_title[]" class="form-control select2">
								  <option selected="selected">NO LESSON</option>
								  <option>Embeded Systems</option>
								  <option>Teletraffic Engineering</option>
								  <option>User interface Design</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="bootstrap-timepicker">
								<div class="form-group">
								  <div class="input-group">
									<input type="text" name="start_time[]" class="form-control timepicker">
									<div class="input-group-addon">
									  <i class="fa fa-clock-o"></i>
									</div>
								  </div>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="bootstrap-timepicker">
								<div class="form-group">
								  <div class="input-group">
									<input type="text" name="end_time[]" class="form-control timepicker">
									<div class="input-group-addon">
									  <i class="fa fa-clock-o"></i>
									</div>
								  </div>
								</div>
							 </div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<select name="venue[]" class="form-control select2"> 
								  <option selected="selected">T1</option>
								  <option>T2</option>
								  <option>A1</option>
								  <option>Lab D1</option>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<select name="module_title[]" class="form-control select2">
								  <option selected="selected">NO LESSON</option>
								  <option>Embeded Systems</option>
								  <option>Teletraffic Engineering</option>
								  <option>User interface Design</option>
								</select>
							</div>
						</div>
						<div class="col-md-3">
							<div class="bootstrap-timepicker">
								<div class="form-group">
								  <div class="input-group">
									<input type="text" name="start_time[]" class="form-control timepicker">
									<div class="input-group-addon">
									  <i class="fa fa-clock-o"></i>
									</div>
								  </div>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="bootstrap-timepicker">
								<div class="form-group">
								  <div class="input-group">
									<input type="text" name="end_time[]" class="form-control timepicker">
									<div class="input-group-addon">
									  <i class="fa fa-clock-o"></i>
									</div>
								  </div>
								</div>
							 </div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<select name="venue[]" class="form-control select2"> 
								  <option selected="selected">T1</option>
								  <option>T2</option>
								  <option>A1</option>
								  <option>Lab D1</option>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="row" style="margin:2% auto;">
				<div class="col-md-3"></div>
				<div class="col-md-3">
					<div class="form-group">
						<label></label><br>
						<button type="submit" name="create" class="btn btn-primary">Create</button>
					</div>
				</div>
			</div>
			</form>
<!--<form method="post" enctype="multipart/form-data">
			<div class="row" style="margin:2% auto;">
				<div class="col-md-3">
					<div class="form-group">
						<label>Year:</label><br>
						<select name="year" class="form-control select2"> 
						  <option selected="selected" value="first">First</option>
						  <option value="second">Second</option>
						  <option value="third">Third</option>
						  <option value="forth">Forth</option>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Semester:</label><br>
						<select name="semester" class="form-control select2">
						  <option selected="selected" value="first">First</option>
						  <option value="second">Second</option>
						</select>
					</div>
				</div>
			</div>
			<div class="row" style="margin:2% auto;">
				<div class="col-md-2">
					<div class="form-group">
						<label>Code:</label>
						<div class="form-group code_">
						  <input type="text" class="form-control" name="code[]" name="code_1"><br>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label>Module Title:</label>
						<div class="form-group module_">
						  <input type="text" class="form-control" name="module_title_1"><br>
						</div>
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<label>Credit:</label>
						<div class="form-group credit_">
						  <input type="text" class="form-control" name="credit_1"><br>
						</div>
					</div>
				</div>
				
				<div class="col-md-3">
					<div class="form-group">
						<label></label><br>
						<a class="btn btn-primary addBtnModule">Add another</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-3">
					<div class="form-group">
						<label></label><br>
						<button type="submit" name="sv_modules" class="btn btn-primary">Save</button>
					</div>
				</div>
			</div>
			</form>-->
<!-- jQuery 2.2.0 -->
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- App -->
<script src="dist/js/app.min.js"></script>
<script src="dist/js/ajax.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
	//Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
	//for button which adds new input field in venue management.
	$('.addBtn').click(function(){
		$('.another_input').append('<input type="text" class="form-control" name="venue[]"><br>');
	});
	var n=1;
	//for button which adds new input field in subjects catalogue.
	$('.addBtnModule').click(function(){
		n++;
		$('.code_').append('<input type="text" class="form-control" name="code[]" name="code_'+n+'"><br>');
		$('.module_').append('<input type="text" class="form-control" name="module_title_'+n+'"><br>');
		$('.credit_').append('<input type="text" class="form-control" name="credit_'+n+'"><br>');
	});
  });
</script>
</body>
</html>