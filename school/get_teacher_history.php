<div style="height:5vh; max-width:100%; line-height:5vh;">
			<button class="btnsp" onclick="closefile()" style="background-color:red; margin-right: 2%;"><i class="fas fa-close" aria-hidden= 'false'></i>
			</button>
		</div>
		<div style="height:84vh; overflow-y:scroll;">
		<table class="tbl" cellpadding="0" cellspacing="0" style="overflow-y:scroll;">
			<tr class="tblhead" style="position: sticky; top: 0vh;">
				<td style="border-bottom-left-radius: 1vh;">Amount</td>
				<td>Month</td>
				<td>Account Number</td>
				<td>Date of Payment</td>
				<td>Confirmation Status</td>
				<td style="border-bottom-right-radius: 1vh;">Actions</td>
		</tr>
			<?php
			include 'connection.php';
			$sqls1 = "SELECT * from teacher_salary where teacher_id = '".$_POST['teacher_id']."' order by teacher_salary_id DESC";
			$querys1 = mysqli_query($con, $sqls1);
			while($rows1 = mysqli_fetch_assoc($querys1)){
				?>
					<tr>
				<td><?php echo $rows1['amount'] ?></td>
				<td><?php echo $rows1['month'] ?></td>
				<td><?php echo $rows1['account_number'] ?></td>
				<td><?php echo $rows1['date'] ?></td>
				<td><?php echo $rows1['conf'] ?></td>
				<?php
				if ($rows1['conf'] == 'No') {
				
				?>
				<td style="border-bottom-right-radius: 1vh; border-top-right-radius: 1vh;"><i class="fas fa-edit" style="color:blue;"></i></td>
				<?php
			}
			else{
				?>
				<td>Confirmed by Teacher</td>

				<?php
			}


				?>
			</tr>
				<?php
			}

			?>
			
		</table>
		</div>

		<script type="text/javascript">
			function closefile() {
				document.getElementById('popups').style.display = 'none';
			}
		</script>