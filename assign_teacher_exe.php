<?php
session_start();
include 'connection.php';
$sqlc = "SELECT * from teacher_class where teacher_id = '".$_POST['stteacher_id']."' and class = '".$_POST['stclass1']."' and section = '".$_POST['stsection1']."' and appt_type = '".$_POST['stappt1']."' and subject = '".$_POST['stsubject1']."' and session = '2023-2024'";
$queryc = mysqli_query($con, $sqlc);
$i = 0;
while($rowc = mysqli_fetch_assoc($queryc)){
$i++;
}
if ($i > 0){
?>
		<script type="text/javascript">
		alert('Already Assigned Class with Same Credantials Please Assign with Different Credantials');
		window.location.href = 'assign_class.php?teacher_idpop=<?php echo $_POST['stteacher_id']; ?>';
		</script>
		<?php
}
else{

$sqlc1 = "SELECT * from teacher_class where class = '".$_POST['stclass1']."' and section = '".$_POST['stsection1']."' and appt_type = '".$_POST['stappt1']."' and session = '2023-2024'";
$queryc1 = mysqli_query($con, $sqlc1);
$j = 0;
while($rowc1 = mysqli_fetch_assoc($queryc1)){
	$ss1 = "SELECT * from teacher where teacher_id = '".$rowc1['teacher_id']."' ";
	$qq1 = mysqli_query($con, $ss1);
	while($rr1 = mysqli_fetch_assoc($qq1)){
	$name = $rr1['teacher_name'];
}
$j++;
}
if ($j > 0){
?>
		<script type="text/javascript">
		alert('<?php echo $name; ?> is already the class teaher of same class. two teacher cannt be the class teacher of same class');
		window.location.href = 'assign_class.php?teacher_idpop=<?php echo $_POST['stteacher_id']; ?>';
		</script>
		<?php
}
else{

	$sql = "INSERT into teacher_class (`teacher_id`, `class`, `section`, `appt_type`, `subject`, `session`, `school`) VALUES ('".$_POST['stteacher_id']."', '".$_POST['stclass1']."', '".$_POST['stsection1']."', '".$_POST['stappt1']."', '".$_POST['stsubject1']."', '2023-2024', 'Kendriya Vidyalaya') ";

	$query = mysqli_query($con, $sql);
	if ($query) {
		?>
		<script type="text/javascript">
		alert('Successfully Assigned Class to the Teacher');
		window.location.href = 'assign_class.php?teacher_idpop=<?php echo $_POST['stteacher_id']; ?>';
		</script>
		<?php
	}
	else{
		?>
		<script type="text/javascript">
		alert('Unable to Assign Class to the Teacher Please Try Again Later');
		window.location.href = 'assign_class.php?teacher_idpop=<?php echo $_POST['stteacher_id']; ?>';
		</script>
		<?php
	}
}
}
?>