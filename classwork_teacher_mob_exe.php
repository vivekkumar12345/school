<?php

session_start();
include 'connection.php';
$date = date('Y-m-d');
if($_POST['type'] == 'insert'){
$sql = "INSERT into class_home (slot, subject, class_work, cl_hm_date, remarks, by_teacher_id, class, section, school) 
VALUES ('".$_POST['clslot']."', '".$_POST['clsubject']."', '".$_POST['classwork']."', '".$date."', 'H', '".$_POST['clteacherid']."', '".$_POST['clcl']."', '".$_POST['clsec']."', '".$_SESSION['school']."') ";
$query = mysqli_query($con, $sql);
if($query){
	?>
		<script type="text/javascript">
		alert('Successfully Assigned Classwork');
		window.location.href = 'classwork_teacher_mob.php';
		</script>
		<?php
}
else{
	?>
		<script type="text/javascript">
		alert('Failed to Assign Classwork, Please try again later');
		window.location.href = 'classwork_teacher_mob.php';
		</script>
		<?php
}
}
elseif($_POST['type'] == 'edit'){
	$sql = "UPDATE class_home set class_work = '".$_POST['classwork']."' where slot = '".$_POST['clslot']."' and class = '".$_POST['clcl']."'and section = '".$_POST['clsec']."' and cl_hm_date = '$date' ";
	$query = mysqli_query($con, $sql);
	if ($query) {
		?>
		<script type="text/javascript">
		alert('Successfully Edited Classwork');
		window.location.href = 'classwork_teacher_mob.php';
		</script>
		<?php
	}
	else{
		?>
		<script type="text/javascript">
		alert('Failed to Edit Classwork, Please try again later');
		window.location.href = 'classwork_teacher_mob.php';
		</script>
		<?php
	}
}
?>