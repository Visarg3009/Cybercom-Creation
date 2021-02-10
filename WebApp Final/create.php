<?php
include 'connection.php';
$obj = new query();

$id = '';
$name = '';
$email = '';
$phone = '';
$title = '';
$time = '';

if (isset($_POST['create'])) {
    $name = $obj->get_safe_str($_POST['name']);
    $email = $obj->get_safe_str($_POST['email']);
    $phone = $obj->get_safe_str($_POST['phone']);
    $title = $obj->get_safe_str($_POST['title']);
    $time = $obj->get_safe_str($_POST['time']);

    $condition_arr = array('name'=>$name, 'email'=>$email, 'phone'=>$phone,'title'=>$title, 'time'=>$time);

    $result = $obj->insertData('contacts',$condition_arr); 

    header('location:contacts.php');  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEBAPP</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/contacts.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="">Website Title</a>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav ml-auto mr-5">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contacts.php">Contact Us</a>
      </li>  
    </ul>
  </div>
</nav>

<div class="container mt-20">
    <h3>Create Contact</h3>
    <hr>
      <form method="post">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputName">Name</label>
            <input type="text" name="name" class="form-control" id="inputName" placeholder="John Doe" required>
          </div>
          <div class="form-group col-md-6">
            <label for="inputEmail4">Email</label>
            <input type="email"  name="email" class="form-control" id="inputEmail4" placeholder="johndoe@example.com" required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputPhone">Phone</label>
            <input type="text"  name="phone" class="form-control" id="inputPhone" placeholder="2556314852" required>
          </div>
          <div class="form-group col-md-6">
            <label for="inputTitle">Title</label>
            <input type="text"  name="title" class="form-control" id="inputTitle" placeholder="Employee" required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCreated">Created</label>
            <input type="text"  name="time" class="form-control" id="inputCreated" placeholder="08/02/2021 11:00" required>
          </div>
        </div>
        <div class="form-row">
          <button type="submit" name="create" class="btn btn-success">Create Contact</button>
        </div>
      </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>