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
<script src="js/jquery-3.7.0.js" type="text/javascript"></script>
<script src="js/jquery-3.7.0.min.js" type="text/javascript"></script>
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

<form action="salary_allot_exe.php" method="POST">
<table style="width:90%; height: 87vh; margin-left:auto; margin-right:auto; color:white; font-family:'Oswald', sans-serif;"> 
<tr>
	<td colspan="6" style="text-decoration: underline; font-size:2vh;">Salary Creation</td>
</tr>
<tr>
	<td colspan="" style="font-size:2vh;">Select Months : </td>
	<td>
		<select class="tbl-input" style="width: 90%;" name="month" id="month" required>
			<?php
			$d1 = date('M');
			$d2 = date('M', strtotime("+1 months", strtotime(date('Y-m-d'))));
			$d3 = date('M', strtotime("+2 months", strtotime(date('Y-m-d'))));
			 ?>
			<option value="<?php echo $d1; ?>"><?php echo $d1; ?></option>
			<option value="<?php echo $d2; ?>"><?php echo $d2; ?></option>
			<option value="<?php echo $d3; ?>"><?php echo $d3; ?></option>
		</select>
	</td>
	<td colspan="" style="font-size:2vh;">Select Date : </td><td><input type="date" class="tbl-input" style="width: 90%;" name="date" required></td>
</tr>
		<?php
		$ct = 1;
		$sqls1 = "SELECT * from teacher where status ='Active'";
		$querys1 = mysqli_query($con, $sqls1);
		while($rows1 = mysqli_fetch_assoc($querys1)){
			?>
			<tr>

				<td><?php echo $rows1['teacher_name']; ?> <input type="hidden" value="<?php echo $rows1['class']; ?>" name="class<?php echo $ct; ?>"> : </td>
				<td><input type="number" class="tbl-input" style="width: 90%;" placeholder="Amount" name="amount<?php echo $ct; ?>" required></td>
				<td><input type="text" class="tbl-input" style="width: 90%;" placeholder="Account Number" name="account<?php echo $ct; ?>" required></td>
				<input type="hidden" name="teacher_id<?php echo $ct; ?>" value="<?php echo $rows1['teacher_id']; ?>">

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



<script type="text/javascript">
	$(document).ready(function(){

  	$("#month").change(function(){
    	var data = $(this).val();
    	$.ajax({
   			 type: "POST",
			    url: 'get_teacher_fee_alert.php',
			    data : {
			    	month : data,
			    },
			    dataType:"json",
			    success: function(response){
			    	if (response.history == 'Success') {
			    		alert('Pay has already been paid please go to edit tab in main menu');
			    	}
			    	else{
			    		alert('not working');
			    	}
			       
			    }
			  });
			  });

});


</script>

