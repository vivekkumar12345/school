<html>
<head>
	<meta name="viewport" content="width=device-width; initial-scale=1.0" >
	<title>School Name</title>
	<script src="js/chart.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com"> 
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="css/dashboard_admin.css" >
<link rel="stylesheet" href="css/popups.css" >
</head>
<body onload="dis()">
<?php
	session_start();
include 'dashboard_admin_left.php';

?>
		<div class="body-bottom-right">



			<div class="right-head">

				<div style="float: left; height: 80%; width:12%; margin-top: 1.5%; margin-left: 2.5%; text-align: center; font-size: 2vh">
					Total Students <br>
					<a style="font-size: 3vh; font-weight:bolder;"><?php 
						include 'connection.php';
						$sql1 = "SELECT count(student_id) as ct from students";
						$query1 = mysqli_query($con, $sql1);  
						$row1 = mysqli_fetch_assoc($query1);
						echo $row1['ct'];
					?>
				</a>
				</div>
				<div style="float: left; height: 80%; width:8%; margin-top: 1.5%; margin-left: 2.5%; text-align: center; font-size: 2vh; border-right: .2vh solid lightgray;">
					<a><i class="fas fa-eye" style="font-size:4vh; line-height: 7vh; float:left;" onclick="location.href='poups_student_container.php'"></i></a>
				</div>


				<div style="float: left; height: 80%; width:12%; margin-top: 1.5%; margin-left: 2.5%; text-align: center; font-size: 2vh">
					Total Teachers <br>
					<a style="font-size: 3vh; font-weight:bolder;"><?php 
						include 'connection.php';
						$sql2 = "SELECT count(teacher_id) as ct from teacher";
						$query2 = mysqli_query($con, $sql2);  
						$row2 = mysqli_fetch_assoc($query2);
						echo $row2['ct'];
					?>
				</a>
				</div>
				<div style="float: left; height: 80%; width:8%; margin-top: 1.5%; margin-left: 2.5%; text-align: center; font-size: 2vh; border-right: .2vh solid lightgray;">
					<a><i class="fas fa-eye" style="font-size:4vh; line-height: 7vh; float:left;" onclick="location.href='poups_teacher_container.php'"></i></a>
				</div>

			</div>

<!----- Head Finishes Here
Display shows here    --->

<div style="height: 60vh; width:90%; margin-left: 3%; border-radius: 2vh; margin-top: 4vh;  background-color: black;">
	<?php
include 'connection.php';
$sql = "SELECT * from class_section";

$query2 = mysqli_query($con, $sql);
?><table style="width:40%; margin-left:auto; margin-right:auto;"> <tr>

		<td>
					<label style="float:left;">Class</label><br>
					<select type="text" id="stclass" class="tbl-input" name="stclass" onchange="texter()" style="width:80%" required>
						<?php
						$query = mysqli_query($con, $sql);
						if(isset($_GET['class_ttbl'])){
							?>
						<option value="<?php echo $_GET['class_ttbl']; ?>"><?php echo $_GET['class_ttbl']; ?></option>
						<?php 
					}
						else{
								?>
								<?php
						}
						while($row = mysqli_fetch_assoc($query)){
							?>
						<option value="<?php echo $row['class']; ?>"><?php echo $row['class']; ?></option>
						<?php
					}
						unset($row, $query);
						?>
						</select>
						</td>
				<td>
					<label style="float:left;">Section</label><br>
					<select id="stsection" type="text" class="tbl-input" name="stsection" style="width:80%" onchange="texter()" required>
						<?php
						if(isset($_GET['class_ttbl'])){
							?>
						<option value="<?php echo $_GET['section_ttbl']; ?>"><?php echo $_GET['section_ttbl']; ?></option>
						<?php 
							}
						else{
								?>
								<?php
						}
						while($row2 = mysqli_fetch_assoc($query2)){
							if($row2['section'] != ""){
							?>
						<option value="<?php echo $row2['section']; ?>"><?php echo $row2['section']; ?></option>
						<?php
					}
				}
						?>
						</select></td>
	</tr></table>

<?php 
include 'time_table_admin.php';
 ?>
</div>

<div style=" float:left; height: 15vh; margin-top: 4vh; width:20%; margin-left:3%; border-radius:2vh; 
background: linear-gradient(to right, #2193b0, #6dd5ed); box-shadow: 0 0 2vh rgba(0, 0, 0, 0.2); color: white; text-align:center;">
<a style="line-height: 8vh; font-family:'Oswald', sans-serif; font-size: 2vh;">Schedule Exams</a>
<br>
<button class="submits" onclick="location.href='exam_scheduler.php'" style="width:70%; height:4vh;">Click to Schedule</button>
	
</div>
<div style="float:left; height: 15vh; margin-top: 4vh; width:20%; margin-left:3%; border-radius:2vh; 
background-image: linear-gradient(to right, #DA22FF 0%, #9733EE  100%); box-shadow: 0 0 2vh rgba(0, 0, 0, 0.2); color: white; text-align:center;">
<a style="line-height: 8vh; font-family:'Oswald', sans-serif; font-size: 2vh;">Student's Attendance</a>
<br>
<button class="submits" onclick="location.href='view_attendance_admin.php'" style="width:70%; height:4vh;">View Attendance</button>
	
</div>
<div style="float:left; height: 15vh; margin-top: 4vh; width:20%; margin-left:3%; border-radius:2vh; 
  background-image: linear-gradient(to right, #2b5876 0%, #4e4376  100%); box-shadow: 0 0 2vh rgba(0, 0, 0, 0.2); color: white; text-align:center;">
<a style="line-height: 8vh; font-family:'Oswald', sans-serif; font-size: 2vh;">Staff's Attendance</a>
<br>
<button class="submits" onclick="location.href='view_attendanceteacher_admin.php'" style="width:70%; height:4vh;">View Attendance</button>
	
</div>


	
		</div>

<?php
include 'login_btn.php';
?>

<script type="text/javascript">
	function texter(){
		var a = document.getElementById('stclass').value;
		var b = document.getElementById('stsection').value;

		window.location.href = "admin_school.php?class_ttbl=" + a + "&section_ttbl=" +b;
	} 
	function dis(){
		document.getElementById('school').style.backgroundColor = 'black';
		document.getElementById('school').style.color = 'white';
	}
</script>

</body>
