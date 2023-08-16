
<div class="popup" id="popups">
	
	<div class="popup-tbl-container">
		<div style="height:5vh; max-width:100%; line-height:5vh;">
			<button class="btnsp" onclick="location.href='admin_school.php'" style="background-color:red; margin-right: 2%;"><i class="fas fa-close" aria-hidden= 'false'></i>
			</button>
			<button class="btnsp" onclick="persInfo()"><i class="fas fa-plus" aria-hidden= 'false'></i>
			</button>
		</div>
		<div style="height:84vh; overflow-y:scroll;">
		<table class="tbl" cellpadding="0" cellspacing="0" style="overflow-y:scroll;">
			<tr class="tblhead" style="position: sticky; top: 0vh;">
				<td style="border-bottom-left-radius: 1vh;">Name</td>
				<td>DOB</td>
				<td>Father's Name</td>
				<td>Mother's Name</td>
				<td>Contact</td>
				<td>Class</td>
				<td>Section</td>
				<td>Address</td>
				<td style="border-bottom-right-radius: 1vh;">Actions</td>
		</tr>
			<?php
			include 'connection.php';
			$sqls1 = "SELECT * from students where status = 'Active' ";
			$querys1 = mysqli_query($con, $sqls1);
			while($rows1 = mysqli_fetch_assoc($querys1)){
				?>
					<tr>
				<td style="border-bottom-left-radius: 1vh; border-top-left-radius: 1vh;" ><?php echo $rows1['student_name'] ?></td>
				<td><?php echo $rows1['dob'] ?></td>
				<td><?php echo $rows1['father_name'] ?></td>
				<td><?php echo $rows1['mother_name'] ?></td>
				<td><?php echo $rows1['mob_no'] ?></td>
				<td><?php echo $rows1['class'] ?></td>
				<td><?php echo $rows1['section'] ?></td>
				<td><?php echo $rows1['address'] ?></td>
				<td style="border-bottom-right-radius: 1vh; border-top-right-radius: 1vh;"><i class="fas fa-edit" style="color:blue;" onclick="location.href='edit_student.php?student_idpop=<?php echo $rows1['student_id']; ?>'"></i></td>
			</tr>
				<?php
			}

			?>
			
		</table>
		</div>
	</div>

</div>



<div class="popup" id="popups1" style="display:none;">
	
	<div class="popup-tbl-container">
		<button class="btnsp" onclick="location.href='poups_student_container.php'" style="background-color:red; margin-right: 2%;"><i class="fas fa-close" aria-hidden= 'false'></i>
			</button>
		<div style="height:3vh; max-width:100%; line-height:5vh;">
		</div>
		<form action="insert_student.php" method="POST" enctype="multipart/form-data">
		<table class="tbl1" cellpadding="0" cellspacing="0">
			<tr>
				<td colspan="8" style="height: 5vh; font-size:3.5vh; font-weight:bolder; font-family: 'Oswald', sans-serif;">ENTER STUDENT DETAILS</td>
			</tr>
			<tr>
				<td colspan="7" style="height:5vh;"></td>
			</tr>
			<tr>
				<td style="text-align:left;">Student Name* : </td>
				<td colspan="2"><input type="text" class="tbl-input" name="stname" required></td><td></td>
				<td style="text-align:left;">Date of Birth* :</td>
				<td colspan="2"><input type="date" class="tbl-input" name="stdob" required></td>
			</tr>
			<tr>
				<td style="text-align:left;">Father's Name* : </td>
				<td colspan="2"><input type="text" class="tbl-input" name="stfather" required></td><td></td>
				<td style="text-align:left;">Mother's Name* :</td>
				<td colspan="2"><input type="text" class="tbl-input" name="stmother" required></td>
			</tr>
			<tr>
				<td style="text-align:left;">Contact No* : </td>
				<td colspan="2"><input type="text" class="tbl-input" name="stcontact" required></td><td></td>
				<td style="text-align:left;">Alternate Contact No : </td>
				<td colspan="2"><input type="text" class="tbl-input" name="stalternate"></td>
			</tr>
			<tr>
				<td style="text-align:left;">Present Address* : </td>
				<td colspan="2"><input type="text" class="tbl-input" name="stpaddress" required></td><td></td>
				<td style="text-align:left;">Home Address* :</td>
				<td colspan="2"><input type="text" class="tbl-input" name="sthaddress" required></td>
			</tr>
			<tr>
				<td style="text-align:left;">Class* : </td>
				<td colspan="2">

					<select  class="tbl-input" name="stclass" required>
						<option> </option>
						<?php
						include 'connection.php';
						$sqlclass = "SELECT * from class_section";
						$queryclass = mysqli_query($con, $sqlclass);
						while($rowclass = mysqli_fetch_assoc($queryclass)){
							?>
							<option value="<?php echo $rowclass['class']; ?>"><?php echo $rowclass['class']; ?></option>

							<?php
						}

						?>
					</select>
					</td>


					<td></td>
				<td style="text-align:left;">Section* :</td>
				<td colspan="2">

					<select  class="tbl-input" name="stsection" required>
						<option> </option>
						<?php
						include 'connection.php';
						$sqlsection = "SELECT * from class_section";
						$querysection = mysqli_query($con, $sqlsection);
						while($rowsection = mysqli_fetch_assoc($querysection)){
							?>
							<option value="<?php echo $rowsection['section']; ?>"><?php echo $rowsection['section']; ?></option>

							<?php
						}

						?>
					</select>
				</td>
			</tr>
			<tr>
				<td style="text-align:left;">Email* : </td>
				<td colspan="2"><input type="text" class="tbl-input" name="stemail" required></td><td></td>
				<td style="text-align:left;">Upload Photo* :</td>
				<td colspan="2"><input type="file" class="tbl-input" name="stphoto" id="stphoto" required></td>
			</tr>
			<tr>
				<td style="text-align:left;">Aadhar No* : </td>
				<td colspan="2"><input type="text" class="tbl-input" name="staadhar" required></td><td></td>
				<td style="text-align:left;">PAN No* :</td>s
				<td colspan="2"><input type="text" class="tbl-input" name="stpan" required></td>
			</tr>
			<tr>
				<td style="text-align:left;">Password* : </td>
				<td colspan="2"><input type="password" class="tbl-input" name="stpwd" id="pwd1" required></td><td></td>
				<td style="text-align:left;">Confirm Password* :</td>
				<td colspan="2"><input type="password" style="float:left; width: 90%;" class="tbl-input" name="stpwd1" id="pwd2" onkeyup="test1()" required><i id='check' class="fas fa-check" style="float:right; line-height: 4vh; font-weight:bolder; color:red"></i></td>

			</tr>
			<tr>
				<td colspan="7"><input type="submit" value="Submit" id="submit" class="tbl-submit" disabled></td>
			</tr>
		</table>
	</form>
	</div>

</div>


<script type="text/javascript">
	function persInfo(){
		document.getElementById('popups1').style.display = 'block'

	}

	function test1(){
		var x = document.getElementById('pwd1').value;
		var y = document.getElementById('pwd2').value;
		if( x == y){
			document.getElementById('check').style.color = 'green';
			document.getElementById('submit').disabled = false;
		}

	}

</script>
