
<div class="popup" id="popups" >
	
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
				<td style="border-bottom-left-radius: 1vh;">Teacher Name</td>
				<td>Contact</td>
				<td>Class Teacher of</td>
				<td>Address</td>
				<td>Email</td>
				<td>Education</td>
				<td>Joining Date</td>
				<td>Action</td>
				<td style="border-bottom-right-radius: 1vh;">Assign</td>
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
				<td><?php echo $rows1['teacher_add']; ?></td>
				<td><?php echo $rows1['teacher_email']; ?></td>
				<td><?php echo $rows1['latest_education'].' ('.$rows1['latest_education_fm'].')'; ?></td>
				<td><?php echo $rows1['teacher_join_date']; ?></td>
				<td><i class="fas fa-edit" style="color:blue;" onclick="location.href='edit_teacher.php?teacher_idpop=<?php echo $rows1['teacher_id']; ?>'"></i>
				</td>
				<td style="border-bottom-right-radius: 1vh; border-top-right-radius: 1vh;"><i class="fas fa-edit" style="color:blue;" onclick="location.href='assign_class.php?teacher_idpop=<?php echo $rows1['teacher_id']; ?>'"></i></td>
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
		<button class="btnsp" onclick="location.href='poups_teacher_container.php'" style="background-color:red; margin-right: 2%;"><i class="fas fa-close" aria-hidden= 'false'></i>
			</button>
		<div style="height:3vh; max-width:100%; line-height:5vh;">
		</div>
		<form action="insert_teacher.php" method="POST">
		<table class="tbl1" cellpadding="0" cellspacing="0">
			<tr>
				<td colspan="8" style="height: 5vh; font-size:3.5vh; font-weight:bolder; font-family: 'Oswald', sans-serif;">ENTER TEACHER DETAILS</td>
			</tr>
			<tr>
				<td colspan="7" style="height:5vh;"></td>
			</tr>
			<tr>
				<td style="text-align:left;">Teacher Name* : </td>
				<td colspan="2"><input type="text" class="tbl-input" name="stname" required></td><td></td>
				<td style="text-align:left;">Date of Birth* :</td>
				<td colspan="2"><input type="date" class="tbl-input" name="stdob" required></td>
			</tr>
			<tr>
				<td style="text-align:left;">Contact No* : </td>
				<td colspan="2"><input type="text" class="tbl-input" name="stcontact" required></td><td></td>
				<td style="text-align:left;">Address* :</td>
				<td colspan="2"><input type="text" class="tbl-input" name="staddress" required></td>
			</tr>
			<tr>
				<td style="text-align:left;">Email Address* : </td>
				<td colspan="2"><input type="text" class="tbl-input" name="stemail" required></td><td></td>
				<td style="text-align:left;">Maticulation From : </td>
				<td colspan="2"><input type="text" class="tbl-input" name="stmatric"></td>
			</tr>
			<tr>
				<td style="text-align:left;">High School From* : </td>
				<td colspan="2"><input type="text" class="tbl-input" name="sthighschool" required></td><td></td>
				<td style="text-align:left;">Latest Education* :</td>
				<td colspan="2"><input type="text" class="tbl-input" name="stlatestedu" required></td>
			</tr>
			<tr>
				<td style="text-align:left;">Next of Kin* : </td>
				<td colspan="2"><input type="text" class="tbl-input" name="stkin" required></td><td></td>
				<td style="text-align:left;">Latest Education From* :</td>
				<td colspan="2"><input type="text" class="tbl-input" name="stlatestedufrom" required></td>
			</tr>
			<tr>
				<td style="text-align:left;">Joining Date* : </td>
				<td colspan="2"><input type="date" class="tbl-input" name="stjoindate" required></td><td></td>
				<td style="text-align:left;">Upload Photo* :</td>
				<td colspan="2"><input type="file" class="tbl-input" name="stphoto" required></td>
			</tr>
			<tr>
				<td style="text-align:left;">Aadhar No* : </td>
				<td colspan="2"><input type="text" class="tbl-input" name="staadhar" required></td><td></td>
				<td style="text-align:left;">PAN No* :</td>
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
