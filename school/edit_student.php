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
<?php
include 'dashboard_admin_left.php';
?>


<div class="popup" id="popups1">
	
	<div class="popup-tbl-container">
		<button class="btnsp" onclick="location.href='poups_student_container.php'" style="background-color:red; margin-right: 2%;"><i class="fas fa-close" aria-hidden= 'false'></i>
			</button>
		<div style="height:3vh; max-width:100%; line-height:5vh;">
		</div>
		<form action="edit_student_exe.php" method="POST">
		<table class="tbl1" cellpadding="0" cellspacing="0">
			<tr>
				<input type="hidden" name="student_id" value="<?php echo $_GET['student_idpop']; ?>">
				<td colspan="8" style="height: 5vh; font-size:3.5vh; font-weight:bolder; font-family: 'Oswald', sans-serif;">EDIT STUDENT DETAILS</td>
			</tr>
			<?php
				session_start();
				include 'connection.php';
				$sql = "SELECT * from students where student_id = '".$_GET['student_idpop']."'";
				$query = mysqli_query($con, $sql);
				$row = mysqli_fetch_assoc($query); 

			?>

			
			<tr>
				<td colspan="7" style="height:5vh;"></td>
			</tr>
			<tr>
				<td style="text-align:left;">Teacher Name* : </td>
				<td colspan="2"><input type="text" class="tbl-input" name="stname" value="<?php echo $row['student_name']; ?>" required></td><td></td>
				<td style="text-align:left;">Date of Birth* :</td>
				<td colspan="2"><input type="date" class="tbl-input" name="stdob" value="<?php echo $row['dob']; ?>" required></td>
			</tr>
			<tr>
				<td style="text-align:left;">Father's Name* : </td>
				<td colspan="2"><input type="text" class="tbl-input" name="stfather" value="<?php echo $row['father_name']; ?>" required></td><td></td>
				<td style="text-align:left;">Mother's Name* :</td>
				<td colspan="2"><input type="text" class="tbl-input" name="stmother" value="<?php echo $row['mother_name']; ?>" required></td>
			</tr>
			<tr>
				<td style="text-align:left;">Contact No* : </td>
				<td colspan="2"><input type="text" class="tbl-input" name="stcontact" value="<?php echo $row['mob_no']; ?>"  required></td><td></td>
				<td style="text-align:left;">Alternate Contact No : </td>
				<td colspan="2"><input type="text" class="tbl-input" name="stalternate" value="<?php echo $row['mob_no2']; ?>" ></td>
			</tr>
			<tr>
				<td style="text-align:left;">Present Address* : </td>
				<td colspan="2"><input type="text" class="tbl-input" name="stpaddress" value="<?php echo $row['address']; ?>"  required></td><td></td>
				<td style="text-align:left;">Home Address* :</td>
				<td colspan="2"><input type="text" class="tbl-input" name="sthaddress" value="<?php echo $row['home_address']; ?>"  required></td>
			</tr>
			<tr>
				<td style="text-align:left;">Class* : </td>
				<td colspan="2">
					<select class="tbl-input" name="stclass"  required>
						<option value="<?php echo $row['class']; ?>" ><?php echo $row['class']; ?></option>
						<?php
						include 'connection.php';
						$sqlclass = "SELECT * from class_section";
						$queryclass = mysqli_query($con, $sqlclass);
						while($rowclass = mysqli_fetch_assoc($queryclass)){
							?>
							<option value="<?php echo $rowclass['class']; ?>"><?php echo $rowclass['class']; ?></option>

							<?php
						}

						?>
					</select>

				</td><td></td>
				<td style="text-align:left;">Section* :</td>
				<td colspan="2">

						<select  class="tbl-input" name="stsection" required>
						<option value="<?php echo $row['section']; ?>" ><?php echo $row['section']; ?></option>
						<?php
						include 'connection.php';
						$sqlsection = "SELECT * from class_section";
						$querysection = mysqli_query($con, $sqlsection);
						while($rowsection = mysqli_fetch_assoc($querysection)){
							?>
							<option value="<?php echo $rowsection['section']; ?>"><?php echo $rowsection['section']; ?></option>

							<?php
						}

						?>
					</select>
				</td>
			</tr>
			<tr>
				<td style="text-align:left;">Email* : </td>
				<td colspan="2"><input type="text" class="tbl-input" name="stemail" value="<?php echo $row['email']; ?>"  required></td><td></td>
				<td style="text-align:left;">Upload Photo* :</td>
				<td colspan="2"><input type="file" class="tbl-input" name="stphoto" value="<?php echo $row['student_photo']; ?>" ></td>
			</tr>
			<tr>
				<td style="text-align:left;">Aadhar No* : </td>
				<td colspan="2"><input type="text" class="tbl-input" name="staadhar" value="<?php echo $row['aadhar']; ?>"  required></td><td></td>
				<td style="text-align:left;">PAN No* :</td>
				<td colspan="2"><input type="text" class="tbl-input" name="stpan" value="<?php echo $row['pan']; ?>"  required></td>
			</tr>
			<tr>
				<td style="text-align:left;">Password* : </td>
				<td colspan="2"><input type="password" class="tbl-input" name="stpwd" value="<?php echo $row['password']; ?>"  required></td><td></td>
				<td style="text-align:left;">Status :</td>
				<td colspan="2"><input type="text" class="tbl-input" name="ststatus" value="<?php echo $row['status']; ?>"  required></td>
			</tr>
			<tr>
				<td colspan="7"><input type="submit" value="Edit" class="tbl-submit"></td>
			</tr>
		</table>
	</form>
	</div>

</div>

</body>
</html>
