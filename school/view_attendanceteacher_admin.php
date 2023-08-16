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
<div class="swap-btn" style="background-color: lightgreen;" onclick="swap()" id="teacher">Teacher</div>
<div class="swap-btn" style="left: 50%;"  onclick="swap2()" id="admin">Admins</div>
<div style="height: 90vh; width:100%; margin-top:4%;" id="show1">
<input type="text" name="search" id="search" class="tbl-input" style="width: 20%; margin-top:3vh; margin-left:40%;" placeholder="Enter Value to Search" onkeyup ="search()">
</br>
<div style="height:75vh; margin-top:8vh; overflow-y: scroll;">
	<table class="tbl" style="width: 70%; overflow-y:scroll; margin-left: auto; margin-right:auto;" cellpadding="0" cellspacing="0" id="stbl">
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
				Teacher's Name
			</td>
			<td>
				Date of Joining
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
	</thead>
	<tbody>
		<?php
			include 'connection.php';
			$ct =1;
			$sql = "SELECT * from teacher where status = 'Active' order by class, section ASC";
			$query = mysqli_query($con, $sql);
			while($row = mysqli_fetch_assoc($query)){
		?>
		<tr>
			<td><?php echo $ct; ?></td>
			<td><?php echo $row['class']; ?></td>
			<td><?php echo $row['section']; ?></td>
			<td><?php echo $row['teacher_name']; ?></td>
			<td><?php echo $row['teacher_join_date']; ?></td>
			<td><?php echo $row['teacher_mob']; ?></td>
			<?php
			$sql1 = "SELECT * from teacher_attendance where teacher_id = '".$row['teacher_id']."' and date_att='".date('Y-m-d')."' ";
			$query1 = mysqli_query($con, $sql1);
			$row1= mysqli_fetch_assoc($query1);
			if ($row1) {
				?>
				<td style="color:red;">Absent<i style="padding-left:10%;" class="fas fa-edit" onclick="location.href='attendance_change_teacher.php?id=<?php echo $row['teacher_id']; ?>&tgt=Absent'"></i></td>
				<?php
			}
			else{
				?>
				<td style="color:green;">Present<i style="padding-left:10%;" class="fas fa-edit" onclick="location.href='attendance_change_teacher.php?id=<?php echo $row['teacher_id']; ?>&tgt=Present'"></i></td>
				<?php
			}
			?>
		<td><i class="fas fa-eye" onclick="location.href='view_attendanceteacher_admin.php?idmp=<?php echo $row['teacher_id']; ?>'"></i></td>
		</tr>
		<?php
		$ct++;
			}
		?>
	</tbody>

