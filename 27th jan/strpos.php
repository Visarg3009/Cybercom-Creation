<?php
$offset = 0;
$find = 'string';
$find_length = strlen($find);

$str = 'This is a string, and it is an exaple';

while ($str_pos = strpos($str, $find, $offset)) {
    echo $find.' found at '.$str_pos.'<br>';
    $offset = $str_pos + $find_length;
}
?>