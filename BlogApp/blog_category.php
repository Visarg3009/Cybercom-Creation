<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLOGAPP</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/contacts.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="">BLOG CATEGORY</a>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav ml-auto mr-5">
      <li class="nav-item active">
        <a class="nav-link" href="blog_post.php">Manage Post<span class="sr-only">(current)</span></a>
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

<div class="container">
    <h3>BLOG CATEGORIES</h3>
    <hr>
    <a href="add_category.php"><button type="button" class="btn btn-success">ADD CATEGORY</button></a>
    <table class=" table table-striped table-hover table-bordered">
        <tbody>
            <tr  class="bg-dark text-white text-center">
                <th>Category ID</th>
                <th>Category Image</th>
                <th>Category Name</th>
                <th>Created Date</th>
                <th>Actions</th>
            </tr>

    <?php
    if (isset($result['0'])) {
        $id = 1;
        foreach ($result as $list) {
    ?>
    
            <tr>
              <td> <?php echo $id ?> </td>
              <td> <?php echo $list['image']; ?> </td>
              <td> <?php echo $list['title']; ?> </td>
              <td> <?php echo $list['created_at']; ?> </td>
              <td>
                <button class="btn-primary btn"> <a href="update.php?id=<?php echo $list['id']; ?>" class="text-white"><i class="fa fa-pencil" aria-hidden="true"></i></a> </button>
                <button class="btn-danger btn"> <a href="delete.php?id=<?php echo $list['id']; ?>" class="text-white"><i class="fa fa-trash" aria-hidden="true"></i></a> </button>
              </td>
            </tr>
    <?php
    $id++;
    } } else { 
    ?>
    
    
        <tr>
            <td colspan="7" align="center">No Records Found!</td>
        </tr>
    <?php } ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/fontawesome.min.js" integrity="sha512-pafh0hrrT9ZPZl/jx0cwyp7N2+ozgQf+YK94jSupHHLD2lcEYTLxEju4mW/2sbn4qFEfxJGZyIX/yJiQvgglpw==" crossorigin="anonymous"></script>
</body>
</html>