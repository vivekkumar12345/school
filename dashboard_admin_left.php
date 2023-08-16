
		<div class="body-bottom-left">
			<div class="head">
				<?php
					echo $_SESSION['school'];
			?>

			</div>
			<img src="images/logo.png">
			<hr style="width:80%; margin-bottom:5vh;">
			<div class="pers-info">
				<div class="profile-photo">
					<img src="images/admin/<?php echo $_SESSION['admin_id']; ?>.jpg" />
				</div>
				<a style="padding-left: 10%;"><i class="fas fa-star" style="color: gray;"></i>
					<i class="fas fa-star" style="color: gray;"></i>
					<i class="fas fa-star" style="color: gray;"></i>
					<i class="fas fa-star" style="color: gray;"></i>
					<i class="fas fa-star" style="color: gray;"></i></a>
			</div>
			<div class="menu-bar" style="margin-top:5vh;" id="dashboard" onclick="location.href='dashboard_admin.php'">Dashboard</div>
			<div class="menu-bar" onclick="location.href='admin_school.php'" id="school">School</div>
			<div class="menu-bar" onclick="location.href='admin_finance.php'" id="finance">Finance</div>
			<div class="menu-bar">Activites</div>
		</div>
