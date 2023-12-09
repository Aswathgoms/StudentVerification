<?php
session_start();
include_once('include/connection.php');
function test_input($data) {
	
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

if ($_SERVER["REQUEST_METHOD"]== "POST") {
	$email=$_SESSION['email'];
    $stmt=$conn->prepare("SELECT stu_email from tbl_education where stu_email='$email' limit 1");
    $stmt->execute();
    $stuemail=$stmt->fetch();
    if($stuemail){
        $_SESSION['msg']='<center><b>Already Updated!</b></center>';
        header("Location:viewedu.php");
    }
    else{
	$sregno = test_input($_POST["sregno"]);
    $sschool = test_input($_POST["sschool"]);
	$sboard = test_input($_POST["sboard"]);
	$spercent = test_input($_POST["spercent"]);
	$spassout = test_input($_POST["spassout"]);
	$hregno = test_input($_POST["hregno"]);
    $hschool = test_input($_POST["hschool"]);
	$hboard = test_input($_POST["hboard"]);
	$hpercent = test_input($_POST["hpercent"]);
    $hspecial = test_input($_POST["hspecial"]);
	$hpassout = test_input($_POST["hpassout"]);
	$cregno = test_input($_POST["cregno"]);
    $ccollege = test_input($_POST["ccollege"]);
    $cdepartment = test_input($_POST["cdepartment"]);
	$cuniv = test_input($_POST["cuniv"]);
	$cpercent = test_input($_POST["cpercent"]);
	$cpassout = test_input($_POST["cpassout"]);
	$filename1 = $_FILES['smarksheet']['name'];
    $filename2 = $_FILES['hmarksheet']['name'];
    $filename3= $_FILES['cmarksheet']['name'];
    $destination1 = 'uploads/' . $filename1;
    $destination2 = 'uploads/' . $filename2;
    $destination3 = 'uploads/' . $filename3;
    $extension1 = pathinfo($filename1, PATHINFO_EXTENSION);
    $extension2 = pathinfo($filename2, PATHINFO_EXTENSION);
    $extension3 = pathinfo($filename3, PATHINFO_EXTENSION);
    $file1 = $_FILES['smarksheet']['tmp_name'];
    $size1 = $_FILES['smarksheet']['size'];
    $file2 = $_FILES['hmarksheet']['tmp_name'];
    $size2 = $_FILES['hmarksheet']['size'];
    $file3 = $_FILES['cmarksheet']['tmp_name'];
    $size3 = $_FILES['cmarksheet']['size'];
    if (!in_array($extension1, ['pdf'])&&!in_array($extension2, ['pdf'])&&!in_array($extension3, ['pdf'])) {
        $_SESSION['umessage']="<div class='alert alert-warning alert-dismissible' role='alert'>
        You file extension must be .pdf !<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
    } elseif (($_FILES['smarksheet']['size'] > 1000000)&&($_FILES['hmarksheet']['size'] > 1000000)&&($_FILES['cmarksheet']['size'] > 1000000)) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
        $_SESSION['umessage']="<div class='alert alert-warning alert-dismissible' role='alert'>
        File too large!<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
        
    } else {
        // move the uploaded (temporary) file to the specified destination
            
        if((move_uploaded_file($file1, $destination1))&&(move_uploaded_file($file2, $destination2))&&(move_uploaded_file($file3, $destination3))){
            $file11 = "smarksheet".rand(1000000, 99999999).".pdf";
            $file22 = "hmarksheet".rand(1000000, 99999999).".pdf";
            $file33 = "cmarksheet".rand(1000000, 99999999).".pdf";
            rename($destination1, 'uploads/'.$file11);
            rename($destination2, 'uploads/'.$file22);
            rename($destination3, 'uploads/'.$file33);
$sql="INSERT INTO tbl_education (stu_email,sslc_regno,sslc_school,sslc_board,sslc_markperc,sslc_marksheet,sslc_passout,hsc_regno,hsc_school,hsc_board,hsc_markperc,hsc_marksheet,hsc_passout,hsc_specialization,clg_regno,clg_name,clg_department,clg_university,clg_mark,clg_marksheet,clg_passout) VALUES ('$email','$sregno','$sschool','$sboard','$spercent','$file11','$spassout','$hregno','$hschool','$hboard','$hpercent','$file22','$hpassout','$hspecial','$cregno','$ccollege','$cdepartment','$cuniv','$cpercent','$file33','$cpassout')";
	$query=$conn->prepare($sql);
	$query->execute();
    ?>
    <script>window.location.href = "viewedu.php"</script>
    <?php
    }
    else{

        $_SESSION['umessage']="<div class='alert alert-warning alert-dismissible' role='alert'>
        File not uploaded!<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
    }}
    }
}


?>