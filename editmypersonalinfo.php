<?php
session_start();
if(isset($_SESSION['email'])){
include_once("include/header.php");
include_once("include/navbar.php");
include_once("include/connection.php");
$email=$_SESSION['email'];
$stmt = $conn->prepare("SELECT * FROM tbl_student where stu_email='$email' LIMIT 1");
$stmt->execute();
$row = $stmt->fetch();
?>
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Edit Personal Details</h1>

<p style="font-size:16px; color:red" align="center"></p>

<form class="user" method="post" action="#">


     <div class="row">
      <div class="col-4 mb-3">Name</div>
         <div class="col-8 mb-3">   <input type="text" class="form-control form-control-user" id="coursepg" name="name" aria-describedby="emailHelp" value="<?php  echo $row['stu_name'];?>"></div>
          </div>  
          <div class="row">
            <div class="col-4 mb-3">DOB </div>
           <div class="col-8 mb-3">  <input type="date" class="form-control form-control-user" id="schoolclgpg" name="dob" aria-describedby="emailHelp" value="<?php  echo $row['stu_dob'];?>"></div>  
           </div>



          <div class="row">
          <div class="col-4 mb-3">Father's Name </div>
          <div class="col-8 mb-3">
            <input type="text" class="form-control form-control-user" id="yoppg" name="father" aria-describedby="emailHelp" value="<?php  echo $row['stu_father'];?>"></div>
          </div>

          <div class="row">
            <div class="col-4 mb-3">Mother's Name</div>
           <div class="col-8 mb-3">
            <input type="text" class="form-control form-control-user" id="pipg" name="mother" aria-describedby="emailHelp" value="<?php  echo $row['stu_mother'];?>">
          </div></div>
          <div class="row">
            <div class="col-4 mb-3">Contact No </div>
           <div class="col-8 mb-3">  <input type="text" class="form-control form-control-user" id="schoolclggra" name="contact" aria-describedby="emailHelp"  value="<?php  echo $row['stu_contact'];?>"></div>  
           </div>



          <div class="row">
          <div class="col-4 mb-3">Email Id </div>
          <div class="col-8 mb-3">
            <input type="text" class="form-control form-control-user" id="yopgra" name="email" aria-describedby="emailHelp"  value="<?php  echo $row['stu_email'];?>"></div>
          </div>         
          <div class="row" style="margin-top:4%">
            <div class="col-4"></div>
            <div class="col-4">
            <input type="submit" name="submit"  value="update" class="btn btn-primary btn-user btn-block">
          </div>
          </div>
        
        </form>
        <?php
        function test_input($data) {
	
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }
if(isset($_REQUEST['submit'])){
$name=test_input($_REQUEST['name']);
$dob=test_input($_REQUEST['dob']);
$fname=test_input($_REQUEST['father']);
$mname=test_input($_REQUEST['mother']);
$contact=test_input($_REQUEST['contact']);
$emailid=test_input($_REQUEST['email']);
$stmt=$conn->prepare("update tbl_student set stu_name='$name',stu_dob='$dob',stu_father='$fname',stu_mother='$mname',stu_contact='$contact',stu_email='$emailid' where stu_email='$email';");
$stmt->execute();
if(isset($_REQUEST['guardian'])){
  $gname=test_input($_REQUEST['guardian']);
  $stmt=$conn->prepare("update tbl_student set stu_guardian='$gname'  where stu_email='$email';");
  $stmt->execute();
  }
  ?>
    <script>window.location.href = "viewpersonalinfo.php"</script>
    <?php
}
?>
</div>
<!-- /.container-fluid -->

<?php
}
else{
    ?>
    <script>window.location.href = "login.php"</script>
    <?php
}
include_once("include/footer.php");

?>