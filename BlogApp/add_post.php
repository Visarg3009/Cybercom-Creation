<?php
include 'connection.php';
$obj = new query();

$id = '';
$title = '';
$content = '';
$url = '';
$myfile = '';
$date = '';


if (isset($_POST['create'])) {
    $title = $obj->get_safe_str($_POST['title']);
    $content = $obj->get_safe_str($_POST['content']);
    $url = $obj->get_safe_str($_POST['url']);
    $myfile = $obj->get_safe_str($_POST['myfile']);
    $date = $obj->get_safe_str($_POST['date']);

    $condition_arr = array('title'=>$title, 'content'=>$content, 'url'=>$url, 'myfile'=>$myfile, 'date'=>$date);

    $result = $obj->insertData('blog_post',$condition_arr); 

    header('location:blog_post.php');  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOGAPP</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/contacts.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="">BLOGAPP</a>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav ml-auto mr-5">
      <li class="nav-item active">
        <a class="nav-link" href="blog_category.php">Manage Cateogry <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">My Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contacts.php">Log Out</a>
      </li> 
    </ul>
  </div>
</nav>

<div class="container mt-20">
    <h3>ADD POST</h3>
    <hr>
      <form method="post">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputTitle">Title</label>
            <input type="text" name="title" class="form-control" id="inputTitle" required>
          </div>
          
        </div>
        <div class="form-row">
            <div class="form-group">
                <label for="inputContent">Content</label>
                <textarea class="form-control" id="inputContent" cols="73" rows="3"></textarea>
            </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputUrl">URL</label>
            <input type="url"  name="url" class="form-control" id="inputUrl" required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputDate">Published At</label>
            <input type="date"  name="date" class="form-control" id="inputDate" required>
          </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputTitle">Image</label>
            <input type="file" id="myfile" name="myfile" multiple required>
          </div>
        </div>
        <div class="form-row">
          <button type="submit" name="create" class="btn btn-success">ADD POST</button>
        </div>
      </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>