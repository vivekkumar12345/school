<html>
<head>
	<meta name="viewport" content="width=device-width; initial-scale=1.0" >
	<title>School Name</title>
	<script src="js/chart.js"></script>
	<link rel="stylesheet" href="css/dashboard_student.css" >
</head>
<body>
	<div class="head_login">
		<div class="left-menu">
			<?php
					include 'left_menu_teacher.php';
			?>
		</div>

		<div class="boxes">
			<div class="box-head"><a>Welcome to Mera School - Academic Year 2022-23</a><div class="photo-image"></div></div>
			<div class="boxes1">
			<div class="block" style="border-left: 1vh solid black; color: black;">
				<div class="info">
					<div class="info-text" style="border-bottom: .2vh solid lightgray;"><a>Students</a></div>
					<div class="info-text" ><a><?php
							include 'connection.php';
					session_start();
					$class = $_SESSION['class'];
					$section = $_SESSION['section'];
					$sql = "SELECT count(student_id) as ct from students where class='".$class."' and section='".$section."' ";
					$query = mysqli_query($con, $sql);
					while($row=mysqli_fetch_assoc($query)){
						echo $row['ct'];
					}
				?>
			</a></div>

				</div>
				<div class="info">
					<div class="info-text" style="border-bottom: .2vh solid lightgray;"><a>Absents</a></div>
					<div class="info-text" ><a>
<?php
$dates = date('Y-m-d');
$sql1 = "SELECT count(student_id) as cts from student_attendance where class='". $_SESSION['class']."' and section='".$_SESSION['section']."' and date_att = '".$dates."' ";
$query1 = mysqli_query($con, $sql1);
while($row1=mysqli_fetch_assoc($query1)){
	echo $row1['cts'];
					}
					?></a></div>
				</div>
				<div class="info">
					<div class="info-text" style="border-bottom: .2vh solid lightgray;"><a>Class</a></div>
					<div class="info-text" ><a><?php echo $_SESSION['class'].' '.$_SESSION['section']; ?></a></div>
				</div>
				<div class="info" style="border:none;">
					<div class="info-text" style="border-bottom: .2vh solid lightgray;"><a>Rating</a></div>
					<div class="info-text" ><a>8/10</a></div>
				</div>

			</div>
			<div class="block" style="border-left: 1vh solid orange;">
				<div class="info">
					<div class="info-text" style="border-bottom: .2vh solid lightgray;"><a>Pay</a></div>
					<div class="info-text" ><a>24,500</a></div>

				</div>
				<div class="info">
					<div class="info-text" style="border-bottom: .2vh solid lightgray;"><a>Experience</a></div>
					<div class="info-text" ><a>24 M</a></div>
				</div>
				<div class="info">
					<div class="info-text" style="border-bottom: .2vh solid lightgray;"><a>Paid Till</a></div>
					<div class="info-text" ><a>Nov</a></div>
				</div>
				<div class="info" style="border:none;">
					<div class="info-text" style="border-bottom: .2vh solid lightgray;"><a>Complains</a></div>
					<div class="info-text" ><a>Nil</a></div>
				</div>
			</div>
		
				<div class="block1">
					<a style="font-weight: bold; text-decoration: underline;">Class Performance</a>
					<canvas id="myChart" style="width:50%; max-width: 100%; max-height:90%;"></canvas>
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

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
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
				<div class="block1">
					<a style="font-weight: bold; text-decoration: underline;">Pay History</a>
					
				</div>
				<div class="block1">
					<a style="font-weight: bold; text-decoration: underline;">Performance Compasion</a>
					<canvas id="myChart1" style="width:50%; max-width: 100%; max-height:90%;"></canvas>
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
  type: "line",
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
				<div class="block1">
					<a style="font-weight: bold; text-decoration: underline;">Outstanding Students</a>
				</div>
				</div>
			
		</div>
	</div>
	</body>
