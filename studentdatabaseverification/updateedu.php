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
<h1 class="h3 mb-4 text-gray-800">Update Educational Details</h1>
<form class="user" method="post" action="update.php"enctype="multipart/form-data">
<p style="font-size:16px; color:red" align="center">SSLC</p>
<div class="row">
 <div class="col-4 mb-3">SSLC REG.NO</div>
    <div class="col-8 mb-3"><input type="text" class="form-control form-control-user"  name="sregno" aria-describedby="emailHelp" ></div>
     </div>  
     <div class="row">
       <div class="col-4 mb-3">school </div>
      <div class="col-8 mb-3">  <input type="text" class="form-control form-control-user" name="sschool" aria-describedby="emailHelp" ></div>  
      </div>
      <div class="row">
      <div class="col-4 mb-3">Board </div>
      <div class="col-8 mb-3">  <input type="text" class="form-control form-control-user" name="sboard" aria-describedby="emailHelp" ></div>  
      </div>
      <div class="row">
      <div class="col-4 mb-3">Percentage </div>
      <div class="col-8 mb-3">  <input type="text" class="form-control form-control-user" name="spercent" aria-describedby="emailHelp" ></div>  
      </div>
      <div class="row">
       <div class="col-4 mb-3">Marksheet </div>
      <div class="col-8 mb-3">  <input type="file" class="form-control form-control-user" name="smarksheet" aria-describedby="emailHelp" ></div>  
      </div>
      <div class="row">
      <div class="col-4 mb-3">Passout Year </div>
      <div class="col-8 mb-3">  <input type="text" class="form-control form-control-user" name="spassout" aria-describedby="emailHelp" ></div>  
      </div>

      <p style="font-size:16px; color:red" align="center">HSC</p>

 <div class="row">
 <div class="col-4 mb-3">REG.NO</div>
    <div class="col-8 mb-3">   <input type="text" class="form-control form-control-user" name="hregno" aria-describedby="emailHelp" ></div>
     </div>  
     <div class="row">
       <div class="col-4 mb-3">School </div>
      <div class="col-8 mb-3">  <input type="text" class="form-control form-control-user" name="hschool" aria-describedby="emailHelp" ></div>  
      </div>
      <div class="row">
      <div class="col-4 mb-3">Board </div>
      <div class="col-8 mb-3">  <input type="text" class="form-control form-control-user" name="hboard" aria-describedby="emailHelp" ></div>  
      </div>
      <div class="row">
      <div class="col-4 mb-3">Percentage </div>
      <div class="col-8 mb-3">  <input type="text" class="form-control form-control-user" name="hpercent" aria-describedby="emailHelp" ></div>  
      </div>
      <div class="row">
       <div class="col-4 mb-3">Marksheet </div>
      <div class="col-8 mb-3">  <input type="file" class="form-control form-control-user" name="hmarksheet" aria-describedby="emailHelp" ></div>  
      </div>
      <div class="row">
      <div class="col-4 mb-3">Specialization</div>
      <div class="col-8 mb-3">  <input type="text" class="form-control form-control-user" name="hspecial" aria-describedby="emailHelp" ></div>  
      </div>
      <div class="row">
      <div class="col-4 mb-3">Passout Year </div>
      <div class="col-8 mb-3">  <input type="text" class="form-control form-control-user" name="hpassout" aria-describedby="emailHelp" ></div>  
      </div>

      <p style="font-size:16px; color:red" align="center">COLLEGE</p>

 <div class="row">
 <div class="col-4 mb-3">REG.NO</div>
    <div class="col-8 mb-3">   <input type="text" class="form-control form-control-user" name="cregno" aria-describedby="emailHelp" ></div>
     </div>  
     <div class="row">
       <div class="col-4 mb-3">College</div>
      <div class="col-8 mb-3">  <!--<input type="text" class="form-control form-control-user" name="ccollege" aria-describedby="emailHelp" >-->
      <select class="form-control form-control-user" name="ccollege" aria-describedby="Default select example">
      <option selected>Open this select menu</option>
        <?php
        $stmt=$conn->prepare("SELECT * FROM tbl_clg ");
        $stmt->execute();
        $colleges = $stmt->fetchAll();
        foreach($colleges as $college){
      echo '<option value="'.$college["college"].'">'.$college["college"].'</option>';
        }
      ?>
</select>
    </div>  
      </div>
      <div class="row">
      <div class="col-4 mb-3">Department </div>
      <div class="col-8 mb-3">  <input type="text" class="form-control form-control-user" name="cdepartment" aria-describedby="emailHelp" ></div>  
      </div>
      <div class="row">
      <div class="col-4 mb-3">University</div>
      <div class="col-8 mb-3">  <input type="text" class="form-control form-control-user" name="cuniv" aria-describedby="emailHelp" ></div>  
      </div>
      <div class="row">
      <div class="col-4 mb-3">Percentage</div>
      <div class="col-8 mb-3">  <input type="text" class="form-control form-control-user" name="cpercent" aria-describedby="emailHelp" ></div>  
      </div>
      <div class="row">
       <div class="col-4 mb-3">Marksheet </div>
      <div class="col-8 mb-3">  <input type="file" class="form-control form-control-user" name="cmarksheet" aria-describedby="emailHelp" ></div>  
      </div>
      <div class="row">
      <div class="col-4 mb-3">Passout Year </div>
      <div class="col-8 mb-3">  <input type="text" class="form-control form-control-user" name="cpassout" aria-describedby="emailHelp" ></div>  
      </div>

          <div class="row" style="margin-top:4%">
            <div class="col-4"></div>
            <div class="col-4">
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
    ?>
    <script>window.location.href = "login.php"</script>
    <?php
}
include_once("include/footer.php");

?>