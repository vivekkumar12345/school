<div class="boxes1">
	<div class="boxes1-left"><i class="fas fa-user" style="font-size:12vh; color: white; padding-top:2vh; padding-bottom:2vh;"></i><br>
		<div class="tpt-txt"><?php echo $_SESSION['student_name'] ?><br><?php echo $_SESSION['class'].' '.$_SESSION['section']; ?></div></div>
</div>
<div class="info-slider">
	<div class="info-slider-btn" onclick="school()" id="school" style="background-color: rgba( 255, 191, 0, 0.3);"><i id="fas-school" class="fas fa-school" style="font-size: 3vh; padding-top: 2vh; padding-bottom: 1vh;"></i><br>School</div>
	<div class="info-slider-btn" id="inr" onclick="inr()"><i class="fas fa-inr" style="font-size: 3vh; padding-top: 2vh; padding-bottom: 1vh;"></i><br>Fees</div>
	<div class="info-slider-btn" id="running" onclick="running()"><i class="fas fa-running" style="font-size: 3vh; padding-top: 2vh; padding-bottom: 1vh;"></i><br>Activites</div>
	<div class="info-slider-btn" id="cart" onclick="cart()"><i class="fas fa-cart-shopping" style="font-size: 3vh; padding-top: 2vh; padding-bottom: 1vh;"></i><br>Purchase</div>

</div>

<div class="far-school" id="far-school">
	<div class="info-slider-btn2" onclick="location.href = 'attendance_student_mob.php'">
		<i class="fas fa-hand-fist" style="font-size: 3.5vh; padding-top: 2vh; padding-bottom: 2vh;"></i><br>Attendance
	</div>
	<div class="info-slider-btn2" onclick="location.href = 'exam_schedule_student_mob.php'">
		<i class="fas fa-list-alt" style="font-size: 3.5vh; padding-top: 2vh; padding-bottom: 2vh;"></i><br>Exams
	</div>
	<div class="info-slider-btn2" onclick="location.href = 'classwork_student_mob.php'">
		<i class="fas fa-book" style="font-size: 3.5vh; padding-top: 2vh; padding-bottom: 2vh;"></i><br>Classwork
	</div>
	<div class="info-slider-btn2" onclick="location.href = 'homework_student_mob.php'">
		<i class="fas fa-tasks" style="font-size: 3.5vh; padding-top: 2vh; padding-bottom: 2vh;"></i><br>Homework
	</div>
	<div class="info-slider-btn2" onclick="location.href = 'time-table_student.php'">
		<i class="fa fa-calendar" style="font-size: 3.5vh; padding-top: 2vh; padding-bottom: 2vh;"></i><br>Time Table
	</div>
	<div class="info-slider-btn2" onclick="location.href = 'teacher_student_mob.php'">
		<i class="fa fa-chalkboard-teacher" style="font-size: 3.5vh; padding-top: 2vh; padding-bottom: 2vh;"></i><br>Teachers
	</div>
	<div class="info-slider-btn2" onclick="location.href = 'faculty_student_mob.php'">
		<i class="fa fa-user-group" style="font-size: 3.5vh; padding-top: 2vh; padding-bottom: 2vh;"></i><br>Faculties
	</div>
	<div class="info-slider-btn2"  onclick="location.href = 'issue_student_mob.php'">
		<i class="fa fa-comments" style="font-size: 3.5vh; padding-top: 2vh; padding-bottom: 2vh;"></i><br>Raise Issue
	</div>
	
</div>
<div class="far-school" id="far-inr" style="display: none;">
	<div class="info-slider-btn2" onclick="location.href = 'fee_list_student.php'">
		<i class="fab fa-cc-amazon-pay" style="font-size: 3.5vh; padding-top: 2vh; padding-bottom: 2vh;"></i><br>Pay Fee
	</div>
	<div class="info-slider-btn2" onclick="location.href = 'fee_history_student.php'">
		<i class="fas fa-history" style="font-size: 3.5vh; padding-top: 2vh; padding-bottom: 2vh;"></i><br>History
	</div>
	<div class="info-slider-btn2" onclick="location.href = 'time-table_student.php'">
		<i class="fa fa-area-chart" style="font-size: 3.5vh; padding-top: 2vh; padding-bottom: 2vh;"></i><br>Fee chart
	</div>
