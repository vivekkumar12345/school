<html>
<head>
	<meta name="viewport" content="width=device-width; initial-scale=1.0" >
	<title>School Name</title>
	<link rel="stylesheet" href="css/style_index.css" >
</head>
<body>
	<div class="head_login">
		<div class="login-container">
			<div class="login-container-left">
				
				<img src="images/student.png">
			</div>
			<div class="login-container-right">
				<div class="mob-image">
					<img src="images/student.png">

				</div>
				<table class="login-tbl">
					<form action="" method="GET">

						<tr><td style="font-size: 4vh; font-weight: bold;">Hello Students</td></tr>
						<tr><td style="font-size: 2vh; " class="aa">Please enter your details to login</td></tr>
						<tr><td><input type="text" name="username" class="input-login" placeholder="username"></td></tr>
						<tr><td><input type="password" name="password" class="input-login" placeholder="password"></td></tr>
						<tr><td><input type="submit" name="submit" class="input-login-btn" value="Login"></td></tr>
						</form>
						<tr><td style="color: blue; text-align: right;"><a style="cursor: pointer;" onclick="location.href='admin_login.php'"> Click here for Staff Login !!!</a></td></tr>
						
				</table>
			</div>
		</div>
	</div>
	<?php
session_start();
if (!empty($_GET['submit'])) {
	if(!empty($_GET['username']) && !empty($_GET['password'])){
	include "connection.php";
	$sql = "SELECT * from students where student_id = '".$_GET['username']."' AND password = '".$_GET['password']."' ";
	$query = mysqli_query($con, $sql);
	$row = mysqli_fetch_assoc($query);
	if($row){
		$sqls1 = "SELECT * from current_session";
	$querys1 = mysqli_query($con, $sqls1);
	$rows1 = mysqli_fetch_assoc($querys1);
	$_SESSION['current_session'] = $rows1['current_session'];
	$sqls2 = "SELECT * from school";
	$querys2 = mysqli_query($con, $sqls2);
	$rows2 = mysqli_fetch_assoc($querys2);
$_SESSION['school'] = $rows2['school_name'];
		$_SESSION['user_type'] = 'Student';
		$_SESSION['student_id'] = $row['student_id'];
		$_SESSION['student_name'] = $row['student_name'];
		$_SESSION['class'] = $row['class'];
		$_SESSION['section'] = $row['section'];
		$_SESSION['school'] = $row['school'];
		header("location:dashboard.php");
	}
	else{

		header("location:bomb.php");
	}

}
else{

	echo "<script>alert('Username and Password cannot be empty')</script>";
}
}
else{
	
}

?>

</body>

</html>