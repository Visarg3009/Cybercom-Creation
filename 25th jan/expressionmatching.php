<?php
$str = 'this is a string';

if (preg_match('/is/',$str)) {
    echo 'match found';
} else {
    echo 'match not found';
}
?>