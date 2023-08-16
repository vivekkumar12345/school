<?php
session_start();
include 'connection.php';
$user_id = $_GET['teacher_email'];

$sql = "SELECT * from teacher where teacher_email = '".$user_id."' ";
	$query = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($query);
	if ($row) {
		$_SESSION['user_type'] = 'Teacher';
		$_SESSION['teacher_email'] = $row['teacher_email'];
		$_SESSION['teacher_id'] = $row['teacher_id'];
		$_SESSION['teacher_name'] = $row['teacher_name'];
		$_SESSION['class'] = $row['class'];
		$_SESSION['section'] = $row['section'];
		$_SESSION['school'] = $row['school'];
		$_SESSION['dis'] = 'none';
		if($_GET['id'] == 1){
		?>
		<script type="text/javascript">
			window.location.href = 'attendance.php'
		</script>
		<?php
	}
	elseif($_GET['id'] == 2){
		?>
		<script type="text/javascript">
			window.location.href = 'exam_schedule_teacher_mob.php'
		</script>
		<?php
	}
	elseif($_GET['id'] == 3){
		?>
		<script type="text/javascript">
			window.location.href = 'classwork_teacher_mob.php'
		</script>
		<?php
	}
	elseif($_GET['id'] == 4){
		?>
		<script type="text/javascript">
			window.location.href = 'homework_teacher_mob.php'
		</script>
		<?php
	}
	elseif($_GET['id'] == 5){
		?>
		<script type="text/javascript">
			window.location.href = 'time-table_teacher.php'
		</script>
		<?php
	}
	elseif($_GET['id'] == 6){
		?>
		<script type="text/javascript">
			window.location.href = 'teacher_student_mob.php'
		</script>
		<?php
	}
	elseif($_GET['id'] == 7){
		?>
		<script type="text/javascript">
			window.location.href = 'faculty_student_mob.php'
		</script>
		<?php
	}
		elseif($_GET['id'] == 8){
		?>
		<script type="text/javascript">
			window.location.href = 'issue_student_mob.php'
		</script>
		<?php
	}
}

	else{
		header("location:dashboard.php");
	}
echo 'Hello';
?>