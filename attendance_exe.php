<?php
if(isset($_GET['users'])){
session_start();
include 'connection.php';
$a = $_GET['users'];
$sqls = "DELETE from student_attendance where class = '".$_SESSION['class']."' and section =  '".$_SESSION['section']."' and date_att = '".date('Y-m-d')."' ";
$querys = mysqli_query($con, $sqls);

$arr = explode(',', $a);
$date = date('Y-m-d');
$ct = 0;
foreach($arr as $id){
	$sql = "SELECT * from students where student_id = '".$id."' ";
	$query = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($query);
		$sql2 = "INSERT into student_attendance (student_id, class, section, date_att, status, att_teacher_id, remarks)
		VALUES ('".$id."', '".$row['class']."', '".$row['section']."', '".$date."', 'Absent', '".$_SESSION['teacher_id']."', 'none') ";
		$query2 = mysqli_query($con, $sql2);
		if ($query2) {
			$ct++;
		}
		else{

		}
	
	}
	if($ct>0){
		?>
		<script type="text/javascript">
		alert('successfully Inserted Data');
		window.location.href = 'attendance.php';
		</script>
		<?php
	}
	else{
		?>
		<script type="text/javascript">
		alert('Failed to Take Attendance Please Try again');
		window.location.href = 'attendance.php';
		</script>
		<?php
	}
}
elseif(isset($_GET['map'])){
	session_start();
include 'connection.php';
	$sqls = "DELETE from student_attendance where class = '".$_SESSION['class']."' and section =  '".$_SESSION['section']."' and date_att = '".date('Y-m-d')."' ";
$querys = mysqli_query($con, $sqls);
if($querys){
	?>
		<script type="text/javascript">
		alert('successfully Inserted Data');
		window.location.href = 'attendance.php';
		</script>
		<?php
}
else{
	?>
		<script type="text/javascript">
		alert('Failed to Take Attendance Please Try again');
		window.location.href = 'attendance.php';
		</script>
		<?php
}
}
?>