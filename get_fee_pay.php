<div style="height:5vh; max-width:100%; line-height:5vh;">
		</div>
		<div style="height:88vh; overflow-y:scroll;">
		<table class="tbl" cellpadding="0" cellspacing="0" style="overflow-y:scroll;">
			<tr class="tblhead" style="position:sticky; top:0;">
				<td style="border-bottom-left-radius: 1vh;">Name</td>
				<td>DOB</td>
				<td>Father's Name</td>
				<td>Mother's Name</td>
				<td>Contact</td>
				<td>Class</td>
				<td>Section</td>
				<td>Address</td>
				<td style="border-bottom-right-radius: 1vh;">Confirm Payment</td>
		</tr>
			<?php
			session_start();
			include 'connection.php';

			$sqls1 = "SELECT * from students where status = 'Active' ";
			$querys1 = mysqli_query($con, $sqls1);
			while($rows1 = mysqli_fetch_assoc($querys1)){
				$s1 = "SELECT * from fee_schedule where month = '".$_POST['month']."' and class = '".$rows1['class']."' ";
				$q1 = mysqli_query($con, $s1);
				$r1 = mysqli_fetch_assoc($q1);
				?>

					<tr>
				<input type="hidden" name="" id="fee" value="<?php echo $r1['fee_schedule_id']; ?>">
				<td style="border-bottom-left-radius: 1vh; border-top-left-radius: 1vh;" >
				<?php echo $rows1['student_name'] ?></td>
				<td><?php echo $rows1['dob'] ?></td>
				<td><?php echo $rows1['father_name'] ?></td>
				<td><?php echo $rows1['mother_name'] ?></td>
				<td><?php echo $rows1['mob_no'] ?></td>
				<td><?php echo $rows1['class'] ?></td>
				<td><?php echo $rows1['section'] ?></td>
				<td><?php echo $rows1['address'] ?></td>

				<td style="border-bottom-right-radius: 1vh; border-top-right-radius: 1vh;">
					<?php

					$sql12 = "SELECT * from fee_paid where student_id='".$rows1['student_id']."' and fee_schedule_id = '".$r1['fee_schedule_id']."'";
					$query12 = mysqli_query($con, $sql12);
					$row12 = mysqli_fetch_assoc($query12);
					if ($row12) {
						echo 'Payment Done on '.$row12['payment_date_time'];
					}
					else if($rows1['doj']>$r1['last_date']){
						echo 'Was not in School';
					}
else{
				?><i class="fas fa-edit" style="color:blue;" id="<?php echo $rows1['student_id']; ?>"></i>

<?php

}

?>
			</td>
			</tr>
				<?php
			}

			?>
			
		</table>
		</div>
		<div class="popup" id="popup" style="display:none;">
			
		</div>

<script type="text/javascript">
	$(document).ready(function(){

  	$(".fa-edit").on("click", function(){
    	var data = this.id;
    	var month = $("#month").val();
    	var data2 = $("#fee").val();
    	$.ajax({
   			 type: "POST",
			    url: 'get_fee_pay1.php',
			    data : {
			    	student_id : data,
			    	fee_schedule_id : data2,
			    	month : month,
			    },
			    cache :  false,
			    success: function(response){
			    	document.getElementById('popup').style.display = 'block';
			    	$("#popup").html(response);
			       
			    }
			  });
			  });

});
</script>


