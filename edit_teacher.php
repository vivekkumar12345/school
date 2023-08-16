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
	session_start();
include 'dashboard_admin_left.php';
?>


<div class="popup" id="popups1">
	
	<div class="popup-tbl-container">
		<button class="btnsp" onclick="location.href='poups_teacher_container.php'" style="background-color:red; margin-right: 2%;"><i class="fas fa-close" aria-hidden= 'false'></i>
			</button>
		<div style="height:3vh; max-width:100%; line-height:5vh;">
		</div>
		<form action="edit_teacher_exe.php" method="POST">
		<table class="tbl1" cellpadding="0" cellspacing="0">
			<tr>
				<input type="hidden" name="teacher_id" value="<?php echo $_GET['teacher_idpop']; ?>">
				<td colspan="8" style="height: 5vh; font-size:3.5vh; font-weight:bolder; font-family: 'Oswald', sans-serif;">EDIT TEACHER DETAILS</td>
			</tr>
			<?php
				session_start();
				include 'connection.php';
				$sql = "SELECT * from teacher where teacher_id = '".$_GET['teacher_idpop']."'";
				$query = mysqli_query($con, $sql);
				$row = mysqli_fetch_assoc($query); 

			?>

			
			<tr>
				<td colspan="7" style="height:5vh;"></td>
			</tr>
			<tr>
				<td style="text-align:left;">Teacher Name* : </td>
				<td colspan="2"><input type="text" class="tbl-input" name="stname" value="<?php echo $row['teacher_name']; ?>" required></td><td></td>
				<td style="text-align:left;">Date of Birth* :</td>
				<td colspan="2"><input type="date" class="tbl-input" name="stdob" value="<?php echo $row['teacher_dob']; ?>" required></td>
			</tr>
			<tr>
				<td style="text-align:left;">Contact No* : </td>
				<td colspan="2"><input type="text" class="tbl-input" name="stcontact" value="<?php echo $row['teacher_mob']; ?>" required></td><td></td>
				<td style="text-align:left;">Address* :</td>
				<td colspan="2"><input type="text" class="tbl-input" name="staddress" value="<?php echo $row['teacher_add']; ?>" required></td>
			</tr>
			<tr>
				<td style="text-align:left;">Email Address* : </td>
				<td colspan="2"><input type="text" class="tbl-input" name="stemail" value="<?php echo $row['teacher_email']; ?>" required></td><td></td>
				<td style="text-align:left;">Maticulation From : </td>
				<td colspan="2"><input type="text" class="tbl-input" name="stmatric" value="<?php echo $row['metric']; ?>" required></td>
			</tr>
			<tr>
				<td style="text-align:left;">High School From* : </td>
				<td colspan="2"><input type="text" class="tbl-input" name="sthighschool" value="<?php echo $row['highschool']; ?>" required></td><td></td>
				<td style="text-align:left;">Latest Education* :</td>
				<td colspan="2"><input type="text" class="tbl-input" name="stlatestedu" value="<?php echo $row['latest_education']; ?>" required></td>
			</tr>
			<tr>
				<td style="text-align:left;">Next of Kin* : </td>
				<td colspan="2"><input type="text" class="tbl-input" name="stkin" value="<?php echo $row['kin']; ?>" required></td><td></td>
				<td style="text-align:left;">Latest Education From* :</td>
				<td colspan="2"><input type="text" class="tbl-input" name="stlatestedufrom" value="<?php echo $row['latest_education_fm']; ?>" required></td>
			</tr>
			<tr>
				<td style="text-align:left;">Joining Date* : </td>
				<td colspan="2"><input type="date" class="tbl-input" name="stjoindate" value="<?php echo $row['teacher_join_date']; ?>" required></td><td></td>
				<td style="text-align:left;">Upload Photo* :</td>
				<td colspan="2"><input type="file" class="tbl-input" name="stphoto" value="<?php echo $row['photo']; ?>" ></td>
			</tr>
			<tr>
				<td style="text-align:left;">Aadhar No* : </td>
				<td colspan="2"><input type="text" class="tbl-input" name="staadhar" value="<?php echo $row['teacher_aadhar']; ?>" required></td><td></td>
				<td style="text-align:left;">PAN No* :</td>
				<td colspan="2"><input type="text" class="tbl-input" name="stpan" value="<?php echo $row['teacher_pan']; ?>" required></td>
			</tr>
			<tr>
				<td style="text-align:left;">status* : </td>
				<td colspan="2"><input type="text" class="tbl-input" name="ststatus" value="<?php echo $row['status']; ?>"required></td><td></td>
				<td style="text-align:left;">Password* :</td>
				<td colspan="2"><input type="password" class="tbl-input" name="stpwd" value="<?php echo $row['teacher_password']; ?>" required></td>
			</tr>
			<tr>
				<td colspan="7"><input type="submit" value="Edit" class="tbl-submit"></td>
			</tr>
		</table>
	</form>
	</div>

</div>


<script type="text/javascript">
	function persInfo(){
		document.getElementById('popups1').style.display = 'block'

	}

</script>

</body>
</html>
