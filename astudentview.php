<?php
session_start();
if(isset($_REQUEST['email'])){
include_once("include/header.php");
include_once("include/anavbar.php");
include_once("include/connection.php");


$email=$_REQUEST['email'];
$stmt = $conn->prepare("SELECT * FROM tbl_education where stu_email='$email' LIMIT 1");
$stmt->execute();
$row = $stmt->fetch();
$stmt = $conn->prepare("SELECT * FROM tbl_student where stu_email='$email' LIMIT 1");
$stmt->execute();
$row1 = $stmt->fetch();
?>

<div class="container-fluid">
<h1 class="h3 mb-4 text-gray-800">Student Details</h1>
<?php
if(isset($_SESSION['msg'])){echo $_SESSION['msg'];unset($_SESSION['msg']);}?>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<tr>
  <th>Student Image & Signature</th>
  <td><?php echo "<img src='uploads/".$row1['stu_img']."' alt=''>";
  echo "<img src='uploads/".$row1['stu_sign']."' alt=''>";?></td>
</tr>
<tr>
  <th>Name</th>
  <td><?php echo $row1['stu_name'];?></td>
</tr>
<tr>
  <th>DOB</th>
  <td><?php echo $row1['stu_dob'];?></td>
</tr>
<tr>
  <th>Gender</th>
  <td><?php echo $row1['stu_gender'];?></td>
</tr>
<tr>

  <th>Father's Name</th>
  <td><?php echo $row1['stu_father'];?></td>
</tr>
<tr>
  <th>Mother's Name:</th>
  <td><?php echo $row1['stu_mother'];?></td>
</tr>

<tr>
  <th>Aadhar No</th>
  <td><?php echo $row1['stu_aadhar'];?></td>
</tr>
<tr>
  <th>PAN number</th>
  <td><?php echo $row1['stu_pan'];?></td>
</tr>
<tr>
  <th>Contact No</th>
  <td><?php echo $row1['stu_contact'];?></td>
</tr>
<th>Email Id</th>
  <td><?php echo $row1['stu_email'];?></td>
</tr>
<tr>
  <th>Resume</th>
  <td><a href="downloadid.php?file_id=<?php echo $row1['stu_resume'];?>"class="nav-link"><?php echo $row1['stu_resume'];?></a></td>
</tr>
<tr>

<tr>
    <th><center><b>SSLC</b></center></th></tr>
<tr>
  <th>SSLC REGNO</th>
  <td><?php echo $row['sslc_regno'];?></td>
</tr>
<tr>
  <th>SCHOOL</th>
  <td><?php echo $row['sslc_school'];?></td>
</tr>
<tr>
  <th>Board</th>
  <td><?php echo $row['sslc_board'];?></td>
</tr>
<tr>
  <th>PERCENTAGE:</th>
  <td><?php echo $row['sslc_markperc'];?></td>
</tr>
<tr>
  <th>Marksheet</th>
  <td><a href="downloadid.php?file_id=<?php echo $row['sslc_marksheet'];?>"class="nav-link"><?php echo $row['sslc_marksheet'];?></a></td>
</tr>
<tr>
  <th>PASSOUT YEAR</th>
  <td><?php echo $row['sslc_passout'];?></td>
</tr>
<tr>
    <th><center>HSC</center></th></tr>
<tr>
  <th>REGNO:</th>
  <td><?php echo $row['hsc_regno'];?></td>
</tr>
<tr>
  <th>SCHOOL</th>
  <td><?php echo $row['hsc_school'];?></td>
</tr>
<tr>
  <th>BOARD</th>
  <td><?php echo $row['hsc_board'];?></td>
</tr>
<th>SPECIALIZATION</th>
  <td><?php echo $row['hsc_markperc'];?></td>
</tr>
<tr>
  <th>PERCENTAGE:</th>
  <td><a href="downloadid.php?file_id=<?php echo $row['hsc_marksheet'];?>"class="nav-link"><?php echo $row['hsc_marksheet'];?></a></td>
</tr>
<tr>
  <th>Marksheet</th>
  <td><?php echo $row['hsc_specialization'];?></td>
</tr>
<tr>
  <th>PASSOUT YEAR</th>
  <td><?php echo $row['hsc_passout'];?></td>
</tr>
<tr>
    <th><center><b>COLLEGE</b></center></th></tr>
<tr>
  <th>Student Id</th>
  <td><?php echo $row['clg_regno'];?></td>
</tr>
<tr>
  <th>COLLEGE NAME</th>
  <td><?php echo $row['clg_name'];?></td>
</tr>
<tr>
  <th>DEPARTMENT</th>
  <td><?php echo $row['clg_department'];?></td>
</tr>
<th>UNIVERSITY</th>
  <td><?php echo $row['clg_university'];?></td>
</tr>
<tr>
  <th>PERCENTAGE / CGPA:</th>
  <td><?php echo $row['clg_mark'];?></td>
</tr>
<tr>
  <th>Marksheet</th>
  <td><a href="downloadid.php?file_id=<?php echo $row['clg_marksheet'];?>"class="nav-link"><?php echo $row['clg_marksheet'];?></a></td>
</tr>
<tr>
  <th>PASSOUT YEAR</th>
  <td><?php echo $row['clg_passout'];?></td>
</tr>
<tr>
</table>
</div>
<?php
include_once("include/footer.php");
}
else{?>
  <script type = "text/javascript">
               window.location = "alogin.php";
      </script><?php
    //header("Location: login.php");
}


?>