</div>
<div class="far-school" id="far-running"  style="display: none;">
	
</div>
<div class="far-school" id="far-cart"  style="display: none;">
	
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



<?php
$sql12 = "SELECT * from exams where scheduled = 'No'";
$query12 = mysqli_query($con, $sql12);
$row12 = mysqli_fetch_assoc($query12);
if($row12){
	?>
	<div onclick="location.href='exam_schedule_student_mob.php'" style="height: 6vh; width:96%; margin-left:2%; line-height:6vh; text-align:center; font-family: 'Oswald', sans-serif; border-radius: 2vh; overflow:hidden; margin-top: 2vh; background-color:lightpink; color: yellow;">
		<a class="blink"><?php
		echo $row12['exam_name'];
		?>
		 is Scheduled</a>
</div>
<?php
}

?>
<script type="text/javascript">
	 function school(){
	 	document.getElementById('school').style.backgroundColor = "rgba( 255, 191, 0, 0.1)";
	 	document.getElementById('inr').style.backgroundColor = "rgba(0, 200, 150, 0.2)";
	 	document.getElementById('running').style.backgroundColor = "rgba(0, 200, 150, 0.2)";
	 	document.getElementById('cart').style.backgroundColor = "rgba(0, 200, 150, 0.2)";
	 	document.getElementById('far-school').style.display = "inline-flex";
	 	document.getElementById('far-inr').style.display = "none";
	 	document.getElementById('far-running').style.display = "none";
	 	document.getElementById('far-cart').style.display = "none";

	 }
	 function inr(){
	 	document.getElementById('school').style.backgroundColor = "rgba(0, 200, 150, 0.2)";
	 	document.getElementById('inr').style.backgroundColor = "rgba( 255, 191, 0, 0.1)";
	 	document.getElementById('running').style.backgroundColor = "rgba(0, 200, 150, 0.2)";
	 	document.getElementById('cart').style.backgroundColor = "rgba(0, 200, 150, 0.2)";
	 	document.getElementById('far-school').style.display = "none";
	 	document.getElementById('far-inr').style.display = "inline-flex";
	 	document.getElementById('far-running').style.display = "none";
	 	document.getElementById('far-cart').style.display = "none";

	 }
	 function running(){
	 	document.getElementById('school').style.backgroundColor = "rgba(0, 200, 150, 0.2)";
	 	document.getElementById('inr').style.backgroundColor = "rgba(0, 200, 150, 0.2)";
	 	document.getElementById('running').style.backgroundColor = "rgba( 255, 191, 0, 0.1)";
	 	document.getElementById('cart').style.backgroundColor = "rgba(0, 200, 150, 0.2)";
	 	document.getElementById('far-school').style.display = "none";
	 	document.getElementById('far-inr').style.display = "none";
	 	document.getElementById('far-running').style.display = "inline-flex";
	 	document.getElementById('far-cart').style.display = "none";

	 }
	 function cart(){
	 	document.getElementById('school').style.backgroundColor = "rgba(0, 200, 150, 0.2)";
	 	document.getElementById('inr').style.backgroundColor = "rgba(0, 200, 150, 0.2)";
	 	document.getElementById('running').style.backgroundColor = "rgba(0, 200, 150, 0.2)";
	 	document.getElementById('cart').style.backgroundColor = "rgba( 255, 191, 0, 0.1)";
	 	document.getElementById('far-school').style.display = "none";
	 	document.getElementById('far-inr').style.display = "none";
	 	document.getElementById('far-running').style.display = "none";
	 	document.getElementById('far-cart').style.display = "inline-flex";

	 }
</script>