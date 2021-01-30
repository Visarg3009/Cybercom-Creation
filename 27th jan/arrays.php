<?php
$food = array('pizza', 'pasta', 'salad');
$food[2] = 'fruit';

//print_r($food);

//associative arrays
$arr2 = array('Pasta'=> 100, 'pizza'=> 150, 'salad'=> 599, 'burger'=> 49);

//print_r($arr2);

//mutlidimensional arrays
$food1 = array('healthy'=>array('salad', 'vegetables'),
                 'unhealthy'=>array('piiza', 'pasta'));
//echo $vehicle['unhealthy'][1];

foreach($food1 as $element => $inner_array) {
    echo $element.'<br>';
    foreach ($inner_array as $item) {
        echo $item.'<br>';
    }
}
?>