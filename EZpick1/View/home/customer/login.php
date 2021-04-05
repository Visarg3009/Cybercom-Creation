<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['email']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	$password = validate($_POST['password']);

	if (empty($email)) {
		header("Location: ../login.php?error=User email is required");
	    exit();
	}else if(empty($password)){
        header("Location: ../login.php?error=Password is required");
	    exit();
	}else{
		// hashing the password
        $password = md5($password);

		
		$sqlAdmin = "SELECT * FROM admin WHERE `email`='$email' AND `password`='$password'";
		$sqlSeller = "SELECT * FROM seller WHERE `email`='$email' AND `password`='$password'";
		$sqlCustomer = "SELECT * FROM customer WHERE `email`='$email' AND `password`='$password'";

		$resultAdmin = mysqli_query($conn, $sqlAdmin);
		$resultSeller = mysqli_query($conn, $sqlSeller);
		$resultCustomer = mysqli_query($conn, $sqlCustomer);

		if (mysqli_num_rows($resultAdmin) === 1) {
			$row = mysqli_fetch_assoc($resultAdmin);
			$_SESSION['userName'] = $row['userName'];
			$_SESSION['admin_Id'] = $row['admin_Id'];
			header("Location: http://localhost/EZpick1/index.php?c=admin\Product&a=index");
			exit();
		} else if (mysqli_num_rows($resultSeller) === 1) {
			$row = mysqli_fetch_assoc($resultSeller);
			$_SESSION['sellerName'] = $row['sellerName'];
			$_SESSION['sellerId'] = $row['sellerId'];
			header("Location: http://localhost/EZpick1/index.php?c=seller\Product&a=index");
			exit();
        } else if (mysqli_num_rows($resultCustomer) === 1) {
			$row = mysqli_fetch_assoc($resultCustomer);
			$_SESSION['customerName'] = $row['customerName'];
			$_SESSION['customer_Id'] = $row['customer_Id'];
			header("Location: http://localhost/EZpick1/index.php");
			exit();
		}else{
			header("Location: ../login.php?error=Incorrrrrect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: ../login.php");
	exit();
}
?>