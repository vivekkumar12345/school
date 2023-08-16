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
</head>
<body onload="dis()">
<?php
session_start();
include 'dashboard_admin_left.php';
?>
		<div class="body-bottom-right">
			
			
		</div>
<script type="text/javascript">
		function dis(){
		document.getElementById('dashboard').style.backgroundColor = 'black';
		document.getElementById('dashboard').style.color = 'white';
	}
</script>

</body>