</table>
</div>
<?php
if (isset($_GET['idmp'])) {
	?>
	<div class="popup">

		<div class="popup-tbl-container" style="height:60vh; width:60%; margin-top: 15vh; margin-left:20%; background:transparent;">
			
		<button class="btnsp" onclick="location.href='view_attendanceteacher_admin.php'" style="background-color:red; margin-right: 2%; position: fixed; right:20%; top:10vh;"><i class="fas fa-close" aria-hidden= 'false'></i>
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
						$sql = "SELECT date_att from teacher_attendance where teacher_id = '".$_GET['idmp']."' and date_att = '".$strtday."'";
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
			<tr><td colspan="3"><i onclick="location.href='view_attendanceteacher_admin.php?currentdate=<?php echo date('Y-m-d', strtotime('-1 months', strtotime($currdate))); ?>&idmp=<?php echo $_GET['idmp'] ?>'" class="fa fa-chevron-circle-left" style="font-size: 4vh; color: rgba(0, 200, 150, 0.4);"></i></td>
				<td></td>
				<td colspan="3"><i onclick="location.href='view_attendanceteacher_admin.php?currentdate=<?php echo date('Y-m-d', strtotime('+1 months', strtotime($currdate))); ?>&idmp=<?php echo $_GET['idmp'] ?>'" class="fa fa-chevron-circle-right" style="font-size: 4vh; color: rgba(0, 200, 150, 0.4);"></i></td></tr>
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
</div>












<div style="height: 90vh; width:100%; display:none; margin-top:4%;" id="show2">
<input type="text" name="search" id="search2" class="tbl-input" style="width: 20%; margin-top:3vh; margin-left:40%;" placeholder="Enter Value to Search" onkeyup ="search2()">
</br>
<div style="height: 85vh; margin-top:7vh;">
	<table class="tbl" style="width: 80%; margin-left: auto; margin-right:auto; margin-top: 5vh; " cellpadding="0" cellspacing="0" id="stbl2">
	<thead style="background-color: black; color:white; position: sticky; top:0;">
			<td>
				Ser No
			</td>
			<td>
				Staff's Name
			</td>
			<td>
				Appointment
			</td>
			<td>
				Joining Date
			</td>
			<td>
			Contact
			</td>
			<td>
			Today's Attendance
			</td>
			<td>
			History
			</td>
			
	</thead>
	<tbody>
		<?php
			include 'connection.php';
			$ct1 =1;
			$sqla1 = "SELECT * from admin where status = 'Active' order by admin_seq ASC";
			$querya1 = mysqli_query($con, $sqla1);
			while($rowa1 = mysqli_fetch_assoc($querya1)){
		?>
		<tr>
			<td><?php echo $ct1; ?></td>
			<td><?php echo $rowa1['admin_name']; ?></td>
			<td><?php echo $rowa1['admin_appt']; ?></td>
			<td><?php echo $rowa1['admin_join_date']; ?></td>
			<td><?php echo $rowa1['admin_mob_no']; ?></td>
			<?php
			$sqla2 = "SELECT * from admin_attendance where admin_id = '".$rowa1['admin_id']."' and date_att='".date('Y-m-d')."' ";
			$querya2 = mysqli_query($con, $sqla2);
			$rowa2= mysqli_fetch_assoc($querya2);
			if ($rowa2) {
				?>
				<td style="color:red;">Absent<i style="padding-left:10%;" class="fas fa-edit" onclick="location.href='attendance_change_admin.php?id=<?php echo $rowa1['admin_id']; ?>&tgt=Absent'"></i></td>
				<?php
			}
			else{
				?>
				<td style="color:green;">Present<i style="padding-left:10%;" class="fas fa-edit" onclick="location.href='attendance_change_admin.php?id=<?php echo $rowa1['admin_id']; ?>&tgt=Present'"></i></td>
				<?php
			}
			?>
		<td><i class="fas fa-eye" onclick="location.href='view_attendanceteacher_admin.php?idmp=<?php echo $rowa1['admin_id']; ?>'"></i></td>
		</tr>
		<?php
		$ct++;
			}
		?>
	</tbody>

</table>
</div>
<?php
if (isset($_GET['idmp'])) {
	?>
	<div class="popup">

		<div class="popup-tbl-container" style="height:60vh; width:60%; margin-top: 15vh; margin-left:20%; background:transparent;">
			
		<button class="btnsp" onclick="location.href='view_attendanceteacher_admin.php'" style="background-color:red; margin-right: 2%; position: fixed; right:20%; top:10vh;"><i class="fas fa-close" aria-hidden= 'false'></i>
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
						$sql = "SELECT date_att from admin_attendance where admin_id = '".$_GET['idmp']."' and date_att = '".$strtday."'";
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
			<tr><td colspan="3"><i onclick="location.href='view_attendanceteacher_admin.php?currentdate=<?php echo date('Y-m-d', strtotime('-1 months', strtotime($currdate))); ?>&idmp=<?php echo $_GET['idmp'] ?>'" class="fa fa-chevron-circle-left" style="font-size: 4vh; color: rgba(0, 200, 150, 0.4);"></i></td>
				<td></td>
				<td colspan="3"><i onclick="location.href='view_attendanceteacher_admin.php?currentdate=<?php echo date('Y-m-d', strtotime('+1 months', strtotime($currdate))); ?>&idmp=<?php echo $_GET['idmp'] ?>'" class="fa fa-chevron-circle-right" style="font-size: 4vh; color: rgba(0, 200, 150, 0.4);"></i></td></tr>
		</table>
	</div>





			<!---- Calender Close---->
		</div>
	</div>
	<?php
}
?>
<script type="text/javascript">
	function search2() {
var input, filter, table, tr, td, i, j, txtValue;
  input = document.getElementById("search2");
  filter = input.value.toUpperCase();
  table = document.getElementById("stbl2");
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
</div>






<script type="text/javascript">
	function swap() {
		var x = document.getElementById('show1');
		var y = document.getElementById('show2');

		var a = document.getElementById('teacher');
		var b = document.getElementById('admin');
			x.style.display = 'block';
			y.style.display = 'none';
			b.style.backgroundColor = 'transparent';
			a.style.backgroundColor = 'lightgreen';
		
	
		
	}
	function swap2(){
		var x = document.getElementById('show1');
		var y = document.getElementById('show2');

		var a = document.getElementById('teacher');
		var b = document.getElementById('admin');
		x.style.display = 'none';
			y.style.display = 'block';
			a.style.backgroundColor = 'transparent';
			b.style.backgroundColor = 'lightgreen';
	}
</script>





</body>

</html>