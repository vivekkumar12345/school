<?php
session_start();

include 'connection.php';
 $sql = "UPDATE teacher_salary set conf='Yes' where teacher_salary_id = '".$_GET['id']."' ";
 $query = mysqli_query($con, $sql);
if ($query) {
    ?>
<script type="text/javascript">
    alert('You Have Confirmed the salary');
    window.location.href = 'salary_list_teacher.php';
</script>
    <?php
}
?>