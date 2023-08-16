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
				
				<img src="images/teacher.png">
			</div>
			<div class="login-container-right">
				<div class="mob-image">
					<img src="images/teacher.png">

				</div>
				<table class="login-tbl">
					<form action="" method="GET">

						
						<tr><td><select type="text" name="option" class="input-login" placeholder="username" >
							<option >Select weather you are Teacher or Admin</option>
							<option value="Teacher">Teacher</option>
							<option value="Admin">Admin</option>
						</select></td></tr>
						<tr><td><input type="text" name="username" class="input-login" placeholder="email"></td></tr>
						<tr><td><input type="password" name="password" class="input-login" placeholder="password"></td></tr>
						<tr><td><input type="submit" name="submit" class="input-login-btn" value="Login"></td></tr>
						</form>
						<tr><td style="color: blue; text-align: right;"><a style="cursor: pointer;" onclick="location.href='index.php'"> Click here for student Login !!!</a></td></tr>
						
				</table>
			</div>
		</div>
	</div>
	<?php
	session_start();
if (!empty($_GET['submit'])) {
	if(!empty($_GET['username']) && !empty($_GET['password'])){
	if($_GET['option'] == "Teacher")
	{
	include "connection.php";
	$sql = "SELECT * from teacher where teacher_email = '".$_GET['username']."' AND teacher_password = '".$_GET['password']."' ";
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
		$_SESSION['user_type'] = 'Teacher';
		$_SESSION['teacher_id'] = $row['teacher_id'];
		$_SESSION['class'] = $row['class'];
		$_SESSION['section'] = $row['section'];
		$_SESSION['teacher_name'] = $row['teacher_name'];
		header("location:dashboard.php");
	}
	else{
		header("location:bomb.php");
	}
}
else if ($_GET['option'] == "Admin"){

include "connection.php";
	$sql = "SELECT * from admin where admin_email = '".$_GET['username']."' AND admin_password = '".$_GET['password']."' ";
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
		$_SESSION['user_type'] = 'Admin';
		$_SESSION['admin_id'] = $row['admin_id'];
		$_SESSION['admin_name'] = $row['admin_name'];
		header("location:dashboard.php");
	}
	else{
		header("location:bomb.php");
	}
}
else{
  echo "<script>alert('Someting is wrong please try again')</script>";
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