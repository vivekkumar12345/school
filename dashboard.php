<?php
session_start();

if($_SESSION['user_type']=='Student'){
	include 'dashboard_student.php';
}
else if($_SESSION['user_type']=='Teacher'){
	include 'dashboard_teacher.php';
}
else if($_SESSION['user_type']=='Admin'){
	include 'dashboard_admin.php';
}
else{
	header('location:index.php');
}

					
?>