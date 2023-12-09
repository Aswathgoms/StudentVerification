<?php
session_start();
if(isset($_SESSION['email'])){
include_once("include/header.php");
include_once("include/anavbar.php");
include_once("include/connection.php")
?>
<div class="container-fluid">
    <div class="row">
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">No. of Students</div>
                            
                            <div class="col-auto">
                       <?php
                                                $stmt=$conn->prepare("SELECT COUNT(stu_email) as no_of_user from tbl_student");
                                                $stmt->execute();
                                                $data=$stmt->fetch();
                                                echo $data['no_of_user']?>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
<!-----------------------------------------------------_-->
<div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">No. of Officers</div>
                            <div class="col-auto">
                            <?php
                                                $stmt=$conn->prepare("SELECT COUNT(officer_id) as no_of_user from tbl_officer");
                                                $stmt->execute();
                                                $data=$stmt->fetch();
                                                echo $data['no_of_user']?>
                    </div>
                        
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">No. of Colleges</div>
                            <div class="col-auto">
                            <?php
                                                $stmt=$conn->prepare("SELECT COUNT(clg_id) as no_of_user from tbl_clg");
                                                $stmt->execute();
                                                $data=$stmt->fetch();
                                                echo $data['no_of_user']?>
                    </div>
                        
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
    </div>
    <div class="row">
    <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">No. of Verified Students</div>
                            <div class="col-auto">
                            <?php
                                                $stmt=$conn->prepare("SELECT COUNT(stu_email) as no_of_user from tbl_student where stu_status='Verified'");
                                                $stmt->execute();
                                                $data=$stmt->fetch();
                                                echo $data['no_of_user']?>
                    </div>
                        
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">No. of UnVerified Students</div>
                            <div class="col-auto">
                            <?php
                                                $stmt=$conn->prepare("SELECT COUNT(stu_email) as no_of_user from tbl_student where stu_status!='Verified'");
                                                $stmt->execute();
                                                $data=$stmt->fetch();
                                                echo $data['no_of_user']?>
                    </div>
                        
                    </div>
                  </div>
                </div>
              </div>
            </div>
    </div>
</div>
<?php
include_once("include/footer.php");
}
else{
  header("Location: alogin.php");
}
?>