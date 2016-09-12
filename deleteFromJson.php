<?php
/*
* Author: Gavin Murphy
* Assignment: WE4 Mobile Web Applications, Digital Skills Academy
* Date : 2016/09/12

*/

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$searchTerm = $request->name;


$fh = fopen("mock/todos.txt", "a+");
$json = file_get_contents("mock/todos.txt");
$json = str_replace('\r\n','',$json );

$json = str_replace(',{"name" :  "' . $searchTerm . '"}', '', $json);


fclose($fh);


$fh = fopen("mock/todos.txt", "w+");
ftruncate($fh,0);


fwrite($fh, $json);
fclose($fh);







