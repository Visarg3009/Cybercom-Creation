<?php
$num1 = 16;
$num2 = 15;

$result = $num1 + $num2;
$num1 += 2;

echo $result.' '.$num1;

//strings concate
$txt = ' Hello ';
$txt .= ' World ';
echo $txt;

//logical and comparison
$a = 13;
$b = 23;

if ($a > $b && $a == $b) {
    echo ' OK ';
} else {
    echo ' Not OK ';
}

//arithmetic
$result1 = $a * $b;
echo $result1;

//increment or decrement
$a++;
echo $a;

//compare value and data types
if ($a === $b) {
    echo '  Equal';
} else {
    echo '  Not equal';
}
?>