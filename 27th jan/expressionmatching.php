<?php
function has_space($str) {
    if (preg_match('/ /', $str)) {            //preg match function
        return true;
    } else {
        return false;
    }
}

if (has_space('This doen\'t havespace')) {
    echo 'Has a space';
} else {
     echo 'doesn\'t have';  
}
?>