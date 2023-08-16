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
<body>

<div style="height: 90vh; width:90%; margin-left: 5%; border-radius: 2vh; margin-top: 4vh; ">
	<?php

session_start();
include 'back_finance.php';
include 'login_btn.php';
include 'connection.php';
?>
<select class="tbl-input" id="month" style="width: 50%; margin-left: 25%;">
	<option>---Select Month-----</option>
	<?php
		$sql = "SELECT distinct(month) as month from fee_schedule";
		$query = mysqli_query($con, $sql);
		while($row = mysqli_fetch_assoc($query)){
			?>
			<option value="<?php echo $row['month'] ?>"><?php echo $row['month']; ?></option>
			<?php
		}
	?>
</select>

	
	<div class="popup-tbl-container" id="result">
		
	</div>





</div>


<script type="text/javascript">
	$(document).ready(function(){

  	$("#month").on("change", function(){
  		 
    	var data = this.value;
    	$.ajax({
   			 type: "POST",
			    url: 'get_fee_pay.php',
			    data : {
			    	month : data,
			    },
			    cache :  false,
			    success: function(response){
			    	$("#result").html(response);
			       
			    }
			  });
			  });

});
	function views(dta){
		alert('hello');
		window.location.href = 'fee_pay.php?mth='+dta;

	}

	
</script>


</body>
</html>