<?php
session_start();
include_once("include/header.php");
include_once("include/onavbar.php");
include_once("include/connection.php");
if(isset($_SESSION['email'])){

$email=$_SESSION['email'];
$stmt = $conn->prepare("SELECT * FROM tbl_officer where officer_id='$email' LIMIT 1");
$stmt->execute();
$row = $stmt->fetch();
?>

<div class="container-fluid">
<h1 class="h3 mb-4 text-gray-800">Officer Details</h1>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

<tr>
  <th>Name</th>
  <td><?php echo $row['officer_name'];?></td>
</tr>
<tr>
  <th>Qualification</th>
  <td><?php echo $row['officer_qua'];?></td>
</tr>
<tr>
  <th>College</th>
  <td><?php echo $row['officer_clg'];?></td>
</tr>
<tr>
  <th>Email</th>
  <td><?php echo $row['officer_id'];?></td>
</tr>
</table>
</div>
<?php
}
else{
    header("Location: login.php");
}
include_once("include/footer.php");

?>