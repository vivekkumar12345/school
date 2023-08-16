
<html>
<head>
	<meta name="viewport" content="width=device-width; initial-scale=1.0" >
	<title>School Name</title>
	<link rel="stylesheet" href="css/attendance.css" >
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
<?php
	include 'connection.php';
	session_start();
	include 'student_home_menu_mob.php';
	?>
	<div class="head_login">
		<div class="boxes">
			<table class="tables" cellpadding="0" cellpadding="0">
				<thead class="theads">
					<tr>	
						<td>
							ROLL
						</td>
						
						<td>
							STUDENT NAME
						</td>	
						<td>
							ATTENDANCE
						</td>						
					</tr>
				</thead>
				<tbody class="tbodys">
					<?php
					
					$class = $_SESSION['class'];
					$section = $_SESSION['section'];
					$dates = date('Y-m-d');
					$sql = "SELECT * from students where class='".$class."' and section='".$section."' ";
					$query = mysqli_query($con, $sql);
					while($row=mysqli_fetch_assoc($query)){

					?>
					<tr>
					
						<td><?php echo $row['student_id']; ?></td>
						<td><?php echo $row['student_name']; ?></td>
						<td>
							
						<?php
					
						$sql1 = "SELECT * from student_attendance where student_id='".$row['student_id']."' and date_att = '".$dates."' ";
						$query1 = mysqli_query($con, $sql1);
						$row1 = mysqli_fetch_assoc($query1);
						if($row1){
						?>
						<label class="switch">
						  <input type="checkbox" name="type" value="<?php echo $row['student_id']; ?>" >
						  <span class="slider round"></span>
						</label>
						  
						<?php
						}
						else {
						?>
						 <label class="switch">
						  <input type="checkbox" name="type" value="<?php echo $row['student_id']; ?>" checked>
						<span class="slider round"></span>
						</label>
						<?php
							}
						?>
						
					</td>
					</tr>
					<?php
				}
					?>
					<tr><td  colspan="5"><button onclick="submit()">Submit Attendance</button></td></tr>
				</tbody>
			</table>
			
		</div>
	</div>



	<script>
		function submit(){
			var a =[];
			var checkboxes = document.getElementsByName('type');
			for (var i = 0; i < checkboxes.length; i++) {
				if(checkboxes[i].checked == false){
				a.push(checkboxes[i].value);
			}
				}

				if(a.length > 0){
				location.href = "attendance_exe.php?users=" + a;
			}
			else{
				location.href = "attendance_exe.php?map=1";
			}
			}
	</script>