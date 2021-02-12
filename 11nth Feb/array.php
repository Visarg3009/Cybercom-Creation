<?php

$data = [];

$data['category'] = [];
$data['category']['attribute'] = [];
$data['category']['attribute']['option'] = 1;
$data['category']['attribute']['option2'] = [];

echo '<pre>';
print_r($data);
die();

$data1 = [

	['category'=>1,'attribute'=>1,'option'=>1],
	['category'=>1,'attribute'=>1,'option'=>2],
	['category'=>1,'attribute'=>2,'option'=>3],
	['category'=>1,'attribute'=>2,'option'=>4],
	['category'=>2,'attribute'=>3,'option'=>5],
	['category'=>2,'attribute'=>3,'option'=>6],
	['category'=>2,'attribute'=>4,'option'=>7],
	['category'=>2,'attribute'=>4,'option'=>8]
];
/*
$final = [];

echo "<pre>";
foreach ($data1 as $key => $value) {
    $category = $value['category'];
    $attribute = $value['attribute'];
    $option = $value['option'];

    $final[$category][$attribute][$option] = $option;
};

print_r($final);
die();
*/

$data2 = [
	'1'=>[
		'1' => [
			'1' => 1,
			'2' => 2		
		],
		'2' => [
			'3' => 3,
			'4' => 4		
		]
	],
	'2'=>[
		'3' => [
			'5' => 5,
			'6' => 6		
		],
		'4' => [
			'7' => 7,
			'8' => 8		
		]
	],
];
//  $final = [];

//echo "<pre>";

//print_r($data2[1][1][1]);
//print_r($data2[1][1][2]);
//print_r($data2[1][2][3]);
//print_r($data2[1][2][4]);
//print_r($data2[2][3][5]);
//print_r($data2[2][3][6]);
//print_r($data2[2][4][7]);
//print_r($data2[2][4][8]);
die();

?>