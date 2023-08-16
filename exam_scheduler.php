<html>
<head>
	<meta name="viewport" content="width=device-width; initial-scale=1.0" >
	<title>School Name</title>
	<script src="js/chart.js"></script>
<link rel="preconnect" href="https://fonts.googleapis.com"> 
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="css/dashboard_admin.css" >
<link rel="stylesheet" href="css/popups.css" >
</head>
<body>

<div style="height: 90vh; width:70%; margin-left: 5%; border-radius: 2vh; margin-top: 4vh;  background-color: black;">
	<?php

	session_start();
include 'back.php';
include 'login_btn.php';
include 'connection.php';
$sql = "SELECT * from class_section";
$query2 = mysqli_query($con, $sql);
?>
<div style="height:3vh; width:100%;"></div>
<table style="width:80%; margin-left:auto; margin-right:auto;"> 

		<?php
		$sqls1 = "SELECT * from exams where scheduled = 'No'";
		$querys1 = mysqli_query($con, $sqls1);
		$rows1 = mysqli_fetch_assoc($querys1);
		if(isset($rows1)){

		?>
	<tr><td style="text-align: center;">
		<label style="float:left; color: White; font-family: 'Oswald', sans-serif;">Exam Type</label><br>
		<select type="text" id="stexam_type" class="tbl-input" name="exam" style="width:80%" required>
						
						<?php
						if(isset($_GET['exam_ttbl'])){
							$ss1 = "SELECT * from exams where exam_id = '".$_GET['exam_ttbl']."' ";
							$qq1 = mysqli_query($con, $ss1);
							$rr1 = mysqli_fetch_assoc($qq1);
							?>
							<option value="<?php echo $_GET['exam_ttbl']; ?>"><?php echo $rr1['exam_name']; ?></option>
							<?php
						}
						else{
							
						}
						$sql12 = "SELECT * from exams where scheduled = 'No' ";
						$query12 = mysqli_query($con, $sql12);
						while($row12 = mysqli_fetch_assoc($query12)){
							?>
						<option value="<?php echo $row12['exam_id']; ?>"><?php echo $row12['exam_name']; ?></option>
						<?php
					}
						unset($row12, $query12);
					
						?>
						</select>
						</td>
						<?php
					}
					else{
						?>
						<tr><td style="text-align: left;">
							<label style="float:left; color: White; font-family: 'Oswald', sans-serif;">No Exam Found</label><br>
							<button class="submits" onclick="exam_sxheduler()"> Click to Add an Exam</button>
						</td>
						<?php
					}

						?>

		<td>
					<label style="float:left; color:white; font-family: 'Oswald', sans-serif;">Class</label><br>
					<select type="text" id="stclass" class="tbl-input" name="stclass" onchange="texter()" style="width:80%" required>
						<?php

						if(isset($_GET['class_ttbl'])){
							?>
							<option value="<?php echo $_GET['class_ttbl']; ?>"><?php echo $_GET['class_ttbl']; ?></option>
							<?php
						}
						else{

						}
						$query = mysqli_query($con, $sql);
						while($row = mysqli_fetch_assoc($query)){
							?>
						<option value="<?php echo $row['class']; ?>"><?php echo $row['class']; ?></option>
						<?php
					}
						unset($row, $query);
						?>
						</select>
						</td>
				
	</tr></table>


