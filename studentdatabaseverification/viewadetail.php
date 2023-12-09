<?php
session_start();
if(isset($_POST['stu_email'])){
include_once("include/header.php");
include_once("include/onavbar.php");
include_once("include/connection.php");
$email=$_POST['stu_email'];
$stmt = $conn->prepare("SELECT * FROM tbl_student join tbl_education on tbl_student.stu_email=tbl_education.stu_email where tbl_education.stu_email='$email' limit 1");
$stmt->execute();
$row = $stmt->fetch();
?>

<div class="container-fluid">
<h1 class="h3 mb-4 text-gray-800">My Educational Details</h1>
<?php
if(isset($_SESSION['msg'])){echo $_SESSION['msg'];unset($_SESSION['msg']);}?>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<tr>
    <th><center><b>Personal Details</b></center></th></tr>
<tr>
<tr>
  <th>Student Image & Signature</th>
  <td><?php echo "<img src='uploads/".$row['stu_img']."' alt=''>";
  echo "<img src='uploads/".$row['stu_sign']."' alt=''>";?></td>
</tr>
<tr>
  <th>NAME</th>
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
  <th>FATHER NAME</th>
  <td><?php echo $row['stu_father'];?></td>
</tr>
<tr>
  <th>MOTHER NAME</th>
  <td><?php echo $row['stu_mother'];?></td>
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
<th>Email</th>
  <td><?php echo $row['stu_email'];?></td>
</tr>
<tr>
  <th>Resume</th>
  <td><a href="downloadid.php?file_id=<?php echo $row['stu_resume'];?>"class="nav-link"><?php echo $row['stu_resume'];?></a></td>
</tr>
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
<center><form action="#" method="post">    
                    <input type="hidden" value="<?php echo $row['stu_email']; ?>" name="stu_email">
                    <input type="submit"  value="Verify" name="verify"class="btn btn-primary">
            </form></center>
</div>
<?php
include_once("include/footer.php");
}
else{?>
  <script type = "text/javascript">
               window.location = "login.php";
      </script><?php
    //header("Location: login.php");
}


?>
<?php
if(isset($_REQUEST['verify']))
{
  $stuemail=$_REQUEST['stu_email'];
  $stmt=$conn->prepare("UPDATE tbl_student SET stu_status = 'Verified' WHERE stu_email = '$stuemail';");
  $stmt->execute();
  
}