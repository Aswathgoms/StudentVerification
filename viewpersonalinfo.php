<?php
session_start();
include_once("include/header.php");
include_once("include/navbar.php");
include_once("include/connection.php");
if(isset($_SESSION['email'])){

$email=$_SESSION['email'];
$stmt = $conn->prepare("SELECT * FROM tbl_student where stu_email='$email' LIMIT 1");
$stmt->execute();
$row = $stmt->fetch();
?>

<div class="container-fluid">
<h1 class="h3 mb-4 text-gray-800">My Personal Details</h1>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

<tr>
  <th>Student Image & Signature</th>
  <td><?php echo "<img src='uploads/".$row['stu_img']."' alt=''>";
  echo "<img src='uploads/".$row['stu_sign']."' alt=''>";?></td>
</tr>
<tr>
  <th>Name</th>
  <td><?php echo $row['stu_name'];?></td>
</tr>
<tr>
  <th>DOB</th>
  <td><?php echo $row['stu_dob'];?></td>
</tr>
<tr>
  <th>Gender</th>
  <td><?php echo $row['stu_gender'];?></td>
</tr>
<tr>

  <th>Father's Name</th>
  <td><?php echo $row['stu_father'];?></td>
</tr>
<tr>
  <th>Mother's Name:</th>
  <td><?php echo $row['stu_mother'];?></td>
</tr>

<tr>
  <th>Aadhar No</th>
  <td><?php echo $row['stu_aadhar'];?></td>
</tr>
<tr>
  <th>PAN number</th>
  <td><?php echo $row['stu_pan'];?></td>
</tr>
<tr>
  <th>Contact No</th>
  <td><?php echo $row['stu_contact'];?></td>
</tr>
<th>Email Id</th>
  <td><?php echo $row['stu_email'];?></td>
</tr>
<tr>
  <th>Resume</th>
  <td><a href="downloadid.php?file_id=<?php echo $row['stu_resume'];?>"class="nav-link"><?php echo $row['stu_resume'];?></a></td>
</tr>
<tr>
</table>
</div>
<?php
}
else{
    ?><script>window.location.href = "login.php"</script><?php
}
include_once("include/footer.php");

?>