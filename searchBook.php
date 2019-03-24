<?php
include("include/student_top.php");
//session_start();
//error_reporting(0);
//echo $_SESSION["username"];
?>
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">USER MANAGEMENT</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="student.php"><i class="fa fa-table"></i> <span>Class Time Table</span> </a></li>
        <li><a href="studentSubjectsCat.php"><i class="fa fa-th"></i> <span>Subjects Catalogue</span> </a></li>
		<!--end of subjects catalog-->
		<li><a href="studentAcademicReport.php"><i class="fa fa-files-o"></i> <span>Academic Reports</span> </a></li>
		<li><a href="diplomaOrbachelor.php"><i class="fa fa-files-o"></i> <span>Payments</span> </a></li>
		<li class="active"><a href="searchBook.php"><i class="fa fa-book"></i> <span>Books</span> </a></li>
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
    <!-- Main content -->
    <section class="content">
<div class="row">
 <div class="col-md-12">
 
<div class="box box-primary" style="padding-left:5%; padding-right:5%;" >
 <div class="box-header with-border">
 <h3 class="box-title" style="margin-left:40%;">Book Searching</h3>
 </div>
   <table id="example1" class="table table-bordered table-striped"  >
               <thead><tr ><th style="width:35%;">BOOK TITLE</th><th>AUTHOR</th><th>CATEGORY</th> <th>TOTAL</th></tr></thead>
			   <tbody>	
				<?php 
             	$conn=mysql_connect("localhost","root","") or die("not connected");
	            $select_db=mysql_select_db('mkombo_university',$conn);
	            $result=mysql_query("SELECT * FROM books") or die(mysql_error());//card_id="$_POST['password']" AND your_full_name="$_POST['username']");
                while($row=mysql_fetch_array($result))
                { 
			    $id=$row['id'];
			    $title=$row['title'];
	 		    $author=$row['author'];
			    $publisher=$row['publisher'];
			    $date=$row['date'];
				$category=$row['category'];
				$total=$row['total'];
			   echo '<tr>';
			   echo '<td>'.$title.'</td><td>'.$author.'</td><td>'.$category.'</td><td>'.$total.'</td>';
			   echo '</tr>';
		      }
           mysql_close($conn);
             
				?>
               </tbody> </table>
				  </div>
				   </div> 
				   </div>  
<?php
include("include/student_bottom.php")
?>