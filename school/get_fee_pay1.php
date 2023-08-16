<div class="popup-tbl-container" style="height:50vh; width:50%; margin-top:15vh; margin-left:auto; margin-right: auto;">
	<button class="btnsp" onclick="closure()" style="background-color:red; margin-right: 2%;"><i class="fas fa-close" aria-hidden= 'false'></i>
			</button>
			<table class="tbl1" style="width: 90%; margin-left:5%;" cellpadding="0" cellspacing="0">
			<tr>
				<td>Mode of Payment</td>
				<td>:</td>
				<td><select class="tbl-input" name="mode" id="mode" style="width:80%;">
					<option value="Cash">Cash</option>
					<option value="UPI">UPI</option>
					<option value="Online">Online</option>
					<option value="Cheque">Cheque</option>
					<option value="Demand Draft">Demand Draft</option>
					<option value="School Concession">School Concession</option>
				</select></td>
			</tr>
			<tr>
				<td>Collected By</td>
				<td>:</td>
				<td><select class="tbl-input" name="collected_by" id="collected_by" style="width:80%;">
					<?php
					session_start();
			include 'connection.php';
			$sqls1 = "SELECT * from teacher where status = 'Active' ";
			$querys1 = mysqli_query($con, $sqls1);
			while($rows1 = mysqli_fetch_assoc($querys1)){
				?>
					<option value="<?php echo $rows1['teacher_name'] ?>"><?php echo $rows1['teacher_name'] ?></option>
					<?php
				}
					?>
				</select></td>
			</tr>
			<tr>
				<td>Transaction ID/ Cheque No/ DD No</td>
				<td>:</td>
				<td><input type="text" name="txn" id="txn" class="tbl-input" style="width:80%;"></td>
			</tr>
			<tr>
				<?php
				$sqls = "SELECT * from fee_schedule where fee_schedule_id = '".$_POST['fee_schedule_id']."'";
				$querys = mysqli_query($con, $sqls);
				$rows = mysqli_fetch_assoc($querys);

				?>
				<td>Amount</td>
				<td>:</td>
				<input type="hidden" name="student_id" id="student_id" value="<?php echo $_POST['student_id']; ?>">
				<input type="hidden" name="fee_schedule_id" id="fee_schedule_id" value="<?php echo $_POST['fee_schedule_id']; ?>">
				<input type="hidden" name="month" value="<?php echo $_POST['month']; ?>">
				<td><input type="text" id="fees" name="fees" class="tbl-input" style="width:80%;" value="<?php echo $rows['fees']; ?>" disabled></td>
			</tr>
			<tr>
				<td colspan="3">
					<input type="submit" class="tbl-submit" name="submit" id="submit">
				</td>
			</tr>
		</table>
</div>

<script type="text/javascript">
	function closure() {
		document.getElementById('popup').style.display = 'none';
	}
	$(document).ready(function(){
		$("#submit").on("click", function(){
    	var month = $("#month").val();
    	var mode = $("#mode").val();
    	var student_id = $("#student_id").val();
    	var collected_by = $("#collected_by").val();
    	var txn = $("#txn").val();
    	var fee_schedule_id = $("#fee_schedule_id").val();
    	var fees = $("#fees").val();
    	$.ajax({
   			 type: "POST",
			    url: 'fee_pay_exe.php',
			    data : {
			    	student_id : student_id,
			    	fee_schedule_id : fee_schedule_id,
			    	month : month,
			    	mode : mode,
			    	collected_by : collected_by,
			    	txn : txn,
			    	fees : fees,

			    },
			    success: function(response){
			    	$.ajax({
   			 			type: "POST",
			   			 url: 'get_fee_pay.php',
			   				 data : {
			    					month : month,
			   				 },
						    cache :  false,
						    success: function(response1){
						    	$("#result").html(response1);
			       
			    }
			  });
			       
			    }
			  });
			  });
	 });

</script>