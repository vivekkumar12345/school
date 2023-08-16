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

<div style="height: 20vh; width:90%; margin-left: 5%; border-radius: 2vh; margin-top: 4vh;  background-color: black;">
	<?php
session_start();
include 'back_finance.php';
include 'login_btn.php';
include 'connection.php';
?>
<div style="height:1vh; width:100%;"></div>
<form action="fee_scheduler_exe.php" method="POST">
<table style="width:90%; height: 17vh; margin-left:auto; margin-right:auto; color:white; font-family:'Oswald', sans-serif;"> 
<tr><td colspan="3" style="text-decoration: underline; font-size:2vh;">Fee Scheduler</td>
</tr>
<tr>
	<td>Month(Upto 1 Month Advance)</td>
	<td>Frequency of Fees</td>
	<td>Last date of Fee Submission</td>
</tr>
<tr>
	<?php
		$date = date('M-Y');
		$date1 = date('M-Y', strtotime('+1 months', strtotime($date)));
	?>
	<td>
		<select class="tbl-input" style="width:90%;" name="month">
			<option value="<?php echo $date; ?>"><?php echo $date; ?></option>
			<option value="<?php echo $date1; ?>"><?php echo $date1; ?></option>
		</select>
	</td>
	<td>
		<select class="tbl-input" style="width:90%;" name="frequency">
			<option value="Monthly">Monthly</option>
			<option value="Quarterly">Quarterly</option>
			<option value="Half Yearly">Half Yearly</option>
			<option value="Yearly">Yearly</option>

		</select></td>
		<td>
			<input type="date" class="tbl-input" style="width:90%;" name="lastdate">
		</td>
		<td>
			<input type="submit" name="submit" class="tbl-submit" style="width:90%;">
		</td>
</tr>
	</table>
	</form>
	</div>
<div style="height:70vh; overflow-y: scroll; width:96%; margin-left:auto; margin-right: auto; margin-top: 2vh; display:flex; flex-wrap: wrap;">

<?php 
include 'connection.php';
$ct =1;
$sqls = "SELECT * from fee_schedule group by month order by last_date DESC";
$querys = mysqli_query($con, $sqls);
while($rows = mysqli_fetch_assoc($querys)){
?>
<div id="carrier<?php echo $ct; ?>" style=" float:left; height: 16vh; margin-top: 4vh; width:22%; overflow: hidden; margin-left:3%; border-radius:2vh; 
background: linear-gradient(to right, #2193b0, #6dd5ed); box-shadow: 0 0 2vh rgba(0, 0, 0, 0.2); color: white; text-align:center; transition: all .5s ease-in;
	-moz-transition : all .5s ease-in;
	-webkit-transition: all .5s ease-in;">
<a style="line-height: 5vh; font-family:'Oswald', sans-serif; font-size: 2vh;"><?php echo  $rows['month']; ?></a>
<br>

<button class="submits" onclick="viewer(<?php echo $ct; ?>)" style="width:45%; margin-left: auto; margin-right: auto;" id="btn<?php echo $ct; ?>">Click to View Details</button>
<button class="submits" onclick="viewer1(<?php echo $ct; ?>)" style="width:45%; margin-left: auto; margin-right: auto; display: none;" id="btns<?php echo $ct; ?>">Click to Show Less</button>
<br>
<a style="font-size:1.5vh; font-family: arial; line-height:3vh; float: right; padding-right: 5%;  padding-top:1vh; color:red;">Last Day of Fee Submission : <?php echo $rows['last_date']; ?></a>
<br>
<div style="height :42vh; margin-top: 3vh; width:100%;">
	<table style="height : 100%; width:90%; margin-left: auto; margin-right: auto; font-family:'Oswald', sans-serif; font-size:1.5vh;">
		<tr style="color:red; font-weight:bold; text-decoration:underline; font-size:1.8vh;"><td>Class</td><td>Tuition Fee</td><td>Fee 2</td><td>Fee 3</td><td>Fee 4</td><td>Total</td></tr>	
<?php
$ct++;
$sqls1 = "SELECT * from fee_schedule where month = '".$rows['month']."'";
$querys1 = mysqli_query($con, $sqls1);
while($rows1 = mysqli_fetch_assoc($querys1)){
	?>
		<tr><td>Class <?php echo $rows1['class']; ?></td><td><?php echo $rows1['tuition_fee']; ?></td><td><?php echo $rows1['fee2']; ?></td>
			<td><?php echo $rows1['fee3']; ?></td><td><?php echo $rows1['fee4']; ?></td><td><?php echo $rows1['fees']; ?></td></tr>	
		<?php 
	}
		?>
	</table>
	
</div>
</div>
<?php
}
?>

</div>
</div>
<script type="text/javascript">
	var data;
	function addreg(data){
		var x = document.getElementById('tuition'+data).value;
		var y = document.getElementById('fee'+data).value;
		var z = document.getElementById('fees'+data).value;
		var add = parseInt(x)+parseInt(y)+parseInt(z);
		var a = document.getElementById('final'+data);
		a.value = add;
	}
	function viewer(data1)
{
		document.getElementById('carrier'+data1).style.height = '60vh';
		document.getElementById('btns'+data1).style.display = 'block';
		document.getElementById('btn'+data1).style.display = 'none';
		
}
function viewer1(data2)
{
		document.getElementById('carrier'+data2).style.height = '16vh';
		document.getElementById('btns'+data2).style.display = 'none';
		document.getElementById('btn'+data2).style.display = 'block';
}
</script>
</body>
</html>