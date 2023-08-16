<html>
<head>
	<meta name="viewport" content="width=device-width; initial-scale=1.0" >
	<title>School Name</title>
	<script src="js/chart.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="css/classwork_student.css" >
</head>
<body>
<?php
	include 'student_home_menu_mob.php';
	?>
<div class="head">
	
</div>
<div class="scroll-date-container">
	<div class="scroll-date">
		<?php
		session_start();
			$date = date('Y-m-d');
			for ($i = 0; $i<90; $i++){
				?>
				<div style = 'width:80px; margin-right: 10px; margin-left: 10px; height: 4vh; text-align:center; font-family: arial; font-size:1.8vh; border-radius: 1vh; border:.3vh inset black;' 
				onclick="location.href='classwork_student_mob.php?date=<?php echo $date; ?>'">
				<span><?php echo date('d', strtotime($date)); ?></span> <span style='color:gray;'><?php echo date('M', strtotime($date)) ?></span></div>
				<?php
				$date = date('d M', strtotime('-1 days', strtotime($date)));
			}
			
		?>
</div>
</div>
<?php

echo "<div class='event-container'>";

		echo "<div class='event-container-left'>";
			if(isset($_GET['date'])){
				echo "<span>".date('d', strtotime($_GET['date']))."</span>";
				echo "<span style='font-size:2vh;'>".date('M', strtotime($_GET['date']))."</span>";
			}
			else{
				echo "<span>".date('d', strtotime(date('Y-m-d')))."</span>";
				echo "<span style='font-size:2vh;'>".date('M', strtotime(date('Y-m-d')))."</span>";
			}

			echo "</div>";
			?>
			<div class="event-container-right" style="font-family: monospace;">
				<?php
				include 'connection.php';
				if(isset($_GET['date'])){
				$dm = date('Y-m-d', strtotime($_GET['date']));
			}
			else{
				$dm = date('Y-m-d');
			}
				$sql = "SELECT * from class_home where class='".$_SESSION['class']."' and section='".$_SESSION['section']."' and cl_hm_date = '$dm'";
				$query = mysqli_query($con, $sql);
				while($row =mysqli_fetch_assoc($query)){
					?>
					<a style="text-decoration: underline; font-weight: bold;"><?php echo $row['subject']; ?></a>
					<a><?php echo $row['slot']; ?></a><br>
					<a><?php echo $row['home_work']; ?></a>
					<a style="color:red;">(<?php echo $row['remarks']; ?>)</a>
					<hr style="background-color:lightgrey; border: none; height: .15vh;">
				<?php
			}
				?>
			</div>
			</div>

	</body>
	</html>
