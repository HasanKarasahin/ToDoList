<?php


include_once "../../functions.php";
$json_a = getDataFromJsonFile("db.json");

//var_dump(count($json_a['list']));

$today = date("d.m.y");
print_r($today);


?>