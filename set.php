<?php
session_start();
include 'connection.php';
$user_id = $_GET['student_id'];

$sql = "SELECT * from students where student_id = '1' ";
	$query = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($query);
	if ($row) {
		$_SESSION['school'] = $rows2['school_name'];
		$_SESSION['user_type'] = 'Student';
		$_SESSION['student_id'] = $row['student_id'];
		$_SESSION['student_name'] = $row['student_name'];
		$_SESSION['class'] = $row['class'];
		$_SESSION['section'] = $row['section'];
		$_SESSION['school'] = $row['school'];
		$_SESSION['dis'] = 'none';
		if($_GET['id'] == 1){
		?>
		<script type="text/javascript">
			window.location.href = 'attendance_student_mob.php'
		</script>
		<?php
	}
	elseif($_GET['id'] == 2){
		?>
		<script type="text/javascript">
			window.location.href = 'exam_schedule_student_mob.php'
		</script>
		<?php
	}
	elseif($_GET['id'] == 3){
		?>
		<script type="text/javascript">
			window.location.href = 'classwork_student_mob.php'
		</script>
		<?php
	}
	elseif($_GET['id'] == 4){
		?>
		<script type="text/javascript">
			window.location.href = 'homework_student_mob.php';
		</script>
		<?php
	}
	elseif($_GET['id'] == 5){
		?>
		<script type="text/javascript">
			window.location.href = 'time-table_student.php';
		</script>
		<?php
	}
	elseif($_GET['id'] == 6){
		?>
		<script type="text/javascript">
			window.location.href = 'teacher_student_mob.php';
		</script>
		<?php
	}
	elseif($_GET['id'] == 7){
		?>
		<script type="text/javascript">
			window.location.href = 'faculty_student_mob.php';
		</script>
		<?php
	}
		elseif($_GET['id'] == 8){
		?>
		<script type="text/javascript">
			window.location.href = 'issue_student_mob.php';
		</script>
		<?php
	}
	elseif($_GET['id'] == 9){
		?>
		<script type="text/javascript">
			window.location.href = 'fee_list_student.php';
		</script>
		<?php
	}
	elseif($_GET['id'] == 10){
		?>
		<script type="text/javascript">
			window.location.href = 'fee_history_student.php';
		</script>
		<?php
	}
}

	else{
		header("location:dashboard.php");
	}
echo 'Hello';
?>