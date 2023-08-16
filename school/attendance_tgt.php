
<?php
session_start();
include 'connection.php';
$date = date('Y-m-d');
$ct = 0;
$sql = "SELECT * from student_attendance where class='".$_SESSION['class']."' and section='".$_SESSION['section']."' and date_att = '".$date."'";
$query = mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($query)){
	$ct++;

}

if($ct<1){
header('location:attendance.php');
}
else{
	
	?>

<html>
<head>
	<meta name="viewport" content="width=device-width; initial-scale=1.0" >
	<title>School Name</title>
	<script src="js/chart.js"></script>
	<link rel="stylesheet" href="css/dashboard_student.css" >
	<link rel="stylesheet" href="css/attendance.css" >
</head>
<body>
	<div class="popup">
		<table width="100%" class="tbodys">
			<tr>
				<td colspan="2" style="text-align: center; height: 25vh; background: transparent;">Attendance already taken for Today
					<br>Click Continue to Re-enter attendance</td>
			</tr>
			<tr>
				<td style="text-align: center; background: transparent;"><button onclick="location.href='attendance.php'">Continue to Attendance</button></td>
				<td style="text-align: center; background: transparent;"><button onclick="location.href='dashboard_teacher.php'">Back to Dashboard</button></td>
			</tr>
		</table>
		
	</div>
</body>
</html>
<?php
}
?>