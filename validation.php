<?php
session_start();

include_once('include\connection.php');

function test_input($data) {
	
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
if ($_SERVER["REQUEST_METHOD"]== "POST") {
	$email = test_input($_POST["email"]);
	$password = test_input($_POST["password"]);
	$stmt = $conn->prepare("SELECT * FROM tbl_student where stu_email='$email' and stu_pswd='$password' LIMIT 1");
	$stmt->execute();
	
	$users = $stmt->fetchAll();
	if($users){
	foreach($users as $user) {
		if(($user['stu_email'] == $email) &&
			($user['stu_pswd'] == $password)) {
				$_SESSION['email']=$email;
				header("Location: student.php");
				exit(0);
		}
		else {
			
			echo "<script>
    			alert('Invalid admmin id and password');
			</script>";
			header("Location: login.php");
			exit(0);
		}
	}
}
else{
	
	echo "<script>
    			alert('Invalid admmin id and password');
			</script>";
			header("Location: login.php");
			exit(0);
}}

?>
