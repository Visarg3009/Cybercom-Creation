<?php
$str = 'this is my string one.';
$str2 = 'this is a new file.';

//comparison
similar_text($str, $str2, $result);
echo 'The similarity between this: '.$result.'<br>';

$str3 = 'This is a <img scr="image.jpeg"> string.';
$string_slashes = htmlentities(addslashes($str3));

echo stripslashes($string_slashes);
?>