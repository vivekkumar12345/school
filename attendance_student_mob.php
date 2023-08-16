<html>
<head>
	<meta name="viewport" content="width=device-width; initial-scale=1.0" >
	<title>School Name</title>
<script src="js/chart.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="css/attendance_student.css" >
</head>
<body>
	<?php
	include 'student_home_menu_mob.php';
	?>
	<div class="cal-container">
		<div class="my-container">
			<?php
			if(isset($_GET['student_id'])){
				$_SESSION['student_id'] = $_GET['student_id'];
			}
			else{

			}
			if(isset($_GET['currentdate'])){
				$currdate = $_GET['currentdate'];
				$currmonth = date('M', strtotime($currdate));
				$curryear = date('Y', strtotime($currdate));

			}
			else{
				$currdate = date('Y-m-d');
				$currmonth = date('M', strtotime($currdate));
				$curryear = date('Y', strtotime($currdate));
				
				}
				$firstdayofmonth = date('Y-m-01', strtotime($currdate));
				$lastdayofmonth = date('Y-m-t', strtotime($currdate));
				$day =date("l", strtotime($firstdayofmonth));
				$strtdaynum =date("w", strtotime($firstdayofmonth));
				$strtdaynumval = intval($strtdaynum);
				$strtday = date('Y-m-d', strtotime(-$strtdaynumval. 'days', strtotime($firstdayofmonth)));
				$enddatenum = date("w", strtotime($lastdayofmonth));
				$enddatenumval = 6 - intval($enddatenum);
				$enddate = date('Y-m-d', strtotime(+$enddatenumval. 'days', strtotime($lastdayofmonth)));
			?>
			<table style="width:100%; padding-top: 2vh;">
				<tr>
					<td style="width:50%; text-align: center;">
						<select class="inputs">
						<option><?php  echo $currmonth; ?></option>
					</select>
				</td>
					<td style="width:50%; text-align: center;">
						<select class="inputs">
						<option><?php  echo $curryear; ?></option>
					</select>
					</td>
				</tr>
			</table>
		</div>
		<table style="width:100%; text-align: center; font-family: arial; color: lightgray; font-weight: bold; margin-top: 2vh; height: 35vh;">
			<thead >
				<tr style="border-bottom: .5vh solid lightgray;"><td>S</td><td>M</td><td>T</td><td>W</td><td>T</td><td>F</td><td>S</td></tr>

			</thead>
			<tbody style="margin-top: 2vh; color: black;">
				<tr><td colspan="7" style="height: 2vh;"></td></tr>
				<?php
				session_start();
				
				for($i = 0; $i<6; $i++){
					if ($strtday > $enddate) {
								break;
							}
							else{
					echo "<tr>";
					for($j =0; $j<7; $j++){
						

							if($strtday < $firstdayofmonth or $strtday > $lastdayofmonth){

							echo "<td style='height:4vh; font-family:monospace; color: lightgray;'>".date('d', strtotime($strtday))."</td>";

							}
							elseif ($strtday > $enddate) {
								break;
							}
							else{
						include 'connection.php';		
						$sql = "SELECT date_att from student_attendance where student_id = '".$_SESSION['student_id']."' and date_att = '".$strtday."'";
						$query = mysqli_query($con, $sql);
						$row = (mysqli_fetch_assoc($query));
						if(isset($row)){
							echo "<td style='height:4vh; font-family:monospace; background-color:rgba( 255, 0, 0, 0.4); border-radius:.5vh;'>".date('d', strtotime($strtday))."</td>";
						}
						else{
								echo "<td style='height:4vh; font-family:monospace;'>".date('d', strtotime($strtday))."</td>";
							}
							}

						
						$strtday= date('Y-m-d', strtotime('+1 day', strtotime($strtday)));
					}
					echo "</tr>";
				}
			}
				?>
			</tbody>
			<tr><td colspan="3"><i onclick="location.href='attendance_student_mob.php?currentdate=<?php echo date('Y-m-d', strtotime('-1 months', strtotime($currdate))); ?>'" class="fa fa-chevron-circle-left" style="font-size: 4vh; color: rgba(0, 200, 150, 0.4);"></i></td>
				<td></td>
				<td colspan="3"><i onclick="location.href='attendance_student_mob.php?currentdate=<?php echo date('Y-m-d', strtotime('+1 months', strtotime($currdate))); ?>'" class="fa fa-chevron-circle-right" style="font-size: 4vh; color: rgba(0, 200, 150, 0.4);"></i></td></tr>
		</table>
	</div>

	<div class="att-cal-container">
		Absents in Current Session : 
		<a style="font-weight: bold; color: green;"><?php
			$sql11 = "SELECT count(att_id) as ct from student_attendance where student_id = '".$_SESSION['student_id']."' ";
			$query11 = mysqli_query($con, $sql11);
			$row11 = mysqli_fetch_assoc($query11);
			echo $row11['ct'];
		?>
	</a>
	</div>
	<div class="att-cal-container">
		Percentage of Attendance : 
	</div>
	
		<?php
include 'connection.php';
$sql11 = "SELECT * from student_attendance where student_id = '".$_SESSION['student_id']."' and date_att ='".date('Y-m-d')."' ";
$query11 = mysqli_query($con, $sql11);
$row11 = mysqli_fetch_assoc($query11);
if ($row11) {
	?>
<div style="height: 8vh; width:96%; margin-left:2%; line-height:8vh; text-align:center; font-family: 'Oswald', sans-serif; border-radius: 2vh; overflow:hidden; margin-top: 2vh; background-color:Lightpink;">
	Your Ward is Absent Today
</div>
	<?php
}
else{
?>
<div style="height: 6vh; width:96%; margin-left:2%; line-height:6vh; text-align:center; font-family: 'Oswald', sans-serif; border-radius: 2vh; overflow:hidden; margin-top: 2vh; background-color:lightgreen;">
	Your Ward is Present Today
</div>
<?php
}
?>

</body>
</html>