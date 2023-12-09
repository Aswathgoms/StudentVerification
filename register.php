<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Student Registration</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="vendor/fontawesome-free/js/all.js"></script>
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-secondary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Student Registration</h3></div>
                                    <div class="card-body">
                                        <form action="registervalidation.php" method="post" enctype="multipart/form-data">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" name="name" type="text"  />
                                                        <label for="inputFirstName">Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <select class="form-select" required="true" id="movelocationInputValue" name="gender" aria-label="Default select example">
                                                            <option selected></option>
                                                            <option value="Male">Male</option>
                                                            <option value="Female">Female</option>
                                                        </select>
                                                        <label for="movelocationInputValue">Gender</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input type="date" name="dob" required="true" class="form-control" id="datefloatingInput" >
                                                        <label for="datefloatingInput">Date of Birth</label>       
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputEmail" name="fname" type="text"  />
                                                        <label for="inputEmail">Father Name</label>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputEmail" name="mname" type="text"  />
                                                        <label for="inputEmail">Mother Name</label>
                                                        
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" name="emailid" type="email"  />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" name="aadhar" type="number"  />
                                                <label for="inputEmail">Aadhar No</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" name="pan" type="number"  />
                                                <label for="inputEmail">PAN No</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" name="mobileno" type="number" />
                                                <label for="inputEmail">Mobile No</label>
                                            </div>
                                                    <div class="form-floating mb-3 ">
                                                        <input class="form-control" id="inputPasswordConfirm" name="photo" type="file" />
                                                        <label for="inputPasswordConfirm">Photo</label>
                                                    </div>
                                                
                                            
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPassword" name="resume" type="file" />
                                                        <label for="inputPassword">Resume</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPasswordConfirm" name="signature" type="file" />
                                                        <label for="inputPasswordConfirm">Signature</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPassword" name="userpassword" type="password" placeholder="Create a password" />
                                                        <label for="inputPassword">Password</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPasswordConfirm" name="confirmpassword" type="password" placeholder="Confirm password" />
                                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><input class="btn btn-primary btn-block" type="submit" name="register" value="Register"></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                    <?php
                                        if(isset($_SESSION['umessage'])){
                                            echo '<p class="small" style="color:red;">'.$_SESSION['umessage'].'</p>';
                                        }?>
                                        <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
