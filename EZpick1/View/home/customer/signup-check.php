<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['customerName']) && isset($_POST['password'])
    && isset($_POST['email']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$customerName = validate($_POST['customerName']);
	$password = validate($_POST['password']);
	$re_password = validate($_POST['re_password']);
	$email = validate($_POST['email']);

	$customer_data = 'customerName='. $customerName. '&email='. $email;


	if (empty($customerName)) {
		header("Location: signup.php?error=User Name is required&$customer_data");
	    exit();
	}else if(empty($password)){
        header("Location: signup.php?error=Password is required&$customer_data");
	    exit();
	}
	else if(empty($re_password)){
        header("Location: signup.php?error=Re Password is required&$customer_data");
	    exit();
	}

	else if(empty($email)){
        header("Location: signup.php?error=Name is required&$customer_data");
	    exit();
	}

	else if($password !== $re_password){
        header("Location: signup.php?error=The confirmation password  does not match&$customer_data");
	    exit();	
	}

	else{

		// hashing the password
        $password = md5($password);

	    $sql = "SELECT * FROM customer WHERE `email`='$email';";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=The username is taken try another&$customer_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO customer(customerName, password, email) VALUES('$customerName', '$password', '$email')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: signup.php?success=Your account has been created successfully");
	         exit();
           }else {
	           	header("Location: signup.php?error=unknown error occurred&$customer_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: signup.php");
	exit();
}
?>