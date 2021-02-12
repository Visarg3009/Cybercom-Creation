<?php
/*
$data = [];

$data['cateogry'] = [];
$data['cateogry'][1] = [];
$data['cateogry'][1]['name'] = 'c1';
$data['cateogry'][1]['attribute'] = [];
$data['cateogry'][1]['attribute'][1] = [];
$data['cateogry'][1]['attribute'][1]['name'] = 'a1';
$data['cateogry'][1]['attribute'][1]['option'] = [];
$data['cateogry'][1]['attribute'][1]['option'][1] = [];
$data['cateogry'][1]['attribute'][1]['option'][1]['name'] = 'o1';
$data['cateogry'][1]['attribute'][1]['option'][2] = [];
$data['cateogry'][1]['attribute'][1]['option'][2]['name'] = 'o2';
$data['cateogry'][1]['attribute'][2] = [];
$data['cateogry'][1]['attribute'][2]['name'] = 'a2';
$data['cateogry'][1]['attribute'][2]['option'] = [];
$data['cateogry'][1]['attribute'][2]['option'][3] = [];
$data['cateogry'][1]['attribute'][2]['option'][3]['name'] = 'o3';
$data['cateogry'][1]['attribute'][2]['option'][4] = [];
$data['cateogry'][1]['attribute'][2]['option'][4]['name'] = 'o4';

echo '<pre>';
print_r($data);
die();
*/
$data1 = [

	['category'=>1,'categoryname'=>'c1','attribute'=>1,'attributename'=>'a1','option'=>1,'optionname'=>'o1'],
	['category'=>1,'categoryname'=>'c1','attribute'=>1,'attributename'=>'a1','option'=>2,'optionname'=>'o2'],
	['category'=>1,'categoryname'=>'c1','attribute'=>2,'attributename'=>'a2','option'=>3,'optionname'=>'o3'],
	['category'=>1,'categoryname'=>'c1','attribute'=>2,'attributename'=>'a2','option'=>4,'optionname'=>'o4'],
	['category'=>2,'categoryname'=>'c2','attribute'=>3,'attributename'=>'a3','option'=>5,'optionname'=>'o5'],
	['category'=>2,'categoryname'=>'c2','attribute'=>3,'attributename'=>'a3','option'=>6,'optionname'=>'o6'],
	['category'=>2,'categoryname'=>'c2','attribute'=>4,'attributename'=>'a4','option'=>7,'optionname'=>'o7'],
	['category'=>2,'categoryname'=>'c2','attribute'=>4,'attributename'=>'a4','option'=>8,'optionname'=>'o8']

];
/*
$final = [];

foreach ($data1 as $key => $value) {
    $final['category'][1]['name'] = 'c1';
    $final['category'][1]['attribute'][1]['name'] = 'a1';
    $final['category'][1]['attribute'][1]['option'][1]['name'] = 'o1';
    $final['category'][1]['attribute'][1]['option'][2]['name'] = 'o2';
    $final['category'][1]['attribute'][2]['name'] = 'a2';
    $final['category'][1]['attribute'][2]['option'][3]['name'] = 'o3';
    $final['category'][1]['attribute'][2]['option'][4]['name'] = 'o4';
    $final['category'][2]['name'] = 'c2';
    $final['category'][2]['attribute'][3]['name'] = 'a3';
    $final['category'][2]['attribute'][3]['option'][5]['name'] = 'o5';
    $final['category'][2]['attribute'][3]['option'][6]['name'] = 'o6';
    $final['category'][2]['attribute'][4]['name'] = 'a4';
    $final['category'][2]['attribute'][4]['option'][7]['name'] = 'o7';
    $final['category'][2]['attribute'][4]['option'][8]['name'] = 'o8';
}

echo "<pre>";
print_r($final);
die();
*/
$data2 = [
	'category'=> [
		'1'=>[
			'name' => 'c1',
			'attribute'=>[
				'1' => [
					'name'=>'a1',
					'option' => [
						'1'=>[
							'name' => 'o1'
						],
						'2'=>[
							'name' => 'o2'
						]
					]
				],
				'2' => [
					'name'=>'a2',
					'option' => [
						'3'=>[
							'name' => 'o3'
						],
						'4'=>[
							'name' => 'o4'
						]
					]
				]
			]
		],
		'2'=>[
			'name' => 'c2',
			'attribute'=>[
				'3' => [
					'name'=>'a3',
					'option' => [
						'5'=>[
							'name' => 'o5'
						],
						'6'=>[
							'name' => 'o6'
						]
					]
				],
				'4' => [
					'name'=>'a4',
					'option' => [
						'7'=>[
							'name' => 'o7'
						],
						'8'=>[
							'name' => 'o8'
						]
					]
				]
			]
		]
	]
];

$final = [];
$final = $data2['category'][1]['attribute'][1]['option'][2]['name'];

echo "<pre>";
print_r($final);
die();


?>