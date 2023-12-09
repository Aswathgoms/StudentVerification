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
	
	$name = test_input($_POST["name"]);
    $fname = test_input($_POST["fname"]);
    $mname = test_input($_POST["mname"]);
    $gender = test_input($_POST["gender"]);
    $date=test_input($_POST["dob"]);
    $rdate = new DateTime($date);
    $dob=$rdate->format('Y-m-d');
	$email = test_input($_POST["emailid"]);
	$mobileno = test_input($_POST["mobileno"]);
    $aadhar = test_input($_POST["aadhar"]);
    $pan = test_input($_POST["pan"]);
	$password = test_input($_POST["userpassword"]);
	$cpassword = test_input($_POST["confirmpassword"]);
	$uppercase=preg_match('@[A-Z]@',$password);
	$lowercase=preg_match('@[a-z]@',$password);
	$number=preg_match('@[0-9]@',$password);
	$specialchars=preg_match('@[^\w]@',$password);
	if($password==$cpassword){
	if(!$uppercase||!$lowercase||!$number||!$specialchars||strlen($password)<8){
		$_SESSION['rmsg']="password strength is weak";
		header("Location:register.php");
		
	}
	else{
	$stmt = $conn->prepare("SELECT * FROM tbl_student");
	$stmt->execute();
	$users = $stmt->fetchAll();
	foreach($users as $user) {
		if(($user['stu_email']==$email))
		{
			$_SESSION['rmsg']="user name already exist";
			header("Location: register.php");
		}
		if(($user['stu_contact']== $mobileno)) {
				$_SESSION['rmsg']="user name already exist";
			header("Location: register.php");
		}
	}
	$filename1 = $_FILES['photo']['name'];
    $filename2 = $_FILES['resume']['name'];
    $filename3= $_FILES['signature']['name'];
    $destination1 = 'uploads/' . $filename1;
    $destination2 = 'uploads/' . $filename2;
    $destination3 = 'uploads/' . $filename3;
    $extension1 = pathinfo($filename1, PATHINFO_EXTENSION);
    $extension2 = pathinfo($filename2, PATHINFO_EXTENSION);
    $extension3 = pathinfo($filename3, PATHINFO_EXTENSION);
    $file1 = $_FILES['photo']['tmp_name'];
    $size1 = $_FILES['photo']['size'];
    $file2 = $_FILES['resume']['tmp_name'];
    $size2 = $_FILES['resume']['size'];
    $file3 = $_FILES['signature']['tmp_name'];
    $size3 = $_FILES['signature']['size'];
    $ex=array("jpeg","jpg","png","pdf");
    if (!in_array($extension1, $ex)&&!in_array($extension2, $ex)&&!in_array($extension3, $ex)) {
        $_SESSION['umessage']="<div class='alert alert-warning alert-dismissible' role='alert'>
        You file extension must be .pdf,.jpeg,.jpg,.png !<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
    } elseif (($_FILES['photo']['size'] > 1000000)&&($_FILES['resume']['size'] > 1000000)&&($_FILES['signature']['size'] > 1000000)) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
        $_SESSION['umessage']="<div class='alert alert-warning alert-dismissible' role='alert'>
        File too large!<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
        
    } else {
        // move the uploaded (temporary) file to the specified destination
            
        if((move_uploaded_file($file1, $destination1))&&(move_uploaded_file($file2, $destination2))&&(move_uploaded_file($file3, $destination3))){
            $file11 = "photo".rand(1000000, 99999999).$extension1;
            $file22 = "resume".rand(1000000, 99999999).$extension2;
            $file33 = "signature".rand(1000000, 99999999).$extension3;
            rename($destination1, 'uploads/'.$file11);
            rename($destination2, 'uploads/'.$file22);
            rename($destination3, 'uploads/'.$file33);
$sql="INSERT INTO tbl_student (stu_img,stu_name,stu_dob,stu_gender,stu_email,stu_pswd,stu_contact,stu_father,stu_mother,stu_aadhar,stu_pan,stu_resume,stu_sign) VALUES 
('$file11','$name','$dob','$gender','$email','$password','$mobileno','$fname','$mname','$aadhar','$pan','$file22','$file33')";
	$query=$conn->prepare($sql);
	$query->execute();
    ?>
    <script>window.location.href = "login.php"</script>
    <?php
    }
    else{

        $_SESSION['umessage']="<div class='alert alert-warning alert-dismissible' role='alert'>
        File not uploaded!<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
    }}
	}
}
else{
	$_SESSION['rmsg']="Enter Correct password";
	header("Location:register.php");
}
}


?>