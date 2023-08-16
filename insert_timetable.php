<?php
session_start();
include 'connection.php';

$sql = "DELETE from schedule where class = '".$_POST['stclass']."' and section='".$_POST['stsection']."' ";
$query = mysqli_query($con, $sql);

			$j = 1;
            $sql1 = "SELECT * from slots where slot_type != 'Lunch' ";
			$query1 = mysqli_query($con, $sql1);
			while($row1=mysqli_fetch_assoc($query1)){

$days = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
	for($i=0; $i<7; $i++){
		$subject = $_POST['stsubject'.$j];
		$day = $days[$i];
		if($subject == " "){

		}
		else{

			$sqlt = "SELECT teacher_id from teacher_class where class = '".$_POST['stclass']."' and section = '".$_POST['stsection']."' and subject = '$subject' ";
			$queryt = mysqli_query($con, $sqlt);
			
			if($rowt =mysqli_fetch_assoc($queryt)){
			$sqls = "INSERT into schedule (`day`, `class`, `section`, `school`, `subject`, `by_teacher_id`, `slot`) VALUES ('".$day."', '".$_POST['stclass']."', '".$_POST['stsection']."', '".$_SESSION['school']."', '$subject', '".$rowt['teacher_id']."', '".$row1['slot_id']."') ";
			$querys = mysqli_query($con, $sqls);
			unset($querys, $sqls);
			unset($rowt, $queryt, $sqlt);
	}
	else{
		?>
		<script type="text/javascript">
			alert('Teacher for Subject <?php echo $subject; ?> is not assigned Please assign teacher firstand then add them in schedule');
		</script>
		<?php
	}
}
		$j++;
		if ($j > $_POST['ct']) {
			?>
		<script type="text/javascript">
		alert('Finished Inserting Time Table for Class <?php echo $_POST['stclass'].' '.$_POST['stsection']; ?>');
		window.location.href = 'create_timetable.php?class_ttbl=1&section_ttbl=A';
		</script>

			<?php
		}
	}
}

?>