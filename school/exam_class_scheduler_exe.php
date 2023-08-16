<?php

session_start();
include 'connection.php';

$sqlc = "DELETE from exam_scheduler where exam_id = '".$_POST['examtbl']."' and class = '".$_POST['classtbl']."' ";
$queryc= mysqli_query($con, $sqlc);
if($queryc){
	$check = 'work';
for($i = 0; $i< $_POST['ct']; $i++){
$date = date('Y-m-d', strtotime($_POST['dates'.$i]));
$sql = "INSERT into exam_scheduler (`exam_id`, `class`, `subject`, `exam_date`) VALUES ('".$_POST['examtbl']."', '".$_POST['classtbl']."', '".$_POST['subjects'.$i]."', '$date')";
$query = mysqli_query($con, $sql);
if($query){

}
else{
	$check = 'not';
}
unset($query);
}
if($check == 'work'){
	?>
		<script type="text/javascript">
		alert('Successfully Inserted/ Updated Exam Schedule');
		window.location.href = 'exam_scheduler.php';
		</script>
		<?php
}
else{
	?>
		<script type="text/javascript">
		alert('Some Data is not Inserted well Please try again');
		window.location.href = 'exam_scheduler.php';
		</script>
		<?php
}
}
else{
	?>
		<script type="text/javascript">
		alert('Something Wrong Please Try Again');
		window.location.href = 'exam_scheduler.php';
		</script>
		<?php
}
?>
