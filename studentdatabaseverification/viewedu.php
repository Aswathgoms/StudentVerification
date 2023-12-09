<?php
session_start();
if(isset($_SESSION['email'])){
include_once("include/header.php");
include_once("include/navbar.php");
include_once("include/connection.php");


$email=$_SESSION['email'];
$stmt = $conn->prepare("SELECT * FROM tbl_education where stu_email='$email' LIMIT 1");
$stmt->execute();
$row = $stmt->fetch();
?>

<div class="container-fluid">
<h1 class="h3 mb-4 text-gray-800">My Educational Details</h1>
<?php
if(isset($_SESSION['msg'])){echo $_SESSION['msg'];unset($_SESSION['msg']);}?>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
               window.location = "login.php";
      </script><?php
    //header("Location: login.php");
}


?>