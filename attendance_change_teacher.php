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
<?php
session_start();
include 'connection.php';
if($_GET['tgt'] == 'Present'){

?>
<div class="popup-tbl-container" style="height:40vh; width:40%; margin-left:30%; margin-top: 30vh; border:.2vh solid black;">
	<form action="sub_attendance_change_teacher.php" method="POST">
	<table class="tbl" style="height: 20vh; margin-top: 10vh;">
		<tr style="background-color: rgba( 255, 191, 0, 0.3);">
			<td>Please Select Teacher who will take class in Absence</td>
		</tr>
		<tr>
			<td>
	<select class="tbl-input" name="alt_teacher" style="width: 90%;">
		<?php
		$sql = "SELECT * from teacher where teacher_id != '".$_GET['id']."' ";
		$query = mysqli_query($con, $sql);
		while ($row = mysqli_fetch_assoc($query)) {
			?><option value="<?php echo $row['teacher_id'] ?>"><?php echo $row['teacher_name'] ?></option>
			<?php
		}
		?>

	</select>
	</td>
</tr>
<tr>
	<td>
		<input type="submit" name="submit" class="tbl-submit">
	</td>
</tr>
<input type="hiddens" name="id" value="<?php echo $_GET['id']; ?>">
</table>
</form>
</div>
<?php

	
}
else{
	$sql = "DELETE from teacher_attendance where teacher_id = '".$_GET['id']."' and date_att='".date('Y-m-d')."' ";
	$query =mysqli_query($con, $sql);
	if ($query) {
		?>
		<script type="text/javascript">
		alert('successfully Changed Attendance status to Present');
		window.location.href = 'view_attendanceteacher_admin.php';
		</script>
		<?php
	}
	else{
		?>
		<script type="text/javascript">
		alert('Failed to Change Status please try again');
		window.location.href = 'view_attendanceteacher_admin.php';
		</script>
		<?php
	}
}
?>