<html>
<head>
	<meta name="viewport" content="width=device-width; initial-scale=1.0" >
	<title>School Name</title>
	<script src="js/chart.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="css/faculty_student.css" >
</head>
<body>
	<?php
	include 'student_home_menu_mob.php';
	?>
	<?php
		session_start();
		include 'connection.php';
		$sql = "SELECT * from teacher_class where school = '".$_SESSION['school']."' and class = '".$_SESSION['class']."' and section = '".$_SESSION['section']."' ";
		$query = mysqli_query($con, $sql);
		while($row = mysqli_fetch_assoc($query)){

			$sql1 = "SELECT * from teacher where teacher_id = '".$row['teacher_id']."' ";
			$query1 = mysqli_query($con, $sql1);
			$row1=mysqli_fetch_assoc($query1);
	?>
	<div class="card" style="background-color: rgba(255, 191, 0, 0.2);">
		<div class="card-left" style="background-color: rgba(0,0,0,0.8);">
			<div style="height: 3vh; width:100%;"></div>
			<div class="card-left-img">
				<img src="images/teacher/<?php echo $row['teacher_id']; ?>.jpg">
			</div>
			<div style="height: 2vh; width:100%;"></div>
			<a><?php echo $row['appt_type']; ?></a>
		</div>
		<div style="width:63%; height: 100%; float: right;">
			<table style="width:100%; height:100%; font-family: monospace;">
				<tr>
					<td>Name </td>
					<td>: </td>
					<td><?php echo $row1['teacher_name']; ?></td>
				</tr>
				<tr>
					<td>Subject </td>
					<td>: </td>
					<td><?php echo $row['subject']; ?></td>
				</tr>
				<tr>
					<td>Wkg Since</td>
					<td>: </td>
					<td><?php echo $row1['teacher_join_date']; ?></td>
				</tr>

				<tr>
					<td>Contact No</td>
					<td>: </td>
					<td><?php echo $row1['teacher_mob']; ?></td>
				</tr>
				<tr>
					<td colspan="3">
						<i class="fas fa-star" style="color: gray;"></i>
						<i class="fas fa-star" style="color: gray;"></i>
						<i class="fas fa-star" style="color: gray;"></i>
						<i class="fas fa-star" style="color: gray;"></i>
						<i class="fas fa-star" style="color: gray;"></i></td>
					
				</tr>

				
			</table>
		</div>
	</div>

	<?php
}
	?>

</body>
</html>