<?php

if (isset($_GET['user_name'])&&!empty($_GET['user_name'])) {
    $user_name = $_GET['user_name'];
    $user_name_lc = strtolower($user_name);

    if ($user_name_lc=='alex') {
        echo 'Yor are the best '.$user_name;
    }
}

?>

<form action="string1.php" method="GET">
    NAME: <input type="text" name="user_name" id=""><br>
    <input type="submit" value="submit">
</form>