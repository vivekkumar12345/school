<html>
<head>
	<meta name="viewport" content="width=device-width; initial-scale=1.0" >
	<title>School Name</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="css/issue_student.css">
</head>
<body>
	<?php
	include 'student_home_menu_mob.php';
	?>
	<div style="height:80vh; width:100%; overflow-y: scroll;">
	<?php
include 'connection.php';

$s1 = "SELECT * from teacher where teacher_id = '".$_SESSION['teacher_id']."'";
$q1 = mysqli_query($con, $s1);
$r1 = mysqli_fetch_assoc($q1);


$sqls = "SELECT * from teacher_salary where teacher_id = '".$_SESSION['teacher_id']."' and conf='No' ";
$querys = mysqli_query($con, $sqls);
while($rows = mysqli_fetch_assoc($querys)){

?>

<div id="carrier" style=" height: 20vh; vertical-align: middle; margin-top: 4vh; width:90%; overflow: hidden; margin-left:auto; margin-right: auto; border-radius:2vh; 
background: linear-gradient(to right, #2193b0, #6dd5ed); box-shadow: 0 0 2vh rgba(0, 0, 0, 0.2); color: white; text-align:center; transition: all .5s ease-in;
	-moz-transition : all .5s ease-in;
	-webkit-transition: all .5s ease-in;">
	<div style="height:2vh;"></div>
<a style="line-height: 3vh; font-family:'Oswald', sans-serif; font-size: 2.2vh;"><?php echo  $rows['month']; ?> <br>
	<span style="color:red;">Amount : <?php echo $rows['amount']; ?></span></a>
<br><button class="submits" onclick="viewer(<?php echo $rows['teacher_salary_id'] ?>)" style="width:45%; margin-left: auto; margin-right: auto; margin-top:1vh;" id="btn1">Click to Confirm</button>
<br>
<a style="font-size:1.5vh; font-family: arial; line-height:5vh; float: right; padding-right: 5%;  padding-top:1vh; color:blue;">Paid on : <?php echo $rows['date']; ?> on Acc No : <?php echo $rows['account_number']; ?></a>
</div>
<?php
}
?>
</div>

</body>
<script type="text/javascript">
	function viewer(data){

		window.location.href = 'salary_teacher_confirm.php?id='+data;

	}
</script>
</html>