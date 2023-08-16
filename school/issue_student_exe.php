<?php

session_start();

include 'connection.php';

if($_SESSION['user_type'] == 'Teacher'){
	$id = $_SESSION['teacher_id'];
	$nature = "Teacher";
}
else{
	$id = $_SESSION['student_id'];
	$nature = "Student";
}

$sql = "INSERT into complaint (type, against, brief, comp_by_id, date_comp, nature_compainant) VALUES ('".$_POST['type']."', '".$_POST['against']."', '".$_POST['brief']."', '".$id."', '".date('Y-m-d')."', '".$nature."')";
	$query = mysqli_query($con, $sql);

	if($query){
		?>
		<script type="text/javascript">
		alert('successfully filed complaint');
		window.location.href = 'issue_student_mob.php';
		</script>
		<?php
	}

	else{

		?>
		<script type="text/javascript">
		alert('Failed to File complaint');
		window.location.href = 'issue_student_mob.php';
		</script>
		<?php
	}

?>