<!--- Exam Scheduler  --->
	<table style="margin-left: 20%; margin-top:5vh; width: 60%;">
		<form action="exam_class_scheduler_exe.php" method="POST">
		<?php
		include 'connection.php';
		if(isset($_GET['class_ttbl'])){
			$sqle1 = "SELECT DISTINCT subject from schedule where class = '".$_GET['class_ttbl']."' ";
			$querye1 = mysqli_query($con, $sqle1);
			$ct = 0;
			while($rowe1 = mysqli_fetch_assoc($querye1)){
		?>
		<tr>
			<td style="color: white; font-family: 'Oswald', sans-serif; height: 7vh;"><?php echo $rowe1['subject']; ?>
				<input type="hidden" class="tbl-input" name="subjects<?php echo $ct; ?>" value="<?php echo $rowe1['subject']; ?>">
			</td>
			<td style="color:white;"> : </td>
			<?php
			$sqle2 = "SELECT * from exam_scheduler where class = '".$_GET['class_ttbl']."' and exam_id = '".$_GET['exam_ttbl']."' and subject = '". $rowe1['subject']."' ";
			$querye2 = mysqli_query($con, $sqle2);
			$rowe2 = mysqli_fetch_assoc($querye2);
			if($rowe2){
				?>
				<td><input type="date" style="background-color:lightgreen;" class="tbl-input" name="dates<?php echo $ct; $ct++; ?>" value = "<?php echo $rowe2['exam_date']; ?>"></td>
				<?php

			}
			else{
			?>
			<td><input type="date" class="tbl-input" name="dates<?php echo $ct; $ct++; ?>"></td>
			<?php
		}
			?>
		</tr>
		<?php
	}
	?>
			<tr>
			<td style="color: white; font-family: 'Oswald', sans-serif; height: 5vh;"><input type="hidden" name="examtbl" class="tbl-input" value="<?php echo $_GET['exam_ttbl']; ?>"></td>
			<td style="color:white;"><input type="hidden" class="tbl-input" name="classtbl" value="<?php echo $_GET['class_ttbl']; ?>"></td>
			<td><input type="hidden" class="tbl-input" name="ct" value="<?php echo $ct; ?>"></td>
		</tr>
		<tr><td colspan="3" style="text-align:center;">
			<input class="tbl-submit" type="submit" name="Submit" value="Submit">
		</td></tr>
	</form>
	<?php
}
else{
 echo 'Class Not Selected';
}
		?>
	</table>









</div>

<div class="popup" id="popup" style="display:none;">
	<div class="popup-tbl-container" style="width:50%; margin-left:25%; margin-top:30vh; height:40vh;">
		<button class="btnsp" onclick="location.href='exam_scheduler.php'" style="background-color:red; margin-right: 2%;"><i class="fas fa-close" aria-hidden= 'false'></i>
			</button>
		<div style="height:3vh; max-width:100%;">
		</div>
		<form action="exam_scheduler_exe.php" method="POST">
		<table class="tbl1" cellpadding="0" cellspacing="0">
			<tr>
				<td colspan="2" style="height: 5vh; font-size:3.5vh; font-weight:bolder; font-family: 'Oswald', sans-serif;">ENTER EXAM DETAILS</td>
			</tr>
			<tr>
				<td style="height:2vh;"></td>
			</tr>
			<tr>
				<td style="text-align:left;">Exam Name* : </td>
				<td colspan="2"><input type="text" class="tbl-input" name="exam_name" required></td>
			</tr>
			<tr>
				<td style="text-align:left;">Exam Type* :</td>
				<td colspan="2">
					<select class="tbl-input" name="exam_type" style="width:80%" required>
					<?php
						$sqlss1 = "SELECT * from exam_type";
						$queryss1 = mysqli_query($con, $sqlss1);
						while($rowss1 = mysqli_fetch_assoc($queryss1)){
							?>
								<option value="<?php echo $rowss1['exam_type_id']; ?>"><?php echo $rowss1['exam_type']; ?></option>
							<?php
						}
					?>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" class="submits" value="Confirm"></button></td>
			</tr>
		</table>
	</form>
	</div>

</div>
<script type="text/javascript">
	function texter(){
		var a = document.getElementById('stclass').value;
		var b = document.getElementById('stexam_type').value;

		window.location.href = "exam_scheduler.php?exam_ttbl=" + b + "&class_ttbl=" +a;
	} 

	function exam_sxheduler(){

		document.getElementById('popup').style.display = 'block';

	}
</script>
</body>
</html>