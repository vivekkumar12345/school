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
<body>
<?php
	session_start();
include 'dashboard_admin_left.php';
include 'connection.php';
$sql = "SELECT * from class_section";

$query2 = mysqli_query($con, $sql);

$sql4 = "SELECT * from subject";
$query4 = mysqli_query($con, $sql4);

?>

<div class="popup" id="popups1">
	
	<div class="popup-tbl-container">
		<button class="btnsp" onclick="location.href='poups_teacher_container.php'" style="background-color:red; margin-right: 2%;"><i class="fas fa-close" aria-hidden= 'false'></i>
			</button>
		<div style="height:5vh; max-width:100%; line-height:5vh;">
		</div>
				<table class="tbl" cellpadding="0" cellspacing="0">
			<thead class="tblhead">
				<td style="border-bottom-left-radius: 1vh;">Class</td>
				<td>Section</td>
				<td>Appointment Type</td>
				<td>Subject</td>
				<td>Session</td>
		</thead>
		<tbody>
			<?php
			$appt_type = 'none';
			session_start();
			include 'connection.php';
			$sqls1 = "SELECT * from teacher_class where teacher_id = '".$_GET['teacher_idpop']."' ";
			$querys1 = mysqli_query($con, $sqls1);
			while($rows1 = mysqli_fetch_assoc($querys1)){
				if($rows1['appt_type']== 'Class Teacher'){
					$appt_type = 'Class Teacher';
				}
				else{
					
				}
				?>
					<tr>
				<td style="border-bottom-left-radius: 1vh; border-top-left-radius: 1vh;" ><?php echo $rows1['class'] ?></td>
				<td><?php echo $rows1['section']; ?></td>
				<td><?php echo $rows1['appt_type']; ?></td>
				<td><?php echo $rows1['subject']; ?></td>
				<td><?php echo $rows1['session']; ?></td>
				<?php
			}

			?>
		</tbody>
			
		</table>

		<div style="height:5vh; max-width:100%; line-height:5vh;">
		</div>
		<form action="assign_teacher_exe.php" method="POST">

		<table class="tbl1" cellpadding="0" cellspacing="0" id="tbl1" style="width: 90%; margin-left:8%;">
			<tr>
				<td colspan="4" style="height: 5vh; font-size:3.5vh; font-weight:bolder; font-family: 'Oswald', sans-serif;">ASSIGN CLASS</td>
			</tr>
				<tr>
				<td colspan="4" style="height:3vh;"> <input type="hidden" name="stteacher_id" value="<?php echo $_GET['teacher_idpop']; ?>"></td>
			</tr>
			<tr>
				
				<td>
					<label style="float:left;">Class</label><br>
					<select type="text" class="tbl-input" name="stclass1" style="width:80%" required>
						<?php
						$query = mysqli_query($con, $sql);
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
					<select type="text" class="tbl-input" name="stsection1" style="width:80%" required>
						<?php

						while($row2 = mysqli_fetch_assoc($query2)){
							if($row2['section'] != ""){
							?>
						<option value="<?php echo $row2['section']; ?>"><?php echo $row2['section']; ?></option>
						<?php
					}
				}
						?>
						</select></td>
				<td>
					<label style="float:left;">Appointment Type</label><br>
					<select type="text" class="tbl-input" name="stappt1" style="width:80%" required>
						<?php
						$sql3 = "SELECT * from appt_type_teacher where appt_type_teacher != '$appt_type'";
						$query3 = mysqli_query($con, $sql3);
						while($row3 = mysqli_fetch_assoc($query3)){
							
							?>
						<option value="<?php echo $row3['appt_type_teacher']; ?>"><?php echo $row3['appt_type_teacher']; ?></option>
						<?php
					}
						?>
						</select></td>
				<td>
					<label style="float:left;">Subject</label><br>
					<select type="text" class="tbl-input" name="stsubject1" style="width:80%" required>
						<?php

						while($row4 = mysqli_fetch_assoc($query4)){
							
							?>
						<option value="<?php echo $row4['subject']; ?>"><?php echo $row4['subject']; ?></option>
						<?php
					}
						?>
						</select></td>
			</tr>
			<tr>
				<td colspan="4" style="height:3vh;"> </td>
			</tr>
			<tr>
				<td colspan="4"><input type="submit" value="Submit" class="tbl-submit"></td>
			</tr>
		</table>
		
	</form>
	</div>

</body>
</html>