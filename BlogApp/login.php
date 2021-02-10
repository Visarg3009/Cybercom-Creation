<?php
session_start(); 
include "connection.php";

$email = '';
$password = '';

if (isset($_POST['login'])) {
    $email = $obj->get_safe_str($_POST['email']);
    $password = $obj->get_safe_str($_POST['password']);

    $pass = md5($password);
    $condition_arr = array('email'=>$email, 'password_hash'=>$pass);

    $result = $obj->getData('user','*',$condition_arr); 

    if($result) {
        echo "Successfully Loged-In";
    } else {
        echo "Incorrect Email or Password";
    }

    header('location:blog_post.php');  
}
?>
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOGAPP</title>

    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<h3>LOGIN</h3>
<div class="container">
  <div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 col-centered mx-auto">
      <div class="card card-contact my-5">
        <div class="card-body"> 
          <form class="form-contact">
            <section>
              <div id="wrapper">
                <form action="">
                    <div class="mb-3">
                        <input type="email" class="form-control" name="email" id="email" placeholder="&#xf0e0; Eg:example@email.com">
                    </div>
                      
                    <div class="mb-3">
                        <input type="password" class="form-control" name="password" id="password" placeholder="&#xf2b9; Password">
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" class="btn btn-warning" name="login" value="LOGIN">LOGIN</button>
                        <a href="register.php"><button type="button" class="btn btn-warning" name="register" value="REGISTER NOW">REGISTER</button></a>
                    </div>
                </form>
              </div>
            </section>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>