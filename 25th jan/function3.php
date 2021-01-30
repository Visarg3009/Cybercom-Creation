<?php
$user_ip = $_SERVER['REMOTE_ADDR'];

function echo_ip() {
    global $user_ip; //Global varible initalized
    $str = 'Your IP address is '.$user_ip;
    echo $str;
}

echo_ip();
?>