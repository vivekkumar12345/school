<?php
session_start();
session_destroy();
?>

<script type="text/javascript">
	alert('Your are safely logged out');
	window.location.href = 'index.php';
</script>