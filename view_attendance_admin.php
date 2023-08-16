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
<link rel="stylesheet" href="css/attendance_student.css" >
</head>
<body>
<?php
	session_start();
	include 'back.php';
	include 'login_btn.php';
?>
<div style="height:7vh; width: 100%;">
<input type="text" name="search" id="search" class="tbl-input" style="width: 20%; margin-top:3vh; margin-left:40%;" placeholder="Enter Value to Search" onkeyup ="search()">
</div>
<div style="height:89vh; margin-top:2vh; overflow-y: scroll;">
	<table class="tbl" style="width: 80%; overflow-y:scroll; margin-left: auto; margin-right:auto;" cellpadding="0" cellspacing="0" id="stbl">
	<tr style="background-color: black; color:white; position: sticky; top:0;">
			<td>
				Ser No
			</td>
			<td>
				Class
			</td>
			<td>
				Section
			</td>
			<td>
				Student's Name
			</td>
			<td>
				Father's Name
			</td>
			<td>
				Contact
			</td>
			<td>
				Todays Attendance
			</td>
			<td>
				View History
			</td>
	</tr>
		<?php
			include 'connection.php';
			$ct =1;
			$sql = "SELECT * from students where status = 'Active' order by class, section ASC";
			$query = mysqli_query($con, $sql);
			while($row = mysqli_fetch_assoc($query)){
		?>
		<tr>
			<td><?php echo $ct; ?></td>
			<td><?php echo $row['class']; ?></td>
			<td><?php echo $row['section']; ?></td>
			<td><?php echo $row['student_name']; ?></td>
			<td><?php echo $row['father_name']; ?></td>
			<td><?php echo $row['mob_no']; ?></td>
			<?php
			$sql1 = "SELECT * from student_attendance where student_id = '".$row['student_id']."' and date_att='".date('Y-m-d')."' ";
			$query1 = mysqli_query($con, $sql1);
			$row1= mysqli_fetch_assoc($query1);
			if ($row1) {
				?>
				<td style="color:red;">Absent<i style="padding-left:10%;" class="fas fa-edit" onclick="location.href='attendance_change.php?id=<?php echo $row['student_id']; ?>&tgt=Absent'"></i></td>
				<?php
			}
			else{
				?>
				<td style="color:green;">Present<i style="padding-left:10%;" class="fas fa-edit" onclick="location.href='attendance_change.php?id=<?php echo $row['student_id']; ?>&tgt=Present'"></i></td>
				<?php
			}
			?>
		<td><i class="fas fa-eye" onclick="location.href='view_attendance_admin.php?idmp=<?php echo $row['student_id']; ?>'"></i></td>
		</tr>
		<?php
		$ct++;
			}
		?>

</table>
</div>
<?php
if (isset($_GET['idmp'])) {
	?>
	<div class="popup">

		<div class="popup-tbl-container" style="height:60vh; width:60%; margin-top: 15vh; margin-left:20%; background:transparent;">
			
		<button class="btnsp" onclick="location.href='view_attendance_admin.php'" style="background-color:red; margin-right: 2%; position: fixed; right:20%; top:10vh;"><i class="fas fa-close" aria-hidden= 'false'></i>
			</button>

			<!-- Calender Start -->
							


		<div class="cal-container" style="height:60vh;">
		<div class="my-container">
			<?php
			if(isset($_GET['idmp'])){
				$_GET['idmp'] = $_GET['idmp'];
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
						<select class="tbl-input" style="width: 40%; margin-left: 30%;">
						<option><?php  echo $currmonth; ?></option>
					</select>
				</td>
					<td style="width:50%; text-align: center;">
						<select class="tbl-input" style="width: 40%; margin-left: 30%;">
						<option><?php  echo $curryear; ?></option>
					</select>
					</td>
				</tr>
			</table>
		</div>
		<table style="width:100%; text-align: center; font-family: arial; color: lightgray; font-weight: bold; margin-top: 2vh; height: 50vh; font-size:1.8vh;">
			<thead >
				<tr style="border-bottom: .5vh solid lightgray;"><td>S</td><td>M</td><td>T</td><td>W</td><td>T</td><td>F</td><td>S</td></tr>

			</thead>
			<tbody style="margin-top: 2vh; color: black;">
				<tr><td colspan="7" style="height: 2vh;"></td></tr>
				<?php
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
						$sql = "SELECT date_att from student_attendance where student_id = '".$_GET['idmp']."' and date_att = '".$strtday."'";
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
			<tr><td colspan="3"><i onclick="location.href='view_attendance_admin.php?currentdate=<?php echo date('Y-m-d', strtotime('-1 months', strtotime($currdate))); ?>&idmp=<?php echo $_GET['idmp'] ?>'" class="fa fa-chevron-circle-left" style="font-size: 4vh; color: rgba(0, 200, 150, 0.4);"></i></td>
				<td></td>
				<td colspan="3"><i onclick="location.href='view_attendance_admin.php?currentdate=<?php echo date('Y-m-d', strtotime('+1 months', strtotime($currdate))); ?>&idmp=<?php echo $_GET['idmp'] ?>'" class="fa fa-chevron-circle-right" style="font-size: 4vh; color: rgba(0, 200, 150, 0.4);"></i></td></tr>
		</table>
	</div>





			<!---- Calender Close---->
		</div>
	</div>
	<?php
}
?>
<script type="text/javascript">
	function search() {
var input, filter, table, tr, td, i, j, txtValue;
  input = document.getElementById("search");
  filter = input.value.toUpperCase();
  table = document.getElementById("stbl");
  tr = table.getElementsByTagName("tr");
  for (i = 1; i < tr.length; i++) {
  	td = tr[i].getElementsByTagName("td");
  	for(j=0; j<td.length; j++){
  	if (td[j]) {
      txtValue = td[j].textContent || td[j].innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
        break;
      } else {
        tr[i].style.display = "none";
      }
    } 

  	}
  }
	}
</script>
</body>
</html>