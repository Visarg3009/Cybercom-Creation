<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEBAPP</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/fontawesome.min.js" integrity="sha512-pafh0hrrT9ZPZl/jx0cwyp7N2+ozgQf+YK94jSupHHLD2lcEYTLxEju4mW/2sbn4qFEfxJGZyIX/yJiQvgglpw==" crossorigin="anonymous"></script>

    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script type="text/javascript" src="<?php echo $this->baseUrl('skin/admin/js/jquery-3.6.0.min.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo $this->baseUrl('skin/admin/js/mage.js'); ?>"></script>
</head>
<body>
<table width="100%" height="100%">
    <thead></thead>
    <tbody>
        <tr>
            <td colspan="3" height="50px"><?php echo $this->getChild('header')->toHtml(); ?></td>
        </tr>
        <tr>
            <td width="200px"><?php echo $this->getChild('left')->toHtml(); ?></td>

            <td>
                <?php echo $this->createBlock('Block\Seller\Layout\Message')->toHtml(); ?>
                <?php echo $this->getChild('content')->toHtml(); ?>
            </td>

            <td width="200px"><?php $this->getChild('right')->toHtml(); ?></td>
        </tr>
        <tr>
            <td colspan="3" height="50px"><?php echo $this->getChild('footer')->toHtml(); ?></td>
        </tr>
    </tbody>
</table>
</body>
</html>