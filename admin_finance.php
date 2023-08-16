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
<body onload="dis()" background="white">
<?php
	session_start();
include 'dashboard_admin_left.php';

?>
	

<div style=" float:left; height: 15vh; margin-top: 4vh; width:20%; margin-left:3%; border-radius:2vh; 
background: linear-gradient(to right, #2193b0, #6dd5ed); box-shadow: 0 0 2vh rgba(0, 0, 0, 0.2); color: white; text-align:center;">
<a style="line-height: 8vh; font-family:'Oswald', sans-serif; font-size: 2vh;">Fee Creation</a>
<br>
<button class="submits" onclick="location.href='fee_creator.php'" style="width:70%; height:4vh;">Click to Create Fee</button>
	
</div>

<div style="float:left; height: 15vh; margin-top: 4vh; width:20%; margin-left:3%; border-radius:2vh; 
background-image: linear-gradient(to right, #DA22FF 0%, #9733EE  100%); box-shadow: 0 0 2vh rgba(0, 0, 0, 0.2); color: white; text-align:center;">
<a style="line-height: 8vh; font-family:'Oswald', sans-serif; font-size: 2vh;">Fee Scheduler</a>
<br>
<button class="submits" onclick="location.href='fee_scheduler.php'" style="width:70%; height:4vh;">Click to Schedule Fee</button>
	
</div>

<div style="float:left; height: 15vh; margin-top: 4vh; width:20%; margin-left:3%; border-radius:2vh; 
background-image: linear-gradient(to right, #603813, #b29f94 ); box-shadow: 0 0 2vh rgba(0, 0, 0, 0.2); color: white; text-align:center;">
<a style="line-height: 8vh; font-family:'Oswald', sans-serif; font-size: 2vh;">Fee Payment</a>
<br>
<button class="submits" onclick="location.href='fee_pay.php'" style="width:70%; height:4vh;">Click for Fee Payment</button>
	
</div>

<div style="float:left; height: 15vh; margin-top: 4vh; width:20%; margin-left:3%; border-radius:2vh; 
background-image: linear-gradient(to right, #2193b0, #6dd5ed); box-shadow: 0 0 2vh rgba(0, 0, 0, 0.2); color: white; text-align:center;">
<a style="line-height: 8vh; font-family:'Oswald', sans-serif; font-size: 2vh;">Salary History</a>
<br>
<button class="submits" onclick="location.href='teacher_salary_admin.php'" style="width:70%; height:4vh;">Click to View Salary</button>
	
</div>

<div style="float:left; height: 15vh; margin-top: 4vh; width:20%; margin-left:3%; border-radius:2vh; 
background-image: linear-gradient(to right, #DA22FF 0%, #9733EE  100%); box-shadow: 0 0 2vh rgba(0, 0, 0, 0.2); color: white; text-align:center;">
<a style="line-height: 8vh; font-family:'Oswald', sans-serif; font-size: 2vh;">Pay Salary</a>
<br>
<button class="submits" onclick="location.href='salary_teacher.php'" style="width:70%; height:4vh;">Click to Pay Salary</button>
	
</div>

	
		</div>

<?php
include 'login_btn.php';
?>

<script type="text/javascript">
	function dis(){
		document.getElementById('finance').style.backgroundColor = 'black';
		document.getElementById('finance').style.color = 'white';
	}
</script>

</body>
