<?php
session_start();

include 'connection.php';

$sql = "SELECT count(month) from teacher_salary where month = '".$_POST['month']."' ";

$query = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($query);

if (isset($row)) {
	$output['history'] = "Success";
}
else{
	$output['history'] = "Failure";
}
echo json_encode($output);
?>