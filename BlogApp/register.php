<?php
include 'connection.php';
$obj = new query();

$id = '';
$prefix = '';
$firstname = '';
$lastname = '';
$email = '';
$mobile = '';
$password = '';
$confirm_password = '';
$information = '';

if (isset($_POST['submit'])) {
    $prefix = $obj->get_safe_str($_POST['prefix']);
    $firstname = $obj->get_safe_str($_POST['firstname']);
    $lastname = $obj->get_safe_str($_POST['lastname']);
    $email = $obj->get_safe_str($_POST['email']);
    $mobile = $obj->get_safe_str($_POST['mobile']);
    $password = $obj->get_safe_str($_POST['password']);
    $confirm_password = $obj->get_safe_str($_POST['confirm_password']);
    $information = $obj->get_safe_str($_POST['information']);

    if ($password !== $confirm_password) { 
        echo "The confirmation password does not match"; 
    }
    
    $condition_arr = array('prefix'=>$prefix, 'firstname'=>$firstname, 'lastname'=>$lastname, 'email'=>$email, 'mobile'=>$mobile,'password-hash'=>$password,'last_login_at'=>CURRENT_TIMESTAMP(),'information'=>$information,'created_at'=>CURRENT_TIMESTAMP(),'updated_at'=>CURRENT_TIMESTAMP());

    $result = $obj->insertData('user',$condition_arr); 

    header('location:blog_post.php');
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOGAPP</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<h3>REGISTRATION</h3>
<div class="container">
  <div class="row">
    <div class="col-sm-9 col-md-7 col-lg-5 col-centered mx-auto">
      <div class="card card-contact my-5">
        <div class="card-body"> 
          <form class="form-contact">
          
            <section>
              <div id="wrapper">
                <form method="post">
                <div class="mb-3">
                    <select id="prefix" name="prefix" class="form-control">
                        <option value="mr" selected>Mr.</option>
                        <option value="mrs">Mrs.</option>
                        <option value="miss">Miss</option>
                    </select>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="&#xf007; First Name">
                </div>

                <div class="mb-3">
                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="&#xf007; Last name">
                </div>

                <div class="mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="&#xf0e0; Eg:example@email.com">
                </div>

                <div class="mb-3">
                    <input type="text" class="form-control" name="mobile" id="mobile" placeholder="&#xf0e0; 9816166116">
                </div>
                  
                <div class="mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="&#xf2b9; Password">
                </div>

                <div class="mb-3">
                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="&#xf2b9; Confirm Password">
                </div>  
            
                <div class="mb-3">
                    <textarea name="information" id="information" cols="56" rows="2" placeholder="Information..."></textarea>
                </div>
                <div class="mb-3">
                    <input type="checkbox" name="terms" id="terms"
                        onchange="document.getElementById('submit').disabled = !this.checked;">Hereby,I Accept Terms & Coditions
                </div>
            
                <div class="text-center">
                  <button type="submit" id="submit" name="submit" class="btn btn-warning">REGISTER</button>
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

    <!--Bootstrap js-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>