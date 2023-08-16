<?php
session_start();
include 'connection.php';
$sql = "INSERT into teacher_attendance (`teacher_id`, `date_att`, remarks, `by_admin_id`, alternate_teacher_id) 
VALUES('".$_POST['id']."', '".date('Y-m-d')."','Leave' , '".$_SESSION['admin_id']."', '".$_POST['alt_teacher']."')";
		$query = mysqli_query($con, $sql);
	if ($query) {
	?>
		<script type="text/javascript">
		alert('successfully Changed Attendance status to Absent');
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

?>