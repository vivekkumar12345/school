<?php
session_start();
include 'connection.php';
if($_GET['tgt'] == 'Present'){
	$ss1 = "SELECT * from students where student_id = '".$_GET['id']."'";
	$qq1 = mysqli_query($con, $ss1);
	$rr1 = mysqli_fetch_assoc($qq1);
	$sql = "INSERT into student_attendance (`student_id`, `class`, `section`, `date_att`, `att_admin_id`) VALUES('".$_GET['id']."', '".$rr1['class']."', '".$rr1['section']."', '".date('Y-m-d')."', '".$_SESSION['admin_id']."')";
		$query = mysqli_query($con, $sql);
	if ($query) {
	?>
		<script type="text/javascript">
		alert('successfully Change Attendance status to Absent');
		window.location.href = 'view_attendance_admin.php';
		</script>
		<?php
}
else{
	?>
		<script type="text/javascript">
		alert('Failed to Change Status please try again');
		window.location.href = 'view_attendance_admin.php';
		</script>
		<?php
}
}
else{
	$sql = "DELETE from student_attendance where student_id = '".$_GET['id']."' and date_att='".date('Y-m-d')."' ";
	$query =mysqli_query($con, $sql);
	if ($query) {
		?>
		<script type="text/javascript">
		alert('successfully Change Attendance status to Present');
		window.location.href = 'view_attendance_admin.php';
		</script>
		<?php
	}
	else{
		?>
		<script type="text/javascript">
		alert('Failed to Change Status please try again');
		window.location.href = 'view_attendance_admin.php';
		</script>
		<?php
	}
}
?>