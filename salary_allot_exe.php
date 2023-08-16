<?php
session_start();

include 'connection.php';
for ($i=1; $i <= $_POST['ct'] ; $i++) { 
 $sql = "INSERT into teacher_salary (`teacher_id`, `amount`, `month`, `date`, `conf`, `account_number`) VALUES ('".$_POST['teacher_id'.$i]."', '".$_POST['amount'.$i]."', '".$_POST['month']."', '".$_POST['date']."', 'No', '".$_POST['account'.$i]."')";
 	$query = mysqli_query($con, $sql);
}


?>