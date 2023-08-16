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
<script type="text/javascript" src="js/jquery-3.7.0.js"></script>
<script type="text/javascript" src="js/jquery-3.7.0.min.js"></script>
</head>
<body onload="dis()">
<?php
	session_start();
include 'dashboard_admin_left.php';
?>
		<div style="height:84vh; overflow-y:scroll;">
		<table class="tbl" cellpadding="0" cellspacing="0" style="overflow-y:scroll; margin-top: 5vh;">
			<tr class="tblhead" style="position: sticky; top: 0vh;">
				<td style="border-bottom-left-radius: 1vh;">Teacher Name</td>
				<td>Contact</td>
				<td>Class Teacher of</td>
				<td>Email</td>
				<td>Joining Date</td>
				<td>View Pay History</td>
		</tr>
			<?php
			include 'connection.php';
			$sqls1 = "SELECT * from teacher where status = 'Active' ";
			$querys1 = mysqli_query($con, $sqls1);
			while($rows1 = mysqli_fetch_assoc($querys1)){
				?>
					<tr>
				<td style="border-bottom-left-radius: 1vh; border-top-left-radius: 1vh;" ><?php echo $rows1['teacher_name'] ?></td>
				<td><?php echo $rows1['teacher_mob']; ?></td>
				<td><?php echo $rows1['class'].' '.$rows1['section']; ?></td>
				<td><?php echo $rows1['teacher_email']; ?></td>
				<td><?php echo $rows1['teacher_join_date']; ?></td>
				<td><button style="border:none; background-color:white;" class="fume" id="<?php echo $rows1['teacher_id']; ?>"><i class="fas fa-edit" style="color:blue;" ></i></button>
				</td>
			</tr>
				<?php
			}

			?>
			
		</table>
		</div>

<div class="popup" style="display:none;" id="popups">
	<div class="popup-tbl-container" id="result">
		



	</div>
	
</div>


<script type="text/javascript">
	function dis(){
		document.getElementById('finance').style.backgroundColor = 'black';
		document.getElementById('finance').style.color = 'white';
	}

	$(document).ready(function(){
		$(".fume").on("click", function(){
    	var teacher_id = this.id;
    	$.ajax({
   			 type: "POST",
			    url: 'get_teacher_history.php',
			    data : {
			    	teacher_id : teacher_id,
			    },
			    success: function(response){
			    	document.getElementById('popups').style.display = 'block';
			    	$("#result").html(response);
			    },
			  });
	 });
		});
</script>
</body>
