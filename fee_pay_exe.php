<?php
session_start();
include 'connection.php';

$sql = "INSERT into fee_paid (`student_id`, `fee_schedule_id`, `amount_paid`, `method_payment`, `txn_id`, `collected_by`) VALUES ('".$_POST['student_id']."', '".$_POST['fee_schedule_id']."', '".$_POST['fees']."', '".$_POST['mode']."', '".$_POST['txn']."', '".$_POST['collected_by']."')";
$query = mysqli_query($con, $sql);

?>