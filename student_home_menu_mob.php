<?php
session_start();
if(isset($_SESSION['dis'])){
    ?>
    <div style="height:6vh; width: 100%; background-color:black; color:white; line-height: 6vh; ">
    </div>
    <?php
}
else{
?>

<div style="height:6vh; width: 100%; background-color:black; color:white; line-height: 6vh; ">
	
<i style="float: left; line-height: 6vh; padding-left: 3%; font-size:3vh;" class="fas fa-arrow-alt-circle-left" onclick="location.href='dashboard.php'"></i>
<i style="float: left; line-height: 6vh; padding-left: 3%; font-size:3vh; float: right; margin-right:5%;" class="fa fa-sign-out" onclick="location.href='logout.php'"></i>
</div>

<?php

}
?>