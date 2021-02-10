<?php

include_once "../../functions.php";

$json_a = getDataFromJsonFile("db.json");



echo "<pre>";
unset($json_a['list'][1]); 
print_r($json_a['list']);
echo "</pre>";

setJsonFile('db.json',$json_a);

exit;



?>