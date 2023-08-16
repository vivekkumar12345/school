<html>
<head>
	<meta name="viewport" content="width=device-width; initial-scale=1.0" >
	<title>School Name</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="css/issue_student.css">
</head>
<body>
<?php
	include 'student_home_menu_mob.php';
	?>
<div class="scroll-date-container">
	<div class="scroll-date" style="align-content: center;">
		<?php
		session_start();
			 $days = array("Mon", "Tue", "Wed", "Thu", "Fri", "Sat");
			 for($i=0; $i<6; $i++){
		?>

			<div style = 'width:45px; margin-right: 8px; margin-left: 10px; height: 4vh; text-align:center; font-family: arial; font-size:1.8vh; border-radius: 1vh; border:.3vh inset black; background-color: black; color: white; font-weight: bold;' onclick="location.href='time-table_teacher.php?day=<?php echo $days[$i]; ?>'"><?php echo $days[$i]; ?></div>
			<?php
			}
			?>

	</div>
</div>
<div style="width:100%; height: 82vh; overflow-x:scroll;">
	<?php
		if(isset($_GET['day'])){
			$dim = $_GET['day'];
		}
		else{
			$dim = date('D', strtotime(date('d-m-Y')));
		}
		$daym = 'Sunday';
		switch ($dim) {
			case 'Mon':
				$daym = 'Monday';
				break;
			case 'Tue' :
				$daym = 'Tuesday';
				break;
			case 'Wed':
				$daym = 'Wednesday';
				break;
			case 'Thu' :
				$daym = 'Thursday';
				break;
			case 'Fri' :
				$daym = 'Friday';
				break;	
			case 'Sat' :
				$daym = 'Saturday';
				break;
			default:
				$daym = 'Sunday';
				break;
		}
	?>
	<?php
	include 'connection.php';
	$sql = "SELECT * from schedule where by_teacher_id = '".$_SESSION['teacher_id']."' and day = '$daym' order by slot ASC";
	$query = mysqli_query($con, $sql);
	while ($row = mysqli_fetch_assoc($query)) {
			?>
			<?php
				$sql2 = "SELECT * from slots where slot_id = '".$row['slot']."'";
				$query2 = mysqli_query($con, $sql2);
				$row2 = mysqli_fetch_assoc($query2);
				?>
			<div class="slates" style="background-color: #E0FFFF; font-family:monospace; padding-left: 5%; padding-top:1vh; font-size:2vh; line-height: 3.7vh;"><span style="font-weight : bold;">Slot : <?php echo $row2['slot'].' ('.$daym.')'; ?></span><br>

				
		Subject : <?php echo $row['subject']; ?><br>
		Class : <?php echo $row['class'].' '.$row['section']; ?><br>
		</div>
			<?php
	}
	?>

	</div>
</body>
</html>