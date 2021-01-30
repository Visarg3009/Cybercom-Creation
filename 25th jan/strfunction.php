<?php
$str = 'this is an string.';

//string word count function
$string_word_count = str_word_count($str, 1, '&.!');

//String Shuffle fucntion
$string_shuffled = str_shuffle($str);

//substring funtion 
$half = substr($string_shuffled, 0, 5);

//string reverse
$string_reversed = strrev($str);

print_r($string_word_count);
echo $string_reversed;
?>