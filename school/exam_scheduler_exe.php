<?php

session_start();
include 'connection.php';

$sql = "INSERT into exams (`exam_name`, `exam_type`) VALUES ('".$_POST['exam_name']."', '".$_POST['exam_type']."')";
$query = mysqli_query($con, $sql);
if ($query) {
		?>
		<script type="text/javascript">
		alert('Successfully Created an Exam');
		window.location.href = 'exam_scheduler.php';
		</script>
		<?php
	}
	else{
		?>
		<script type="text/javascript">
		alert('Unable to Create Exam Please Try Again Later');
		window.location.href = 'exam_scheduler.php';
		</script>
		<?php
	}
?>

?>