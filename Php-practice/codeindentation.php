<?php
$name = 'Alex';
$age = 15;
if (strtoloWer($name) === 'alex') {
    if ($age >= 21) {
        echo 'You\'re over 21';
    } else {
        echo 'Not over 21';
    }
} else {
    echo 'You\'re not Alex';
}
?>