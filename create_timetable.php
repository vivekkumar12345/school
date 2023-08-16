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

<div style="height: 90vh; width:90%; margin-left: 5%; border-radius: 2vh; margin-top: 4vh;  background-color: black;">
	<?php
	include 'back.php';
	session_start();
include 'connection.php';
$sql = "SELECT * from class_section";
$query2 = mysqli_query($con, $sql);
?>
<table style="width:40%; margin-left:auto; margin-right:auto;"> <tr>
<form action="insert_timetable.php" method="POST">
		<td>
					<label style="float:left;">Class</label><br>
					<select type="text" id="stclass" class="tbl-input" name="stclass" onchange="texter()" style="width:80%" required>
						<?php
						$query = mysqli_query($con, $sql);
						if(isset($_GET['class_ttbl'])){
							?>
						<option value="<?php echo $_GET['class_ttbl']; ?>"><?php echo $_GET['class_ttbl']; ?></option>
						<?php 
					}
						else{
								?>

								<?php
						}
						while($row = mysqli_fetch_assoc($query)){
							?>
						<option value="<?php echo $row['class']; ?>"><?php echo $row['class']; ?></option>
						<?php
					}
						unset($row, $query);
						?>
						</select>
						</td>
				<td>
					<label style="float:left;">Section</label><br>
					<select id="stsection" type="text" class="tbl-input" name="stsection" style="width:80%" onchange="texter()" required>
						<?php
						if(isset($_GET['class_ttbl'])){
							?>
						<option value="<?php echo $_GET['section_ttbl']; ?>"><?php echo $_GET['section_ttbl']; ?></option>
						<?php 
							}
						else{
								?>
								<?php
						}
						while($row2 = mysqli_fetch_assoc($query2)){
							if($row2['section'] != ""){
							?>
						<option value="<?php echo $row2['section']; ?>"><?php echo $row2['section']; ?></option>
						<?php
					}
				}
						?>
						</select></td>
	</tr></table>

<table class="tbl" style="width: 90%; margin-left: 5%; height: 90%; color:white; font-family: 'Oswald', sans-serif;">
	<tr>
		<td>Subjects</td>
		<td>Monday</td>
		<td>Tuesday</td>
		<td>Wednesday</td>
		<td>Thursday</td>
		<td>Friday</td>
		<td>Saturday</td>
		<td>Sunday</td>

	</tr>
	<?php
			include 'connection.php';

			$sql1 = "SELECT * from slots";
			$query1 = mysqli_query($con, $sql1);
			$j = 1;
			while($row1=mysqli_fetch_assoc($query1)){
				?>
					
				<tr>
					
					
					<?php
					if($row1['slot_type'] == 'Lunch'){
						?>
						<td style="font-size: 1.8vh; background-color:lightgreen; color: black;"><?php echo $row1['slot']; ?></td>
						<td colspan="7" style="background-color:lightgreen; color: black;">Lunch</td>

						<?php
					}
					else{
						?>
						<td style="font-size: 1.8vh;"><?php echo $row1['slot']; ?></td>
						<?php
					$days = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
					for($i=0; $i<7; $i++){

						if (isset($_GET['class_ttbl'])) {
							$class_ttbl = $_GET['class_ttbl'];
							$section_ttbl = $_GET['section_ttbl'];
						}
						else{
							$class_ttbl = 1;
							$section_ttbl = 'A';
						}
					$sql2 = "SELECT * from schedule where slot = '".$row1['slot_id']."' and day = '".$days[$i]."' and class = '".$class_ttbl."' and section = '".$section_ttbl."'";
					$query2 = mysqli_query($con, $sql2);
					$row2=mysqli_fetch_assoc($query2);
					if($row2){
						?>
					<td>
						<select type="text" class="tbl-input" name="stsubject<?php echo $j; ?>" style="height: 80%; width:90%; background-color:pink;" required>
							<option value="<?php echo $row2['subject']; ?>"><?php echo $row2['subject']; ?></option>
						<?php
						$sql4 = "SELECT * from subject";
						$query4 = mysqli_query($con, $sql4);
						while($row4 = mysqli_fetch_assoc($query4)){
							
							?>
						<option value="<?php echo $row4['subject']; ?>"><?php echo $row4['subject']; ?></option>
						<?php
					}
					unset($row4,$query4, $sql4);
						?>
						</select></td>

					<?php
				}
					else{
							?>
						<td>
						<select type="text" class="tbl-input" name="stsubject<?php echo $j; ?>" style="height: 80%; width:90%" required>
							<option value=" "></option>
						<?php
						$sql4 = "SELECT * from subject";
						$query4 = mysqli_query($con, $sql4);
						while($row4 = mysqli_fetch_assoc($query4)){
							
							?>
						<option value="<?php echo $row4['subject']; ?>"><?php echo $row4['subject']; ?></option>
						<?php
					}
						?>
						</select>
						</td>
							<?php
						}
						$j++;

				}
			}
					?>
				</tr>
				<?php
			}

		?>
	
		<tr>
			<td colspan="8">
				<input type="hidden" name="ct" value="<?php echo $j-1; ?>"><input type="submit" value="Submits" class="tbl-submit" style="color:white;">
			</td>
		</tr>
		</form>
</table>
</div>
<?php
include 'login_btn.php';
?>
<script type="text/javascript">
	function texter(){
		var a = document.getElementById('stclass').value;
		var b = document.getElementById('stsection').value;

		window.location.href = "create_timetable.php?class_ttbl=" + a + "&section_ttbl=" +b;
	} 
</script>
</body>
</html>