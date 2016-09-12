<?php
/*
* Author: Gavin Murphy
* Assignment: WE4 Mobile Web Applications, Digital Skills Academy
* Date : 2016/09/12

*/

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$name = $request->name;


$fh = fopen("mock/todos.txt", "a+");
$json = file_get_contents("mock/todos.txt");
$json = substr($json,0, -1);

if(strlen($json) > 2){
     $json .= ',{"name" :  "' . $name . '"}]';
}else{
     $json .= '{"name" :  "' . $name . '"}]';
}

$json = str_replace('\r\n','',$json );
var_dump($json);

fclose($fh);

$fh = fopen("mock/todos.txt", "w+");
ftruncate($fh,0);


fwrite($fh, $json);
fclose($fh);







