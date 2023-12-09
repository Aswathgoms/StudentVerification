<?php
session_start();
if(isset($_SESSION['email'])){
include_once("include/header.php");
include_once("include/navbar.php");
include_once("include/connection.php")
?>
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Status</h1>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<tr>
  <th>Status</th>
  <td><?php
  $email=$_SESSION['email'];
  $stmt=$conn->prepare("SELECT stu_status FROM tbl_student where stu_email='$email';");
  $stmt->execute();
  $row=$stmt->fetch();
  echo $row['stu_status'];?></td>
</tr>
</table>
</div>
<?php
include_once("include/footer.php");
}
else{
  header("Location: login.php");
}
?>