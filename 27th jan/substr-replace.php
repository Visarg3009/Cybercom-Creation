<?php
$find = array('is', 'string', 'example');
$replace = array('IS','STRING','EXAMPLE');
$str = 'this is a string,but this is an example';

$str_new = substr_replace($str, 'another', 29, 2);

$str_new1 = str_ireplace($find, $replace, $str);

echo $str_new1;
?>