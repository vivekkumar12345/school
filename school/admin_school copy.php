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
</head>
<body>
<?php
	session_start();
include 'dashboard_admin_left.php';
?>
		<div class="body-bottom-right">



			<div class="right-head">



				<div style="float: left; height: 80%; width:12%; margin-top: 1.5%; margin-left: 2.5%; text-align: center; font-size: 2vh">
					Total Students <br>
					<a style="font-size: 3vh; font-weight:bolder;"><?php 
						include 'connection.php';
						$sql1 = "SELECT count(student_id) as ct from students";
						$query1 = mysqli_query($con, $sql1);  
						$row1 = mysqli_fetch_assoc($query1);
						echo $row1['ct'];
					?>
				</a>
				</div>
				<div style="float: left; height: 80%; width:8%; margin-top: 1.5%; margin-left: 2.5%; text-align: center; font-size: 2vh; border-right: .2vh solid lightgray;">
					<a><i class="fas fa-eye" style="font-size:4vh; line-height: 7vh; float:left;"></i></a>
				</div>


				<div style="float: left; height: 80%; width:12%; margin-top: 1.5%; margin-left: 2.5%; text-align: center; font-size: 2vh">
					Total Teachers <br>
					<a style="font-size: 3vh; font-weight:bolder;"><?php 
						include 'connection.php';
						$sql2 = "SELECT count(teacher_id) as ct from teacher";
						$query2 = mysqli_query($con, $sql2);  
						$row2 = mysqli_fetch_assoc($query2);
						echo $row2['ct'];
					?>
				</a>
				</div>
				<div style="float: left; height: 80%; width:8%; margin-top: 1.5%; margin-left: 2.5%; text-align: center; font-size: 2vh; border-right: .2vh solid lightgray;">
					<a><i class="fas fa-eye" style="font-size:4vh; line-height: 7vh; float:left;"></i></a>
				</div>




			</div>


<div class="right-head" style="background-color:rgba( 255, 191, 0, 0.1); width: 20%; float: left;">

<div style="float: left; height: 80%; width:90%; margin-top: 5%; margin-left: 5%; text-align: center; font-size: 2vh">
					Total Revenue Collected This Year <br>
					<a style="font-size: 3vh; font-weight:bolder;"><?php 
					
					?>
				</a>
				</div>

</div>

<div class="right-head" style="background-color:rgba( 255, 191, 0, 0.1); width: 20%; float:left;">

<div style="float: left; height: 80%; width:90%; margin-top: 5%; margin-left: 5%; text-align: center; font-size: 2vh">
					Total Expenditure This Year <br>
					<a style="font-size: 3vh; font-weight:bolder;"><?php 
					
					?>
				</a>
				</div>

</div>


			<div class="block1" style="margin-top:20vh;">
					<a style="font-weight: bold; text-decoration: underline;">Performance Compasion</a>
					<canvas id="myChart1" style="width:60%; max-width: 60%; max-height:40vh; "></canvas>
					<script>
var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
var yValues = [55, 49, 44, 24, 15];
var barColors = [
  "rgba(255,0,0,1.0)",
  "rgba(255,0,0,0.8)",
  "rgba(255,0,0,0.6)",
  "rgba(255,0,0,0.4)",
  "rgba(255,0,0,0.2)"
];

new Chart("myChart1", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }],
    }
  }
});
</script>
				</div>
			
		</div>


</body>
