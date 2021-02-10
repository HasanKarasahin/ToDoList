<?php

include_once "../../functions.php";

$json_a = getDataFromJsonFile("db.json");



$json_a['list'][2]=array('5','Kemal','14.02.2007','14.05.2008','1');

setJsonFile('db.json',$json_a);


?>