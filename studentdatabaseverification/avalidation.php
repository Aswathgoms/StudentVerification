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
	$stmt = $conn->prepare("SELECT * FROM tbl_admin where admin_id='$email' and password='$password' LIMIT 1");
	$stmt->execute();
	
	$users = $stmt->fetchAll();
	if($users){
	foreach($users as $user) {
		if(($user['admin_id'] == $email) &&
			($user['password'] == $password)) {
				$_SESSION['email']=$email;
				header("Location: admin.php");
				exit(0);
		}
		else {
			
			echo "<script>
    			alert('Invalid email id and password');
			</script>";
			header("Location: alogin.php");
			exit(0);
		}
	}
}
else{
	
	echo "<script>
    			alert('Invalid email id and password');
			</script>";
			header("Location: alogin.php");
			exit(0);
}}

?>
