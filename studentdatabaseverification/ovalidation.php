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
	$stmt = $conn->prepare("SELECT * FROM tbl_officer where officer_id='$email' and officer_pswd='$password' LIMIT 1");
	$stmt->execute();
	
	$users = $stmt->fetchAll();
	if($users){
	foreach($users as $user) {
		if(($user['officer_id'] == $email) &&
			($user['officer_pswd'] == $password)) {
				$_SESSION['email']=$email;
				header("Location: officer.php");
				exit(0);
		}
		else {
			
			echo "<script>
    			alert('Invalid email id and password');
			</script>";
			header("Location: ologin.php");
			exit(0);
		}
	}
}
else{
	
	echo "<script>
    			alert('Invalid email id and password');
			</script>";
			header("Location: ologin.php");
			exit(0);
}}

?>
