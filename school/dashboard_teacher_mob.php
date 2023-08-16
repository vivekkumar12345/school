<div class="boxes1">
	<div class="boxes1-left"><i class="fas fa-user" style="font-size:12vh; color: white; padding-top:2vh; padding-bottom:2vh;"></i><br>
		<div class="tpt-txt"><?php
		 echo $_SESSION['teacher_name'] ?><br>Class : <?php echo $_SESSION['class'].''.$_SESSION['section']; ?></div></div>
</div>
<div class="info-slider">
	<div class="info-slider-btn" onclick="school()" id="school" style="background-color: rgba( 255, 191, 0, 0.3);"><i id="fas-school" class="fas fa-school" style="font-size: 3vh; padding-top: 2vh; padding-bottom: 1vh;"></i><br>School</div>
	<div class="info-slider-btn" id="inr" onclick="inr()"><i class="fas fa-inr" style="font-size: 3vh; padding-top: 2vh; padding-bottom: 1vh;"></i><br>Pay</div>
	<div class="info-slider-btn" id="running" onclick="running()"><i class="fas fa-running" style="font-size: 3vh; padding-top: 2vh; padding-bottom: 1vh;"></i><br>Activites</div>
	<div class="info-slider-btn" id="cart" onclick="cart()"><i class="fas fa-cart-shopping" style="font-size: 3vh; padding-top: 2vh; padding-bottom: 1vh;"></i><br>Purchase</div>

</div>

<div class="far-school" id="far-school">
	<div class="info-slider-btn2" onclick="location.href = 'attendance_tgt.php'">
		<i class="fas fa-hand-fist" style="font-size: 3.5vh; padding-top: 1vh; padding-bottom: 2vh;"></i><br>Take Attendance
	</div>
	<div class="info-slider-btn2" onclick="location.href = 'exam_schedule_teacher_mob.php'" >
		<i class="fas fa-list-alt" style="font-size: 3.5vh; padding-top: 1vh; padding-bottom: 2vh;"></i><br>Exams
	</div>
	<div class="info-slider-btn2" onclick="location.href = 'classwork_teacher_mob.php'">
		<i class="fas fa-book" style="font-size: 3.5vh; padding-top: 1vh; padding-bottom: 2vh;"></i><br>Assign Classwork
	</div>
	<div class="info-slider-btn2" onclick="location.href = 'homework_teacher_mob.php'">
		<i class="fas fa-tasks" style="font-size: 3.5vh; padding-top: 1vh; padding-bottom: 2vh;"></i><br>Assign Homework
	</div>
	<div class="info-slider-btn2" onclick="location.href = 'time-table_teacher.php'">
		<i class="fa fa-calendar" style="font-size: 3.5vh; padding-top: 1vh; padding-bottom: 2vh;"></i><br>Schedule
	</div>
	<div class="info-slider-btn2" onclick="location.href = 'teacher_student_mob.php'">
		<i class="fa fa-chalkboard-teacher" style="font-size: 3.5vh; padding-top: 1vh; padding-bottom: 2vh;"></i><br>Teachers
	</div>
	<div class="info-slider-btn2" onclick="location.href = 'faculty_student_mob.php'">
		<i class="fa fa-user-group" style="font-size: 3.5vh; padding-top: 1vh; padding-bottom: 2vh;"></i><br>Faculties
	</div>
	<div class="info-slider-btn2"  onclick="location.href = 'issue_student_mob.php'">
		<i class="fa fa-comments" style="font-size: 3.5vh; padding-top: 1vh; padding-bottom: 2vh;"></i><br>Raise Issue
	</div>
	
</div>
<div class="far-school" id="far-inr" style="display: none;">
	<div class="info-slider-btn2" onclick="location.href = 'classwork_student_mob.php'">
		<i class="fab fa-cc-amazon-pay" style="font-size: 3.5vh; padding-top: 2vh; padding-bottom: 2vh;"></i><br>Pay Fee
	</div>
	<div class="info-slider-btn2" onclick="location.href = 'homework_student_mob.php'">
		<i class="fas fa-history" style="font-size: 3.5vh; padding-top: 2vh; padding-bottom: 2vh;"></i><br>History
	</div>
	<div class="info-slider-btn2" onclick="location.href = 'time-table_teacher.php'">
		<i class="fa fa-area-chart" style="font-size: 3.5vh; padding-top: 2vh; padding-bottom: 2vh;"></i><br>Fee chart
	</div>
	<div class="info-slider-btn2" onclick="location.href = 'issue_student_mob.php'">
		<i class="fa fa-comments" style="font-size: 3.5vh; padding-top: 2vh; padding-bottom: 2vh;"></i><br>Raise Issue
	</div>
</div>
<div class="far-school" id="far-running"  style="display: none;">
	
</div>
<div class="far-school" id="far-cart"  style="display: none;">
	
</div>

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