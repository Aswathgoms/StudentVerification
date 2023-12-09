<?php
session_start();
include_once("include/header.php");
include_once("include/onavbar.php");
include_once("include/connection.php");
$email=$_SESSION['email'];
$stmt = $conn->prepare("SELECT officer_clg FROM tbl_officer where officer_id='$email' LIMIT 1");
$stmt->execute();
$college = $stmt->fetch();
$c=$college['officer_clg'];
$stmt = $conn->prepare("SELECT * FROM tbl_student join tbl_education on tbl_student.stu_email=tbl_education.stu_email where tbl_education.clg_name='$c'");
$stmt->execute();
$rows = $stmt->fetchAll();
?>
<div class="container-fluid">
<h1 class="h3 mb-4 text-gray-800">Student Details</h1>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<?php
if($rows){?>
<tr>
  <th>Name</th>
  <th>DOB</th>
  <th>Email</th>
  <th>Contact</th>
  <th>Father Name</th>
  <th>Mother Name</th>
  <th>Status</th>
  <th>View</th>
</tr><?php
foreach($rows as $row){?>
<tr>
  <td><?php echo $row['stu_name'];?></td>
  <td><?php echo $row['stu_dob'];?></td>
  <td><?php echo $row['stu_email'];?></td>
  <td><?php echo $row['stu_contact'];?></td>
  <td><?php echo $row['stu_father'];?></td>
  <td><?php echo $row['stu_mother'];?></td>
  <td><?php echo $row['stu_status'];?></td>
  <td>
                <form action="viewadetail.php" method="post">    
                    <input type="hidden" value="<?php echo $row['stu_email']; ?>" name="stu_email">
                    <input type="submit"  value="VIEW" name="eview"class="btn btn-primary">
            </form>
                </td>
</tr>
<?php }}
else{?>
<tr>
    <th><center><b>No Data</b></center></th></tr><?php
}?>
</table>
</div>
<?php
include_once("include/footer.php");
?>