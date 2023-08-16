<?php
session_start();
include 'connection.php';
	$dob = date('Y-m-d', strtotime($_POST['stdob']));
	$sql = "UPDATE students SET `student_name` = '".$_POST['stname']."', `dob` = '$dob', `father_name` = '".$_POST['stfather']."', `mother_name` = '".$_POST['stmother']."', `mob_no` = '".$_POST['stcontact']."', `mob_no2` = '".$_POST['stalternate']."', `address` = '".$_POST['stpaddress']."', `home_address` = '".$_POST['sthaddress']."', `class` = '".$_POST['stclass']."', `section` = '".$_POST['stsection']."', `school` = '".$_SESSION['school']."', `age` = '8', `password` = '".$_POST['stpwd']."', `email` = '".$_POST['stemail']."', `aadhar` = '".$_POST['staadhar']."', `pan` = '".$_POST['stpan']."', `status` = '".$_POST['ststatus']."' where student_id = '".$_POST['student_id']."' ";
	$query = mysqli_query($con, $sql);
	if ($query) {
		?>
		<script type="text/javascript">
		alert('Successfully Updated Student Details');
		window.location.href = 'poups_student_container.php';
		</script>
		<?php
	}
	else{
		?>
		<script type="text/javascript">
		alert('Failed to Update Student Details, Please try again later');
		window.location.href = 'poups_student_container.php';
		</script>
		<?php
	}
?>