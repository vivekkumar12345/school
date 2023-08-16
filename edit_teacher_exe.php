<?php
session_start();
include 'connection.php';
	$dob = date('Y-m-d', strtotime($_POST['stdob']));
	$sql = "UPDATE teacher SET `teacher_name` = '".$_POST['stname']."', `teacher_dob` = '$dob', `teacher_mob` = '".$_POST['stcontact']."', `teacher_add` = '".$_POST['staddress']."', `teacher_email` = '".$_POST['stemail']."', `metric` = '".$_POST['stmatric']."', `highschool` = '".$_POST['sthighschool']."', `latest_education` = '".$_POST['stlatestedu']."', `latest_education_fm` = '".$_POST['stlatestedufrom']."', `kin` = '".$_POST['stkin']."', `teacher_join_date` = '$doj', `teacher_password` = '".$_POST['stpwd']."', `school` = 'School Name', `teacher_aadhar` = '".$_POST['staadhar']."', `teacher_pan` = '".$_POST['stpan']."', `status` = '".$_POST['ststatus']."' where teacher_id = '".$_POST['teacher_id']."' ";

	$query = mysqli_query($con, $sql);
	if ($query) {
		?>
		<script type="text/javascript">
		alert('Successfully Updated Teacher Details');
		window.location.href = 'poups_teacher_container.php';
		</script>
		<?php
	}
	else{
		?>
		<script type="text/javascript">
		alert('Unable to Update Teacher Details Please Try Again Later');
		window.location.href = 'poups_teacher_container.php';
		</script>
		<?php
	}
?>