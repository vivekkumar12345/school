<?php
session_start();
include 'connection.php';
	$dob = date('Y-m-d', strtotime($_POST['stdob']));
	$doj = date('Y-m-d', strtotime($_POST['stjoindate']));
	$i = 0;
	$sqls = "SELECT * from teacher where teacher_name = '".$_POST['stname']."' and teacher_dob = '$dob' and teacher_aadhar = '".$_POST['staadhar']."'";
	$querys = mysqli_query($con, $sqls);
	
	while($rows = mysqli_fetch_assoc($querys)){
		$i++;
	}
	if($i>0){
			?>
		<script type="text/javascript">
		alert('Teacher with Similar Details Already Exist. Details not Entered in database');
		window.location.href = 'poups_teacher_container.php';
		</script>
		<?php
	}
	else{
	$sql = "INSERT into teacher (`teacher_name`, `teacher_dob`, `teacher_mob`, `teacher_add`, `teacher_email`, `metric`, `highschool`, `latest_education`, `latest_education_fm`, `kin`, `teacher_join_date`, `teacher_password`, `photo`, `school`, `teacher_aadhar`, `teacher_pan`) VALUES ('".$_POST['stname']."', '$dob', '".$_POST['stcontact']."', '".$_POST['staddress']."', '".$_POST['stemail']."', '".$_POST['stmatric']."','".$_POST['sthighschool']."', '".$_POST['stlatestedu']."', '".$_POST['stlatestedufrom']."', '".$_POST['stkin']."', '$doj', '".$_POST['stpwd']."', '".$_POST['stphoto']."', 'School Name', '".$_POST['staadhar']."', '".$_POST['stpan']."') ";

	$query = mysqli_query($con, $sql);
	$lastid = mysqli_insert_id($con);
	$filename = $_FILES['stphoto']['name'];
	$ext = pathinfo($filename, PATHINFO_EXTENSION);
	$tempname = $lastid.'.'.$ext;
	$folder = "images/teacher/".$tempname;
	$source = $_FILES['stphoto']['tmp_name'];
	$upload = copy($source, $folder);
	if ($upload) {
	
	if ($query) {
		?>
		<script type="text/javascript">
		alert('Successfully Inserted Teacher Details');
		window.location.href = 'poups_teacher_container.php';
		</script>
		<?php
	}
	else{
		?>
		<script type="text/javascript">
		alert('Unable to Insert Teacher Details, Please try again later');
		window.location.href = 'poups_teacher_container.php';
		</script>
		<?php
	}
}
else{
	?>
		<script type="text/javascript">
		alert('Unable to Upload Photo Please Upload Again for <?php echo $source; ?>');
		window.location.href = 'poups_teacher_container.php';
		</script>
		<?php
}
}
?>