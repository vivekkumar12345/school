<html>
<head>
	<meta name="viewport" content="width=device-width; initial-scale=1.0" >
	<title>School Name</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="css/classwork_student.css" >
</head>
<body>
<?php
	include 'student_home_menu_mob.php';
	?>
<div class="scroll-date-container">
	<div class="scroll-date">
		<?php
			session_start();
			$date = date('d M');
			for ($i = 0; $i<90; $i++){
				?>
				<div style = 'width:80px; margin-right: 10px; margin-left: 10px; height: 4vh; text-align:center; font-family: arial; font-size:1.8vh; border-radius: 1vh; border:.3vh inset black;' 
				onclick="location.href='classwork_teacher_mob.php?date=<?php echo $date ?>'">
				<span><?php echo date('d', strtotime($date)); ?></span> <span style='color:gray;'><?php echo date('M', strtotime($date)) ?></span></div>
				<?php
				$date = date('d M', strtotime('-1 days', strtotime($date)));
			}
			
		?>
</div>
</div>
<?php

echo "<div class='event-container' style='height:70vh;'>";

		echo "<div class='event-container-left' style='line-height:77vh;'>";
			if(isset($_GET['date'])){
				$dt = $_GET['date'];
				echo "<span>".date('d', strtotime($_GET['date']))."</span>";
				echo "<span style='font-size:2vh;'>".date('M', strtotime($_GET['date']))."</span>";
			}
			else{
				$dt = date('d M');
				echo "<span>".date('d', strtotime($dt))."</span>";
				echo "<span style='font-size:2vh;'>".date('M', strtotime($dt))."</span>";
			}

			echo "</div>";

			?>
<table style="width: 66%; float: right; height:auto; margin-right:2%;" class="tbs">
	<?php
	include 'connection.php';
	if ($dt == date('d M')) {
		$day = date('l', strtotime($dt));
	}
	else{
		$day = date('l', strtotime($dt));
	}
	$dim = date('Y-m-d', strtotime($dt));
$teacher_id = $_SESSION['teacher_id'];	

$sql11 = "SELECT * from schedule where by_teacher_id = '".$teacher_id."' and day = '".$day."' order by slot ";
$query11 = mysqli_query($con, $sql11);
while($row11 = mysqli_fetch_assoc($query11)){


$sql111 = "SELECT * from slots where slot_id = '".$row11['slot']."' ";
$query111 = mysqli_query($con, $sql111);
$row111 = mysqli_fetch_assoc($query111);

$sql112 = "SELECT * from class_home where slot = '".$row111['slot']."' and class = '".$row11['class']."' and section = '".$row11['section']."' and cl_hm_date = '".date('Y-m-d', strtotime($dt))."' ";
$query112 = mysqli_query($con, $sql112);
$row112 = mysqli_fetch_assoc($query112);
if($row112){

	?>

	<tr><td style="border-color:lightgray;">
		<span style="font-weight: bold;"><?php echo $row111['slot']; ?></span> </td>
		<td style="border:none;">Class : <?php echo $row11['class'].' '.$row11['section']; ?></td>
<?php if (date('Y-m-d', strtotime($dt)) == date('Y-m-d')){

?>
		<td style="border:none;">
	<?php
}
else{

}
?>
</td></tr>
<tr>
	<td colspan="2"><?php echo $row112['class_work']; ?></td>
	<td><i class="far fa-edit" style="color: blue; font-size:2vh; font-weight: bold;" onclick="location.href='classwork_teacher_mob.php?clcl=<?php echo $row11['class']; ?>&clsec=<?php echo $row11['section']; ?>&clslot=<?php echo $row111['slot']; ?>&clteacherid=<?php echo $row11['by_teacher_id'];?>&clsubject=<?php echo $row11['subject'];?>&cltext=<?php echo $row112['class_work']; ?>&type=edit'"></i></td>
</tr>

<?php
}
else{
	?>
	<tr><td>
		<span style="font-weight: bold;"><?php echo $row111['slot']; ?></span> </td><td>Class : <?php echo $row11['class'].' '.$row11['section']; ?></td>
<?php if (date('Y-m-d', strtotime($dt)) == date('Y-m-d')){

?>
		<td><i class="far fa-edit" style="color: blue; font-size:2vh; font-weight: bold;" onclick="location.href='classwork_teacher_mob.php?clcl=<?php echo $row11['class']; ?>&clsec=<?php echo $row11['section']; ?>&clslot=<?php echo $row111['slot']; ?>&clteacherid=<?php echo $row11['by_teacher_id'];?>&clsubject=<?php echo $row11['subject'];?>&cltext=<?php echo '' ?>&type=insert'"></i>
	<?php
}
else{

}
?>
</td></tr>


	<?php

}
}
		?>


</table>
			<?php
			echo "</div>";
?>

<?php
if(isset($_GET['clcl'])){
	?>
<div style="background-color: rgba(0, 160, 190, 0.9);; height:100vh; width:100%; position: fixed; top:0; left:0; transition: all 1s ease-in;">
	<div style="height: 50vh; width: 80%; background-color: black; border-radius:2vh; margin-left: 10%; margin-top:15vh; text-align: center;">
		<form action="classwork_teacher_mob_exe.php" method="POST">
			<div style="height: 5vh;"></div>
			<label style="color: white; font-family:arial;">Enter Classwork details</label>
			<input type="hidden" name="clcl" value="<?php echo $_GET['clcl']; ?>">
			<input type="hidden" name="clsec" value="<?php echo $_GET['clsec']; ?>">
			<input type="hidden" name="clslot" value="<?php echo $_GET['clslot']; ?>">
			<input type="hidden" name="clsubject" value="<?php echo $_GET['clsubject']; ?>">
			<input type="hidden" name="type" value="<?php echo $_GET['type']; ?>">
			<input type="hidden" name="clteacherid" value="<?php echo $_GET['clteacherid']; ?>">
			<textarea rows="10" name="classwork"  style="font-size: 1.8vh; width:90%; margin-top:2vh; margin-bottom: 4vh;" required><?php  echo $_GET['cltext']; ?></textarea>
			<input type="submit" name="submit" value="submit" class="sub-btn">
		</form>
	</div>
</div>
	<?php
}

?>
	</body>
	</html>
