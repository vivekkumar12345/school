<html>
<head>
	<meta name="viewport" content="width=device-width; initial-scale=1.0" >
	<title>School Name</title>
	<script src="js/chart.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="css/issue_student.css" >
</head>
<body>
	<?php
	include 'student_home_menu_mob.php';
	?>
<div class="head">
	<form action="issue_student_exe.php" method="POST">
	<table style="width: 90%; height: 55%; margin-left: 5%; padding-top: 2vh;">
			<tr >
				<td>Complaint Type</td>
			</tr>
			<tr >
				<td> <select class="selects" name="type">
					<option value="Financial">Financial</option>
					<option value="Curriculum">Curriculum</option>
					<option value="Others">Others</option>
				</select> </td>
			</tr>
			
			<tr >
				<td>Against</td>
			</tr>
			<tr >
				<td> <input class="inputs" name="against" type="text" placeholder="Please Enter Name/ Appointment"></td>
			</tr>

			<tr >
				<td>Brief of The Complaint/ Issue</td>
			</tr>
			<tr >
				<td> <textarea name="brief" rows="8" type="text" placeholder="Please Enter Brief of the Complaint"></textarea></td>
			</tr>
			<tr >
				<td><input type="submit" class="submits" value="Submit Complaint"></td>
			</tr>
	</table>
	</form>
</div>
</body>
</html>