<?php
$a = 10;
$b = 3;

function add($num1, $num2) {
    echo $num1+$num2;
}

add($a, $b);

function displayDate($day ,$date, $year) {
    echo $day.' '.$date.' '.$year ;
}

displayDate(' monday', 34, 1999);
?>