<?php
session_start();
include 'connection.php';
$dob = date('Y-m-d', strtotime($_POST['stdob']));
	$doj = date('Y-m-d');
	$i = 0;
	$sqls = "SELECT * from students where student_name = '".$_POST['stname']."' and dob = '$dob' and aadhar = '".$_POST['staadhar']."'";
	$querys = mysqli_query($con, $sqls);
	
	while($rows = mysqli_fetch_assoc($querys)){
		$i++;
	}
	if($i>0){
			?>
		<script type="text/javascript">
		alert('Student with Similar Details Already Exist. Details not Entered in database');
		window.location.href = 'poups_student_container.php';
		</script>
		<?php
	}
	else{
	

	$sql = "INSERT into students (`student_name`, `dob`, `doj`, `father_name`, `mother_name`, `mob_no`, `mob_no2`, `address`, `home_address`, `class`, `section`, `school`, `age`, `password`, `email`, `aadhar`, `pan`) VALUES ('".$_POST['stname']."', '$dob', '$doj', '".$_POST['stfather']."', '".$_POST['stmother']."', '".$_POST['stcontact']."', '".$_POST['stalternate']."','".$_POST['stpaddress']."', '".$_POST['sthaddress']."', '".$_POST['stclass']."', '".$_POST['stsection']."', '".$_SESSION['school']."', '8', '".$_POST['stpwd']."', '".$_POST['stemail']."', '".$_POST['staadhar']."', '".$_POST['stpan']."') ";

	$query = mysqli_query($con, $sql);
	$lastid = mysqli_insert_id($con);
	$filename = $_FILES['stphoto']['name'];
	$ext = pathinfo($filename, PATHINFO_EXTENSION);
	$tempname = $lastid.'.'.$ext;
	$folder = "images/profile/".$tempname;
	$source = $_FILES['stphoto']['tmp_name'];
	$upload = copy($source, $folder);
	if ($upload) {
		$sqlwwew = "UPDATE students set student_photo = '".$tempname."' ";
		$querywwew = mysqli_query($con, $sqlwwew);
	if ($query) {
		?>
		<script type="text/javascript">
		alert('Successfully Inserted Student Details for <?php echo $source; ?>');
		window.location.href = 'poups_student_container.php';
		</script>
		<?php
	}
	else{
		?>
		<script type="text/javascript">
		alert('Unable to Insert Student Details, Please try again');
		window.location.href = 'poups_student_container.php';
		</script>
		<?php
	}
}
else{
	?>
		<script type="text/javascript">
		alert('Unable to Upload Photo Please Upload Again for <?php echo $source; ?>');
		window.location.href = 'poups_student_container.php';
		</script>
		<?php
}
}
?>