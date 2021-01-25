<?php

$counter = 1;

//while loop
while($counter <= 10) {
    echo $counter.'Hello<br>';
    $counter++;
}

//do - while loop
do {
    echo 'This will always show.<br>';
    $counter++;
} while($counter <= 10)

/*
//for loop
for ($i=0; $i < 10; $i++) { 
    echo $i.'<br>';
}
*/
?>