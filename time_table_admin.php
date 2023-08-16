<table class="tbl" style="width: 90%; margin-left: 5%; height: 75%; color:white; font-family: 'Oswald', sans-serif;">
	<tr>
		<td>Subjects</td>
		<td>Monday</td>
		<td>Tuesday</td>
		<td>Wednesday</td>
		<td>Thursday</td>
		<td>Friday</td>
		<td>Saturday</td>
		<td>Sunday</td>

	</tr>
	<?php
			include 'connection.php';

			$sql1 = "SELECT * from slots";
			$query1 = mysqli_query($con, $sql1);
			while($row1=mysqli_fetch_assoc($query1)){
				?><tr>
					
					
					<?php
					if($row1['slot_type'] == 'Lunch'){
						?>
						<td style="font-size: 1.8vh; background-color:lightgreen; color: black;"><?php echo $row1['slot']; ?></td>
						<td colspan="7" style="background-color:lightgreen; color: black;">Lunch</td>

						<?php
					}
					else{
						?>
						<td style="font-size: 1.8vh;"><?php echo $row1['slot']; ?></td>

						<?php
						if(isset($_GET['class_ttbl'])){
							$cls = $_GET['class_ttbl'];
							$sec = $_GET['section_ttbl'];
						}
						else{
							$cls = 1;
							$sec = 'A';
						}
					$days = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
					for($i=0; $i<7; $i++){
					$sql2 = "SELECT * from schedule where slot = '".$row1['slot_id']."' and day = '".$days[$i]."' and class = '".$cls."' and section = '".$sec."'";
					$query2 = mysqli_query($con, $sql2);
					$row2=mysqli_fetch_assoc($query2);
					if($row2){
					?>
					<td><?php echo $row2['subject']; ?><br></td>

					<?php
				}
					else{
							?>
						<td> </td>
							<?php
						}

				}
			}
					?>
				</tr>
				<?php
			}

		?>
		<tr>
			<td colspan="8">
				<button class="tbl-submit" style="color:white;" onclick="location.href='create_timetable.php'"> Click to Create or Ammend Time Table</button>
			</td>
		</tr>
</table>