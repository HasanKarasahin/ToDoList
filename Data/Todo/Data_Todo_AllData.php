<?php

include_once "../../functions.php";

$json_a = getDataFromJsonFile("db.json");

if(isset($json_a['sonuc']) && $json_a['sonuc']=-1){
    //TO-DO buraya error sayfasına gidiş eklenecek.
}else{
    foreach ($json_a['list'] as $key=>$value) {
        print_r("<tr> <td>". $value['id'] ."</td> <td> ".$value['toDo']." </td> <td> ".$value['createdTime']['year']." </td> <td> ".$value['endDate']." </td> <td> ".$value['status']." </td> </tr>");
    }
}

?>