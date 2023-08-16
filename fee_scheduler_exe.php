<?php 
session_start();
include 'connection.php';
$mct = 1;
$sqls = "SELECT * from fee_schedule where month = '".$_POST['month']."'";
$querys = mysqli_query($con, $sqls);
$rows = mysqli_fetch_assoc($querys);
if ($rows) {
		?>
	<script type="text/javascript">
		alert('Exam for this Month is Already Scheduled Please Check');
		window.location.href = 'fee_scheduler.php';
		</script>
	<?php
}
else{
	$sqls = "SELECT max(student_id) as max from students";
	$querys = mysqli_query($con, $sqls);
	$rows = mysqli_fetch_assoc($querys);
$sql = "SELECT * from fee_allot";
$query = mysqli_query($con, $sql);
while($row = mysqli_fetch_assoc($query)){
	$sql2 = "INSERT into fee_schedule (`month`, `freq_fees`, `last_date`, `fees`, `class`, `by_admin_id`, `last_student_id`, `tuition_fee`, `fee2`, `fee3`, `fee4`) 
	VALUES ('".$_POST['month']."', '".$_POST['frequency']."', '".$_POST['lastdate']."', '".$row['fees']."', '".$row['class']."', '".$_SESSION['admin_id']."', '".$rows['max']."', '".$row['tuition_fee']."', '".$row['fee2']."', '".$row['fee3']."', '".$row['fee4']."') ";
	$query2 = mysqli_query($con, $sql2);

	if ($query2) {
		$mct++;
	}
	unset($query2, $sql2);
}
if ($mct >1) {
	?>
	<script type="text/javascript">
		alert('Successfully Scheduled Fees');
		window.location.href = 'fee_scheduler.php';
		</script>
	<?php
}
else{
	?>
	<script type="text/javascript">
		alert('Failed to Assign Fees, Please try again');
		window.location.href = 'fee_scheduler.php';
		</script>
	<?php
}
	// code...
}


?>