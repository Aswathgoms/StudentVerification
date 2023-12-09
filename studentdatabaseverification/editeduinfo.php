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
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Edit Educational Details</h1>

<p style="font-size:16px; color:red" align="center"></p>

<form class="user" method="post" action="">

/////////////////// SSLC //////////////////

     <div class="row">
      <div class="col-4 mb-3">SSLC REG.NO</div>
         <div class="col-8 mb-3">   <input type="text" class="form-control form-control-user" id="sslc_regno" name="" aria-describedby="emailHelp" value="<?php  echo $row[''];?>"></div>
          </div>  
          <div class="row">
            <div class="col-4 mb-3">school </div>
           <div class="col-8 mb-3">  <input type="text" class="form-control form-control-user" id=" " name=" " aria-describedby="emailHelp" value="<?php  echo $row[''];?>"></div>  
           </div>
           <div class="col-4 mb-3">Board </div>
           <div class="col-8 mb-3">  <input type="text" class="form-control form-control-user" id=" " name=" " aria-describedby="emailHelp" value="<?php  echo $row[''];?>"></div>  
           </div>
           <div class="col-4 mb-3">Percentage </div>
           <div class="col-8 mb-3">  <input type="text" class="form-control form-control-user" id=" " name=" " aria-describedby="emailHelp" value="<?php  echo $row[''];?>"></div>  
           </div>
            <div class="col-4 mb-3">Marksheet </div>
           <div class="col-8 mb-3">  <input type="file" class="form-control form-control-user" id=" " name=" " aria-describedby="emailHelp" value="<?php  echo $row[''];?>"></div>  
           </div>
           <div class="col-4 mb-3">Passout Year </div>
           <div class="col-8 mb-3">  <input type="text" class="form-control form-control-user" id=" " name=" " aria-describedby="emailHelp" value="<?php  echo $row[''];?>"></div>  
           </div>

/////////////////// HSC //////////////////

      <div class="row">
      <div class="col-4 mb-3">REG.NO</div>
         <div class="col-8 mb-3">   <input type="text" class="form-control form-control-user" id="hsc_regno" name="" aria-describedby="emailHelp" value="<?php  echo $row[''];?>"></div>
          </div>  
          <div class="row">
            <div class="col-4 mb-3">School </div>
           <div class="col-8 mb-3">  <input type="text" class="form-control form-control-user" id=" " name=" " aria-describedby="emailHelp" value="<?php  echo $row[''];?>"></div>  
           </div>
           <div class="col-4 mb-3">Board </div>
           <div class="col-8 mb-3">  <input type="text" class="form-control form-control-user" id=" " name=" " aria-describedby="emailHelp" value="<?php  echo $row[''];?>"></div>  
           </div>
           <div class="col-4 mb-3">Percentage </div>
           <div class="col-8 mb-3">  <input type="text" class="form-control form-control-user" id=" " name=" " aria-describedby="emailHelp" value="<?php  echo $row[''];?>"></div>  
           </div>
            <div class="col-4 mb-3">Marksheet </div>
           <div class="col-8 mb-3">  <input type="file" class="form-control form-control-user" id=" " name=" " aria-describedby="emailHelp" value="<?php  echo $row[''];?>"></div>  
           </div>
           <div class="col-4 mb-3">Specialization</div>
           <div class="col-8 mb-3">  <input type="text" class="form-control form-control-user" id=" " name=" " aria-describedby="emailHelp" value="<?php  echo $row[''];?>"></div>  
           </div>
           <div class="col-4 mb-3">Passout Year </div>
           <div class="col-8 mb-3">  <input type="text" class="form-control form-control-user" id=" " name=" " aria-describedby="emailHelp" value="<?php  echo $row[''];?>"></div>  
           </div>

/////////////////// CLG //////////////////

      <div class="row">
      <div class="col-4 mb-3">REG.NO</div>
         <div class="col-8 mb-3">   <input type="text" class="form-control form-control-user" id="hsc_regno" name="" aria-describedby="emailHelp" value="<?php  echo $row[''];?>"></div>
          </div>  
          <div class="row">
            <div class="col-4 mb-3">College</div>
           <div class="col-8 mb-3">  <input type="text" class="form-control form-control-user" id=" " name=" " aria-describedby="emailHelp" value="<?php  echo $row[''];?>"></div>  
           </div>
           <div class="col-4 mb-3">Department </div>
           <div class="col-8 mb-3">  <input type="text" class="form-control form-control-user" id=" " name=" " aria-describedby="emailHelp" value="<?php  echo $row[''];?>"></div>  
           </div>
           <div class="col-4 mb-3">University</div>
           <div class="col-8 mb-3">  <input type="text" class="form-control form-control-user" id=" " name=" " aria-describedby="emailHelp" value="<?php  echo $row[''];?>"></div>  
           </div>
           <div class="col-4 mb-3">Percentage</div>
           <div class="col-8 mb-3">  <input type="text" class="form-control form-control-user" id=" " name=" " aria-describedby="emailHelp" value="<?php  echo $row[''];?>"></div>  
           </div>
            <div class="col-4 mb-3">Marksheet </div>
           <div class="col-8 mb-3">  <input type="file" class="form-control form-control-user" id=" " name=" " aria-describedby="emailHelp" value="<?php  echo $row[''];?>"></div>  
           </div>
           <div class="col-4 mb-3">Passout Year </div>
           <div class="col-8 mb-3">  <input type="text" class="form-control form-control-user" id=" " name=" " aria-describedby="emailHelp" value="<?php  echo $row[''];?>"></div>  
           </div>


                  <input type="submit" name="submit"  value="update" class="btn btn-primary btn-user btn-block">
          </div>
          </div>
        
        </form>

</div>
<!-- /.container-fluid -->

<?php
}
else{
    header("Location: login.php");
}
include_once("include/footer.php");

?>