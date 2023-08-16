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
include 'back_finance.php';
include 'login_btn.php';
include 'connection.php';
$sql = "SELECT * from class_section";
$query2 = mysqli_query($con, $sql);
?>

<form action="fee_creator_exe.php" method="POST">
<table style="width:90%; height: 87vh; margin-left:auto; margin-right:auto; color:white; font-family:'Oswald', sans-serif;"> 
<tr>
	<td colspan="6" style="text-decoration: underline; font-size:2vh;">Salary Creation</td>
</tr>
<tr>
	<td colspan="" style="font-size:2vh;">Select Months : </td><td><input type="number" class="tbl-input" style="width: 90%;" name="month" required></td>
	<td colspan="" style="font-size:2vh;">Select Date : </td><td><input type="number" class="tbl-input" style="width: 90%;" name="date" required></td>
</tr>
		<?php
		$ct = 1;
		$sqls1 = "SELECT * from teacher where status ='Active'";
		$querys1 = mysqli_query($con, $sqls1);
		while($rows1 = mysqli_fetch_assoc($querys1)){
			?>
			<tr>

				<td><?php echo $rows1['teacher_name']; ?> <input type="hidden" value="<?php echo $rows1['class']; ?>" name="class<?php echo $ct; ?>"> : </td>
				<td><input type="number" onkeyup="addreg(<?php echo $ct; ?>)" id="tuition<?php echo $ct; ?>" class="tbl-input" style="width: 90%;" name="tuition<?php echo $ct; ?>" value='<?php echo $row3['tuition_fee']; ?>' required></td>
				<td><input  type="number" onkeyup="addreg(<?php echo $ct; ?>)" id="fee<?php echo $ct; ?>" class="tbl-input" style="width: 90%;" name="fee<?php echo $ct; ?>" value='<?php echo $row3['fee2']; ?>' required></td>
				<td><input  type="number" onkeyup="addreg(<?php echo $ct; ?>)" id="fee<?php echo $ct; ?>" class="tbl-input" style="width: 90%;" name="fee<?php echo $ct; ?>" value='<?php echo $row3['fee2']; ?>' required></td>
			</tr>
<?php

			$ct++;
}
		?>
		<input type="hidden" name="ct" value="<?php echo $ct-1; ?>">
	<tr><td colspan="6"><input type="submit" class="tbl-submit" style="margin-left:30%;"></td></tr>
		</table>
	</form>
	</body>
</html>