<html>
<head>
	<meta name="viewport" content="width=device-width; initial-scale=1.0" >
	<title>School Name</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="css/issue_student.css">
</head>
<body>
	<?php
	include 'student_home_menu_mob.php';
	?>
	<?php
session_start();
include 'connection.php';
	$sql = "SELECT * from exams where scheduled = 'No' ";
	$query = mysqli_query($con, $sql);
	while($row = mysqli_fetch_assoc($query)){
	?>
<div style="height: 7vh; margin-left: 5%; margin-top: 2vh; width:90%; border-radius: 2vh; background-color: rgba(0, 200, 150, 0.2); font-family: 'Oswald', sans-serif; line-height: 7vh; text-align: center; font-size: 2vh; font-weight: bold; ">
	<?php echo $row['exam_name']; ?>
</div>
<div style="height: 80vh; width: 100%; overflow-y: scroll; text-align:center;">
	<?php
	$sql1 = "SELECT * from exam_scheduler where class = '".$_SESSION['class']."' and exam_id ='".$row['exam_id']."' ";
	$query1 = mysqli_query($con, $sql1);
	while($row1 = mysqli_fetch_assoc($query1)){
	?>
		<div style="height: 6vh; width:90%; margin-left:5%; margin-top:3vh; line-height:6vh; text-align:center; font-family: 'Oswald', sans-serif; border-radius: 2vh; overflow:hidden;">
		<div style="float:left; width: 35%; height:100%; background-color:black; color: white;"> <?php echo date('d-m-Y', strtotime($row1['exam_date'])); ?></div>
		<div style="float:right; width: 65%; height:100%; background-color:rgba(255, 191, 0, 0.2);"><?php echo $row1['subject']; ?></div>
		</div>
	<?php
}


}
?>
</div>
</body>
</html>