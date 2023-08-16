<?php
session_start();
include 'connection.php';
$sqls = "SELECT * from fee_allot";
$querys = mysqli_query($con, $sqls);
$mct =1;
for ($i=1; $i <= $_POST['ct']; $i++) {
$sql = "INSERT into fee_allot (`class`, `fees`, `tuition_fee`, `fee2`, `fee3`, `by_admin_id`) VALUES ('".$_POST['class'.$i]."', '".$_POST['final'.$i]."', '".$_POST['tuition'.$i]."', '".$_POST['fee'.$i]."', '".$_POST['fees'.$i]."', '".$_SESSION['admin_id']."')";
	$query = mysqli_query($con, $sql);
	$mct++;
	unset($sql, $query);
}

if($mct>1){
	?>
		<script type="text/javascript">
		alert('Successfully Created/ Edited Fee Structure');
		window.location.href = 'fee_creator.php';
		</script>
		<?php

}
else{
	?>
		<script type="text/javascript">
		alert('Failed Please Try Again ');
		window.location.href = 'fee_creator.php';
		</script>
		<?php
}
?>